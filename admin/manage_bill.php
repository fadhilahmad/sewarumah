<?php 
    
    include ('./header_admin.php');
    include ('backend/manage_bill.php');
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
                            <a href="#" id="addNew" data-toggle="modal" data-target="#modal"><button class="btn" ><i class="glyphicon glyphicon-plus"></i></button></a>
                        </div>                
                        <center><h3 class="panel-title">MANAGE BILL</h3></center>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-2">Total Debit</div>
                            <div class="col-xs-1">:</div>
                            <div class="col-xs-9">RM <?php $debit = CalculateDebit($conn);?></div>
                            <div class="col-xs-2">Total Credit</div>
                            <div class="col-xs-1">:</div>
                            <div class="col-xs-9">RM <?php $credit = CalculateCredit($conn);?></div>
                            <div class="col-xs-2">Balance</div>
                            <div class="col-xs-1">:</div>
                            <div class="col-xs-9">RM <?php echo $debit-$credit;    ?></div>
                        </div>
                        <br><br>
                        <table class="table table-bordered table-condensed text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Bill</th>
                                    <th class="text-center">Total RM</th>
                                    <th class="text-center">Created Date</th>
                                    <th class="text-center">Updated Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no=1;
                                    foreach ($resultselect as $values){
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $values['bill_desc']; ?></td>
                                    <td><?php echo $values['total']; ?></td>
                                    <td><?php echo date("d-m-Y", strtotime($values['created_date'])); ?></td>
                                   <td><?php echo date("d-m-Y", strtotime($values['updated_date'])); ?></td>
                                    <td><div class="btn btn-warning itemList" data-toggle="modal" data-target="#modal">Edit
                                        <input type="hidden" id="b_ids" value="<?php echo $values['b_id']; ?>">
                                        <input type="hidden" id="bill_descs" value="<?php echo $values['bill_desc']; ?>" >
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
                <div class="modal-title" id="title">Add New Bill
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <form action="manage_bill.php" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Bill Description</label>
                        <div class="col-sm-10">                           
                            <input type="text" class="form-control form-control-lg" name="bill_desc" id="bill_desc" required="required" placeholder="Description">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Total</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control form-control-lg" name="total" id="total" required="required" placeholder="Total">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                     <input type="hidden" class="form-control form-control-lg" name="b_id" id="b_id">
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
                var b_id = $(this).find('#b_ids').val();
                var desc = $(this).find('#bill_descs').val();
                var total = $(this).find('#totals').val();
                $('#title').text('Edit Bill');
                $('#update').show('400'); 
                $('#add').hide('400');
                $('#b_id').val(b_id);
                $('#bill_desc').val(desc);
                $('#total').val(total);
                console.log(b_id,desc,total);
            });
        });
            
        /************************************ Add new function ******************************/
        $('#addNew').each(function(){
            $(this).click(function(event){
                $('#title').text('Add New Bill');
                $('#update').hide('400');    
                $('#add').show('400');
                $('#b_id').val("");
                $('#bill_desc').val("");
                $('#total').val("");
            });
        });
        
    });
        
</script>