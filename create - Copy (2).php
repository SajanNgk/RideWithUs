<!DOCTYPE html>
<html lang="en">
<head>
  <title>New Customer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="ForAdmin.php">RideWithUs</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="mainpage.php">Home</a></li>
      <li class="active"><a href="create.php">Customer</a></li>
      <li ><a href="AboutUs.php">About Us</a></li>
      <li><a href="#">Purchase</a></li>
    </ul>
  </div>
</nav>

        <style>
            
            input[type="text"],input[type="password"],input[type=number],input[type=email]{
                background:transparent;
                
            }
            body
            {
                
                background-size:cover;  
                color:black;
                

            }
            h1{
                padding-top:20px;
                padding-bottom:25px;
            }
            .customerID,.fullname,.username,.password,.confirm_password,.email,.contact_number,.buttons{
                max-width: 40%;
                border-radius: 20%;
             margin:auto;
           
            padding-left:1%;
            }

            
        </style>

        
        </div>
        <style>
      
        
        </style>
            </p>


            <h1 align="center">Customer Sign Up</h1>
            <form method="post" action="submit.php">
              <div class="form-group">
  
 
    
    <div class="fullname">
    <label>Full name :</label>
    <input type="text" name="c_fullname" class="form-control"  value=""placeholder="Enter full name" >
    </div>
	
	<div class="username">
    <label>Username :</label>
    <input type="text" class="form-control" name="username" value="" placeholder="Username">
    </div>
	
	<div class="password">
    <label>Password</label>
    <input type="password" class="form-control" name="password" value="" placeholder="******">
    </div>
	
    <div class="confirm_password">
    <label>Confirm Password</label>
    <input type="password" class="form-control"  name="confirm_password" value="" placeholder="Re-type password">
    </div>
    
    <div class="email">
            <label>Email :</label>
            <input type="email" class="form-control"  name="email" value=""placeholder="abc@gmail.com">
    </div>     
            
    <div class="contact_number">
            <label>Contact number :</label>
            <input type="number" class="form-control"  name="phone" value=""placeholder="+977"> <br />
            </label>
            </div>

            <div class="buttons">
            <input type="submit" class="form-control" name="submit" value="create"><br />
            <input type="reset" class="form-control"  name="reset" value="clear"><br />
            <u>Already have account?<a href="login.php" >LOGIN! </a></u>
            </div>
         </form>
		 </div>
         </body>
</html>
<?php

//require_once "config.php"; //Include this once

//Define variable with empty values
$user=$pass=$confirm_password=$email="";
$user_err=$pass_err=$confirm_password_err=$email_err="";

//Processing form data
if($_SERVER["REQUEST_METHOD"]== "POST")
{

    //Validate Username
    if(empty(trim($_POST["user"])))
    {
        $username_err="Please enter a username";
    }
    elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["user"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    }
    else{
        $name=test_input($_POST["user"]);

    }
    if(empty(trim($_POST["pass"])))

    {
        $password_err="Enter password please";

    }
    else {
        $password=test_input($_POST["pass"]);
    }
    if(!empty(trim($_POST["confirm_password"]==$_POST["pass"])))

    {
        $confirm_password=test_input($_POST["confirm_password"]);
       
    }
    else {
        $confirm_password_err="Re-type password please";

        
    }
    if(empty(trim($_POST["email"])))

    {
        $email_err="Enter email please";

    }
    else {
        $email_err=test_input($_POST["email"]);
    }

}
function test_input($data){
    $data=htmlspecialchars($data);
    
    return $data;
}
?> 