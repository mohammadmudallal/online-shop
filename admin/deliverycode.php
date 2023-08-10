<?php
session_start();
include('../functions/myfunctions.php');
// include('../connect.php');

if(isset($_POST['addDeliveryBtn'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $cpass = $_POST['confirmpass'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $phone = $_POST['mobile'];

    $email_query = "SELECT email FROM users WHERE email='$email'";
    $email_query_result = mysqli_query($con, $email_query);

    if (mysqli_num_rows($email_query_result) > 0) {
        $_SESSION['message'] = "Email already registered!";
        header('Location: register.php');
    } else {
    if($pass == $cpass){
        $pass = md5($pass);
        $query = "INSERT INTO users (f_name,l_name,email,phone,password,type,city,address)
        VALUES ('$fname','$lname','$email','$phone','$pass','delivery','$city','$address')";
        $run = mysqli_query($con,$query);
        if($run){
            redirect("index.php","Delivery man was registered successfully");
        }else{
            redirect("add_delivery_man.php","Something went wrong");
        }
    }
}

}
