<?php 

// Check Have Any Edit Data
if(isset($_GET['edit'])){
    $post_id_no = sanitize_text_field($_GET['edit']); 
    global $wpdb;
    $tbl_name = $wpdb->prefix.'Ruinfo_model_test_routine';
    $mylink = $wpdb->get_row( "SELECT * FROM $tbl_name WHERE id = $post_id_no" );
    // echo "<pre>";
    // print_r($mylink);
    // echo "</pre>"; 
    // exit;
    if($mylink->modelTestStatus == 'On'){
        $chcked = 'checked';
    } 
    if($mylink->modelTestStatus == 'Off'){
        $chcked = '';
    }

    // $chcked = ($mylink->modelTestStatus == 'On')?'Checked':' ';
    // echo $chcked; exit;
}
?>




<div class="admission-info-form-header">
    <div class="row">
        <div class="col-6">
            <div class="left-div">
                <?php _e('Date: '.date('d-F-Y')); ?>
            </div>
        </div>
    </div>
</div>


<div id="varsityinfowrap" class="my-form-wrap"> 
    <form method="POST" id="model_test_routine" name="modeltestform">
        <div class="row">
            <div class="col-2">Subject Name</div>
            <div class="col-10">
                <input type="text" required name="subjectName" id="" value="<?php if(isset($mylink)){echo $mylink->subjectName;} ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-2">Paper</div>
            <div class="col-10">
                <input type="text" required name="subjectPaper" id="" value="<?php if(isset($mylink)){echo $mylink->subjectPaper;} ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-2">Topic/Chapter Name</div>
            <div class="col-10">
                <input type="text" required name="topicName" id="" value="<?php if(isset($mylink)){echo $mylink->topic_chapterName;} ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-2">Total Time</div>
            <div class="col-10">
                <input type="text" name="totalTime" value="<?php if(isset($mylink)){echo $mylink->totalExamTime;} ?>" id=""> Minutes
            </div>
        </div>
        <div class="row">
            <div class="col-2">Total Number</div>
            <div class="col-10">
                <input type="text" name="totalNumber" value="<?php if(isset($mylink)){echo $mylink->TotalMarks;} ?>" id="">
            </div>
        </div>
        <div class="row">
            <div class="col-2">Exam Time</div>
            <div class="col-10">
                <input type="text" name="examTime" value="<?php if(isset($mylink)){echo $mylink->examTime;} ?>" id="">
            </div>
        </div>
        <div class="row">
            <div class="col-2">Exam Date</div>
            <div class="col-10">
                <!-- <input id="datepicker-example1" type="text" name="examDate"> -->
                <input type="text" autocomplete="off" name="modelTest_date" id="datepicker" value="<?php if(isset($mylink->examDate)){echo $mylink->examDate;} ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-2">Status</div>
            <div class="col">
                <input type="radio" name="examStatus" id="examStatusOn" value="On" <?php echo $chcked; ?>><label for="examStatusOn">On</label><br>
                <input type="radio" name="examStatus" id="examStatusOff" value="Off" <?php echo $chcked; ?>><label for="examStatusOff">Off</label>
            </div>

                
                <!-- <input type="text" name="examTime" value="<?php //if(isset($mylink)){// echo $mylink->examTime;} ?>" id=""> -->
        </div>


        <div class="row">
            <?php if(isset($mylink)){?>
                    <input type="hidden" name="id" value="<?php echo $post_id_no;?>">
            <?php } ?>

            <div class="col">
                <input type="submit" value="<?php echo (isset($mylink)) ? 'Update':'Submit'; ?>" name="<?php echo (isset($mylink)) ? 'model_test_routine_update':'model_test_routine_insert'; ?>">
                <button class="routine_page_add_new_item_cls"><a href="<?php echo admin_url('admin.php?page=upcoming-routine');?>">Add New</a></button>
            </div>
        </div>

    </form>

</div>


<section id="routine_preview" class="mt-5">
    <?php 
    $result = apply_filters('Ruinfo_get_model_test_routine_info', 'Model Test Routine'); 
   
    
    
    // exit;
    if(count($result) == 0){
        _e('Result has not published yet.');
    }
    else{ ?>

<h2><i class="bi bi-arrow-down-square-fill"></i> Routine</h2>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Exam Date</th>
                <th scope="col">Exam Time</th>
                <th scope="col">Subject Name (Paper)</th>
                <th scope="col">Topic/Chapter</th>
                <th scope="col">Total Time</th>
                <th scope="col">Total Number</th>
                <th scope="col">Activation</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($result as $key => $valueOf) {
                    $updateRoutineItem = admin_url('admin.php?page=upcoming-routine&edit='.$valueOf->id);
                    $deleteRoutineItem = admin_url('admin.php?page=upcoming-routine&routine-id='.$valueOf->id);
            ?>
            <tr>
                <th scope="row"><?php echo $valueOf->examDate; ?></th>
                <td><?php echo $valueOf->examTime; ?></td>
                <td><?php echo $valueOf->subjectName.'('.$valueOf->subjectPaper.')'; ?></td>
                <td><?php echo $valueOf->topic_chapterName; ?></td>
                <td><?php echo $valueOf->totalExamTime; ?></td>
                <td><?php echo $valueOf->TotalMarks; ?></td>
                <td class="text-center"><?php echo $valueOf->modelTestStatus; ?></td>
                <td><a href="<?php echo $updateRoutineItem; ?>">Update</a> / <a href="<?php echo $deleteRoutineItem; ?>">Delete</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</section>

<?php 
}
?>