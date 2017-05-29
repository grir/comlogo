<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Prints a particular instance of comlogo, shows all student submissions
 *
 * @package    mod_comlogo
 * @copyright  2017 Viktor Juša <viktor.jusa@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname( __FILE__ ) . '/../../../config.php');
require_once($CFG->dirroot.'/mod/comlogo/lib.php');
require_once($CFG->dirroot.'/mod/comlogo/locallib.php');
require_once($CFG->dirroot.'/mod/comlogo/logo.class.php');

global $CFG, $DB;

$id = optional_param('id', 0, PARAM_INT); // Course_module ID, or
$n  = optional_param('n', 0, PARAM_INT);  // ... comlogo instance ID - it should be named as the first character of the module.
$logo = new mod_comlogo( $id );
$logo->prepare_page( 'views/submissions.php', array (
        'id' => $id
) );

require_login();

$PAGE->requires->css(new moodle_url($CFG->wwwroot .'/mod/comlogo/css/submission.css'));
$logo->print_header();
$logo->print_view_tabs( basename( __FILE__ ) );
// draw page

if (!$logo->has_capability(LOGO_GRADE_CAPABILITY)) {
    redirect('/../view.php?id='.$id);
} else {
    $list = $logo->get_students();
//Get all information
    $all_data = array();
    foreach ($list as $userinfo) {
        $data = new stdClass();
        $data->userinfo = $userinfo;
        $data->submission = $logo->last_user_submission($userinfo->id);
        $all_data[] = $data;
    }

//Load strings
    $name = get_string('author', LOGO);
    $strsubtime = get_string('submittedon', LOGO);
    $strgrade = get_string('grade');
    $strgrader = get_string('grader', LOGO);
    $strgradedon = get_string('gradedon', LOGO);
    $strsubmisions = get_string('submissions', LOGO);
    $table = new html_table();
    $usernumber = 0;

    $table->head = array('', '', $name, $strsubtime, $strsubmisions, $strgrade, $strgrader, $strgradedon);
    $table->aling = array('right', 'left', 'left', 'right', 'right', 'right', 'right', 'left');
    $table->size = array('', '', '60px', '');

    $show_photo = count($all_data) < 100;

    foreach ($all_data as $data) {
        $userinfo = $data->userinfo;
        $subtime = get_string('nosubmission', LOGO);
        $prev = 0;
        $grade = '';
        $grader = '';
        $gradedon = '';
        $subinstance = $data->submission;
        $res = $logo->user_submissions($userinfo->id);

        foreach ($res as $sub) {
            $prev++;
        }
        if ($subinstance != false) {
            $hrefview = comlogo_mod_href('views/submission.php', 'id', $id,
                'userid', $subinstance->userid);
            $subtime = $OUTPUT->action_link($hrefview,
                userdate($subinstance->datesubmitted));
            $grade = $subinstance->grade;
            if ($subinstance->grader != 0) {
                if ($subinstance->grader == -1) {
                    $grader = get_string('autograder', LOGO);
                } else {
                    $graderdata = $logo->get_user_data($subinstance->grader);
                    $grader = $graderdata->firstname . ' ' . $graderdata->lastname;
                }
                $gradedon = userdate($subinstance->dategraded);
            }

            $hrefsubs = comlogo_mod_href('views/submission.php', 'id', $id,
                'userid', $subinstance->userid, 'multi', $prev);
            $prev = $OUTPUT->action_link($hrefsubs, $prev);
        }
        $usernumber++;
        $table->data[] = array($usernumber,
            $show_photo ? $logo->user_picture($userinfo) : '',
            fullname($userinfo),
            $subtime,
            $prev,
            $grade,
            $grader,
            $gradedon);
    }

    echo html_writer::table($table);
}
// Finish the page.
echo $OUTPUT->footer();
