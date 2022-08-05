<?php
require "dataconnect.php";
if (isset($_POST['update'])) {
  
        $sql ="UPDATE logininfo set c_fullname='$_POST[c_fullname]',
				username='$_POST[username]',
				password='$_POST[password]',
                email='$_POST[email]',
               phone='$_POST[phone]',
               usertype='$_POST[usertype]'
                where   c_id='$_POST[c_id]'";
        $result = pg_query($conn, $sql);

        if ($result) {
            $_SESSION['message']='message updated';

            header("Location: datashow.php");
        } else {
        }
        echo "Failed updating data";
    }
else{
    echo "Connection failed";

}



?>