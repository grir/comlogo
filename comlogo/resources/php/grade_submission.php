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
 * Grades student submissions
 *
 * @package    mod_comlogo
 * @copyright  2017 Viktor Juša <viktor.jusa@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(__FILE__) . '/../../../../config.php');
require_once(dirname(__FILE__).'/../../lib.php');
require_once(dirname(__FILE__).'/../../locallib.php');
require_once(dirname(__FILE__).'/../../logo.class.php');

$id = optional_param('id', 0, PARAM_INT); // Course_module ID
$userid = optional_param('userid', 0, PARAM_INT);
$studid = optional_param('studid', 0, PARAM_INT);
$grade = optional_param('grade', 0, PARAM_INT);

$logo = new mod_comlogo( $id );
if ($id && $studid && $userid) {
    $logo->grade_submission($studid, $userid, $grade);
    header('Location: '.new moodle_url($CFG->wwwroot .'/mod/comlogo/views/submissions.php?id='.$id.'&userid='.$userid));
}