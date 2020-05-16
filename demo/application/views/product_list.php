
    <div class="container">
        <h1>Product List..</h1>            
        <table class="table table-hover ">
            <thead style="text-align:center;">
                <tr >
                <!-- <th scope="col"></th> -->
                <th width="3%"></th>
                <th scope="col" >Product Name</th>
                <th scope="col" >Model</th>
                <th scope="col" >Quantity</th>
                <th scope="col" >Price</th>
                <th scope="col" >Image</th>

                <th scope="col" style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <?php echo form_open('product/delete_products');  ?>
                <?php foreach($products as $product): ?>

            <tbody style="text-align:center;">
                    <div class="checkbox tab" >
                        <tr class="table-default">
                            <td> <?= form_checkbox('delete[]',"$product->id"); ?></td>
                            <td><?= $product->productName; ?></td>
                            <td><?= $product->model; ?></td>
                            <td><?= $product->quantity; ?></td>
                            <td><?= $product->price; ?></td>
                            <td>
                                <img src=" <?= $product->image_path; ?>" alt="" style="width:20%; height:20%;">
                            </td>

                            <td style="text-align:right;">
                                <?= anchor('product/edit_product/'.$product->id,'Edit',['class'=>'btn btn-outline-dark']) ?>
                            </td>   
                        </tr>   
                    </div>              
   
            </tbody>
            <?php endforeach ; ?>
            <div class="row offset-7">
                <div class="col-md-6">
                    <?= form_submit('remove','Delete',['class'=>'btn btn-outline-danger offset-8']); ?>
                <?= form_close(); ?> 
                </div>
            
            
                 <div class="col-md-6">
                    <?php echo form_open('product/add_product'); ?>
                        <?= form_submit('submit','Add',['class'=>'btn btn-outline-info'])?>
                        <?= form_close();?>
                </div>
        </div>    
        </table>
    </div>
        
</body>
</html>