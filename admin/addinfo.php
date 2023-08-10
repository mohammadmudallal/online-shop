<?php
session_start();
include('../connect.php');
if(isset($_POST['infoBtn'])){
    $aboutus = $_POST['about_us'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $fb = $_POST['fb'];
    $instagram = $_POST['instagram'];
    $twitter = $_POST['twitter'];
    $location = $_POST['location'];

    if($aboutus == "" || $address=="" || $phone=="" || $email=="" || $fb == "" || $instagram == "" || $twitter=="" || $location==""){
        $_SESSION['message'] = "Please fill all fields";
        header("Location: info.php");   
    }else{
        $update_query = "UPDATE info SET store_about_us=\"$aboutus\",store_address='$address',store_phone_number='$phone',
        store_email='$email',store_facebook_account='$fb',store_instagram_account='$instagram',store_twitter_account='$twitter',
        store_location='$location' WHERE id='2'";
        // $insert_query = "INSERT INTO info VALUES (\"$aboutus\",'$address','$phone','$email','$fb','$instagram','$twitter','$location');";
        $insert_query_run = mysqli_query($con,$update_query);
        if($insert_query_run){
            $_SESSION['message'] = "Data Added Successfully";
            header("Location: info.php");
        }
    }
}
?>