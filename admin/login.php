<?php
    session_start();
    if(isset($_SESSION['username'])){
        session_destroy();
    }
    
   include ('backend/login.php');
?>
<html>
    <head>
        
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
	<style>
			
            ::-moz-selection { background: #fe57a1; color: #fff; text-shadow: none; }
            ::selection { background: #fe57a1; color: #fff; text-shadow: none; }
            body { background-image: radial-gradient( cover, rgba(92,100,111,1) 0%,rgba(31,35,40,1) 100%), url('http://i.minus.com/io97fW9I0NqJq.png') }
            .login {
                background: #eceeee;
                border: 1px solid #42464b;
                border-radius: 6px;
                height: 357px;
                margin: 20px auto 0;
                width: 398px;
            }
            .login h1 {
                background-image: linear-gradient(top, #f1f3f3, #d4dae0);
                border-bottom: 1px solid #a6abaf;
                border-radius: 6px 6px 0 0;
                box-sizing: border-box;
                color: #727678;
		display: block;
		height: 43px;
		font: 600 14px/1 'Open Sans', sans-serif;
		padding-top: 14px;
		margin: 0;
		text-align: center;
		text-shadow: 0 -1px 0 rgba(0,0,0,0.2), 0 1px 0 #fff;
            }
            input[type="password"], input[type="text"] {
		background: url('http://i.minus.com/ibhqW9Buanohx2.png') center left no-repeat, linear-gradient(top, #d6d7d7, #dee0e0);
		border: 1px solid #a1a3a3;
                border-radius: 4px;
                box-shadow: 0 1px #fff;
                box-sizing: border-box;
                color: #696969;
                height: 49px;
                margin: 31px 0 0 29px;
                padding-left: 37px;
                transition: box-shadow 0.3s;
                width: 340px;
            }
            input[type="password"]:focus, input[type="text"]:focus {
                box-shadow: 0 0 4px 1px rgba(55, 166, 155, 0.3);
                outline: 0;
            }
            .show-password {
                display: block;
                height: 16px;
                margin: 26px 0 0 28px;
                width: 87px;
            }
            input[type="checkbox"] {
                cursor: pointer;
                height: 16px;
                opacity: 0;
                position: relative;
                width: 64px;
            }
            input[type="checkbox"]:checked {
                left: 29px;
                width: 58px;
            }
            .toggle {
                background: url(http://i.minus.com/ibitS19pe8PVX6.png) no-repeat;
                display: block;
                height: 16px;
                margin-top: -20px;
                width: 87px;
                z-index: -1;
            }
            input[type="checkbox"]:checked + .toggle { background-position: 0 -16px }
            .forgot {
                color: #7f7f7f;
                display: inline-block;
                float: right;
                font: 12px/1 sans-serif;
                left: -19px;
                position: relative;
                text-decoration: none;
                top: 5px;
                transition: color .4s;
            }
            .forgot:hover { color: #3b3b3b }
            input[type="submit"] {
                width:340px;
                height:45px;
                display:block;
                font-family:Arial, "Helvetica", sans-serif;
                font-size:16px;
                font-weight:bold;
                color:#fff;
                text-decoration:none;
                text-transform:uppercase;
                text-align:center;
                text-shadow:1px 1px 0px #37a69b;
                padding-top:6px;
                margin: 90px 0 0 29px;
                position:relative;
                cursor:pointer;
                border: none;  
                background-color: #37a69b;
                background-image: linear-gradient(top,#3db0a6,#3111);
                border-top-left-radius: 5px;
                border-top-right-radius: 5px;
                border-bottom-right-radius: 5px;
                border-bottom-left-radius:5px;
                box-shadow: inset 0px 1px 0px #2ab7ec, 0px 5px 0px 0px #497a78, 0px 10px 5px #999;
            }
            .shadow {
                background: #000;
                border-radius: 12px 12px 4px 4px;
                box-shadow: 0 0 20px 10px #000;
                height: 12px;
                margin: 30px auto;
                opacity: 0.2;
                width: 270px;
            }
            input[type="submit"]:active {
                top:3px;
                box-shadow: inset 0px 1px 0px #2ab7ec, 0px 2px 0px 0px #31524d, 0px 5px 3px #999;
            }
			
        </style>
		
    </head>
	
    <body bgcolor="#E6E6FA" style="font-family: Arial, Helvetica, sans-serif;">
        <div class="container">
            <h1 style="text-align: center;">Pusat Kira-kira Teratak Bujang</h1>
            <center><img src="../image/rd2.jpg" alt="Logo" width="400" height="150"></center>
            <br>
            <br>
            <br>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <form action="login.php" method="post">
                        <div class="login">
                            <input type="text" placeholder="Username" name="username" id="username">  
                            <input type="password" placeholder="Password" name="password" id="password">  
                            <input type="submit" name="submit" id="add" value="Sign In">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    
    $(document).ready(function(){
        /****************************** Alert empty in login function *********************/
        $('#add').click(function(event){
            var usernames = $('#username').val();
            var password = $('#password').val();
            if(usernames=="" || password==""){
                alert('Please fill all section');
            }else{
                
            }
        });
        /****************************** Alert empty in login function *********************/
    });
        
</script>
