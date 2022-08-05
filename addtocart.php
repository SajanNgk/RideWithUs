<?php

require 'dataconnect.php';
$p_id = !empty($_GET['p_id'])?$_GET['p_id']:'';

if(isset($_POST['addtocart'])){
   $delete=pg_query($conn, "DELETE FROM products WHERE p_id = '$p_id'");
if ($delete) {
    header('location:thanks.php');
}
}

?>

