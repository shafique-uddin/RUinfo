<?php 

// Check Have Any Edit Data
if(isset($_GET['edit'])){
    $post_id_no = sanitize_text_field($_GET['edit']); 
    global $wpdb;
    $tbl_name = $wpdb->prefix.'admission_info_db';
    $mylink = $wpdb->get_row( "SELECT * FROM $tbl_name WHERE id = $post_id_no" );
}
?>




<div class="admission-info-form-header">
    <div class="left-div">
        <?php _e('Date: '.date('d-F-Y')); ?>
    </div>
    <div class="right-div">
        <?php 
            if(isset($_GET['edit'])){ ?>
    <a type="button" href="<?php echo admin_url().'admin.php?page=add-new-varsity-info'; ?>">Add New Info</a>
        <?php } ?>
    </div>
</div>


<div id="varsityinfowrap" class="my-form-wrap"> 
<form method="POST">
<div class="row">
    <div class="col-2">Subject Name</div>
    <div class="col-10"><input type="text" name="subjectName" id=""></div>
</div>
<div class="row">
    <div class="col-2">Topic/Chapter Name</div>
    <div class="col-10"><input type="text" name="topicName" id=""></div>
</div>
<div class="row">
    <div class="col-2">Total Time</div>
    <div class="col-10"><input type="text" name="subjectName" id=""> Minutes</div>
</div>
<section class="question_sction">
    <div class="row questions">
        <div class="col-1">1.</div>
        <div class="col-11"><input type="text" name="question_1" id="" placeholder="Your Question" size="100"></div>
    </div>
    <div class="row options">
        <div class="col-1"></div>
        <div class="col-11">
            <input type="radio" name="correct_answer_for_qs_1" id="">
            <input type="text" name="options_1_for_question_1" id="" placeholder="Option 1" size="70">
            <button id="add-options">Add Options</button>
        </div>
    </div>
</section>
<div class="row" style="margin-top: 20px;">
    <div class="col-2"></div>
    <div class="col-10"><button id="add_question" onclick="myfun()">Add Question</button></div>
</div>

</form>
</div>

<?php // endwhile; ?>

