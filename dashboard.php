<?php

@include 'config.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

.wrapper{
    padding: 1%;
    width: 90%;
    margin: 0 auto;
}
.text-center{
    text-align: center;
}

.col-4{
    width: 18%;
    background-color: cadetblue;
    margin: 3%;
    padding: 5%;
    float: left;
}
.main-content{
    width: 100%;
    min-height: 95vh;
    background-repeat: no-repeat;
    background-color: cornsilk;
    padding: 4% 0;
    
}




    </style>
</head>
<body>

    <!-- Main Content Section Starts -->
    <div class="main-content">
            <div class="wrapper">
            <h1>Admin Dashboard</h1>
            <br><br>
            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
            ?>
            <br>
            <div class="col-4 text-center">

                <?php 
                    //sql query
                    $sql = "SELECT * FROM staff";
                    //execute the query
                    $res = mysqli_query($conn,$sql);
                    //count rows
                    $count = mysqli_num_rows($res);
                    echo "<h1>$count</h1>";
                ?>
                <br>
                Staff
            </div>
            <div class="col-4 text-center">
            <?php 
                    //sql query
                    $sql = "SELECT * FROM products";
                    //execute the query
                    $res = mysqli_query($conn,$sql);
                    //count rows
                    $count = mysqli_num_rows($res);
                    echo "<h1>$count</h1>";
                ?>
                <br>
                Products
            </div>
            <div class="col-4 text-center">
            <?php 
                    //sql query
                    $sql = "SELECT * FROM reservation";
                    //execute the query
                    $res = mysqli_query($conn,$sql);
                    //count rows
                    $count = mysqli_num_rows($res);
                    echo "<h1>$count</h1>";
                ?>
                <br>
                Reservations
            </div>

            <div class="col-4 text-center">
            <?php 
                    //sql query
                    $sql = "SELECT * FROM users";
                    //execute the query
                    $res = mysqli_query($conn,$sql);
                    //count rows
                    $count = mysqli_num_rows($res);
                    echo "<h1>$count</h1>";
                ?>
                <br>
                Customer
            </div>


            <div class="clearfix"></div>
            </div>
         </div>
        <!-- Main Content Section Ends -->

    
</body>
</html>