<?php
if (isset($_POST["submit"])) {  
   
   $name = $_POST["name"];
   $email = $_POST["email"];
   $password = $_POST["pwd"];
   $confirm_password = $_POST["pwdrepeat"];


   require_once "dbh.inc.php";
   require_once "function.inc.php";

   $emptyInputs = emptyInputSignup($name, $email, $password, $confirm_password);
   $passwordmatch = pwdMatch($password, $confirm_password);
   $emailExists =  emailExists($conn, $email);

   if ( $emptyInputs !== false) {
       header("Location:../customersignup.php?error=emptyinput");

       exit();

   }
   if ( $passwordmatch !== false) {
    header("Location:../customersignup.php?error=password doesn't match");

    exit();

}

if ( $emailExists !== false) {
    header("Location:../customersignup.php?error=emailtaken");

    exit();

}

createUser($conn,$name, $email, $password);
  
               

}else{

    header("Location:../customersignup.php");
    exit();
}