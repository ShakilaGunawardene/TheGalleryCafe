<?php

@include 'config.php';



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>reservation</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="style1.css">
   <style>
      li {
      font-size: 140%;
   }
   </style>

</head>
<body>

<div class="banner">
   <div class="navbar">
    <img  src="logo1.png" alt="" class ="logo">
    


    <ul> 
        
        <li><a href="index1.php">Home</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="reservation.php">Reservation</a></li>
        <li><a href="#">Log Out</a></li>

    
    </ul>
   </div>
  </div>

<div class="container">

<section class="checkout-form">

   <h1 class="heading">reserve your table</h1>
   <form action="include/reservation.inc.php" method="post">

      <div class="flex">
         <div class="inputBox">
            <span>your name</span>
            <input type="text" placeholder="enter your name" name="name" required>
         </div>
         <div class="inputBox">
            <span>your number</span>
            <input type="text" placeholder="enter your mobile number" name="number" required>
         </div>
         <div class="inputBox">
            <span>your email</span>
            <input type="email" placeholder="enter your email" name="email" required>
         </div>
         <div class="inputBox">
            <span>reservation location</span>
            <select name="method">
               <option value="indoor">indoor</option>
               <option value="outdoor">outdoor</option>
            </select>
         </div>
      
         <div class="inputBox">
            <span>table</span>
            <input type="text" placeholder="number of people" name="table1" required>
         </div>
         <div class="inputBox">
            <span>datetime</span>
            <input type="datetime-local" placeholder="e.g. date - time" name="datetime" required>
         </div>
      </div>
      <button type="submit" name="submit" class="btn">submit</button>
   </form>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>