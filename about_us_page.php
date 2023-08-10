<?php
session_start();
include('connect.php');

$page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);

if (isset($_SESSION['auth'])) {
    if ($_SESSION['user_type'] == "delivery") {
        //redirect("delivery_orders.php","You are not authorized to access this page");
        //$_SESSION['message'] = "You are not authorized to access this page";
        header('Location: delivery_orders.php');
    } else if ($_SESSION['user_type'] == "admin") {
        //redirect("delivery_orders.php","You are not authorized to access this page");
        //$_SESSION['message'] = "You are not authorized to access this page";
        header('Location: admin/index.php');
    }
}
include('includes/header.php');
?>
<div class="py-2 bg-primary">
    <div class="container">
        <h6 class="text-whites">Home / Collections</h6>
    </div>
</div>
<?php
include('includes/slider.php');

?>


<?php
$fetch_info = "SELECT * FROM info";
$fetch_info_run = mysqli_query($con, $fetch_info);
$fetch_info_data = mysqli_fetch_array($fetch_info_run);
?>

<div class="bg-white">
    <section id="about" class="about section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-12">
                </div>

            </div>
            <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
                <div class="about-text">
                    <?php
                    $aboutus = explode(". ", $fetch_info_data['store_about_us']);
                    ?>
                    <h2 class="fw-bold">About Us</h2><br>
                    <p><?= $aboutus[0] . "." ?> </p>
                    <p><?= $aboutus[1] . ". " . $aboutus[2] . "." ?> </p>
                    <p><?= $aboutus[3] . ". " . $aboutus[4] . "." ?> </p>
                    <p><?= $aboutus[5] . ". " . $aboutus[6] . "." . $aboutus[7] . "." ?> </p>
                    <p><?= $aboutus[8] . ". " . $aboutus[9] . "." ?> </p>
                    <p><?= $aboutus[10] . ". " ?> </p>
                    <p><?= $aboutus[11] . ". " . $aboutus[12] . "." ?> </p>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-header pt-3 ">
                                <h3>Contact Us</h3>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row ">
                            <div class="col-md-12 p-0 pt-4 pb-4">
                                <div class="row">
                                    <form action="feedback.php" method="POST">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="" class="mb-2 fw-bold">Full Name: </label>
                                                <input type="text" name="name" class="form-control" required placeholder="Your Full Name">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="" class="mb-2 fw-bold">E-mail: </label>
                                                <input type="email" name="email" class="form-control" required placeholder="Your Email Address">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="" class="mb-2 fw-bold">Feedback: </label>
                                                <textarea name="feedback" id="" rows="3" required class="form-control" placeholder="Your Feedback"></textarea>
                                            </div>
                                        </div>
                                        <button class="btn btn-warning btn-lg fw-bold mt-3" name="sendFeedbackBtn">Send Feedback Now</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <p><?= $aboutus[13] . ". " ?> </p>
                    <p><?= $aboutus[14] ?> </p>
                </div>
            </div>
        </div>
</div>
</section>
</div>



<?php 
include('includes/footer2.php');
include('includes/footer.php'); ?>
