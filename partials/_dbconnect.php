<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "users19";

$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die("Sorry failed to connect to database");
}
?>