<?php

session_start();
if (isset($_SESSION['auth'])) {
    $_SESSION['message'] = "You are already logged in";
    header('Location: index.php');
}
include('includes/header.php')
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php
                if (isset($_SESSION['message'])) {
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?= $_SESSION['message']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    unset($_SESSION['message']);
                }
                ?>
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Registration Form</h4>
                    </div>
                    <div class="card-body">
                        <form action="authcode.php" method="POST">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Fisrt Name</label>
                                <input type="text" name="fisrtname" class="form-control" required placeholder="Enter your First name">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Last Name</label>
                                <input type="text" name="lastname" class="form-control" required placeholder="Enter your last name">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" required placeholder="Enter your email address">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" name="pass" class="form-control" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" required placeholder="Enter your password">
                                <div id="emailHelp" class="form-text">The password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one digit, and one non-alphanumeric character. </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                                <input type="password" name="cpass" class="form-control" required placeholder="Re-enter your password">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Mobile Number</label>
                                <input type="phone" name="mobile" pattern="^\+961(78|03|76|71|80|81)\d{6}$" class="form-control" required placeholder="Enter your mobile number in the following format: +96100000000">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">City</label>
                                <input type="text" name="city" class="form-control" required placeholder="Enter your city">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" required placeholder="Enter your address">
                            </div>
                            <button type="submit" name="register_button" class="btn btn-primary" style="width: 100%;">Submit</button>
                            <br>
                            <label class="mt-2" for="">Already have an account? <a class="text-decoration-none" href="login.php">Login Here</a></label>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php 
include('includes/footer2.php');
include('includes/footer.php');

 ?>