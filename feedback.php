<?php
session_start();
include('connect.php');
if(isset($_POST['sendFeedbackBtn'])){
   if(isset($_SESSION['auth'])){
    $userid = $_SESSION['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];

    $query = "SELECT * FROM users WHERE id='$userid'";
    $run = mysqli_query($con,$query);
    $data = mysqli_fetch_array($run);
    if(mysqli_num_rows($run) > 0){
        if($email == $data['email']){
            $insert_feedback = "INSERT INTO feedbacks (user_id,name,email,feedback)
             VALUES ('$userid','$name','$email','$feedback')";
            $insert_feedback_run = mysqli_query($con,$insert_feedback);
            if($insert_feedback_run){
                header('Location: about_us_page.php');
                $_SESSION['message'] = "Feedback Sent Successfully";
            }
        }else{
            header('Location: about_us_page.php');
            $_SESSION['message'] = "Invalid credentials";
        }
    }else{
        header('Location: register.php');
        $_SESSION['messsage'] = "You need to register first";
    }
}else{
    header('Location: login.php');
    $_SESSION['message'] = "Login first";
} 
}

?>