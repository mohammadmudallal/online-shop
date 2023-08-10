<?php

session_start();
include('../connect.php');

if (isset($_SESSION['auth'])) {
    $prod_id = $_POST['prod_id'];
    $prod_qty  = $_POST['prod_qty'];
    $user_id = $_SESSION['user_id'];

    $check_existing_query = "SELECT * FROM carts WHERE prod_id='$prod_id' AND user_id='$user_id'";
    $res = mysqli_query($con, $check_existing_query);
    if (mysqli_num_rows($res) > 0) {
        $query = "UPDATE carts SET prod_qty='$prod_qty' WHERE prod_id='$prod_id' AND user_id='$user_id'";
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
