<?php

//-------------------------------------------------------------------DISPLAY ALL BILL--------------------------------------------------------------------------

$sqls = "SELECT * FROM bill ORDER BY b_id DESC";
$resultselect = $conn->query($sqls);

//---------------------------------------------------------------------ADD NEW BILL----------------------------------------------------------------------------

if(isset($_POST['submit'])){
    
    $desc = $_POST['bill_desc'];
    $total = $_POST['total'];
        
        $sql = "INSERT INTO bill(bill_desc, total, created_date, updated_date) "
            . "VALUES ('$desc', '$total', NOW(), NOW())";

        $result = mysqli_query($conn, $sql);

        if($result){
            //header("Refresh:0");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
}
    
//---------------------------------------------------------------------UPDATE BILL----------------------------------------------------------------------------

if(isset($_POST['edit'])){
    
    $b_id = $_POST['b_id'];
    $desc = $_POST['bill_desc'];
    $total = $_POST['total'];

        $sql = "UPDATE bill "
                . "SET bill_desc='$desc', total='$total', updated_date=NOW()"
                . "WHERE b_id='$b_id'";

        $result = mysqli_query($conn, $sql);

        if($result){
            header("Refresh:0");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
}
 
function CalculateDebit($conn) {
    
        $sql = "SELECT SUM(total) AS kira FROM payment_tenant"; 
        $resultt = $conn->query($sql);
        foreach ($resultt as $value) {
            $debit = $value['kira'];
        }
        echo $debit;
    return $debit;
}

function CalculateCredit($conn) {
    
        $sql = "SELECT SUM(total) AS kira FROM bill"; 
        $resultt = $conn->query($sql);
        foreach ($resultt as $value) {
            $credit = $value['kira'];
        }
        echo $credit;
    return $credit;
}
?>