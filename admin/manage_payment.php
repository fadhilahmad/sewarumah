<?php 
	include ('./header_admin.php');
        include ('./backend/manage_payment.php');
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
                        <center><h3 class="panel-title">MANAGE PAYMENT</h3></center>
                        <br>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-condensed text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Payment name</th>
                                    <th class="text-center">Total payment</th>
                                    <th class="text-center">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no=1;
                                    foreach ($resultselect as $values){
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $values['payment_desc']; ?></td>
                                    <td><?php echo $values['total']; ?></td>
                                    <td><div class="btn btn-warning itemList" data-toggle="modal" data-target="#modal">Edit
                                        <input type="hidden" id="payment_ids" value="<?php echo $values['p_id']; ?>">
                                        <input type="hidden" id="payment_descs" value="<?php echo $values['payment_desc']; ?>" >
                                        <input type="hidden" id="totals" value="<?php echo $values['total']; ?>" >
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
                <div class="modal-title" id="title">Add New Payment
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <form action="manage_payment.php" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Payment</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control form-control-lg" name="payment_id" id="payment_id">
                            <input type="text" class="form-control form-control-lg" name="payment_desc" id="payment_desc" placeholder="Payment" required="required">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Total</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control form-control-lg" name="total" id="total" placeholder="Total" required="required">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="admin_id" >
                    <!--<button type="submit" class="btn btn-danger" id="delete" name="delete" style="display: none">Delete</button>-->
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
                var admin_id = $(this).find('#payment_ids').val();
                var username = $(this).find('#payment_descs').val();
                var password = $(this).find('#totals').val();
                $('#title').text('Edit Payment');
//                $('#delete').show('400');
                $('#update').show('400'); 
                $('#add').hide('400');
                $('#payment_id').val(admin_id);
                $('#payment_desc').val(username);
                $('#total').val(password);
                console.log(admin_id,username,password);
            });
        });

        /************************************ Add new function ******************************/
        $('#addNew').each(function(){
            $(this).click(function(event){
                $('#title').text('Add New Payment');
//                $('#delete').hide('400');
                $('#update').hide('400');    
                $('#add').show('400');
                $('#payment_id').val("");
                $('#payment_desc').val("");
                $('#total').val("");
            });
        });
        /************************************ Add new function ******************************/
        
    });
        
</script>