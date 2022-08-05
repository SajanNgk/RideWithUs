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
<html>
<head>

   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 

<style>
   
  body{
    
    background-color: black;
    color:azure
   
          
  
  } 
div.gallery {
  border: 1px  #ccc;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 5px;
  font-size:18px;
  text-align: justify;
}

* {
  box-sizing: border-box;
}.responsive {
  padding: 0 6px;
  float: left;
  width: 24.99999%;
  font-family: sans-serif;
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
form.search{
  padding-top:13px;
  color:black;
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

h1{
    text-align: center;
    font-family: sans-serif;
font-size:50px;
padding-top:2.5%;
}

h2{
  text-align: center;
    font-family: sans-serif;
font-size:30px;
padding-bottom:5%;
}

</style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="homepage.php">RideWithUs</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active" ><a href="homepage.php">Home</a></li>
      <li><a href="create.php">Customer</a></li>
      <li ><a href="AboutUs.php">About Us</a></li>
      <li><a href="loginfirst.php">Purchase</a></li>
      <li><form class="search"> 
<input type="text" name="search" value="<?php echo $search;?>"><input type="submit" value="search">
</form></li>
      

</div>
    </ul>
  </div>
</nav>
<h1> Check these models out </h1>
      
      <h2>Modern motorbikes for a Modern day</h2>
<?php
   


while ($row=pg_fetch_assoc($result)) {
    $product_id=$row['p_id'];
    $product_name=$row['p_name'];
    $product_model=$row['p_model'];
    $product_description=$row['description'];
    $product_img=$row['p_img'];
    $product_price=$row['price'];
    $product_quantity=$row['quantity'];

    $product_color=$row['color_type'];
    echo "<div class='responsive'>
        <div class='gallery'>
        <a href='loginfirst.php'>
        <li>Name: $product_name</li>
            <img src='./$product_img' alt=''>
            
          <div class='desc'>
          
              <p>$product_description</p>
              <li>Model Variants: $product_model</li>
              <li>Price: $ $product_price</li>
              <br />
          </div>
          </a>
        </div>
      </div>";
      
    }


?>






</body>
</html>

 