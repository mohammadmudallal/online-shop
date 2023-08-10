<?php
session_start();
include('../connect.php');
if (isset($_SESSION['auth'])) {
    if (isset($_POST['placeOrderBtn'])) {
        // $p_id = $_POST['productid'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $pincode = $_POST['pincode'];
        $address = $_POST['city'] . "," . $_POST['address'];;
        $payment_mode = $_POST['payment_mode'];
        // $payment_id = $_POST['payment_id'];

        if ($name == "" || $email == "" || $phone == "" || $pincode == "" || $address == "") {
            $_SESSION['message'] = "All fields are mandatory";
            header("Location: ../checkout.php");
            exit(0);
        }


        $userid = $_SESSION['user_id'];
        $q = "SELECT id,prod_id,prod_qty,p_id,p_title,p_discount_price,p_image FROM `carts` JOIN `product`
                 WHERE prod_id=p_id AND user_id='$userid' ORDER BY id DESC";
        $res = mysqli_query($con, $q);
        $total_price = 0;
        foreach ($res as $citem) {
            $total_price += $citem['p_discount_price'] * $citem['prod_qty'];
        }
        echo $total_price;
        $ref_id = "order" . rand(1111, 9999);
        foreach ($res as $citem) {
            $prod_id = $citem['prod_id'];
            $fetch_products = "SELECT * FROM product WHERE p_id='$prod_id' LIMIT 1";
            $fetch_products_run = mysqli_query($con, $fetch_products);
            $productData = mysqli_fetch_array($fetch_products_run);
            $prodQty = $productData['quantity'];
            if ($prodQty > $citem['prod_qty']) {
                $query = "INSERT INTO orders (ref_id,user_id,name,email,phone,address,pincode,total_price,payment_mode) 
        VALUES ('$ref_id','$userid','$name','$email','$phone','$address','$pincode','$total_price','$payment_mode')";
                $result = mysqli_query($con, $query);
                if ($result) {
                    $order_id = mysqli_insert_id($con);
                    foreach ($res as $citem) {
                        $prod_id = $citem['prod_id'];
                        $prod_qty = $citem['prod_qty'];
                        $price = $citem['p_discount_price'];
                        $insert_details = "INSERT INTO order_info (order_id,prod_id,qty,price) VALUES ('$order_id','$prod_id','$prod_qty','$price')";
                        $insert_res = mysqli_query($con, $insert_details);
                        // $fetch_products = "SELECT * FROM product WHERE p_id='$prod_id' LIMIT 1";
                        // $fetch_products_run = mysqli_query($con, $fetch_products);
                        // $productData = mysqli_fetch_array($fetch_products_run);
                        // $current_qty = $productData['quantity'];
                        $new_qty = $prodQty - $prod_qty;
                        $updateQty = "UPDATE product SET quantity='$new_qty' WHERE p_id='$prod_id'";
                        $updateQty_run = mysqli_query($con, $updateQty);
                    }

                    $delete_cart_query = "DELETE FROM carts WHERE user_id='$userid'";
                    $delete_result = mysqli_query($con, $delete_cart_query);

                    $_SESSION['message'] = "Order placed successfullty";
                    header("Location: ../index.php");
                    die();
                }
            }else{
                $_SESSION['message'] = "Not enough quantity";
                header("Location: functions/placeorder.php");
            }
        }
    }
} else {
    header("Location: ../index.php");
}
