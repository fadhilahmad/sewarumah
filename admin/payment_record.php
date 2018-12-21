<?php 
	include ('./header_admin.php');
        include ('./backend/payment_record.php');
?>
<body>
    <?php 
        if(isset($_SESSION['username'])){
    ?>
    <div class="container">
        <div class="row">
            Total debit : RM <?php CalculateDebit('total',$conn);  ?>
            <br><br>
            <?php 
                $no=1;
                foreach ($result as $value){
            ?>
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-primary">
                    <div class="panel-heading">             
                        <center><h3 class="panel-title"><?php echo $value['payment_desc']; ?> : RM <?php echo $value['total']; ?></h3></center>
                    </div>
                    <div class="panel-body">
                        Debit : RM <?php CalculateDebit($value['p_id'],$conn);  ?>
                        <br><br>
                        <table class="table table-bordered table-condensed text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Tenant name</th>
                                    <th class="text-center">Total payment</th>
                                    <th class="text-center">Balance to paid</th>
                                    <th class="text-center">Updated date</th>
                                    <th class="text-center">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no=1;
                                    foreach ($tenant as $values){
                                    $info = Payment_total($values['t_id'],$value['p_id'],$conn,$value['total']);
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $values['nick_name']; ?></td>
                                    <td><?php echo $info['total']; ?></td>
                                    <td><?php echo $info['balance']; ?></td>
                                    <td><?php echo $info['updated_date']; ?></td>
                                    <td><?php echo $info['button']; ?></td>
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
            <?php   
                }
            ?>
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
            <form action="payment_record.php" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Payment</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control form-control-lg" name="p_id" id="p_id">
                            <input type="hidden" class="form-control form-control-lg" name="t_id" id="t_id">
                            <input type="hidden" class="form-control form-control-lg" name="pt_id" id="pt_id">
                            <input type="number" class="form-control form-control-lg" name="total_payment" id="total_payment" placeholder="Payment" required="required">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!--<button type="submit" class="btn btn-danger" id="delete" name="delete" style="display: none">Delete</button>-->
                    <button type="submit" class="btn btn-primary" id="update" name="edit" style="display: none">Save changes</button>
                    <input type="submit" class="btn btn-primary" id="add" name="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    
    $(document).ready(function(){
        
        /************************************** Add function *******************************/
        $('[id^="addNew"]').each(function(){
            $(this).click(function(event){
                var p_id = $(this).find('#p_ids').val();
                var t_id = $(this).find('#t_ids').val();
                $('#title').text('Add New');
//                $('#delete').hide('400');
                $('#update').hide('400'); 
                $('#add').show('400');
                $('#p_id').val(p_id);
                $('#t_id').val(t_id);
                $('#total_payment').val("");
                console.log('p_id='+p_id,'t_id='+t_id);
            });
        });

        /************************************ Edit function ******************************/
        $('[id^="editPayment"]').each(function(){
            $(this).click(function(event){
                var pt_id = $(this).find('#pt_ids').val();
                var total = $(this).find('#totals').val();
                $('#title').text('Edit Payment');
//                $('#delete').show('400');
                $('#update').show('400');    
                $('#add').hide('400');
                $('#pt_id').val(pt_id);
                $('#total_payment').val(total);
            });
        });
        
    });
        
</script>