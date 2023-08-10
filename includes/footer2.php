<?php
include('connect.php');
$fetch_info = "SELECT * FROM info";
$fetch_info_run = mysqli_query($con, $fetch_info);
$fetch_info_data = mysqli_fetch_array($fetch_info_run);
?>
<section class="news py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-9 m-auto text-center">

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-3">
                        <h5>SENIOR PROJECT</h5>
                        ><a href="index.php" class="text-decoration-none text-white fs-5"> Home</a><br>
                        ><a href="categories.php" class="text-decoration-none text-white fs-5"> Our Collections</a><br>
                        ><a href="about_us_page.php" class="text-decoration-none text-white fs-5"> About Us</a><br>
                        ><a href="register.php" class="text-decoration-none text-white fs-5"> Register</a><br>
                        ><a href="login.php" class="text-decoration-none text-white fs-5"> Login</a>
                    </div>
                    <div class="col-lg-3">
                        <?php
                        $address = explode(".",$fetch_info_data['store_address']);
                        ?>
                        <h5>ADDRESS</h5>
                        <p><?= $address[0]; ?></p>
                        <p><?= $address[1] ?></p>
                        <p><?= $address[2] ?></p>
                        <p><?= $address[3] ?></p>

                    </div>
                    <div class="col-lg-3">
                        <h5 class="mb-1">SOCIAL MEDIA LINKS</h5>
                        <span><a style="font-size: 2em;" class="text-white p-2" href="http://<?= $fetch_info_data['store_facebook_account'] ?>"><i class="fa fa-facebook"></i></a></span>
                        <span><a style="font-size: 2em;" class="text-white p-2" href="http://<?= $fetch_info_data['store_instagram_account'] ?>"><i class="fa fa-instagram"></i></a></span>
                        <span><a style="font-size: 2em;" class="text-white p-2" href="http://<?= $fetch_info_data['store_twitter_account'] ?>"><i class="fa fa-twitter"></i></a></span>
                        <h5 class="mt-2">Contact Us</h5>
                        <span><a style="font-size: 1em;" class="text-white p-2" href=""><i class="fa fa-phone"></i></a> <?= $fetch_info_data['store_phone_number']?></span><br>
                        <span><a style="font-size: 1em;" class="text-white p-2" href=""><i class="fa fa-envelope"></i></a> <?= $fetch_info_data['store_email']?></span>
                    </div>
                    <div class="col-lg-3 rounded-2">
                        <h5 class="mb-1">LOCATION</h5>
                        <div class="card rouned-4">
                            <iframe src="<?= $fetch_info_data['store_location'] ?>" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <p class="text-center">Copyright @2022 All Rights reserved | Senior Project</p>
    </div>
</section>