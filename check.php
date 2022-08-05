
<?php
$host="host=127.0.0.1";
$port="port=5432";
$dbname="dbname=bikesDB";
$credentials="user=postgres password=1234";
$conn = pg_connect("$host $port $dbname $credentials");
if(!$conn)
{
    die('Error in connection'.pg_result_error($conn));
}
else {
    echo "Connected";
}
?>