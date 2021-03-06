
<div class="container" style="padding:5%;">

<?php
     echo form_open_multipart("product/update_product/{$product->id}",['class'=>'form-horizontal']); 
?>
    <legend>Edit Product</legend>
    <br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Product Name <b class="text-danger">*</b></label>
                        <?= form_input(['name'=>'productName','class'=>'form-control','placeholder'=>'Product Name', 'value'=>set_value('productName',$product->productName)]); ?>
                        
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
                        <?= form_input(['name'=>'model','class'=>'form-control','placeholder'=>'Model', 'value'=>set_value('model',$product->model)]); ?>
                        
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
                        <?= form_input(['name'=>'price','class'=>'form-control','placeholder'=>'Price', 'value'=>set_value('price',$product->price)]); ?>
                        
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
                        <?= form_input(['name'=>'quantity','class'=>'form-control','placeholder'=>'Quantity', 'value'=>set_value('quantity',$product->quantity)]); ?>
                        
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
                        <?php echo form_upload(['name'=>'image', 'class'=>'form-control', 'value'=>set_value('image',$product->image_path)]); ?>
                
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