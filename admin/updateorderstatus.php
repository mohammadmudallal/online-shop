<?php
session_start();
include('../connect.php');
include('../functions/myfunctions.php');
if(isset($_POST['update_order_status'])){
    $ref_id = $_POST['tracking_no'];
    $status = $_POST['order_status'];
    $query  = "UPDATE orders SET status='$status' WHERE ref_id='$ref_id'";
    $run = mysqli_query($con,$query);
    if($run){
        header("Location: orders.php");
        $_SESSION['message'] = "Order status updated successfully";
        // redirect("view-order.php","Order status updated successfully");
    }
}else if(isset($_POST['update_order_status_returned'])){
    $ref_id = $_POST['tracking_no'];
    $status = $_POST['order_status'];
    $query  = "UPDATE orders SET status='$status' WHERE ref_id='$ref_id'";
    $run = mysqli_query($con,$query);
    if($run){
        header("Location: orders.php");
        $_SESSION['message'] = "Order status updated successfully";
        // redirect("view-order.php","Order status updated successfully");
    }
}

?>