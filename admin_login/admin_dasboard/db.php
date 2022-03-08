<?php
    $servername="localhost";
    $username="root";
    $password="";
    $database="ecmrc";

    $conn=mysqli_connect($servername,$username,$password,$database);
    if(!$conn){
        echo "Connecting Failed";
    }
?>