<?php 
if (isset($_POST["submit"])) {   
   $email = $_POST["uid"];
   $password = $_POST["pwd"];

   require_once "dbh.inc.php";
   require_once "function.inc.php";

   LoginUser($conn,$email, $password);
   
               

}else{

    header("Location:../login.php");
    exit();
}


