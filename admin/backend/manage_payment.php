<?php

//-------------------------------------------------------------------DISPLAY ALL USER--------------------------------------------------------------------------

$sqls = "SELECT * FROM payment_index WHERE status = 1 ORDER BY p_id DESC";
$resultselect = $conn->query($sqls);

//---------------------------------------------------------------------ADD NEW USER----------------------------------------------------------------------------

if(isset($_POST['submit'])){
     
    $desc = $_POST['payment_desc'];
    $total = $_POST['total'];
    
        $sql = "INSERT INTO payment_index(payment_desc, total, status) "
            . "VALUES ('$desc', '$total', 1)";

        $result = mysqli_query($conn, $sql);

        if($result){
            header("Refresh:0");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    
}

//---------------------------------------------------------------------UPDATE USER----------------------------------------------------------------------------

if(isset($_POST['edit'])){
    
    $p_id = $_POST['payment_id'];
    $desc = $_POST['payment_desc'];
    $total = $_POST['total'];
    
        $sql = "UPDATE payment_index "
                . "SET payment_desc='$desc', total='$total'"
                . "WHERE p_id='$p_id'";

        $result = mysqli_query($conn, $sql);

        if($result){
            header("Refresh:0");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    
}
       
//---------------------------------------------------------------------DELETE USER----------------------------------------------------------------------------

if(isset($_POST['delete'])){
  
      $p_id = $_POST['payment_id'];
      
        $sql = "UPDATE payment_index "
                . "SET status='0' "
                . "WHERE p_id='$p_id'";

        $result = mysqli_query($conn, $sql);

        if($result){
            header("Refresh:0");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    
}

?>