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
                <button><a href="<?php echo admin_url().'admin.php?page=add-new-model-test'; ?>">Add New Model Test</a></button>
            </div>
        </div>
    </div>
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Subject</th>
      <th scope="col">Paper</th>
      <th scope="col">Topic</th>
      <th scope="col">Status</th>
      <th scope="col" style="text-align:center">Action</th>
    </tr>
  </thead>
  <tbody>


<?php 
  $result = apply_filters('all_model_test_data_is_here', 'some data is here');
foreach ($result as $key => $value) { ?>

    <tr>
      <td><?php echo $value->subjectName; ?></td>
      <td><?php echo $value->paperNo; ?></td>
      <td><?php echo $value->topicOrChapter; ?></td>
      <td><?php if($value->modelTestStatus == '1'){echo 'On'; } else{ echo 'Off';} ?></td>
      <td style="text-align:center">
      <a href="<?php echo admin_url().'admin.php?page=add-new-model-test&update-questions-id'?>">Edit</a> |
      <a href="">View</a> |
      <a href="">Delete</a>
      </td>
    </tr>

    <?php }
?>

  </tbody>
</table>



<!-- wrapper class end -->
</div>