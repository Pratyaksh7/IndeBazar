
    <div class="container">
        <h1>Category List..</h1>
            <!-- <div class="row  offset-11">
                    
            </div> -->

            <div class="row offset-10">
                <!-- <div class="col-md-4">
                    <?php echo form_open('category/add_category'); ?>
                        <?= form_submit('submit','Add',['class'=>'btn btn-outline-info'])?>
                        <?= form_close();?>
                </div> -->

                
            </div>
            
        <table class="table table-hover ">
            <thead>
                <tr>
                <!-- <th scope="col"></th> -->
                <th width="3%"></th>
                <th scope="col" >Category Name</th>
                
                <th scope="col" style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <?php echo form_open('category/delete_categories');  ?>
                <?php foreach($categories as $category): ?>

            <tbody >
                    <div class="checkbox tab">
                        <tr class="table-secondary">
                            <td> <?= form_checkbox('delete[]',"$category->id"); ?></td>
                            <td><?= $category->categoryName; ?></td>
                            <td style="text-align:right;">
                                <?= anchor('category/edit_category/'.$category->id,'Edit',['class'=>'btn btn-outline-dark']) ?>
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
                    <?php echo form_open('category/add_category'); ?>
                        <?= form_submit('submit','Add',['class'=>'btn btn-outline-info'])?>
                        <?= form_close();?>
                </div>
        </div>    
        </table>
    </div>
        
</body>
</html>