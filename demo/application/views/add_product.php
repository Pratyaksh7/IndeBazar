
<div class="container" style="padding:5%;">

<?php
     echo form_open_multipart('product/store_product',['class'=>'form-horizontal']); 
?>
    <legend>Add Product</legend>
    <br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Product Name <b class="text-danger">*</b></label>
                        <?= form_input(['name'=>'productName','class'=>'form-control','placeholder'=>'Product Name']); ?>
                        
                    </div>
                </div>

                <div class="col-md-6">
                    <?= form_error('productName'); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Model <b class="text-danger">*</b></label>
                        <?= form_input(['name'=>'model','class'=>'form-control','placeholder'=>'Model']); ?>
                        
                    </div>
                </div>

                <div class="col-md-6">
                    <?= form_error('model'); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Price <b class="text-danger">*</b></label>
                        <?= form_input(['name'=>'price','class'=>'form-control','placeholder'=>'Price']); ?>
                        
                    </div>
                </div>

                <div class="col-md-6">
                    <?= form_error('price'); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Category <b class="text-danger">*</b></label><br>

                        <select class="form-control" name="category">
                            <?php 
                                foreach($categories as $category)
                                {
                                    echo '<option value="'.$category->categoryName.'">'.$category->categoryName.'</option>';
                                }                               
                            ?>
                        </select>
                        
                    </div>
                </div>
                    <div class="col-lg-6"> 
                        <?php echo form_error('category'); ?>
                    </div>
        
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Quantity</label>
                        <?= form_input(['name'=>'quantity','class'=>'form-control','placeholder'=>'Quantity']); ?>
                        
                    </div>
                </div>

                <div class="col-md-6">
                    <?= form_error('quantity'); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Upload Image</label>
                        <?php echo form_upload(['name'=>'image', 'class'=>"form-control"]); ?>
                
                    </div>
                    
                </div>
                <div class="col-lg-6">
                    <?php if(isset($upload_error))  echo $upload_error ?>  
                </div>
            </div>

                <?php 
                    echo form_submit(['name'=>'submit','value'=>'Submit','class'=>'btn btn-outline-dark']);
                ?>
        </div>
        

</div>