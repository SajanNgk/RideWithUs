<header class="header">

   <div class="flex">

      <a href="#" class="logo">foodies</a>

      <nav class="navbar">
         <a href="productupload.php">add products</a>
         <a href="product.php">view products</a>
      </nav>

      <?php
      
      $select_rows = pg_query($conn, "SELECT * FROM `products`") or die('query failed');
      $row_count = pg_num_rows($select_rows);

      ?>

      <a href="addtocart.php" class="cart">cart <span><?php echo $row_count; ?></span> </a>

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>