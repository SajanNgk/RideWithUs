<?php
require "dataconnect.php";
if(isset($_POST['submit']))
{

$c_fullname=$_POST['c_fullname'];
$username=$_POST['username'];
$username_err='';
$password=$_POST['password'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$usertype=$_POST['usertype'];
$sql ="INSERT INTO  logininfo (c_fullname,username,password,email,phone,usertype) VALUES
('$c_fullname','$username','$password','$email','$phone','$usertype')";
    $check="SELECT * from logininfo where username='$username'";
    $OK=pg_query($conn,$check);
   while($row=pg_fetch_array($OK)){
    if($row['username']==$username){
       echo "<script>alert('username is already taken')</script>";
    }
 if($result = pg_query($conn,$sql)){
    if(!empty($c_fullname || $username ||$password||$email)){
   echo "<script>";
    echo "alert('Account added sucessfully')";
    echo "</script>";
    header ("Location: login.php");
    
    
   }
   
    else{
        echo "<script>alert('please fill all the details')</script>";
        
        
    //echo "Failed inserting data" .pg_result_error($conn);
    }
    }
   }
}

   ?>


