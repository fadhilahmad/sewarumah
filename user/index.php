<?php
    include '../config.php';
    include './backend/index.php';
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
                <center><a href="credit.php"><button class="btn btn-success">View Credit List</button></a></center><Br>	
                <div class="row">
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
                                <br>
                                <table class="table table-bordered table-condensed text-center">
                                    <thead class="th">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Tenant name</th>
                                            <th class="text-center">Total payment</th>
                                            <th class="text-center">Balance to paid</th>
                                            <th class="text-center">Updated date</th>
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
	</body>	
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
  
</script>
