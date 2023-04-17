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
                <input type="text" required name="subjectName" id="" value="<?php if(isset($_POST['subjectName'])){echo $_POST['subjectName'];} ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-2">Paper</div>
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
                <input type="text" name="totalTime" value="<?php if(isset($_POST['subjectName'])){echo $_POST['totalTime'];} ?>" id="">
            </div>
        </div>
        <div class="row">
            <div class="col-2">Total Number</div>
            <div class="col-10">
                <input type="text" name="totalNumber" value="<?php if(isset($_POST['subjectName'])){echo $_POST['totalTime'];} ?>" id=""> Minutes
            </div>
        </div>
        <div class="row">
            <div class="col-2">Exam Date</div>
            <div class="col-10">
                <input type="text" name="examDate" value="<?php if(isset($_POST['subjectName'])){echo $_POST['totalTime'];} ?>" id="">
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <input type="submit" value="Submit" name="model_test_routine">
            </div>
        </div>

    </form>

</div>


<section id="routine_preview" class="mt-5">
<h2><i class="bi bi-arrow-down-square-fill"></i> Routine</h2>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Exam Date</th>
                <th scope="col">Subject Name (Paper)</th>
                <th scope="col">Topic/Chapter</th>
                <th scope="col">Total Time</th>
                <th scope="col">Total Number</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table>
</section>

