<div class="container" style="padding:8%;">

<?php 
    echo form_open("dashboard/store_user_details/{$id} ",['class'=>'form-horizontal']);
?>
<fieldset>
<legend>Welcome to Add Details Page...</legend>

<div class="row">
    <div class="col-md-6">
     <div class="form-group">
        <label>Address</label>
        <?= form_textarea(['name'=>'address','class'=>'form-control','placeholder'=>'Enter Address']) ?>
        
     </div>
    </div>

    <div class="col-md-6">
    <?= form_error('address'); ?>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
     <div class="form-group">
        <label>Phone Number</label>
        <?= form_input(['name'=>'phone','class'=>'form-control','placeholder'=>'Enter Phone Number']) ?>
        
     </div>
    </div>

    <div class="col-md-6">
    <?= form_error('phone'); ?>
    </div>
</div>

<?php 
 echo form_submit(['name'=>'submit','value'=>'Submit','class'=>'btn btn-dark']);
?>

</fieldset>
<?= form_close(); ?>
</div>
  

<?php include_once('footer.php');  ?>