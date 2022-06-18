<?php
    $servername = "localhost";
    $username = "root";
    $passowrd = "";
    $database = "notes";

    $conn = mysqli_connect($servername,$username,$passowrd,$database);

    if(!$conn){
      die("Sorry failed to connect to database");
    }
  
?>
