<?php
require "dataconnect.php";
if (isset($_POST['update2'])) {
  
        $sql ="UPDATE products set p_name='$_POST[p_name]',
				p_model='$_POST[username]',
				description='$_POST[description]',
                lot='$_POST[lot]',
               price='$_POST[price]',
               quantity='$_POST[quantity]',
               color_type='$_POST[color_type]'
                where   p_id='$_POST[p_id]'";
        $result = pg_query($conn, $sql);

        if ($result) {
            $_SESSION['message']='message updated';

            header("Location: uploadproduct.php");
        } else {
        }
        echo "Failed updating data";
    }
else{
    echo "Connection failed";

}



?>