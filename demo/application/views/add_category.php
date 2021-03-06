
<div class="container" style="padding:5%;">

<?php
     echo form_open('category/store_category',['class'=>'form-horizontal']); 
?>
    <legend>Add Category</legend>
    <br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Category Name <b class="text-danger">*</b></label>
                        <?= form_input(['name'=>'categoryName','class'=>'form-control','placeholder'=>'Category Name']); ?>
                        
                    </div>
                </div>

                <div class="col-md-6">
                    <?= form_error('categoryName'); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Description</label>
                        <?= form_textarea(['name'=>'description','class'=>'form-control','placeholder'=>'Description']); ?>
                        
                    </div>
                </div>

                <div class="col-md-6">
                    <?= form_error('description'); ?>
                </div>
            </div>

                <?php 
                    echo form_submit(['name'=>'submit','value'=>'Submit','class'=>'btn btn-outline-dark']);
                ?>
        </div>
        

</div>