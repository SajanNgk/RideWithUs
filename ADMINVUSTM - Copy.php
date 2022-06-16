<html>
    <head> 
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Account creation</title> 
		<link rel ="stylesheet" href="front.css"></head>
    <body>
        <fieldset>
           
            <MARQUEE>The field marked with (*) are compulsory</MARQUEE>
        </div>
        <style>
        div{
            margin:auto;
            border:3px solid;
            BORDER-RADIUS:25PX;
            max-width:35%;
            padding-left:5%;
            padding:20px;
            
        }
        </style>
            </p>
<form>
  <div class="form-group">
    <label ><h1 font-size:10PX TEXT-ALIGN:"CENTER">ADMIN ID</H1></label>
    <input type="text" class="form-control" name="admin_id"  placeholder="Enter AdminID">
    <label>Full name :</label>
    <input type="text" name="fullname" class="form-control"  value=""placeholder="Enter full name" >
   
	
	<label>Username :</label>
    <input type="text" class="form-control" name="username" value="" placeholder="Username">
   
	
	
            
  
  
            
    <label>Password</label>
    <input type="password" class="form-control" name="password" value="" placeholder="******">
    
	
    <label>Confirm Password</label>
    <input type="password" class="form-control"  name="confirm_password" value="" placeholder="Re-type password">
    
    
            <label>Email :</label>
            <input type="email" class="form-control"  name="email" value=""placeholder="abc@gmail.com">
            
            
            <label>Contact number :</label>
            <input type="number" class="form-control"  name="phone" value=""placeholder="+977"> <br />
            </label>

            <input type="submit" class="form-control" name="submit" value="create">
            <input type="reset" class="form-control"  name="reset" value="clear"><br />
            <p>Already have account?<a href="login.php" >LOGIN! </a></p>
         </fieldset>
         </form>
		 </div>
         </body>
</html>
<?php
//require_once "config.php"; //Include this once

//Define variable with empty values
$username=$password=$confirm_password=$email="";
$username_err=$password_err=$confirm_password_err=$email_err="";

//Processing form data
if($_SERVER["REQUEST_METHOD"]== "POST")
{

    //Validate Username
    if(empty(trim($_POST["username"])))
    {
        $username_err="Please enter a username";
    }
    elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    }
    else{
        $name=test_input($_POST["username"]);

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
<?php
$host="host==127.0.0.1";
$port="port=5432";
$dbname="dbname=bikesDB";
$credentials="user=postgres password=1234";
$conn = pg_connect("$host $port $dbname $credentials");
if(!$conn)
{
    die('Error in connection'.pg_connect_error());
}
$sql ="INSERT INTO admin(admin_id,fullname,username,password,email,phone) VALUES('$_POST[admin_id]',$_POST[fullname],'$_POST[username]','$_POST[password]','$_POST[email]','$_POST[phone]');";
$result = pg_query($conn,$sql);
if($result){
	header("Location:database.php");
}else{
echo "Failed inserting data" .pg_error($conn);
}

?>


