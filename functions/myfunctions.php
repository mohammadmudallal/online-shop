<?php
// session_start();
include('../connect.php');

function getAll($table){
    global $con;
    $query = "SELECT * FROM $table";
    return $res = mysqli_query($con,$query);
}

function getByID($table, $id){
    global $con;
    $query = "SELECT * FROM $table WHERE id=$id";
    return $res = mysqli_query($con,$query);
}

// function getByID($table, $id){
//     global $con;
//     $query = "SELECT * FROM $table WHERE id=$id";
//     return $res = mysqli_query($con,$query);
// }

function redirect($url, $message){
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit();
}

?>