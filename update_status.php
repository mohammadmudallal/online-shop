<?php
session_start();
include('connect.php');

if(isset($_POST['updateStatus'])){
    $userid = $_SESSION['user_id'];
    $order_id = $_POST['order_id'];
    $ref_id = $_POST['ref_no'];
    $check_order_existance = "SELECT * FROM orders WHERE ref_id='$ref_id' AND id='$order_id'";
    $check_order_existance_run = mysqli_query($con,$check_order_existance);
    if($check_order_existance_run){
        $update_query = "UPDATE orders SET status='2',deliveredBy='$userid' WHERE ref_id='$ref_id' AND id='$order_id'";
        $update_query_run = mysqli_query($con,$update_query);
        if($update_query_run){
            header('Location: delivery_orders.php');
            $_SESSION['message'] = "Status updated sucessfully";
        }else{
            $_SESSION['message'] = "Something went wrong";
        }
    }
}

?>