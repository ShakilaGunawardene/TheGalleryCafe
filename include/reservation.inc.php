<?php
if (isset($_POST["submit"])) {  
   
   $name = $_POST["name"];
   $number = $_POST["number"];
   $email = $_POST["email"];
   $method = $_POST["method"];
   $table1 = $_POST["table1"];
   $datetime = $_POST["datetime"];


   require_once "dbh.inc.php";
   require_once "reserfunction.inc.php";

   
createReservation($conn,$name,$number, $email,$method,$table1, $datetime);
  
               

}else{

    header("Location:../reservation.php?error=cantadddata");
    exit();
}
?>