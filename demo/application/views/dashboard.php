    <div class="container">
    <button class="btn btn-link offset-11" type="submit">
        <?= anchor('login/user_logout','Logout'); ?>
      </button>

            <center><h1>Welcome to the Dashboard..</h1> </center>
            <div class="row">
                <div class="col-md-3">
                    <?php echo form_open('product'); ?>
                    <?= form_submit('submit','Product Dashboard',['class'=>'btn btn-outline-secondary'])?>
                    <?= form_close();?>
                </div>

                <div class="col-md-3">
                    <?php echo form_open('category'); ?>
                    <?= form_submit('submit','Category',['class'=>'btn btn-outline-secondary'])?>
                    <?= form_close();?>
                </div>

                <!-- <div class="col-md-4"></div> -->
            </div>
               

               

                <table class="table table-hover">
        <thead>
            <tr>
            <!-- <th scope="col"></th> -->
            <th scope="col">Id</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        
            <?php foreach($infos as $info): ?>
            
            <tr class="table-success">
            <!-- <th scope="row">
                  <label class="form-check-label">
                    <?php echo set_checkbox(['name'=>'mycheck','class'=>'form-check-input','value'=>set_value('mycheck', $info->id)]) ?>
                  </label>
            </th> -->
            <th><?= $info->id; ?></th>
            <td><?= $info->username; ?></td>
            <td><?= $info->email; ?></td>
            <td>
                <div class="row">
                    <div class="col-md-3">
                    <?php echo form_open("dashboard/add_user_details/{$info->id}"); ?>
                        <?= form_submit('submit','Add Details',['class'=>'btn btn-outline-info']) ?>
                        <?= form_close(); ?>
                    </div>

                    <div class="col-md-2">
                        <?= anchor('dashboard/edit_user_details/'.$info->id,'Edit',['class'=>'btn btn-outline-dark']); ?>
                    </div>

                    <div class="col-md-2">
                        <?= form_open("dashboard/delete_user/{$info->id}"); ?>
                        <?= form_submit('delete','Delete',['class'=>'btn btn-outline-danger']) ?>
                        <?= form_close(); ?>
                    </div>
                </div>
            </td>
            </tr>
            <?php endforeach ; ?>
           
        </tbody>
        </table>
        
    </div>
    <center> 
		  <?= $this->pagination->create_links(); ?>
	</center>
    <?php include_once('footer.php');  ?>



