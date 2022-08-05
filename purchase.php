<?php 
include_once"dataconnect.php";
if(!$conn){
die('Error in connection');
}
$search = !empty($_GET['search'])?$_GET['search']:'';
$select_product="Select * from products";


if($search){
  $select_product = "SELECT * from products where p_name like '%{$search}%' 
				or p_model like '%{$search}%'
				";
}
$result=pg_query($conn,$select_product);
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script>
    function preventBack(){window.history.forward()};
    window.onunload=function(){null};
  </script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="homepage.php">RideWithUs</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="homepage.php">Home</a></li>
      <li><a href="create.php">Customer</a></li>
      <li><a href="AboutUs.php">About Us</a></li>
      <li class="active"><a href="loginfirst.php">Purchase</a></li>
  


</div>
    </ul>
  </div>
</nav>
<style>
body {
      background-image: url('bgjpg.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      color: beige;
   
  
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


<h1 align="center">WELCOME DEAR USER</h1>

<MARQUEE><h4 align="center" >CHOOSE YOURS AND RIDE LIKE UNICORN.</h4></MARQUEE>
<div class="row">
  <div class="col mid-10">
  <!-- fetching query-->
    <?php
while($row=pg_fetch_assoc($result)){
  $product_id=$row['p_id'];
  $product_name=$row['p_name'];
  $product_model=$row['p_model'];
  $product_description=$row['description'];
  $product_img=$row['p_img'];
  $product_price=$row['price'];
  $product_quantity=$row['quantity'];

  $product_color=$row['color_type'];
  echo "
  <fieldset>
  <div class='table'>
  <table border:4px border-color:brown>
  <div class='row'>
    <div class='col mid-4 mb-2'>
    <div class='card' '>
    <div class='card text-center'>
    <img src ='./$product_img' class='product-img' width='600' height='400' alt=''>
<div class='card-header'>
$product_name
</div>
<div class='card-body'>
  <h3 class='card-title'>$ $product_price</h3>
  <p class='card text-center'>$product_model.</p>
  <a href='thanks.php' class='btn btn-primary'>Add to cart</a>
</div><a href='viewdescription.php' class='btn btn-secondary'><a href='viewdescription.php?p_id=$product_id'>view description</a>
<div class='card-footer text-muted'>
  On stock : $product_quantity
</div>
</div>
</div>
   
    </div>
  </div>
</div>
</div>
</div>
</table>
</fieldset>";


  
}

    ?>
    <!--product
    <div class="row">
      <div class="col mid-4 mb-2">
      <div class="card text-center">
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Add to cart</a>
  </div><a href="#" class="btn btn-secondary">view description</a>
  <div class="card-footer text-muted">
    2 days ago
  </div>
</div>
     
      </div>
    </div>
  </div>
</div>
-->

  
</body>
</html>



