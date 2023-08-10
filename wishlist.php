<?php
session_start();
include('connect.php');
if(isset($_SESSION['auth'])){
    $pid = $_POST['pid'];
    $userid = $_SESSION['user_id'];
    $title = $_POST['title'];
    $image = $_POST['image'];
    $price = $_POST['price'];
    $keyword = $_POST['keyword'];

    $check_existing_wishlist = "SELECT * FROM wishlist WHERE user_id='$userid' AND product_id='$pid'";
    $check_existing_wishlist_run = mysqli_query($con,$check_existing_wishlist);
    if(mysqli_num_rows($check_existing_wishlist_run) > 0){
        $_SESSION['message'] = "Already in wishlist";
        header('Location: product_view.php?product='.$keyword);
    }else{
        $query = "INSERT INTO wishlist (product_id,user_id,product_title,product_image,product_price) VALUES ('$pid','$userid','$title','$image','$price')";
    $run = mysqli_query($con,$query);
    if($run){
        $_SESSION['message'] = "Product added to wishlist";
        header('Location: product_view.php?product='.$keyword);
    }
    }
    
}else{
    header('Location: login.php');
    $_SESSION['message'] = "Login first";
}
?>