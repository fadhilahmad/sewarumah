<?php
    include '../config.php';
    include './backend/credit.php';
?>
<html>
<!--    <style>
        .th {
            background-color: #009900;
    color: white;
} 
    </style>-->
    <head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">	
	<title>Teratak Bujang</title>		
    </head>	
	<body style="font-family: Arial, Helvetica, sans-serif;">		
            <div class="container"><br><br>
                <h1 style="text-align: center;">Teratak Bujang Financial Center</h1><br>		
		<!--<center><img src="../image/uumlogo.jpg" alt="UUM Logo" width="400" height="150"></center><br><br>-->
                <center><a href="index.php"><button class="btn btn-success">View Payment List</button></a></center><Br>	
                    <div class="row">
                        <div class="col-md-12 col-md-offset-0">
                            <div class="panel panel-primary">
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
	</body>	
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
  
</script>
