<?php

require 'dataconnect.php';
if(isset($_POST['add'])){
    $p_model=$_POST['model'];
    $p_name=$_POST['name'];
    $p_img=$_POST['img']  ;


    $description=$_POST['description'];
    $lot=$_POST['lot'];
    $color_type=$_POST['color_type'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    if(empty($p_name)|| empty($p_model)|| empty($p_img) || empty($description) || empty($lot) || empty($color_type) ||
    empty($price) || empty($quantity))
    {
        echo "Please fill out all the details";
    }else{




$upload = "INSERT INTO products(p_name,p_model,p_img,description,lot,color_type,price,quantity) VALUES ('$p_name','$p_model',
'$p_img','$description','$lot','$color_type','$price','$quantity')";
$result = pg_query($conn,$upload);
if($result) {
  
    echo 'new product added successfully';
   }


else{
    echo 'Error while uploading';
}
}
}
?>
<!DOCTYPE html>
<head>
<title>upload</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
<style>
 li { 
    list-style: none;
    }
    body{
        background-color:black;
        color:white;
    }

    input.add
    {
color:black;
    }
</style>
</head>
<body>
<h2>Add  new bike</h2>
<ul>
<form name="insert" action="<?php $_SERVER['PHP_SELF']?>" method="POST" >
<div class="form-group">
<input type="hidden" name="id" />
<li>Product Name:</li><li><input type="text" name="name" /></li>
<li>Product Model:</li><li><input type="text" name="model" /></li>

<li>IMG : <input type="file" name="img" accept="png,jpeg,jpg"> </li>
<li>Description:</li><li><input type="text" name="description" /></li>
<li>Lot:</li><li><input type="text" name="lot" /></li>
<li>Color type:</li><li><input type="text" name="color_type" /></li>
<li>Price (USD):</li><li><input type="text" name="price" /></li>
<li>Quantity :<br/> <input type="number" name="quantity" /></li>
<li><input type="submit" class=" add" name="add" value ="Add"/></li>
</div></form>
</ul>

<?php

$show=pg_query("Select * from products");
$display=($show);
?>
<div class="products">
<table border='1' class="table table-dark">
    <thead >
    <tr>
        <td>Product ID</td>
        <td>Product image</td>
        <td>Product name</td>
        <td>Product model</td>
        <td>Product description</td>
        <td>Product lot</td>
        <td>Product price</td>
        <td>Product quantity</td>
    </tr>
    </thead>
    <?php
    while($row=pg_fetch_assoc($display))
    {
    ?>
    <tr>
        <td><?php echo $row['p_id'] ?></td>
        <td><img src="/<?php echo $row['p_img'];?>" height="100" alt=""></td>
        <td><?php echo $row['p_name'] ?></td>
        
        
        <td><?php echo $row['p_model'] ?></td>
        
        <td><?php echo $row['description'] ?></td>
        <td><?php echo $row['lot'] ?></td>
        <td><?php echo $row['price'] ?></td>
        <td><?php echo $row['quantity'] ?></td>
        <!-- <td>
            <a href="deleteproduct.php?edit=<?php echo $row['p_id'];?>" > Delete</a>
        </td> -->
    </tr>
    <?php } ?>
</table>

    
</div>

</body>
</html>