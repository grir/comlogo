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
 * Prints a particular instance of comlogo
 *
 * @package    mod_comlogo
 * @copyright  2017 Viktor Juša <viktor.jusa@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


require_once(dirname(__FILE__).'/../../config.php');
require_once(dirname(__FILE__).'/lib.php');
require_once(dirname(__FILE__).'/locallib.php');
require_once(dirname(__FILE__).'/logo.class.php');

global $CFG;

$id = optional_param('id', 0, PARAM_INT); // Course_module ID, or
$n  = optional_param('n', 0, PARAM_INT);  // ... comlogo instance ID - it should be named as the first character of the module.
$logo = new mod_comlogo( $id );
$logo->prepare_page( 'view.php', array (
        'id' => $id
) );

if ($id) {
    $cm         = get_coursemodule_from_id(LOGO, $id, 0, false, MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $cm->course), '*', MUST_EXIST);
    $comlogo  = $DB->get_record(LOGO, array('id' => $cm->instance), '*', MUST_EXIST);
} else if ($n) {
    $comlogo  = $DB->get_record(LOGO, array('id' => $n), '*', MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $comlogo->course), '*', MUST_EXIST);
    $cm         = get_coursemodule_from_instance(LOGO, $comlogo->id, $course->id, false, MUST_EXIST);
} else {
    error('You must specify a course_module ID or an instance ID');
}

require_login($course, true, $cm);

$event = \mod_comlogo\event\course_module_viewed::create(array(
    'objectid' => $PAGE->cm->instance,
    'context' => $PAGE->context,
));
$event->add_record_snapshot('course', $PAGE->course);
$event->add_record_snapshot($PAGE->cm->modname, $comlogo);
$event->trigger();

// Print the page header.

$PAGE->set_url('/mod/comlogo/view.php', array('id' => $cm->id));
$PAGE->set_title(format_string($comlogo->name));
$PAGE->set_heading(format_string($course->fullname));

/*
 * Other things you may want to set - remove if not needed.
 * $PAGE->set_cacheable(false);
 * $PAGE->set_focuscontrol('some-html-id');
 * $PAGE->add_body_class('comlogo-'.$somevar);
 */

// Output starts here.
echo $OUTPUT->header();

$logo->print_view_tabs( basename( __FILE__ ) );

if ($comlogo->intro) {
    echo $OUTPUT->box(format_module_intro(LOGO, $comlogo, $cm->id), 'generalbox mod_introbox', 'comlogointro');
}

// Finish the page.
echo $OUTPUT->footer();
