<?php

//-------------------------------------------------------------------CHECK SETTING--------------------------------------------------------------------------
$sql = "SELECT * FROM payment_index WHERE status=1 ORDER BY p_id DESC"; 
$result = $conn->query($sql);

$sql2 = "SELECT * FROM tenant WHERE status=1"; 
$tenant = $conn->query($sql2);

//-------------------------------------------------------------------CHECK PAYMENT--------------------------------------------------------------------------

function Payment_total($t_id,$p_id,$conn,$payment) {
    
$sql = "SELECT * FROM payment_tenant WHERE t_id='$t_id' AND p_id='$p_id' LIMIT 1"; 
$result = $conn->query($sql);

$info = array();
if($result->num_rows == 0){
    $total = 0;
    $balance = $payment;
    $updated_date = 'No payment';
    $info['total'] = $total;
    $info['balance'] = $balance;
    $info['updated_date'] = $updated_date;
    $info['button'] = "<div id='addNew' class='btn btn-success itemList' data-toggle='modal' data-target='#modal'>Add"
            . "<input type='hidden' id='p_ids' value='". $p_id."'>"
            . "<input type='hidden' id='t_ids' value='". $t_id."'></div>";
}else{
    foreach ($result as $value){
    $pt_id = $value['pt_id'];
    $total = $value['total'];
    $balance = $payment-$total;
    $updated_date = date("d-m-Y", strtotime($value['updated_date']));
    $info['total'] = $total;
    $info['balance'] = $balance;
    $info['updated_date'] = $updated_date;
    $info['button'] = "<div id='editPayment' class='btn btn-warning itemList' data-toggle='modal' data-target='#modal'>Edit"
            . "<input type='hidden' id='pt_ids' value='". $pt_id."'>"
            . "<input type='hidden' id='totals' value='". $total."'></div>";
    }
}

return $info;
}

function CalculateDebit($p_id,$conn) {
    
    if($p_id == 'total'){
        $sql = "SELECT SUM(total) AS kira FROM payment_tenant"; 
        $resultt = $conn->query($sql);
        foreach ($resultt as $value) {
            echo $value['kira'];
        }
        
    }else{
        $sql = "SELECT SUM(total) AS kira FROM payment_tenant WHERE p_id='$p_id'"; 
        $resultt = $conn->query($sql);
        foreach ($resultt as $value) {
            echo $value['kira'];
        }
    }
    
}

//-------------------------------------------------------------------ADD NEW PAYMENT--------------------------------------------------------------------------

if(isset($_POST['submit'])){
    
    $p_id = $_POST['p_id'];
    $t_id = $_POST['t_id'];
    $total = $_POST['total_payment'];
    
        $sql = "INSERT INTO payment_tenant(t_id, p_id, total, created_date, updated_date) "
            . "VALUES ('$t_id', '$p_id', '$total', NOW(), NOW())";

        $results = mysqli_query($conn, $sql);

        if($results){
            //echo "New record created successfully";
            header("Refresh:0");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
}

//-------------------------------------------------------------------EDIT PAYMENT--------------------------------------------------------------------------

if(isset($_POST['edit'])){
    
    $pt_id = $_POST['pt_id'];
    $total = $_POST['total_payment'];
    
        $sql = "UPDATE payment_tenant "
                . "SET total='$total', updated_date=NOW()"
                . "WHERE pt_id='$pt_id'";

        $results = mysqli_query($conn, $sql);

        if($results){
            //echo "New record created successfully";
            header("Refresh:0");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
}
