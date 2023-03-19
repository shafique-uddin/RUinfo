<div class="row">
    <div class="col-4">Model Test Subject</div>
    <div class="col-1">Paper</div>
    <div class="col-3">Topic</div>
    <div class="col-1">Status</div>
    <div class="col-3" style="text-align:center">Action</div>
</div>



<?php 
$result = apply_filters('all_model_test_data_is_here', 'some data is here');



foreach ($result as $key => $value) { ?>



<div class="row">
    <div class="col-4"><?php echo $value->subjectName; ?></div>
    <div class="col-1"><?php echo $value->paperNo; ?></div>
    <div class="col-3"><?php echo $value->topicOrChapter; ?></div>
    <div class="col-1"><?php echo $value->modelTestStatus; ?></div>
    <div class="col-1"><a href="">Edit</a></div>
    <div class="col-1"><a href="">View</a></div>
    <div class="col-1"><a href="">Delete</a></div>
</div>
<?php }
exit;
?>



