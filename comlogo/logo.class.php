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
 * Internal class mod_comlogo for module comlogo
 *
 * @package    mod_comlogo
 * @copyright  2017 Viktor Juša <viktor.jusa@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

abstract class DataType
{
    const Date = 0;
    const Grade = 1;
    const Image = 2;
    const Text = 3;
    const Number = 4;
}

class mod_comlogo {
    /**
     * Internal var for course_module
     *
     * @var object $cm
     */
    protected $cm;

    /**
     * Internal var for course
     *
     * @var object $course
     */
    protected $course;

    /**
     * Internal var for comlogo
     *
     * @var object $instance
     */
    protected $instance;


    /**
     * Constructor
     *
     * @param $id int
     */
    public function __construct($id) {
        global $DB;

        if ($id) {
            if (! $this->cm = get_coursemodule_from_id( 'comlogo', $id )) {
                print_error( 'invalidcoursemodule' );
            }
            if (! $this->course = $DB->get_record( "course", array (
                "id" => $this->cm->course
            ) )) {
                print_error( 'unknowncourseidnumber', '', $this->cm->course );
            }
            if (! $this->instance = $DB->get_record( LOGO, array (
                "id" => $this->cm->instance
            ) )) {
                print_error( 'module instance id unknow' );
            }
        }
    }

    /**
     *
     * @return course
     *
     */
    public function get_course() {
        return $this->course;
    }

    /**
     *
     * @return course_module
     *
     */
    public function get_course_module() {
        return $this->cm;
    }

    /**
     *
     * @return module db instance
     */
    public function get_instance() {
        return $this->instance;
    }

    protected static $context = array ();
    /**
     * Return context object for this module instance
     *
     * @return object
     */
    public function get_context() {
        if (! isset( self::$context [$this->cm->id] )) {
            self::$context [$this->cm->id] = context_module::instance( $this->cm->id );
        }
        return self::$context [$this->cm->id];
    }

    public function prepare_page($url = false, $parms = array()) {
        global $PAGE;

        $PAGE->set_cm( $this->get_course_module(), $this->get_course(), $this->get_instance() );
        $PAGE->set_context( $this->get_context() );
        if ($url) {
            $PAGE->set_url( '/mod/comlogo/' . $url, $parms );
        }
    }

    /**
     * print header
     **/
    function print_header(){
        global $PAGE,$OUTPUT;
        $PAGE->set_title($this->get_course()->fullname);
        $PAGE->set_pagelayout('incourse');
        $PAGE->set_heading($this->get_course()->fullname);
        echo $OUTPUT->header();
    }

    /**
     * Check if the user has the capability of performing $capability in this module instance
     *
     * @param string $capability
     *            capability name
     * @param int $userid
     *            default null => current user
     * @return bool
     */
    public function has_capability($capability, $userid = null) {
        return has_capability( $capability, $this->get_context(), $userid );
    }


    /**
     * Create views tabs
     *
     * @param $active tab
     *
     */
    public function print_view_tabs($active) {
        global $CFG, $USER, $DB;
        $active = basename( $active );
        $cmid = $this->cm->id;
        $level2 = false;
        $userid = optional_param( 'userid', null, PARAM_INT );
        $viewer = $this->has_capability( LOGO_VIEW_CAPABILITY );
        $submiter = $this->has_capability( LOGO_SUBMIT_CAPABILITY );
        $grader = $this->has_capability( LOGO_GRADE_CAPABILITY );
        $manager = $this->has_capability( LOGO_MANAGE_CAPABILITY );
        if (! $userid || ! $grader) {
            $userid = $USER->id;
        }
        if ($grader) {
            $level2 = true;
        }
        $strdescription = get_string( 'description', LOGO );
        $tabs = array ();
        $baseurl = $CFG->wwwroot . '/mod/' . LOGO . '/';
        $href = comlogo_mod_href( 'view.php', 'id', $cmid, 'userid', $userid );
        $viewtab = new tabobject( 'view.php', $href, $strdescription, $strdescription );
        if ($viewer) {
            $maintabs [] = $viewtab;
        }
        if ($level2) {
            $strsubmissionslist = get_string( 'submissions', LOGO );
            $href = comlogo_mod_href( 'views/submissions.php', 'id', $cmid );
            $maintabs [] = new tabobject( 'submissions.php', $href, $strsubmissionslist, $strsubmissionslist );
        } else {
            $strsubmissionslist = get_string( 'submissions', LOGO );
            $href = comlogo_mod_href( 'views/submission.php', 'id', $cmid, 'userid', $userid, 'multi', 1);
            $maintabs [] = new tabobject( 'submission.php', $href, $strsubmissionslist, $strsubmissionslist );
        }
        $strsubmissionslist = get_string( 'drawpage', LOGO );
        $href = comlogo_mod_href( 'views/logo_interpreter.php', 'id', $cmid, 'userid', $userid );
        $maintabs [] = new tabobject( 'logo_interpreter.php', $href, $strsubmissionslist, $strsubmissionslist );
        $strsubmissionslist = get_string( 'helppage', LOGO );
        $href = comlogo_mod_href( 'views/help.php', 'id', $cmid);
        $maintabs [] = new tabobject( 'help.php', $href, $strsubmissionslist, $strsubmissionslist );
        print_tabs(
            array (
                $maintabs,
                $tabs
            ), $active );
        return;
    }

    /**
     *  Gets assignment data
     *  @return $data
     */
    public function get_assignment_data() {
        global $DB;
        $data = $DB->get_record(LOGO, array('id' => $this->get_instance()->id), 'teachercode');
        return $data;
    }

    /**
     * Get last usersubmission
     * @param $id user id
     * @return FALSE/object
     **/
    function last_user_submission($userid){
        global $DB;
        $select = "(userid = ?) AND (comlogo = ?)";
        $params = array($userid,$this->instance->id);
        $res = $DB->get_records_select('comlogo_submissions', $select,$params,'id DESC','*',0,1);
        foreach($res as $sub){
            return $sub;
        }
        return false;
    }

    /**
     * Get user submissions, order reverse submission id
     * @param $id user id
     * @return FALSE/array of objects
     **/
    function user_submissions($userid){
        global $DB;
        $select = '(userid = ?) AND (comlogo = ?)';
        $parms = array($userid, $this->instance->id);
        return $DB->get_records_select('comlogo_submissions', $select, $parms,'id DESC');
    }

    /**
     * Submission user data
     * @param $userid
     * @param $img64 base64 image
     * @param $codelog student command log
     * @param $grade student evaluation
     * @return false or submission id
     **/
    function add_submission($userid, $img64, $codelog, $grade = 0) {
        global $DB, $CFG;
        //Create submission record
        $submissiondata = new stdClass();
        $submissiondata->comlogo = $this->get_instance()->id;
        $submissiondata->userid = $userid;
        $submissiondata->datesubmitted = time();
        $submissiondata->base64 = $img64;
        $submissiondata->code = $codelog;
        if ($this->instance->autograde == 1) {
            if ($grade == 1) {
                $submissiondata->grade = $this->instance->grade;
            } else {
                $submissiondata->grade = 0;
            }
            $submissiondata->dategraded = time();
            $submissiondata->grader = -1;
        }
        $submissionid = $DB->insert_record('comlogo_submissions', $submissiondata , TRUE);
        if(!$submissionid){
            $error=get_string('notsaved',LOGO)."\ninserting comlogo_submissions record";
            return false;
        } else {
            if ($this->instance->autograde == 1) {
                if (!function_exists('grade_update')) {
                    require_once($CFG->libdir.'/gradelib.php');
                }
                $grades= array();
                $gradeinfo= array();
                $gradeinfo['rawgrade'] = $submissiondata->grade;
                $gradeinfo['feedback'] = '';
                $gradeinfo['feedbackformat'] = FORMAT_HTML;
                $gradeinfo['datesubmitted'] = $submissiondata->datesubmitted;
                $gradeinfo['dategraded'] = $submissiondata->dategraded ;
                $gradeinfo['userid']= $userid;
                $grades[$userid] = $gradeinfo;
                $instance = $this->get_instance();
                if(grade_update('mod/comlogo', $instance->course, 'mod', LOGO,
                        $instance->id, 0, $grades) != GRADE_UPDATE_OK){
                    $error=get_string('notsaved',LOGO)."\ninserting into gradebook record";
                    return false;
                }
                /*$grade = new stdClass();
                $grade->userid = $userid;
                $grade->datesubmited = $submissiondata->datesubmitted;
                $grade->dategraded = $submissiondata->dategraded;
                $grade->rawgrade = $submissiondata->grade;
                grade_update('mod/comlogo', $instance->course, 'mod', LOGO,
                    $instance->id, 0, $grade);*/

            }
        }
        return $submissiondata;
    }


    function grade_submission($studentid, $graderid, $grade) {
        global $DB, $CFG;
        if ($this->has_capability(LOGO_GRADE_CAPABILITY, $graderid)) {
            $submission = $this->last_user_submission($studentid);
            $submission->grader = $graderid;
            $submission->grade = $grade;
            $submission->dategraded = time();
            $DB->update_record('comlogo_submissions', $submission);
            if (!function_exists('grade_update')) {
                require_once($CFG->libdir.'/gradelib.php');
            }
            $grades= array();
            $gradeinfo= array();
            $gradeinfo['rawgrade'] = $submission->grade;
            $gradeinfo['feedback'] = '';
            $gradeinfo['feedbackformat'] = FORMAT_HTML;
            $gradeinfo['datesubmitted'] = $submission->datesubmitted;
            $gradeinfo['dategraded'] = $submission->dategraded ;
            $gradeinfo['userid']= $studentid;
            $grades[$studentid] = $gradeinfo;
            $instance = $this->get_instance();
            if(grade_update('mod/comlogo', $instance->course, 'mod', LOGO,
                    $instance->id, 0, $grades) != GRADE_UPDATE_OK){
                $error=get_string('notsaved',LOGO)."\ninserting into gradebook record";
                return false;
            }
        } else {
            print_error( 'nopermission' );
        }
    }

    /**
     * @param user object
     * return HTML code to show user picture
     * @return String
     */
    function user_picture($user){
        global $OUTPUT;
        return $OUTPUT->user_picture($user);
    }

    /**
     * Get array of graders for this activity
     * @return array
     */
    function get_graders(){
        if(! isset($this->graders)){
            $this->graders = get_users_by_capability($this->get_context(),
                LOGO_GRADE_CAPABILITY,
                user_picture::fields('u'),'u.lastname ASC','','','');
        }
        return $this->graders;
    }

    function get_user_data($userid) {
        global $DB;
        return $DB->get_record('user', array('id' => $userid));
    }

    /**
     * Get array of students for this activity
     * @return array
     */
    function get_students(){
        if(! isset($this->students)){
            //Generate array of graders indexed
            $nostudens = array();
            foreach($this->get_graders() as $user){
                $nostudens[$user->id]=true;
            }
            $students = array();
            $all = get_users_by_capability($this->get_context(),
                LOGO_SUBMIT_CAPABILITY,
                user_picture::fields('u'),'u.lastname ASC','','','');

            foreach($all as $user){
                if(!isset($nostudens[$user->id])){
                    $students[]=$user;
                }
            }
            if(memory_get_usage(true)> 50000000){ //Don't cache if low memory
                return $students;
            }
            $this->students = $students;
        }
        return $this->students;
    }

    function print_submission_row($label, $datatype, $data) {
        echo '<div class="row-data">';
        switch ($datatype) {
            case DataType::Date:
                echo '<label for="submit-date">' . $label . '</label>';
                echo '<div id="sumbit-date">'.$data.'</div>';
                break;
            case DataType::Image:
                echo '<label for="user-img">' . $label . '</label>';
                echo '<img id="user-img" src="'.$data.'"/>';
                break;
            case DataType::Text:
                echo '<label for="code-log">' . $label . '</label>';
                echo '<div id="code-log">'.$data.'</div>';
                break;
            case DataType::Number:
                echo '<label for="grade">' . $label . '</label>';
                echo '<div id="grade">'.$data.'</div>';
                break;
            case DataType::Grade:
                echo '<label for="grade">' . $label . '</label>';
                echo '<input type="number" name="grade" min="0" max="'. $this->instance->grade.'" value="' . $data . '">';
                echo '<input type="submit" value="' . get_string('grade', LOGO) . '">';
                break;
        }
        echo '</div>';
    }

    function print_submission_block($submissiondata, $grade = false, $showgrade = false) {
        global $CFG, $USER;
        echo '<div class="submission">';
        if ($grade) {
            echo '<form action="' . new moodle_url($CFG->wwwroot . '/mod/comlogo/resources/php/grade_submission.php'). '">';
        }
        echo '<input type="hidden" name="studid" value="' . $submissiondata->userid . '" />';
        echo '<input type="hidden" name="userid" value="' . $USER->id . '" />';
        echo '<input type="hidden" name="id" value="' . $this->cm->id . '" />';
        $this->print_submission_row(get_string('submittedon', LOGO), DataType::Date, userdate($submissiondata->datesubmitted));
        $this->print_submission_row(get_string('userimg', LOGO), DataType::Image,$submissiondata->base64);
        $this->print_submission_row(get_string('codelog', LOGO), DataType::Text, $submissiondata->code);
        if ($grade) {
            $this->print_submission_row(get_string('grade'), DataType::Grade, $submissiondata->grade);
            echo '</form>';
        } else {
            if ($showgrade) {
                $this->print_submission_row(get_string('grade'), DataType::Number, $submissiondata->grade);
            }
        }
        echo '</div>';
    }

    function print_all_user_submissions($userid) {
        $subs = $this->user_submissions($userid);
        $nsubs = 0;
        foreach ($subs as $sub) {
            $nsubs++;
        }
        foreach ($subs as $sub) {
            echo '<h1>#' .$nsubs . '</h1>';
            $nsubs--;
            $this->print_submission_block($sub, false, true);
        }
    }

}
