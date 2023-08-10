<?php

session_start();
include('../connect.php');
if (isset($_SESSION['user_type'])) {
    $user_type = $_SESSION['user_type'];
    if (isset($_SESSION['auth'])) {
        if ($user_type == "user") {
            $prod_id = $_POST['prod_id'];
            $prod_qty  = $_POST['prod_qty'];
            $user_id = $_SESSION['user_id'];


            $check_existing_query = "SELECT * FROM carts WHERE prod_id='$prod_id' AND user_id='$user_id'";
            $res = mysqli_query($con, $check_existing_query);
            if (mysqli_num_rows($res) > 0) {
                echo "existing";
            } else {
                $fetch_product_qty = "SELECT * FROM product WHERE p_id='$prod_id'";
                $fetch_product_qty_run = mysqli_query($con, $fetch_product_qty);
                $fetch_product_qty_data = mysqli_fetch_array($fetch_product_qty_run);
                if ($fetch_product_qty_data['quantity'] >= $prod_qty) {
                    $query = "INSERT INTO carts (user_id,prod_id,prod_qty) VALUES ('$user_id','$prod_id','$prod_qty')";
                    $result = mysqli_query($con, $query);
                    if ($result) {
                        echo 201;
                    }
                } else {
                    echo $fetch_product_qty_data['quantity'];
                }
            }
        }
    } else {
        echo 401;
    }
}
