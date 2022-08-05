<html>
    <head>
        <title>
            Productupload
        </title>
        
    </head>
    <body>
        <form action="" method="POST" enctype="multipart/form-data" id="product">
           <label for ="photo">Upload photo :
           </label>
           <div class="photo">
               
           
           <p>SELECT PHOTOS</p>
           <input type="file" name="photo[]" multiple accept="image*/" />  <br>
    
           </div>
           <label for="p_id">ProductID:</label>
           <input type="number" name="p_id"><br/>
           <label for="p_name">Product Name :</label>
           <input type="text" name="p_name" value=""><br>
           <label for="description">Description :</label>
           <textarea name="description" form="product">About product</textarea> <br>
           <label for="lot">LOT :</label>
           <input type="number" name="lot" value=""><br />
           <label for="color">COLOR :</label>
           <select name="color_type" value="choose color">
               <option>RED</option>
               <option>BLUE</option>
               <option>BLACK</option>
               <option>WHITE</option>
           </select>   <br />
           <label for="cost">COST :</label>
           <input type="number" name="cost"><br />
           <label for="quantity">Quantity :</label>
           <input type="number" name="quantity"><br />
           <input type="submit" name="upload" value="submit">
           <input type="reset" name="reset" value="reset">
       
       

        </form>
        <?php
        include("dataconnect.php");
        include("check.php");
        if(isset($_POST['upload']))
        {
            $p_id=$_POST['p_id'];
        $p_name=$_POST['p_name'];
        $description=$_POST['description'];
    $lot=$_POST['lot'];
    $color=$_POST['color_type'];
    
    $quantity=1;
    $price=$_POST['price'];
    $sql ="INSERT INTO  products(p_id,p_name,description,lot,color_type,price,quantity) VALUES
        ('$p_id','$p_name','$description','$lot','$color','$price','$quantity')";
        if($result = pg_query($sql)){
            echo '<script>alert("product uploaded")</script>';
            
            header("Location:product.php");
        }
        else{
        echo "Failed inserting data";
        }
        
        }

        ?>
    </body>
</html>