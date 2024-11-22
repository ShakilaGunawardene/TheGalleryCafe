<?php




function LoginUser($conn,$email, $password){
    $emailExists = staffEmailExists($conn, $email);
 
    if ($emailExists === false) {
 
         header("Location:../stafflogin.php?error=wronglogin1");
         exit();
    }
    $pwdHashed = $emailExists["password"];
    
 
    if ($password === false) {
     header("Location:../stafflogin.php?error=wronglogin2");
     exit();
 
    }else if($password === true){
  
 
     
     header("Location:../stafflogin.php?error=none");
     exit();
 
    }
 }

 function staffEmailExists($conn, $email) {


     $sql = "SELECT * FROM staff WHERE email = ?;";
     $stmt = mysqli_stmt_init($conn);
 
     if (!mysqli_stmt_prepare($stmt, $sql)) {
         header("Location:../stafflogin.php?error=sqlerror");
         exit();
     }
     mysqli_stmt_bind_param($stmt, "s", $email);
     mysqli_stmt_execute($stmt);
     $resultData = mysqli_stmt_get_result($stmt);
 
     if ($row = mysqli_fetch_assoc($resultData)) {
         return $row;
     } else {
         return false;
     }
     mysqli_stmt_close($stmt);
 }