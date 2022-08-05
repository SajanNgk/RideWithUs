<?php
require "dataconnect.php";

$p_id = !empty($_GET['p_id'])?$_GET['p_id']:'';


if($p_id) {
	
	if(!$conn){
	die('Connection issue : ');
	}
	$sql ="SELECT * FROM products where p_id='$p_id' ";
	$result =pg_query($conn,$sql);
if ($result) {
    $row = pg_fetch_assoc($result);
    if ($row) 
	{
        ?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
	</head>
	<body><form  method="POST" action="uppp.php">
<input type="hidden" name="p_id" value="<?php echo $row['p_id']; ?>">
Product name : <input type="text" name="p_name" value="<?php echo $row['p_name']; ?>"><br />
Model : <input type="text" name="p_model" value="<?php echo $row['p_model']; ?>"><br />

Description : <input type="text" name="description" value="<?php echo $row['description']; ?>"><br />
Lot : <input type="text" name="lot" value="<?php echo $row['lot']; ?>"><br />
Price : <input type="text" name="price" value="<?php echo $row['price']; ?>"><br />
Quantity : <input type="text" name="quantity" value="<?php echo $row['quantity']; ?>"><br />
Color type : <input type="text" name="color_type" value="<?php echo $row['color_type']; ?>"><br />
<input type="submit" name="update2" value="Update">
</form>
		
	

	<?php
    }
}else{
		
	 die("id is invalid <br />");
	}
}
else{
	echo "Please! Give id";
}
?> </body>
</html>
 