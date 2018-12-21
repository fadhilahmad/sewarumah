<?php

//-------------------------------------------------------------------DISPLAY ALL USER--------------------------------------------------------------------------

$sqls = "SELECT * FROM tenant WHERE status = 1";
$resultselect = $conn->query($sqls);

//-------------------------------------------------------------------DISPLAY ALL USER--------------------------------------------------------------------------

//---------------------------------------------------------------------ADD NEW USER----------------------------------------------------------------------------

if(isset($_POST['submit'])){
    
    $erroradd = array();
    
    if(!empty($_POST['fullname'])){
        $fullname = $_POST['fullname'];
    }else{
        $fullname = null;
        $erroradd[] = "You forgot to enter fullname";
    }
    
    if(!empty($_POST['nickname'])){
        $nickname = $_POST['nickname'];
    }else{
        $nickname = null;
        $erroradd[] = "You forgot to enter nickname";
    }
    
    if(!empty($_POST['ic'])){
        $ic = $_POST['ic'];
    }else{
        $ic = null;
        $erroradd[] = "You forgot to enter IC";
    }
    
    if(!empty($_POST['phone'])){
        $phone = $_POST['phone'];
    }else{
        $phone = null;
        $erroradd[] = "You forgot to enter phone";
    }
    
    if(empty($erroradd)){
        
        $sql = "INSERT INTO tenant(full_name, nick_name, ic, phone, status) "
            . "VALUES ('$fullname', '$nickname', '$ic', '$phone', 1)";

        $result = mysqli_query($conn, $sql);

        if($result){
            //echo "New record created successfully";
            header("Refresh:0");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        
    }else{
//        foreach($erroradd as $values){
//            echo $values."<br>";
//        }
    }
    
}
    
//---------------------------------------------------------------------ADD NEW USER----------------------------------------------------------------------------

//---------------------------------------------------------------------UPDATE USER----------------------------------------------------------------------------

if(isset($_POST['edit'])){
    
    $erroredit = array();
    
    if(!empty($_POST['tenant_id'])){
        $t_id = $_POST['tenant_id'];
    }else{
        $t_id = null;
        $erroredit[] = "id is null";
    }
    
    if(!empty($_POST['fullname'])){
        $fullname = $_POST['fullname'];
    }else{
        $fullname = null;
        $erroredit[] = "You forgot to enter fullname";
    }
    
    if(!empty($_POST['nickname'])){
        $nickname = $_POST['nickname'];
    }else{
        $nickname = null;
        $erroredit[] = "You forgot to enter nickname";
    }
    
    if(!empty($_POST['ic'])){
        $ic = $_POST['ic'];
    }else{
        $ic = null;
        $erroredit[] = "You forgot to enter IC";
    }
    
    if(!empty($_POST['phone'])){
        $phone = $_POST['phone'];
    }else{
        $phone = null;
        $erroredit[] = "You forgot to enter phone";
    }
    
    if(empty($erroredit)){

        $sql = "UPDATE tenant "
                . "SET full_name='$fullname', nick_name='$nickname', ic='$ic', phone='$phone'"
                . "WHERE t_id='$t_id'";

        $result = mysqli_query($conn, $sql);

        if($result){
            header("Refresh:0");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
        
    }else{
//        foreach($erroradd as $values){
//            echo $values."<br>";
//        }
    }
    
}
    
//---------------------------------------------------------------------UPDATE USER----------------------------------------------------------------------------
   
//---------------------------------------------------------------------DELETE USER----------------------------------------------------------------------------

if(isset($_POST['delete'])){
  

      $t_id = $_POST['tenant_id'];
   //   echo $t_id;
        $sql = "UPDATE tenant "
                . "SET status='0' "
                . "WHERE t_id='$t_id'";

        $result = mysqli_query($conn, $sql);

        if($result){
            header("Refresh:0");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    
}

//---------------------------------------------------------------------DELETE USER----------------------------------------------------------------------------


?>