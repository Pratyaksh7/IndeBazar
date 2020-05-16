<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="padding:8%;">

<?php 
    echo form_open('Signup/signed_up_user',['class'=>'form-horizontal']);
?>
<fieldset>
<legend>Welcome to Signup Page...</legend>

<div class="row">
    <div class="col-md-6">
     <div class="form-group">
        <label>Username</label>
        <?= form_input(['name'=>'username','class'=>'form-control','placeholder'=>'Username','value'=>set_value('email')]) ?>
        
     </div>
    </div>

    <div class="col-md-6">
    <?= form_error('email'); ?>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
     <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <?= form_input(['name'=>'email','class'=>'form-control','placeholder'=>'Enter email','value'=>set_value('email')]) ?>
        
     </div>
    </div>

    <div class="col-md-6">
    <?= form_error('email'); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
            <div class="form-group">
        <label>Password</label>
        <?= form_password(['name'=>'password','class'=>'form-control','placeholder'=>'Enter Password']) ?>
        
        </div>
    </div>

    <div class="col-md-6">
    <?= form_error('password'); ?>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
            <div class="form-group">
        <label>Confirm Password</label>
        <?= form_password(['name'=>'passwordConf','class'=>'form-control','placeholder'=>'Enter Password Again']) ?>
        
        </div>
    </div>

    <div class="col-md-6">
    <?= form_error('passwordConf'); ?>
    </div>
</div>


<?php 
 echo form_submit(['name'=>'submit','value'=>'Signup','class'=>'btn btn-primary']);
?>

</fieldset>
<?= form_close(); ?>
</div>
    
</body>
</html>