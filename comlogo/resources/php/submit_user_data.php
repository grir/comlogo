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
 * Submits user solution to db
 *
 * @package    mod_comlogo
 * @copyright  2017 Viktor Juša <viktor.jusa@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(__FILE__) . '/../../../../config.php');
require_once(dirname(__FILE__).'/../../lib.php');
require_once(dirname(__FILE__).'/../../locallib.php');
require_once(dirname(__FILE__).'/../../logo.class.php');

$data = $_POST['imgBase64'] or $_REQUEST['imgBase64'];
$code = $_POST['code'] or $_REQUEST['code'];
$grade = $_POST['grade'] or $_REQUEST['grade'];

// get course id
$id = optional_param('id', 0, PARAM_INT);
$userid = optional_param('userid', FALSE, PARAM_INT);

if ($data != null && $code != null && $userid != false)
{
    $logo = new mod_comlogo( $id );

    // write data to db
    $submissiondata = $logo->add_submission($userid, $data, $code, $grade);
    if (!$submissiondata) {
        echo get_string('submissionfailed', LOGO);
    } else {
        echo get_string('submissionsuccess', LOGO);
        if ($logo->get_instance()->autograde) {
            echo get_string('submissiongraded', LOGO).$submissiondata->grade;
        } else {
            echo ' ,'.get_string('submissionwait', LOGO);
        }
    }
}
