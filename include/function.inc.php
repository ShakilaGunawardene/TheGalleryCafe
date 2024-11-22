<?php

function emptyInputSignup($name, $email, $password, $confirm_password){

    $result = false;

    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)){

              $result = true;
    }else{

        $result = false;
    }
    return $result;
}


function pwdMatch($password, $confirm_password){

    $result = false;

    if ($password !== $confirm_password){

              $result = true;
    }else{

        $result = false;
    }
    return $result;
}



function emailExists($conn, $email) {


    $sql = "SELECT * FROM users WHERE usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../customersignup.php?error=sqlerror");
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


function createUser($conn, $name, $email, $password) {

$sql = "INSERT INTO users (usersName, usersEmail, userPassword) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../customersignup.php?error=sqlerror");
        exit();
    }
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sss",$name, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
     header("Location:../customerlogin.php?error=none");
    exit();
}

function LoginUser($conn,$email, $password){
    $emailExists = emailExists($conn, $email);
 
    if ($emailExists === false) {
 
         header("Location:../customerlogin.php?error=wronglogin1");
         exit();
    }
    $pwdHashed = $emailExists["userPassword"];
    $checkPwd = password_verify($password, $pwdHashed);
 
    if ($checkPwd === false) {
     header("Location:../customerlogin.php?error=wronglogin2");
     exit();
 
    }else if($checkPwd === true){
  
 
     
     header("Location:../index1.php?error=none");
     exit();
 
    }
    
 }