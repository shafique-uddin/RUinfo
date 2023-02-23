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
<div class="row">
    <div class="col-2"></div>
    <div class="col-10"><button id="question-add">Add Question</button></div>
</div>

</form>
</div>

<?php // endwhile; ?>

