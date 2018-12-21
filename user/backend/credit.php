<?php

//-------------------------------------------------------------------DISPLAY ALL BILL--------------------------------------------------------------------------

$sqls = "SELECT * FROM bill ORDER BY b_id DESC";
$resultselect = $conn->query($sqls);

 
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