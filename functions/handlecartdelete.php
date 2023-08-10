<?php

session_start();
include('../connect.php');

if (isset($_SESSION['auth'])) {
    $cart_id = $_POST['cart_id'];
    $user_id = $_SESSION['user_id'];

    $check_existing_query = "SELECT * FROM carts WHERE id='$cart_id' AND user_id='$user_id'";
    $res = mysqli_query($con, $check_existing_query);
    if (mysqli_num_rows($res) > 0) {
        $query = "DELETE FROM carts WHERE id='$cart_id'";
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
