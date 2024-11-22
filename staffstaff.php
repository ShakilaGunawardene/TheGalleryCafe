<?php

@include 'config.php';



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>staff </title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

<?php include 'header4.php'; ?>

<div class="container">


<section class="display-product-table">

   <table>

      <thead>
         <th>member name</th>
         <th>member email</th>
         <th>member designation</th>
        
      </thead>

      <tbody>
         <?php
         
            $select_staff = mysqli_query($conn, "SELECT * FROM `staff`");
            if(mysqli_num_rows($select_staff) > 0){
               while($row = mysqli_fetch_assoc($select_staff)){
         ?>

         <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['designation']; ?></td>
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>no member added</div>";
            };
         ?>
      </tbody>
   </table>

</section>

<section class="edit-form-container">



</section>

</div>















<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>