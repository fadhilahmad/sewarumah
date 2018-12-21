<?php 
    
    include ('./header_admin.php');
    include ('backend/manage_user.php');
?>
<body>
    <?php 
        if(isset($_SESSION['username'])){
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="btn-group pull-right">
                            <a href="#" id="addNew" data-toggle="modal" data-target="#modal"><button class="btn default" ><i class="glyphicon glyphicon-plus"></i></button></a>
                        </div>                
                        <center><h3 class="panel-title">MANAGE TENANT</h3></center>
                        <br>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-condensed text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Full name</th>
                                    <th class="text-center">Nick name</th>
                                    <th class="text-center">IC</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no=1;
                                    foreach ($resultselect as $values){
                                ?>
                                <tr>
                                    <?php
                                        $editadmin_id = $values['t_id'];
                                        $editusername = $values['full_name']
                                    ?>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $values['full_name']; ?></td>
                                    <td><?php echo $values['nick_name']; ?></td>
                                    <td><?php echo $values['ic']; ?></td>
                                    <td><?php echo $values['phone']; ?></td>
                                    <td><?php if($values['status']==1){echo "Active";}else{echo "Not Active";} ?></td>
                                    <td><div class="btn btn-warning itemList" data-toggle="modal" data-target="#modal">Edit
                                        <input type="hidden" id="tenant_ids" value="<?php echo $values['t_id']; ?>">
                                        <input type="hidden" id="fullnames" value="<?php echo $values['full_name']; ?>" >
                                        <input type="hidden" id="nicknames" value="<?php echo $values['nick_name']; ?>" >
                                        <input type="hidden" id="ics" value="<?php echo $values['ic']; ?>" >
                                        <input type="hidden" id="phones" value="<?php echo $values['phone']; ?>" >
                                    </div></td>
                                </tr>
                                <?php 
                                    $no++;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php   
	}
    ?>
</body>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title" id="title">Add New Tenant
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <form action="manage_user.php" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Fullname</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control form-control-lg" name="tenant_id" id="tenant_id">
                            <input type="text" class="form-control form-control-lg" name="fullname" id="fullname" placeholder="Fullname">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Nickname</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-lg" name="nickname" id="nickname" placeholder="Nickname">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">IC</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-lg" name="ic" id="ic" placeholder="IC">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-lg" name="phone" id="phone" placeholder="Phones">
                        </div>
                    </div>

<!--                    <div class="form-group row">
                        <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Status</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-lg" name="phone" id="phone" placeholder="Phone">
                        </div>
                    </div>-->
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="admin_id" >
                    <button type="submit" class="btn btn-danger" id="delete" name="delete" style="display: none">Delete</button>
                    <button type="submit" class="btn btn-primary" id="update" name="edit" style="display: none">Save changes</button>
                    <input type="submit" class="btn btn-primary" id="add" name="submit" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    
    $(document).ready(function(){
        
        /************************************** Edit function *******************************/
        $('.itemList').each(function(){
            $(this).click(function(event){
                var admin_id = $(this).find('#tenant_ids').val();
                var username = $(this).find('#fullnames').val();
                var password = $(this).find('#nicknames').val();
                var full_name = $(this).find('#ics').val();
                var email = $(this).find('#phones').val();
                $('#title').text('Edit Tenant');
                $('#delete').show('400');
                $('#update').show('400'); 
                $('#add').hide('400');
                $('#tenant_id').val(admin_id);
                $('#fullname').val(username);
                $('#nickname').val(password);
                $('#ic').val(full_name);
                $('#phone').val(email);
                console.log(admin_id,username,password,full_name,email);
            });
        });
        /************************************** Edit function *******************************/
        
        /****************************** Alert empty in add new function *********************/
        $('#add').click(function(event){
            var usernames = $('#fullname').val();
            var password = $('#nickname').val();
            var full_name = $('#ic').val();
            var email = $('#phone').val();
            if(usernames=="" || password=="" || full_name=="" || email==""){
                alert('Please fill all section');
            }else{
                
            }
        });
        /****************************** Alert empty in add new function *********************/
        
        /******************************** Alert empty in edit function **********************/
        $('#update').click(function(event){
            var usernames = $('#fullname').val();
            var password = $('#nickname').val();
            var full_name = $('#ic').val();
            var email = $('#phone').val();
            if(usernames=="" || password=="" || full_name=="" || email==""){
                alert('Please fill all section');
            }else{
                
            }
        });
        /******************************** Alert empty in edit function **********************/
            
        /************************************ Add new function ******************************/
        $('#addNew').each(function(){
            $(this).click(function(event){
                $('#title').text('Add New Tenant');
                $('#delete').hide('400');
                $('#update').hide('400');    
                $('#add').show('400');
                $('#tenant_id').val("");
                $('#fullname').val("");
                $('#nickname').val("");
                $('#ic').val("");
                $('#phone').val("");
            });
        });
        /************************************ Add new function ******************************/
        
    });
        
</script>