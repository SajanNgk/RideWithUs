<?php 
require "dataconnect.php";
	$id=!empty($_GET['c_id'])?$_GET['c_id']:'';
	if($id)
	{
		
		if(!$conn)
		{
			die("Error in connection");
		}
		$sql="DELETE from logininfo where c_id=$id";
		$result=pg_query($conn,$sql);
		if($result)
		{
			echo "Record deleted successfully";
			header("Location :datashow.php");
		}
		else
		{
			 echo "error in delete";
		}
		pg_close($conn);
	}
		
	
	
	?>