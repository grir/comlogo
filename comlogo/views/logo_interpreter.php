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
 * Prints a particular instance of comlogo, interpreter page
 *
 * @package    mod_comlogo
 * @copyright  2017 Viktor Juša <viktor.jusa@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname( __FILE__ ) . '/../../../config.php');
require_once($CFG->dirroot.'/mod/comlogo/lib.php');
require_once($CFG->dirroot.'/mod/comlogo/locallib.php');
require_once($CFG->dirroot.'/mod/comlogo/logo.class.php');

global $CFG;

$id = optional_param('id', 0, PARAM_INT); // Course_module ID, or
$n  = optional_param('n', 0, PARAM_INT);  // ... comlogo instance ID - it should be named as the first character of the module.
$logo = new mod_comlogo( $id );
$logo->prepare_page( 'views/logo_interpreter.php', array (
    'id' => $id
) );

require_login();

// required css and js files
$PAGE->requires->css(new moodle_url($CFG->wwwroot .'/mod/comlogo/css/interpreter.css'));
$PAGE->requires->js(new moodle_url($CFG->wwwroot .'/mod/comlogo/libs/turtle.js'));
$PAGE->requires->js(new moodle_url($CFG->wwwroot .'/mod/comlogo/libs/logo.js'));
$PAGE->requires->js(new moodle_url($CFG->wwwroot .'/mod/comlogo/libs/jquery-3.2.1.js'));
$PAGE->requires->js(new moodle_url($CFG->wwwroot .'/mod/comlogo/resources/js/compare.js'));
echo '<script type="text/javascript" src="'.$CFG->wwwroot.'/mod/comlogo/libs/resemble.js"></script>';
// Print the page header.
$logo->print_header();
$logo->print_view_tabs( basename( __FILE__ ) );

// draw page
echo '<div class= "comlogo">';
echo '<div  class = "modal" id="submissionResult">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p id = "submissionMessage"></p>
    </div>
    </div>';
echo '<div id = "ekranas">
    <canvas id="box" width="500" height="500"></canvas>
    <canvas id="vezlys" width="500" height="500"></canvas>
    <div id="overlay"></div>
    <div id="error"></div>
</div>';
// command window
echo '<div id="ivestis">
    <div id = "paleisti"><button type="button"  onclick="run()">'.get_string('run', LOGO).'</button></div>
    <div id = "sustabdyti"><button type="button">'.get_string('stop', LOGO).'</button></div>
    <div id = "isvalyti"><button type="button" id="clear">'.get_string('clear', LOGO).'</button></div>';
if ($logo->has_capability(LOGO_SUBMIT_CAPABILITY)) {
    echo '<div id = "issaugoti"><button type="button" id="save">' . get_string('submit', LOGO) . '</button></div>';
}
echo '<div id = "komandu langas">
        <textarea name="com_wnd" rows="20" cols="80" placeholder="'.get_string('entercommand', LOGO).'" id = "komlang"></textarea>
    </div>
</div>';
echo '</div>';
$PAGE->requires->js(new moodle_url($CFG->wwwroot .'/mod/comlogo/resources/js/logo_interpreter.js'));
// Finish the page.
echo $OUTPUT->footer();
// js for init
