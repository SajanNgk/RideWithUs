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
<form  method="POST" action="update.php">
<input type="hidden" name="c_id" value="<?php echo $row['c_id'];?>">
Fullname : <input type="text" name="c_fullname" value="<?php echo $row['c_fullname'];?>"><br />
username : <input type="text" name="username" value="<?php echo $row['username'];?>"><br />
password : <input type="password" name="password" value="<?php echo $row['password'];?>"><br />
email : <input type="text" name="email" value="<?php echo $row['email'];?>"><br />
phone : <input type="text" name="phone" value="<?php echo $row['phone'];?>"><br />
usertype : <input type="text" name="usertype" value="<?php echo $row['usertype'];?>"><br />
<input type="submit" name="update" value="Update">
</form>
	<?php
	}else{
		
	 die("id is invalid <br />");
	}
}else{
die("please provide id");
}
?> 
