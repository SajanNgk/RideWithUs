<?php 
require "dataconnect.php";
	$id=!empty($_GET['p_id'])?$_GET['p_id']:'';
	if($id)
	{
		
		if(!$conn)
		{
			die("Error in connection");
		}
		$sql="DELETE from products where p_id=$id";
		$result=pg_query($conn,$sql);
		if($result)
		{
			echo "Record deleted successfully";
			header("Location :uploadproduct.php");
		}
		else
		{
			 echo "error in delete";
		}
		pg_close($conn);
	}
		
	
	
	?>