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
 * Prints a particular instance of comlogo, grade user submission page
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

$id = optional_param('id', 0, PARAM_INT); // Course_module ID
$userid = optional_param('userid', false, PARAM_INT);
$multi = optional_param('multi', 0, PARAM_INT);
$logo = new mod_comlogo( $id );
$logo->prepare_page( 'views/submissions.php', array (
    'id' => $id
) );

require_login();

$PAGE->requires->css(new moodle_url($CFG->wwwroot .'/mod/comlogo/css/submission.css'));
$logo->print_header();

$logo->print_view_tabs( basename( __FILE__ ) );
echo '<div class= "comlogo">';
if ( $multi == 0) {
    $submission = $logo->last_user_submission($userid);
    $logo ->print_submission_block($submission, true);
} else {
    $logo->print_all_user_submissions($userid);
}
echo '</div>';

// Finish the page.
echo $OUTPUT->footer();
