
<?php
require"dataconnect.php";
$p_id = !empty($_GET['p_id'])?$_GET['p_id']:'';
if($p_id) {
	
	if(!$conn){
	die('Connection issue : ');
	}
	$sql ="SELECT * FROM products where p_id='$p_id' ";
	$result =pg_query($conn,$sql);
	if(!$result){
	die("Error in sql <br />");
	}
	$row = pg_fetch_assoc($result);
    $product_name=$row['p_name'];
	if($row){
        
            $product_id=$row['p_id'];
            $product_name=$row['p_name'];
            $product_model=$row['p_model'];
            $product_description=$row['description'];
            $product_img=$row['p_img'];
            $product_price=$row['price'];
            $product_quantity=$row['quantity'];
          
            $product_color=$row['color_type'];
       
?> 
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


<h1 align="center"><?php echo"$product_name";?></h1>

<h4 align="center" ><?php echo"$product_model";?></h4>
<div class="row">
  <div class="col mid-10">
      <?php
  echo"<fieldset>
  <div class='table'>
  <table border:4px border-color:brown>
  <div class='row'>
    <div class='col mid-4 mb-2'>
    <div class='card' '>
    <div class='card text-center'>
    <img src ='./$product_img' class='product-img' width='600' height='400' alt=''>
<div class='card-header'>
</div>
<div class='card-body'>
  <h3 class='card-title'>$ $product_price</h3>
  <p class='card text-center'>$product_model.</p>
  <p class='card text-center'>$product_description.</p>
  <p class='card text-center'>Color available : $product_color.</p>
  <a href='thanks.php' class='btn btn-primary'>Add to cart</a>
</div>
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

	}else{
		
	 die("id is invalid <br />");
	}
}else{
die("please provide id");
}
?>







</body>
</html>
