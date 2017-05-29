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
 * Internal library of functions for module comlogo
 *
 * @package    mod_comlogo
 * @copyright  2017 Viktor Juša <viktor.jusa@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

define('LOGO', 'comlogo');
define( 'LOGO_GRADE_CAPABILITY', 'mod/comlogo:grade' );
define( 'LOGO_VIEW_CAPABILITY', 'mod/comlogo:view' );
define( 'LOGO_SUBMIT_CAPABILITY', 'mod/comlogo:submit' );
define( 'LOGO_MANAGE_CAPABILITY', 'mod/comlogo:manage' );

/**
 * generate URL to page with params
 *
 * @param $page string
 *            page from wwwroot/mod/comlogo/
 * @param $var1 string
 *            var1 name optional
 * @param $value1 string
 *            value of var1 optional
 * @param $var2 string
 *            var2 name optional
 * @param $value2 string
 *            value of var2 optional
 * @param
 *            ...
 */
function comlogo_mod_href() {
    global $CFG;
    $parms = func_get_args();
    $l = count( $parms );
    $href = $CFG->wwwroot . '/mod/comlogo/' . $parms [0];
    for ($p = 1; $p < $l - 1; $p += 2) {
        $href .= ($p > 1 ? '&amp;' : '?') . urlencode( $parms [$p] ) . '=' . urlencode( $parms [$p + 1] );
    }
    return $href;
}

