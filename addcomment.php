<?php
session_start();
include('connect.php');
if(isset($_POST['addCommentBtn'])){
    $order_id = $_POST['order_id'];
    $comment = $_POST['comment'];
    $check_existing_order = "SELECT * FROM orders WHERE id='$order_id'";
    $check_existing_order_run = mysqli_query($con,$check_existing_order);
    $data = mysqli_fetch_array($check_existing_order_run);
    $ref_no = $data['ref_id'];
    if(mysqli_num_rows($check_existing_order_run) > 0){
        $update_comment = "UPDATE orders SET comments='$comment' WHERE id='$order_id'";
        $update_comment_run = mysqli_query($con,$update_comment);
        if($update_comment_run){
            header('Location: view-order.php?t='.$ref_no);
            $_SESSION['message'] = "Comment added successfully";
        }else{
            header('Location: view-order.php?t='.$ref_no);
            $_SESSION['message'] = "Something went wrong";
        }
    }
}
