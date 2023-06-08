<?php 

// Check Have Any Edit Data
if(isset($_GET['update-questions-id'])){
    $post_id_no = sanitize_text_field($_GET['update-questions-id']); 
    global $wpdb;
    $tbl_name = $wpdb->prefix.'admission_info_db';
    $mylink = $wpdb->get_row( "SELECT * FROM $tbl_name WHERE id = $post_id_no" );

    // include_once('.\./model-test/edit.php');

    include(plugin_dir_path(__FILE__).'edit.php');

    exit;
}
?>



<div class="ruinfo_wrapper">
<div class="ruinfo-admission-info-form-header">
    <div class="row">
        <div class="col-6">
            <div class="left-div">
                <?php _e('Date: '.date('d-F-Y')); ?>
            </div>
        </div>
        <div class="col-6">
            <div class="right-div">
                <!-- <button>Add New Model Test</button> -->
            </div>
        </div>
    </div>
</div>


<div id="varsityinfowrap" class="my-form-wrap"> 
<form method="POST" id="modeltestform" name="modeltestform" onsubmit="return thisformcheck()">
    <div class="row">
        <div class="col-2">Subject Name</div>
        <div class="col-10">
            <input type="text" required name="subjectName" id="" value="<?php if(isset($_POST['subjectName'])){echo $_POST['subjectName'];} ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-2">1st/2nd Paper</div>
        <div class="col-10">
            <input type="text" required name="subjectPaper" id="" value="<?php if(isset($_POST['subjectPaper'])){echo $_POST['subjectPaper'];} ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-2">Topic/Chapter Name</div>
        <div class="col-10">
            <input type="text" required name="topicName" id="" value="<?php if(isset($_POST['topicName'])){echo $_POST['topicName'];} ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-2">Total Time</div>
        <div class="col-10">
            <input type="text" name="totalTime" value="<?php if(isset($_POST['subjectName'])){echo $_POST['totalTime'];} ?>" id=""> Minutes
        </div>
    </div>
    <section class="question_sction">

        <div class="row">
            <div class="col-12" id="qusandans">

            </div>
        </div>

    </section>


    <div class="row">
        <div class="col-12">
            <input type="submit" value="Submit" name="model_test">
        </div>
    </div>

</form>


<div class="row" style="margin-top: 20px;">
    <div class="col-2">
<!-- <button id="add-options" onclick="add_options_btn()">Add Options</button> -->
    </div>
    <div class="col-10"><button id="add-question" onclick="add_question()">Add Question</button></div>
</div>



</div>

<?php // endwhile; ?>

<!-- wrapper class end -->
</div>