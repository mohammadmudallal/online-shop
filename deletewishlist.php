<?php

session_start();
include('connect.php');

if (isset($_SESSION['auth'])) {
    $wish_id = $_POST['wish_id'];
    $user_id = $_SESSION['user_id'];

    $check_existing_query = "SELECT * FROM wishlist WHERE id='$wish_id' AND user_id='$user_id'";
    $res = mysqli_query($con, $check_existing_query);
    if (mysqli_num_rows($res) > 0) {
        $query = "DELETE FROM wishlist WHERE id='$wish_id'";
        $result = mysqli_query($con, $query);
        if ($result) {
            echo 200;
        } else {
            echo 500;
        }
    }else{
        echo "Something went wrong";
    }
} else {
    echo 401;
}
