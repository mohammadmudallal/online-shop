<?php
session_start();
if(isset($_SESSION['auth'])){
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);
    // $_SESSION['logged_out'] = true;
    $_SESSION['message'] = "Logged Out Successfully";
}
header('Location: index.php');
?>