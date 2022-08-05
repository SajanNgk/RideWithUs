<?php
session_start();



//require_once "config.php"; //Include this once

//Define variable with empty values
$username=$fullname=$password=$confirm_password=$email="";
$username_err=$fullname_err=$password_err=$confirm_password_err=$email_err="";

//Processing form data
if($_SERVER["REQUEST_METHOD"]== "POST")
{

    //Validate Username
    if(empty(trim($_POST["c_fullname"])))
    {
        $fullname_err="Please enter fullname";
    }
    elseif(!preg_match('/^[a-zA-Z0-9_\t\r\s\f]+$/', trim($_POST["c_fullname"]))){
        $fullname_err = "Name can only contain letters, numbers, and underscores.";
    }
    else{
        $fullname=test_input($_POST["c_fullname"]);

    }
    if(empty(trim($_POST["username"])))
    {
        $username_err="Please enter a username";
    }
    elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    }
    else{
        $username=test_input($_POST["username"]);

    }
    
    if(empty(trim($_POST["password"])))

    {
        $password_err="Enter password please";

    }
    else {
        $password=test_input($_POST["password"]);
    }
    if(!empty(trim($_POST["confirm_password"]==$_POST["password"])))

    {
        $confirm_password=test_input($_POST["confirm_password"]);
       
    }
    else {
        $confirm_password_err="Passwords didn't match";

        
    }
    if(empty(trim($_POST["email"])))

    {
        $email_err="Enter email please";

    }
    else {
        $email=test_input($_POST["email"]);
    }
   
    }


function test_input($data){
    $data=htmlspecialchars($data);
    $data=stripslashes($data);
    $trim=trim($data);
    
    return $data;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>New Customer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <sc rip src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="homepage.php">RideWithUs</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="homepage.php">Home</a></li>
      <li class="active"><a href="create.php">Customer</a></li>
      <li ><a href="AboutUs.php">About Us</a></li>
      <li><a href="loginfirst.php">Purchase</a></li>
    </ul>
  </div>
</nav>

        <style>
            
            input[type="text"],input[type="password"],input[type=number],input[type=email]{
                background:transparent;
                
            }
            body
            {
                background-image:url('bgjpg.jpg') ;
                background-size:cover;  
                color:beige;
                

            }
            .customerID,.fullname,.username,.password,.confirm_password,.email,.contact_number,.usertype,.buttons{
                max-width: 40%;
                border-radius: 20%;
             margin:auto;
           
            padding-left:1%;
            }
            .error{
                color :red;
            }

            
        </style>

        
        </div>
        <style>
      
        
        </style>
            </p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    
    

  <div class="form-group">
  
  <div class="customerID" >
      
  <h1 font-size:10PX ><br/>Customer Information</H1>
  <p><span class="error1">* Required fields</span></p>

    </div> <div class="fullname">
        
        
        <input type="hidden" name="c_fullname" class="form-control"   >
       
        </div>
    
    <div class="fullname">
        
    <label>Full name :</label>
    <input type="text" name="c_fullname" class="form-control" value= "" placeholder="Enter full name" >
    <span class="error">*<?php echo $fullname_err?></span>
    </div>
	<div class="username">
    <label>Username :</label>
    <input type="text" class="form-control" name="username" value= "" placeholder="Username">
    <span class="error">*<?php echo $username_err?></span>
    </div>
	
	<div class="password">
    <label>Password</label>
    <input type="password" class="form-control" name="password"value= ""  placeholder="******">
    <span class="error">*<?php echo $password_err?></span>
    </div>
	
    <div class="confirm_password">
    <label>Confirm Password</label>
    <input type="password" class="form-control"  name="confirm_password" value="" placeholder="Re-type password">
    <span class="error">*<?php echo $confirm_password_err?></span>
    </div>
    
    <div class="email">
            <label>Email :</label>
            <input type="email" class="form-control" value= "" name="email" placeholder="abc@gmail.com">
            <span class="error">*<?php echo $email_err?></span>  
    </div>   
            
    <div class="contact_number">
            <label>Contact number :</label>
            <input type="number" class="form-control" value= "" name="phone" placeholder="+977"> <br />
        </div>
        <div class="usertype">
        
        
            <label>usertype</label>
            
            <select name="usertype">
                <option>user</option>
                
            </select>
        </div>
            
            </label><br />
            <div class="buttons">
            <input type="submit" class="form-control" name='submit' value="create"><br />
            <input type="reset" class="form-control"  name="reset" value="clear"><br />
            <u>Already have account?<a href="login.php" >LOGIN! </a></u>
            </div>
         </form>
		 </div>
         </body>
</html>
         <?php 
         ob_start();
         
require "dataconnect.php";
if (!empty($_POST['submit'])&& isset($_POST['submit'])) {
    $c_fullname=$_POST['c_fullname'];
    $username=$_POST['username'];
    $username_err='';
    $password=$_POST['password'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $usertype=$_POST['usertype'];
    $sql ="INSERT INTO  logininfo (c_fullname,username,password,email,phone,usertype) VALUES
('$c_fullname','$username','$password','$email','$phone','$usertype')";

    $select = pg_query($conn, "SELECT * FROM logininfo WHERE username = '".$username."'");
    if (!empty($c_fullname && $username && $password && $email && $phone)) {
        if (pg_num_rows($select)) {
            exit('<script>alert("This username already exists")</script>');
        } else {
            if ($result=pg_query($sql)) {
                header ("Location : accountcreated.php");
                echo "<script>alert('Accout added')</script>";
                ob_end_flush();
               
            }
            
        }
    } else {
        echo "<script>alert('Please fill all the details')</script>";
    }
}


   
       
        
         //echo "Failed inserting data" .pg_result_error($conn);
    
   


   ?>






