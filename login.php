<?php
session_start();
if (isset($_SESSION['auth'])) {
    $_SESSION['message'] = "You are already logged in";
    header('Location: index.php');
    exit();
}
include('includes/header.php');
?>

<div class="py-5">
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php
                if (isset($_SESSION['message'])) {
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Alert!</strong> <?= $_SESSION['message']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    unset($_SESSION['message']);
                }
                ?>
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Login Form</h4>
                    </div>
                    <div class="card-body">
                        <form action="authcode.php" method="POST">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter your email address">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" name="pass" class="form-control" placeholder="Enter your password">
                            </div>
                            <button type="submit" name="login_button" class="btn btn-primary" style="width: 100%;">Login</button><br>
                            <label class="mt-3" for="">Don't have an account yet? <a href="register.php" class="text-decoration-none">Create an account</a></label>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php
include('includes/footer2.php');
include('includes/footer.php') ?>