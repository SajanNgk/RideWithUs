<?php
$username=$password="";
$username_err=$password_err="";
if($_SERVER["REQUEST_METHOD"]== "POST"){
  if(empty(trim($_POST["username"])))

    {
        $username_err="Enter username please";

    }
    else {
        $username=test_input($_POST["username"]);
    }
    if(empty(trim($_POST["password"])))

    {
        $password_err="Enter password please";

    }
    else {
        $password=test_input($_POST["password"]);
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
  <title>Customer Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script >
    function preventBack(){window.history.forward()};
    window.onunload=function(){null};
  </script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="homepage.php">RideWithUs</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="home.php">Home</a></li>
      <li><a href="login.php">Customer</a></li>
      <li class="active"><a href="AboutUs.php">About Us</a></li>
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
               background-color: black;
                background-size:cover;  
                color:beige;
                

            }
            .customerID,.fullname,.username,.password,.confirm_password,.email,.contact_number,.buttons{
                max-width: 40%;
                border-radius: 20%;
             margin:auto;
           
            padding-left:1%;
            }
            .error{color:red;}

            
        </style>

        
        </div>
        <style>
      
        
        </style>
            </p>
            
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">

  <div class="form-group">
    
  
	
	<div class="username">
    <h1 font-size:10PX ><br/>Login</H1><br/><br/>
    <label> Username :</label>
    <input type="text" class="form-control" name="username" value="" placeholder="Username">
    <span class="error"><?php echo $username_err?></span>
    </div>
	<br />
	<div class="password">
    <label>Password</label>
    <input type="password" class="form-control" name="password" value="" placeholder="******">
    <span class="error"><?php echo $password_err?></span>
    <br /><br />
    </div>

            <div class="buttons">
            <input type="submit" class="form-control" name="login" value="Login"><br />
            <input type="reset" class="form-control"  name="reset" value="Reset"><br />
            <MARQUEE>Are you new? <a href="create.php"><u>Sign up!</u></a></MARQUEE>
            
            </div>
         </form>
		 </div>
     <?php


include "dataconnect.php";
session_start();

if(isset($_POST['login'])){
 
  if(!empty($_POST['username']) && !empty($_POST['password']))
  
  {
         $username=$_POST['username'];
        $password=$_POST['password'];
    
     
        
        $query= ("SELECT * from logininfo where username= '$username' AND password= '$password';");
        $result = pg_query($conn, $query);
        $numrows=pg_num_rows($result);
        if ($numrows==1)
        {
            while($row=pg_fetch_assoc($result))
            {
                $db_username=$row['username'];
                $db_password=$row['password'];
                $db_usertype=$row['usertype'];
            
            if($db_username==$username && $db_password==$password)
            {
        
               if($db_usertype=='user')
               $_SESSION['username']='user';
               {
               echo "<script>";
               echo "window.alert('You are logged in')";
               echo "</script>";
               
               header("Location:purchase.php");
               } 
              }
               if($db_usertype=='admin')
               {
                $_SESSION['username']='admin';
               echo "<script>";
               echo "window.alert('You are logged in')";
               echo "</script>";
               
               
               
               header("Location:adminpage.php");
               }
               
               
              

            
           else {
              echo '<script>';
                echo "alert(Unable to login)";
                echo 'window.location.href="login.php"';
                echo '</script>';
            }
        
            
        
        

          }
        }
        else{
        
          echo "<script>window.alert('Invalid username or password')</script>";
          
      }
      }
    } 




?>