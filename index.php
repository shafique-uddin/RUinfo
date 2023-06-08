<?php 
/**
* Plugin Name
*
* @package           PluginPackage
* @author            Your Name
* @copyright         2019 Your Name or Company Name
* @license           GPL-2.0-or-later
*
* @wordpress-plugin
* Plugin Name:       RUinfo
* Plugin URI:        https://shafique.com
* Description:       Description of the plugin.
* Version:           1.0.0
* Requires at least: 5.2
* Requires PHP:      7.2
* Author:            Muhammad Shafique Uddin
* Author URI:        https://shafique.com
* Text Domain:       Ruinfo
* License:           GPL v2 or later
* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
*/
 
 // Ruinfo INFO DB VERSION
 global $Ruinfo_define_db_version;
 $Ruinfo_define_db_version = '1.0.0';
 
/**
* Activate the plugin.
*/
function Ruinfo_installing_db() { 
    global $Ruinfo_define_db_version;
    global $wpdb;
    $db_collate = $wpdb->get_charset_collate();

    // USER DATA TABLE
    $Ruinfo_details_tbl = $wpdb->prefix.'Ruinfo_db';
    $basic_Ruinfo_start_tbl_query = "CREATE TABLE $Ruinfo_details_tbl (
        id INT(250) NOT NULL AUTO_INCREMENT,
        userName VARCHAR(250) NOT NULL,
        userEmail VARCHAR(250) NOT NULL,
        userPhone VARCHAR(250) NOT NULL,
        userPass VARCHAR(250) NOT NULL,
        PRIMARY KEY  (id)
    )$db_collate;";
    require_once(ABSPATH.'wp-admin/includes/upgrade.php');
    dbDelta( $basic_Ruinfo_start_tbl_query );
    add_option( 'Ruinfo_db_version_value', "$Ruinfo_define_db_version");

    $wpdb->insert(
        $Ruinfo_details_tbl,
        array(
            'userName' => 'Sample Data',
            'userEmail' => 'Sample Link',
            'userPhone' => 'Sample Data',
            'userPass' => 'Sample Data',
        )
    );


    // USER LOGIN META TABLE
    $Ruinfo_user_meta_tbl = $wpdb->prefix.'Ruinfo_user_meta';
    $basic_Ruinfo_user_meta_tbl_query = "CREATE TABLE $Ruinfo_user_meta_tbl (
        ssid INT(250) NOT NULL AUTO_INCREMENT,
        userSessionId VARCHAR(250) NOT NULL,
        userSessionValue VARCHAR(250) NOT NULL,
        userSessionKey VARCHAR(250) NOT NULL,
        userSessionExpiry VARCHAR(250) NOT NULL,
        PRIMARY KEY (ssid)
    )$db_collate;";
    dbDelta( $basic_Ruinfo_user_meta_tbl_query );


    // CREATE MODEL TEST SUBJECT TABLE
    $Ruinfo_model_test_subject_list_tbl = $wpdb->prefix.'Ruinfo_sub_wise_mdl_tst';
    $Ruinfo_model_test_subject_list_tbl_query = "CREATE TABLE $Ruinfo_model_test_subject_list_tbl (
        id INT(250) NOT NULL AUTO_INCREMENT,
        subject_id VARCHAR(250) NOT NULL,
        subjectName VARCHAR(250) NOT NULL,
        paperNo VARCHAR(250) NOT NULL,
        topicOrChapter VARCHAR(250) NOT NULL,
        modelTestTime VARCHAR(250) NOT NULL,
        modelTestStatus VARCHAR(250) NOT NULL,
        PRIMARY KEY (id)
    )$db_collate;";
    dbDelta( $Ruinfo_model_test_subject_list_tbl_query );



    // ADMIN CREATE MODEL TEST QUESTION+ANSWER TABLE
    $Ruinfo_model_test_question_tbl = $wpdb->prefix.'Ruinfo_model_test_question';
    $Ruinfo_model_test_question_tbl_query = "CREATE TABLE $Ruinfo_model_test_question_tbl (
        id INT(250) NOT NULL AUTO_INCREMENT,
        subject_id VARCHAR(250) NOT NULL,
        question_title VARCHAR(250) NOT NULL,
        question_options VARCHAR(250) NOT NULL,
        correct_answer VARCHAR(250) NOT NULL,
        PRIMARY KEY (id)
    )$db_collate;";
    dbDelta( $Ruinfo_model_test_question_tbl_query );


    // USER SINGLE MODEL TEST DATA STORAGE TABLE
    $Ruinfo_user_modelt_test_data_storage_tbl = $wpdb->prefix.'Ruinfo_user_model_test_single_info_data_storage';
    $Ruinfo_user_modelt_test_data_storage_tbl_query = "CREATE TABLE $Ruinfo_user_modelt_test_data_storage_tbl (
        id INT(250) NOT NULL AUTO_INCREMENT,
        userID VARCHAR(250) NOT NULL,
        questionID VARCHAR(250) NOT NULL,
        userAnswer VARCHAR(250) NOT NULL,
        PRIMARY KEY (id)
    )$db_collate;";
    dbDelta($Ruinfo_user_modelt_test_data_storage_tbl_query);


    // USER ALL MODEL TEST DATA INFO
    $Ruinfo_user_modelt_test_all_data_info_tbl = $wpdb->prefix.'Ruinfo_user_all_model_test_data_storage';
    $Ruinfo_user_modelt_test_all_data_info_tbl_query = "CREATE TABLE $Ruinfo_user_modelt_test_all_data_info_tbl (
        id INT(250) NOT NULL AUTO_INCREMENT,
        userID INT(250) NOT NULL,
        modelTestName VARCHAR(250) NOT NULL,
        modelTestID VARCHAR(250) NOT NULL,
        obtainedMarks VARCHAR(250) NOT NULL,
        TotalMarks VARCHAR(250) NOT NULL,
        currentTime VARCHAR(250) NOT NULL,
        dateIs VARCHAR(250) NOT NULL,
        PRIMARY KEY (id)
    )$db_collate;";
    dbDelta($Ruinfo_user_modelt_test_all_data_info_tbl_query);

    // MODEL TEST ROUTINE TABLE
    $Ruinfo_model_test_routine_tbl = $wpdb->prefix.'Ruinfo_model_test_routine';
    $Ruinfo_model_test_routine_tbl_query = "CREATE TABLE $Ruinfo_model_test_routine_tbl (
        id INT(250) NOT NULL AUTO_INCREMENT,
        examDate VARCHAR(250) NOT NULL,
        examTime VARCHAR(250) NOT NULL,
        subjectName VARCHAR(250) NOT NULL,
        subjectPaper VARCHAR(250) NOT NULL,
        topic_chapterName VARCHAR(250) NOT NULL,
        totalExamTime VARCHAR(250) NOT NULL,
        TotalMarks VARCHAR(250) NOT NULL,
        modelTestStatus VARCHAR(250) NOT NULL,
        PRIMARY KEY (id)
    )$db_collate;";
    dbDelta($Ruinfo_model_test_routine_tbl_query);


    // Clear the permalinks after the post type has been registered.
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'Ruinfo_installing_db');

 
 
/**
* Deactivation hook.
*/
function Ruinfo_deactivation_db_info() {
    global $Ruinfo_define_db_version;
    global $wpdb;
    // USER DATA TABLE
    $Ruinfo_details_tbl = $wpdb->prefix.'Ruinfo_db';
    $Ruinfo_details_tbl_sample_data_clean_query = "DELETE FROM $Ruinfo_details_tbl WHERE userName LIKE 'Sample Data'";
    $wpdb->query($Ruinfo_details_tbl_sample_data_clean_query);

    // USER LOGIN META TABLE
    $Ruinfo_user_meta_tbl = $wpdb->prefix.'Ruinfo_user_meta';
    $Ruinfo_user_meta_tbl_sample_data_clean_query = "DELETE FROM $Ruinfo_user_meta_tbl WHERE userName LIKE 'Sample Data'";
    $wpdb->query($Ruinfo_user_meta_tbl_sample_data_clean_query);

    // MODEL TEST SUBJECT TABLE
    // $Ruinfo_model_test_subject_tbl = $wpdb->prefix.'Ruinfo_model_test_question';
    // $Ruinfo_model_test_question_tbl = "DROP TABLE IF EXISTS $Ruinfo_model_test_question_tbl";
    // $wpdb->query($Ruinfo_model_test_question_tbl);
    

    // Clear the permalinks to remove our post type's rules from the database.
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'Ruinfo_deactivation_db_info' );


/**
 * Database Update hook.
 */
function Ruinfo_update_checking_hndl(){
    global $Ruinfo_define_db_version;
    global $wpdb;
    $db_tbl_name = $wpdb->prefix.'Ruinfo_db';

    if(get_option( 'Ruinfo_db_version_value' ) != $Ruinfo_define_db_version){
        $query = "CREATE TABLE $db_tbl_name (
            id INT(250) NOT NULL AUTO_INCREMENT,
            userName VARCHAR(250) NOT NULL,
            userEmail VARCHAR(250) NOT NULL,
            userPhone VARCHAR(250) NOT NULL,
            userPass VARCHAR(250) NOT NULL,
            PRIMARY KEY (id)
        )$db_collate;";
    
        require_once(ABSPATH.'wp-admin/includes/upgrade.php');
        dbDelta( $query );
    
        update_option( 'Ruinfo_db_version_value', "$Ruinfo_define_db_version");
    
        $wpdb->update(
            $db_tbl_name,
            array(
                'userName' => 'Sample Data',
                'userEmail' => 'Sample Link',
                'userPhone' => 'Sample Data',
                'userPass' => 'Sample Data',
            ),
            array(
                'id' => 1
            )
        );
        // IF NEED ANY COLUMN DELETE
    }
}
add_action( 'plugins_loaded', 'Ruinfo_update_checking_hndl' );


/**
 * Admin menu page
 */
function Ruinfo_admin_menu_hndlr(){
    add_menu_page( 'Ruinfo Information', 'Ruinfo Info', 'manage_options', 'Ruinfopage', 'Ruinfo_all_varsity_info_hndlr', 'dashicons-database-view' );
    add_submenu_page( 'Ruinfopage', 'Total Member', 'Total Member', 'manage_options', 'Ruinfopage' );
    add_submenu_page( 'Ruinfopage', 'Ruinfo Info All Model Test', 'All Model Test', 'manage_options', 'Ruinfo-info-all-model-test', 'Ruinfo_all_model_test_frm_hndlr' );
    add_submenu_page( 'Ruinfopage', 'Add Model Test', 'Add Model Test', 'manage_options', 'add-new-model-test', 'Ruinfo_add_new_model_test_frm_hndlr' );
    add_submenu_page('Ruinfopage', 'Model Test Routine', 'Make Routine', 'manage_options', 'upcoming-routine', 'Ruinfo_upcoming_routine_hndlr');
}
add_action('admin_menu','Ruinfo_admin_menu_hndlr');


/**
 * All Varsity Information page Handler 
 */
function Ruinfo_all_varsity_info_hndlr(){
    include_once('includes/admin-pages/all_data_info.php');
}


/**
 * Add New Model Test page Handler
 */
function Ruinfo_add_new_model_test_frm_hndlr(){
    include_once ('includes/create-model-test/form.php');
}


/**
 * All Model Test page Handler
 */
function Ruinfo_all_model_test_frm_hndlr(){
    include_once ('includes/model-test/index.php');
}

/**
 * MODEL TEST ROUTINE Handler
 */
function Ruinfo_upcoming_routine_hndlr(){
    include_once('includes/model-test-routine/routine.php');
}


/**
 * Plugin Admin Menu Page Styling
 * Add CSS AND JS
 */
function Ruinfo_admin_page_CSS_JS_include_hndlr($screen){
    // echo "<pre>";
    // print_r($screen);
    // echo "</pre>"; exit;
    if(('ruinfo-info_page_add-new-model-test' == $screen)||('ruinfo-info_page_upcoming-routine' == $screen)||('ruinfo-info_page_Ruinfo-info-all-model-test' == $screen)||('Ruinfo-info_page_add-new-varsity-info' == $screen) || ('Ruinfo-info_page_admission-info-file-attachment' == $screen)){
       wp_enqueue_style( 'Ruinfo-info-custom-css', plugin_dir_url( __FILE__ ).'lib/css/main.css', null, time() );
       wp_enqueue_style( 'Ruinfo-info-bootstrap-css-handler', '//cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css');
       wp_enqueue_style( 'Ruinfo-info-date-picker-stylesheet', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
       wp_enqueue_style( 'Ruinfo-info-date-picker-demo-stylesheet', '/resources/demos/style.css');
       wp_enqueue_style( 'Ruinfo-info-bootstrap-css-icon', '//cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css');
       wp_enqueue_script( 'Ruinfo-info-main-jquery', plugin_dir_url( __FILE__ ).'lib/js/datepickerJs.js', null , null , true );
       wp_enqueue_script( 'Ruinfo-info-custom-javascript', plugin_dir_url( __FILE__ ).'lib/js/custom.js', null , time() , true );
       wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-1.12.4.js', array('json2'), '1.12.4', true );
       wp_enqueue_script( 'jquery-ui-datepicker', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', array('jquery'), '1.11.4', true );
    }
}
add_action( 'admin_enqueue_scripts', 'Ruinfo_admin_page_CSS_JS_include_hndlr', 1);

/**
 * INSERT REGISTRATION DATA TO DB
 * MAKE LOGIN VALIDATION
 * REDIRECT LOGIN USER TO EMPTY DASHBOARD PAGE
 */


// DATA STORING IN DB
// FORM VALIDATION
 if(isset($_POST['model_test'])){
    
    $total_Question = $_POST["totalNumlberOfQueston"]; 
    $optionLimit = 4;

    $modelTestSubjectName = $_POST["subjectName"]; 
    $subjectId = $modelTestSubjectName.time();
    $modelTestPaper = $_POST["subjectPaper"]; 
    $modelTestTopicOrChapter = $_POST["topicName"]; 
    $modelTestTime = $_POST["totalTime"]; 

    global $wpdb;
    // STORE DATA FOR MODEL TEST SUBJECT TABLE
    $Ruinfo_model_test_subject_list_tbl = $wpdb->prefix.'Ruinfo_sub_wise_mdl_tst';
    $wpdb->insert(
        $Ruinfo_model_test_subject_list_tbl,
        array(
            'subject_id' => $subjectId,
            'subjectName' => $modelTestSubjectName,
            'paperNo' => $modelTestPaper,
            'topicOrChapter' => $modelTestTopicOrChapter,
            'modelTestTime' => $modelTestTime,
            'modelTestStatus' => '1'
        )
    );

    // RECEIVING QUESTION AND OPTIONS
    for ($getQuestion=1; $getQuestion <= $total_Question; $getQuestion++) { 
        // echo $_POST["question_no_".$getQuestion]."<br>";
        $question_title = $_POST["question_no_".$getQuestion];
        $all_options = '';

        for ($getOption=1; $getOption <= $optionLimit; $getOption++) { 
            $all_options .= $_POST["options_".$getOption."_for_question_".$getQuestion]."/";
        }

        // GET CORRECT ANSWER FOR THIS QUESTION
        $correctAnswerForThisQuestionIs = $_POST["answer_for_question_no_".$getQuestion];

        // STORE DATA FOR MODEL TEST QUESTION+ANSWER TABLE
            $Ruinfo_model_test_question_tbl = $wpdb->prefix.'Ruinfo_model_test_question';
            $wpdb->insert(
                $Ruinfo_model_test_question_tbl,
                array(
                    'subject_id' => $subjectId,
                    'question_title' => $question_title,
                    'question_options' => $all_options,
                    'correct_answer' => $correctAnswerForThisQuestionIs
                )
            );
    }
 }


// COLLECT ALL MODEL TEST DATA
function all_model_test_data_hndlr(){
    global $wpdb;
    $Ruinfo_model_test_subject_list_tbl = $wpdb->prefix.'Ruinfo_sub_wise_mdl_tst';

    $fivesdrafts = $wpdb->get_results(
        "
            SELECT * FROM $Ruinfo_model_test_subject_list_tbl
        "
    );

    return $fivesdrafts;
}
add_filter('all_model_test_data_is_here', 'all_model_test_data_hndlr', 10);



// COLLECT ALL DATA FROM SINGLE MODEL TEST QUESTION
function single_model_test_info_func($subId){
    global $wpdb;
    $Ruinfo_model_test_question_tbl = $wpdb->prefix.'Ruinfo_model_test_question';
    $result = $wpdb->get_results(
        // "SELECT * FROM $Ruinfo_model_test_question_tbl"
        "SELECT * FROM $Ruinfo_model_test_question_tbl WHERE subject_id = '$subId'"
    );

    return $result;
}
add_filter('single_model_test_info', 'single_model_test_info_func', 10, 1);


// USER ID HOOK
function user_session_id_finder_fun($sessionID){
    global $wpdb;
    $Ruinfo_user_meta_tbl = $wpdb->prefix.'Ruinfo_user_meta';
    $result = $wpdb->get_results(
        "SELECT * FROM $Ruinfo_user_meta_tbl WHERE userSessionValue = '$sessionID'"
    );

    return $result[0]->userSessionId;
}
add_filter('user_session_id_finder', 'user_session_id_finder_fun', 10, 1);


// USER MODEL TEST RESULT (OBTAINED MARKS) HOOK (only total correct answer)
function user_botained_marks_fun($user_model_test_answer_sheet){
    
    $correct_answer_is = 0;
    global $wpdb;
    $Ruinfo_model_test_question_tbl = $wpdb->prefix.'Ruinfo_model_test_question';
    foreach ($user_model_test_answer_sheet as $key => $value) {
        
        $model_test_result_query = $wpdb->get_results(
            "
                SELECT *
                FROM $Ruinfo_model_test_question_tbl
                WHERE id = '$key'
                AND correct_answer = '$value'
            "
        );

        if(count($model_test_result_query) > 0){
            $correct_answer_is++;
        }
    }
    return $correct_answer_is;
}
add_filter('user_botained_marks', 'user_botained_marks_fun', 10, 1);


// COLLECT CUSTOM QUESTIONS ANSWER
function custom_question_answer_sheet_fun($user_model_test_answer_sheet, $user_model_test_result){
    global $wpdb;
    $current_user_id = $user_model_test_result['userID'];
    foreach ($user_model_test_answer_sheet as $key => $value) {
        // STORE SINGLE QUESTION WISE MODEL DATA FOR USER
        $Ruinfo_user_modelt_test_data_storage_tbl = $wpdb->prefix.'Ruinfo_user_model_test_single_info_data_storage';
        $wpdb->insert(
            $Ruinfo_user_modelt_test_data_storage_tbl,
            array(
                'userID' => $current_user_id,
                'questionID' => $key,
                'userAnswer' => $value
            )
        );
    }


    // echo "<pre>";
    // print_r($user_model_test_answer_sheet);
    // echo "</pre>";

    // echo "<pre>";
    // print_r($user_model_test_result);
    // echo "</pre>";
    
    
    
    // exit;


    // STORE USER ALL MODEL TEST DATA TO USER ALL MODEL TEST DB
    $Ruinfo_user_modelt_test_all_data_info_tbl = $wpdb->prefix.'Ruinfo_user_all_model_test_data_storage';
    $wpdb->insert(
        $Ruinfo_user_modelt_test_all_data_info_tbl,
        array(
            'userID' => $user_model_test_result['userID'],
            'modelTestName' => $user_model_test_result['modelTestName'],
            'modelTestID' => $user_model_test_result['modelTestID'],
            'obtainedMarks' => $user_model_test_result['obtainedMarks'],
            'TotalMarks' => $user_model_test_result['TotalMarks'],
            'currentTime' => time(),
            'dateIs' => date('d-M-Y')
        )
    );

    $result = $user_model_test_result['obtainedMarks'];
    return $result;
}
add_filter('custom_question_answer_sheet', 'custom_question_answer_sheet_fun', 10, 2);


// GET HOLE MODEL TEST INFO FOR UNIQUE USER
function Ruinfo_get_model_test_info_for_per_user_fun($userID){
    global $wpdb;
    $Ruinfo_all_model_test_data = $wpdb->prefix.'Ruinfo_user_all_model_test_data_storage';
        
    $model_test_result_query = $wpdb->get_results(
        "
            SELECT *
            FROM $Ruinfo_all_model_test_data
            WHERE userID = '$userID'
        "
    );

    return $model_test_result_query;

}
add_filter('Ruinfo_get_model_test_info_for_per_user', 'Ruinfo_get_model_test_info_for_per_user_fun', 10, 1);


// GET MODEL TEST ROUTINE ALL DATA
function Ruinfo_get_model_test_routine_info_func(){
    global $wpdb;
    $Ruinfo_model_test_routine_tbl = $wpdb->prefix.'Ruinfo_model_test_routine';

    $Ruinfo_model_test_routine_tbl_query = $wpdb->get_results(
        "
            SELECT *
            FROM $Ruinfo_model_test_routine_tbl
        "
    );

    return $Ruinfo_model_test_routine_tbl_query;
}
add_filter('Ruinfo_get_model_test_routine_info', 'Ruinfo_get_model_test_routine_info_func', 10);


// GET ONLY ACTIVE [ON] MODEL TEST ROUTINE DATA
function Ruinfo_get_active_model_test_routine_info_func(){
    global $wpdb;
    $Ruinfo_model_test_routine_tbl = $wpdb->prefix.'Ruinfo_model_test_routine';

    $Ruinfo_model_test_routine_tbl_query = $wpdb->get_results(
        "
            SELECT *
            FROM $Ruinfo_model_test_routine_tbl
            WHERE modelTestStatus LIKE 'On'
        "
    );

    return $Ruinfo_model_test_routine_tbl_query;
}
add_filter('Ruinfo_get_active_model_test_routine_info', 'Ruinfo_get_active_model_test_routine_info_func', 10);


// MODEL TEST ROUTINE SUBMISSION
if(isset($_POST['model_test_routine_insert'])){
    $subjectName = $_POST['subjectName'];
    $subjectPaper = $_POST['subjectPaper'];
    $topicName = $_POST['topicName'];
    $totalTime = $_POST['totalTime'];
    $totalNumber = $_POST['totalNumber'];
    $modelTest_date = $_POST['modelTest_date'];
    $modelTestStatus = $_POST['examStatus'];
    $modelTest_time = $_POST['examTime'];

    // STORE MODEL TEST ROUTINE
    global $wpdb;
    $Ruinfo_model_test_routine_tbl = $wpdb->prefix.'Ruinfo_model_test_routine';

    $wpdb->insert(
        $Ruinfo_model_test_routine_tbl,
        array(
            'examDate' => $modelTest_date,
            'examTime' => $modelTest_time,
            'subjectName' => $subjectName,
            'subjectPaper' => $subjectPaper,
            'topic_chapterName' => $topicName,
            'totalExamTime' => $totalTime,
            'TotalMarks' => $totalNumber,
            'modelTestStatus' => $modelTestStatus
        )
    );
}


// MODEL TEST ROUTINE UPDATE
if(isset($_POST['model_test_routine_update'])){
    $subjectName = $_POST['subjectName'];
    $subjectPaper = $_POST['subjectPaper'];
    $topicName = $_POST['topicName'];
    $totalTime = $_POST['totalTime'];
    $totalNumber = $_POST['totalNumber'];
    $modelTest_date = $_POST['modelTest_date'];
    $modelTest_time = $_POST['examTime'];
    $modelTestStatus = $_POST['examStatus'];
    $dbId = $_POST['id'];

    // STORE MODEL TEST ROUTINE
    global $wpdb;
    $Ruinfo_model_test_routine_tbl = $wpdb->prefix.'Ruinfo_model_test_routine';

    $wpdb->update(
        $Ruinfo_model_test_routine_tbl,
        array(
            'examDate' => $modelTest_date,
            'examTime' => $modelTest_time,
            'subjectName' => $subjectName,
            'subjectPaper' => $subjectPaper,
            'topic_chapterName' => $topicName,
            'totalExamTime' => $totalTime,
            'TotalMarks' => $totalNumber,
            'modelTestStatus' => $modelTestStatus
        ),
        array(
            'id' => $dbId
        )
    );
}


// MODEL TEST ROUTINE DELETE
if(isset($_POST['model_test_routine_update'])){
    $subjectName = $_POST['subjectName'];
    $subjectPaper = $_POST['subjectPaper'];
    $topicName = $_POST['topicName'];
    $totalTime = $_POST['totalTime'];
    $totalNumber = $_POST['totalNumber'];
    $modelTest_date = $_POST['modelTest_date'];
    $modelTest_time = $_POST['examTime'];
    $modelTestStatus = $_POST['examStatus'];
    $dbId = $_POST['id'];

    // STORE MODEL TEST ROUTINE
    global $wpdb;
    $Ruinfo_model_test_routine_tbl = $wpdb->prefix.'Ruinfo_model_test_routine';

    $wpdb->update(
        $Ruinfo_model_test_routine_tbl,
        array(
            'examDate' => $modelTest_date,
            'examTime' => $modelTest_time,
            'subjectName' => $subjectName,
            'subjectPaper' => $subjectPaper,
            'topic_chapterName' => $topicName,
            'totalExamTime' => $totalTime,
            'TotalMarks' => $totalNumber,
            'modelTestStatus' => $modelTestStatus
        ),
        array(
            'id' => $dbId
        )
    );
}



// UPDATE MODEL TEST ROUTINE FOR SPECIFIC SECTION
if(isset($_GET['routine-id'])){
    $modelTestRoutineId = $_GET['routine-id'];
    global $wpdb;
    $Ruinfo_model_test_routine_tbl = $wpdb->prefix.'Ruinfo_model_test_routine';

    $Ruinfo_model_test_routine_tbl_query = $wpdb->delete( "$Ruinfo_model_test_routine_tbl", array( 'id' => $modelTestRoutineId ) );

    // return $Ruinfo_model_test_routine_tbl_query;
}


// ?>