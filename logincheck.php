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
               {
               echo "<scrpit>";
               echo "window.alert('You are logged in')";
               echo "</scrpit>";
               
               
               
               header("Location: purchase.php");
               } 
               if($db_usertype=='admin')
               {
               echo "<scrpit>";
               echo "window.alert('You are logged in')";
               echo "</scrpit>";
               
               
               
               header("Location:adminpage.php");
               }
               
               
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
        
          echo "Invalid username or password";
          
      }
      }
    }  





?>