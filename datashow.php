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
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="homepage.php">RideWithUs</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="homepage.php">Home</a></li>
      <li><a href="create.php">Customer</a></li>
      <li class="active"><a href="AboutUs.php">About Us</a></li>
      <li><a href="loginfirst.php">Purchase</a></li>
  
    </ul>
  </div>
</nav>
<style>
body {
      background-image: url('signup.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      color: azure;
     
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
</style>





<?php  
include "dataconnect.php";
if(!$conn){
die('Error in connection');
}
$sql = "SELECT * from logininfo";
$result = pg_query($conn, $sql);
?>
<div>
<a href="create.php">Create</a>
</div>
<table class="table table-bordered table-dark">
<tr><th scope="col">c_id</th><th>c_fullname</th>
<th scope="col">username</th>
<th scope="col">password</th>
<th scope="col">email</th>
<th scope="col">phone</th>
<th scope="col">usertype</th></tr>
<?php
while($row=pg_fetch_assoc($result)){
  echo"<tr>";
  echo "<td>$row[c_id]</td>";
echo "<td>$row[c_fullname]</td>";
echo "<td>$row[username]</td>";
echo "<td>$row[password]</td>";
echo "<td>$row[email]</td>";
echo "<td>$row[phone]</td>";
echo "<td>$row[usertype]</td>";
echo "<td>
<a href='edit.php?c_id=$row[c_id]'>
 <button class='success' style='background:green;color:#fff'>
  Edit
</button>
</a>
<a href='delete.php?c_id=$row[c_id]'>
<button class='danger' style='background:red;color:#ffff'>
DELETE</button>
</a>
</td>";
  echo"</tr>";
}
?>
</table>

