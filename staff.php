<?php

@include 'config.php';

if(isset($_POST['add_product'])){
   $p_name = $_POST['p_name'];
   $p_email = $_POST['p_email'];
   $p_password=$_POST['p_password'];
   $p_designation=$_POST['p_designation'];
 

   $insert_query = mysqli_query($conn, "INSERT INTO `staff`(name,email,password,designation) VALUES('$p_name', '$p_email','$p_password', '$p_designation')") or die('query failed');

   if($insert_query){
      $message[] = 'Member add succesfully';
   }else{
      $message[] = 'Member not add the product';
   }
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `staff` WHERE id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location:staff.php');
      $message[] = 'member has been deleted';
   }else{
      header('location:staff.php');
      $message[] = 'member could not be deleted';
   };
};

if(isset($_POST['update_product'])){
   $update_p_id = $_POST['update_p_id'];
   $update_p_name = $_POST['update_p_name'];
   $update_p_email = $_POST['update_p_email'];
   $update_p_password = $_POST['update_p_password'];
   $update_p_designation = $_POST['update_p_designation'];
   

   $update_query = mysqli_query($conn, "UPDATE `staff` SET name = '$update_p_name', email = '$update_p_email',password = '$update_p_password',designation = '$update_p_designation' WHERE id = '$update_p_id'");

   if($update_query){
      $message[] = 'member updated succesfully';
      header('location:staff.php');
   }else{
      $message[] = 'member could not be updated';
      header('location:staff.php');
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>staff add</title>

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

<?php include 'header.php'; ?>

<div class="container">

<section>

<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
   <h3>add a new Member</h3>
   <input type="text" name="p_name" placeholder="enter the member name" class="box" required>
   <input type="text" name="p_email" placeholder="enter the member email" class="box" required>
   <input type="password" name="p_password" placeholder="enter the  password" class="box" required>
   <input type="text" name="p_designation" placeholder="enter the member designation" class="box" required>
   <input type="submit" value="add the Member" name="add_product" class="btn">
</form>

</section>

<section class="display-product-table">

   <table>

      <thead>
         <th>member name</th>
         <th>member email</th>
         <th>member password</th>
         <th>member designation</th>
         <th>action</th>
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
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['designation']; ?></td>
            <td>
               <a href="staff.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a>
               <a href="staff.php?edit=<?php echo $row['id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
            </td>
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

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `staff` WHERE id = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
      <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
      <input type="text" class="box" required name="update_p_email" value="<?php echo $fetch_edit['email']; ?>">
      <input type="password" class="box" required name="update_p_password" value="<?php echo $fetch_edit['password']; ?>">
      <input type="text" class="box" required name="update_p_designation" value="<?php echo $fetch_edit['designation']; ?>">
      <input type="submit" value="update Details" name="update_product" class="btn">
      <input type="reset" value="cancel" id="close-edit" class="option-btn">
   </form>

   <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
   ?>

</section>

</div>















<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>