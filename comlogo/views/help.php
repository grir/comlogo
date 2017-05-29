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
 * Prints a particular instance of comlogo, help page
 *
 * @package    mod_comlogo
 * @copyright  2017 Viktor Juša <viktor.jusa@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname( __FILE__ ) . '/../../../config.php');
require_once($CFG->dirroot.'/mod/comlogo/lib.php');
require_once($CFG->dirroot.'/mod/comlogo/locallib.php');
require_once($CFG->dirroot.'/mod/comlogo/logo.class.php');

$id = optional_param('id', 0, PARAM_INT); // Course_module IDž
$logo = new mod_comlogo( $id );
$logo->prepare_page( 'views/help.php', array (
    'id' => $id
) );

require_login();

$PAGE->requires->css(new moodle_url($CFG->wwwroot .'/mod/comlogo/css/help.css'));

$logo->print_header();

$logo->print_view_tabs( basename( __FILE__ ) );

echo get_string('helpcontent1', LOGO);
echo new moodle_url($CFG->wwwroot .'/mod/comlogo/pix/image001.png');
echo get_string('helpcontent2', LOGO);
echo new moodle_url($CFG->wwwroot .'/mod/comlogo/pix/image002.png');
echo get_string('helpcontent3', LOGO);
// Finish the page.
echo $OUTPUT->footer();