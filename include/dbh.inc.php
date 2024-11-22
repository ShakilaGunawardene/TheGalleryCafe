<?php
$serverName="localhost";
$dbUsername="oneth";
$dbPassword="mysql";
$dbName="thegallerycafe_login";

$conn=mysqli_connect($serverName,$dbUsername,$dbPassword,$dbName);

if(!$conn){
    die("Connection faild:".mysqli_connect_error());
}