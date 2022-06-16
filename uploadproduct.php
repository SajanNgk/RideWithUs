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
   function move_uploaded_file($p_img,$p_image_folder){
   return true;
    echo 'new product added successfully';
   }

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
<style>
 li { 
    listt-style: none;
    }
</style>
</head>
<body>
<h2>Add  new bike</h2>
<ul>
<form name="insert" action="<?php $_SERVER['PHP_SELF']?>" method="POST" >
<input type="hidden" name="id" />
<li>Product Name:</li><li><input type="text" name="name" /></li>
<li>Product Model:</li><li><input type="text" name="model" /></li>

<li>IMG : <input type="file" name="img" accept="png,jpeg,jpg"> </li>
<li>Description:</li><li><input type="text" name="description" /></li>
<li>Lot:</li><li><input type="text" name="lot" /></li>
<li>Color type:</li><li><input type="text" name="color_type" /></li>
<li>Price (USD):</li><li><input type="text" name="price" /></li>
<li>Quantity : <input type="number" name="quantity" /></li>
<li><input type="submit" name="add" value ="Add"/></li>
</form>
</ul>

<?php

$show=pg_query("Select * from products");
$display=($show);
?>
<div class="products">
<table border='1' class="display">
    <thead>
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
        <td>
            <a href="editproduct.php?edit=<?php echo $row['p_id'];?>" > edit</a>
        </td>
    </tr>
    <?php } ?>
</table>

    
</div>

</body>
</html>