<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "senior-project";

    $con = mysqli_connect($host, $username, $password, $db);

    if(!$con){
        die("Connection Failed: " . mysqli_connect_error());
    }
?>