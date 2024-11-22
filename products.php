<?php

@include 'config.php';

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'product added to cart successfully';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Products</title>

   <!-- Font awesome CDN link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="css/style.css">
   <style>
   label2 {
      font-size: 190%;
   }

   .search-bar-container {
         text-align: center;
         margin-bottom: 20px;
      }
      .search-bar {
         padding: 10px 20px;
         border-radius: 50px;
         border: 2px solid #333;
         background-color: #f2f2f2;
         font-size: 16px;
         color: #333;
         width: 50%;
         max-width: 500px;
         outline: none;
         transition: all 0.3s ease;
      }
      .search-bar:focus {
         border-color: #555;
         background-color: #fff;
      }
      .search-button {
         padding: 10px 20px;
         border-radius: 50px;
         border: none;
         background-color: #555;
         color: white;
         font-size: 16px;
         cursor: pointer;
         transition: all 0.3s ease;
      }
      .search-button:hover {
         background-color: #333;
      }
   </style>
</head>
<body>

<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

<?php include 'header3.php'; ?>


<div class="container">

<section class="products">

   <h1 class="heading">Latest Products</h1>

   <div class="search-bar-container">
      <form action="products.php" method="POST" style="display: flex; justify-content: center; align-items: center; gap: 10px;">
         <input type="text" name="search_category" placeholder="Search by category" class="search-bar">
         <input type="submit" name="submit_search" value="Search" class="search-button">
      </form>
   </div>
   <div class="box-container">

      <?php
      
      if(isset($_POST['submit_search'])){
         $search_category = mysqli_real_escape_string($conn, $_POST['search_category']);
         $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE category LIKE '%$search_category%' or name LIKE '%$search_category%'");
      } else {
         $select_products = mysqli_query($conn, "SELECT * FROM `products`");
      }
      
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="box">
            <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
            <h3><?php echo $fetch_product['name']; ?></h3>
            <label2><?php echo $fetch_product['category']; ?></label2>
            <div class="price">Rs<?php echo $fetch_product['price']; ?></div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            <input type="submit" class="btn" value="add to cart" name="add_to_cart">
         </div>
      </form>

      <?php
         };
      } else {
         echo '<p style="text-align: center;">No products found in this category.</p>';
      }
      ?>

   </div>

</section>

</div>

<!-- Custom JS file link -->
<script src="js/script.js"></script>

</body>
</html>
