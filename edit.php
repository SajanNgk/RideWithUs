<!DOCTYPE html>
<html>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script>
    function preventBack(){window.history.forward()};
    window.onunload=function(){null};
  </script>
<style>
body {
      background-image: url('bgjpg.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      color: beige;
     
}
div.gallery {
  border: 1px solid #ccc;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}
.desc {
  padding: 15px;
  text-align: center;
}

* {
  box-sizing: border-box;
}

.responsive {
  padding: 0 6px;
  float: left;
  width: 24.99999%;
}

@media only screen and (max-width: 700px) {
  .responsive {
    width: 49.99999%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 100%;
  }
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

h4{
  margin-bottom: 5%;
}
.card-text{
  padding: 15px;
  text-align: center;

}
.fullname,.username,.password,.email,.phone,.usertype,.buttons{
                max-width: 40%;
                border-radius: 20%;
             margin:auto;
			 color: green;
			 background-color: white;
           
            padding-left:1%;
            }
            .error{
                color :red;
            }
			input[type="text"],input[type="password"],input[type=number],input[type=email]{
                background:transparent;
                
            }
</style>




<?php
require"dataconnect.php";
$c_id = !empty($_GET['c_id'])?$_GET['c_id']:'';


if($c_id) {
	
	if(!$conn){
	die('Connection issue : ');
	}
	$sql ="SELECT * FROM logininfo where c_id='$c_id' ";
	$result =pg_query($conn,$sql);
	if(!$result){
	die("Error in sql <br />");
	}
	$row = pg_fetch_assoc($result);
	if($row){
	?>
	
	<div class="form-group">
<form  method="POST" action="update.php">
<input type="hidden" name="c_id" value="<?php echo $row['c_id'];?>">
<div class="fullname">
Fullname : <input type="text" name="c_fullname" value="<?php echo $row['c_fullname'];?>"><br />
	</div>
	
	<div class="username">
username : <input type="text" name="username" value="<?php echo $row['username'];?>"><br />
	</div>
<div class="password">
	password : <input type="password" name="password" value="<?php echo $row['password'];?>"><br />
	</div>
	<div class="email">
email : <input type="text" name="email" value="<?php echo $row['email'];?>"><br />
	</div>
	<div class="phone">
phone : <input type="text" name="phone" value="<?php echo $row['phone'];?>"><br />
	</div>
	<div class="usertype">
<select name='usertype' value="<?php echo $row['usertype'];?>">Usertype : <option>user</option>
<option>admin</option> </select><br />
<input type="submit" name="update" value="Update">
	</div>
	</div>
</form>
	<?php
	}else{
		
	 die("id is invalid <br />");
	}
}else{
die("please provide id");
}
?> 
