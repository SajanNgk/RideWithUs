<?php
/*
include "dataconnect.php";
session_start();
if(isset($_POST['login'])){ 

if (isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }


    

    $username = validate($_POST['username']);

    $password = validate($_POST['password']);

    if (empty($username)) {

        header("Location: login.php?error=User Name is required");

        exit();

    }else if(empty($password)){

        header("Location: login.php?error=Password is required");

        exit();

    }else{

        $sql = "SELECT * FROM customerinfo WHERE username='$username' AND password='$password'";

        $result = pg_query($conn, $sql);

        if (pg_num_rows($result) === 1) {

            $row = pg_fetch_assoc($result);

            if ($row['username'] === $username && $row['password'] === $password) {

                echo "Logged in!";

                $_SESSION['username'] = $row['username'];

                $_SESSION['password'] = $row['password'];

                
                header("Location: mainpage.php");

                exit();

            }else{

                header("Location: login.php?error= Incorect User name or password");
 
                exit();

            }

        }else{

            header("Location: login.php?error= Incorect User name or password");

            exit();

        }

    }
}
}



    exit();
    
    
?>


<?php
/*

include "dataconnect.php";


if(isset($_POST["login"])){
    
    if(isset($_POST["user"]) && isset($_POST["pass"])){
        $username=$_POST["user"];
        $password=$_POST["pass"];
        $username = pg_escape_string($conn, $username);
        $password= pg_escape_string($conn, $password);
        
        $query= "SELECT * from customerinfo where username= '$username' AND password= '$password' " ;
        $result = pg_query($conn, $query);
        $numrows=pg_num_rows($result);
        if ($numrows!=0){
            while($row=pg_fetch_assoc($result))
            {
                $dbusername=$row['username'];
                $dbpassword=$row['password'];
            }
            if($username==$dbusername && $password==$dbpassword)
            {
                
                header('Location : firstpage.php');
                echo "logged in";
            }
            else {
                echo "Invalid username or password";
            }
            
        }
        

    }
    else{
        echo "Username not found";
    }
}
*/


?>