<?php


if(isset($_GET['logout'])){

session_destroy;

}

else{
    echo"<scrpit>";
    echo "please login first";
    echo"</scrpit>";
}


?>