
<?php
session_start();
if(empty($_SESSION['username']))
{
  echo $_SESSION['username'];
  unset($_SESSION['username']);

header('Location:login.php');
}

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
      <a class="navbar-brand" href="mainpage.php">RideWithUs</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="mainpage.php">Home</a></li>
      <li ><a href="login.php">Customer</a></li>
      <li ><a href="AboutUs.php">About Us</a></li>
      <li><a href="#">Purchase</a></li>
     
    
     
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
  <div class="col mid-10">
  <!-- fetching query-->
    <?php
    include "dataconnect.php";
    $p_id = !empty($_GET['p_id'])?$_GET['p_id']:'';
    
    if ($p_id ) {
        $select_product="Select * from products where p_id='$p_id'";
        $result=pg_query($conn, $select_product);


        while ($row=pg_fetch_assoc($result)) {
            $product_id=$row['p_id'];
            $product_name=$row['p_name'];
            $product_model=$row['p_model'];
            $product_lot=$row['lot'];
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
  <h3 class='card-title'> $product_lot</h3>
  <p class='card text-center'>$product_model.</p>
  <a href='#' class='btn btn-primary'>Add to cart</a>
</div><a href='#' class='btn btn-secondary'>view description</a>
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



