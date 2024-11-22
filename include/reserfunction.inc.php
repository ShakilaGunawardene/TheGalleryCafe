<?php


function createReservation($conn,$name,$number, $email,$method,$table1, $datetime) {

$sql = "INSERT INTO reservation (name, number, email,method,table1,datetime) VALUES (?, ?, ?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../reservation.php?error=sqlerror");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssssss",$name,$number, $email,$method,$table1, $datetime);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
     header("Location:../reservation.php?error=none");
    exit();

}

function deleteReservation($conn,$id){
    $sql="DELETE FROM reservation WHERE id=?";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location:../reservation.php?error=sqlerror");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i",$id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
     header("Location:../reservation.php?delete=success");
    exit();

}

function getReservation($conn){
    $sql="SELECT * FROM reservation";
    $result = mysqli_query($conn,$sql);
    $reservations =[];
    if($result && mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            $reservations[]=$row;
        }
    }
    return $reservations;
}
function getOrder($conn) {
    $query = "SELECT * FROM `order`"; 
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die('Query failed: ' . mysqli_error($conn));
    }
    $orders = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $orders[] = $row;
    }
    return $orders;
}




 