<?php

include ('../config.php');

//-------------------------------------------------------------------LOGIN ADMIN--------------------------------------------------------------------------

if(isset($_POST['submit'])){
    $errorlogin = array();
    if(!empty($_POST['username'])){
        $username = $_POST['username'];
    }else{
        $username = null;
        $errorlogin[] = "You forgot to enter username";
    }
    if(!empty($_POST['password'])){
        $password = $_POST['password'];
    }else{
        $password = null;
        $errorlogin[] = "You forgot to enter password";
    }
    if(empty($errorlogin)){
        $sql = "SELECT * FROM user WHERE username='$username' and password='$password'";
        $result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) == 1){
            while($row = mysqli_fetch_array($result)){
		$admin_id = $row['admin_id'];
            }
            // Set session variables
            $_SESSION['username'] = $username;
				
            header('Location: manage_user.php');
            exit();
	}else{
            echo '<script language="javascript">';
            echo 'alert("Invalid account")';
            echo '</script>';
	}
	mysqli_close($conn);
    }else{
//        foreach($errorlogin as $values){
//            echo $values."<br>";
//        }
    }
}

//-------------------------------------------------------------------LOGIN ADMIN--------------------------------------------------------------------------


