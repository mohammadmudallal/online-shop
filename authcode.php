<?php
session_start();
include('connect.php');

if (isset($_POST['register_button'])) {
    $fname = $_POST['fisrtname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $confirm_password = $_POST['cpass'];
    $mobile_number = $_POST['mobile'];
    $address = $_POST['address'];
    $city = $_POST['city'];

    $email_query = "SELECT email FROM users WHERE email='$email'";
    $email_query_result = mysqli_query($con, $email_query);

    if (mysqli_num_rows($email_query_result) > 0) {
        $_SESSION['message'] = "Email already registered!";
        header('Location: register.php');
    } else {
        if ($password == $confirm_password) {
            $password = md5($password);
            $query = "INSERT INTO users (f_name,l_name,email,phone,password,city,address)
             VALUES ('$fname','$lname','$email','$mobile_number','$password','$city','$address')";
            $result = mysqli_query($con, $query);
            if ($result) {
                $_SESSION['message'] = "Registered Successfully!";
                header('Location: login.php');
            } else {
                $_SESSION['message'] = "Something went wrong!";
                header('Location: register.php');
            }
        } else {
            $_SESSION['message'] = "Passwords do not match";
            header('Location: register.php');
        }
    }
} else if (isset($_POST['login_button'])) {
    $email1 = $_POST['email'];
    $password1 = $_POST['pass'];
    $password1 = md5($password1);
    $query = "SELECT * FROM `users` WHERE email=\"$email1\" AND password=\"$password1\";";
    $result1 = mysqli_query($con, $query);
    if (mysqli_num_rows($result1) > 0) {
        $_SESSION['auth'] = true;
        $userdata = mysqli_fetch_array($result1);
        $username = $userdata['f_name'];
        // $lastname = $userdata['l_name'];
        $useremail = $userdata['email'];
        $usertype = $userdata['type'];
        $_SESSION['user_id'] = $userdata['id'];
        // $_SESSION['last_name'] = $userdata['l_name'];
        $_SESSION['auth_user'] = [
            'name' => $username,
            'email' => $useremail
        ];
        $_SESSION['user_type'] = $usertype;
        if ($usertype == "admin") {
            $_SESSION['message'] = "Welcome to Dashboard";
            header('Location: admin/index.php');
        } else if ($usertype == "delivery") {
            $_SESSION['message'] = "Logged In Successfully";
            header('Location: delivery_orders.php');
        } else {
            $_SESSION['message'] = "Logged In Successfully";
            header('Location: index.php');
        }
    } else {
        $_SESSION['message'] = "Invalid Credentials";
        header('Location: login.php');
    }
} else if (isset($_POST['update_prof_button'])) {
    $fname = $_POST['fisrtname'];
    $lname = $_POST['lastname'];
    // $email = $_POST['email'];
    $mobile_number = $_POST['mobile'];
    $address = $_POST['address'];
    $city = $_POST['city'];

     $userid = $_SESSION['user_id'];
    // $email_query = "SELECT email FROM users WHERE email='$email'";
    // $email_query_result = mysqli_query($con, $email_query);
    // $data = mysqli_fetch_array($email_query_result);
    // if (mysqli_num_rows($email_query_result) > 0 && $userid != $data['id']) {
    //     $_SESSION['message'] = "Email already registered!";
    //     header('Location: user_profile.php');
    // } else {
    $query = "UPDATE users SET f_name ='$fname',l_name='$lname',phone='$mobile_number',city='$city',address='$address'
    WHERE id = '$userid'";
    $result = mysqli_query($con, $query);
    if ($result) {
        $_SESSION['message'] = "Profile Updated Successfully!";
        header('Location: user_profile.php');
    } else {
        $_SESSION['message'] = "Something went wrong!";
        header('Location: register.php');
    }
}
