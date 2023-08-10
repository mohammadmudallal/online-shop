<?php
session_start();
include('connect.php');
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



<?php
$fetch_info = "SELECT * FROM info";
$fetch_info_run = mysqli_query($con, $fetch_info);
$fetch_info_data = mysqli_fetch_array($fetch_info_run);
?>

<section id="main" class="main pt-5 mt-5">
    <div class="container py-5">
        <div class="row py-4">
            <div class="col-lg-7 pt-5 text-center ">
                <h1 class="pt-4">YOUR ABSOLUTE WONDERFUL SHOPPING EXPERIENCE</h1>
                <a href="about_us_page.php" class="btn btn-warning rounded-5 btn-lg mt-2 fw-bold" style="width: 35%;">Learn More</a>
            </div>
        </div>
    </div>
</section>
<section id="about" class="about py-5">
    <?php
    $fetch_info = "SELECT * FROM info";
    $fetch_info_run = mysqli_query($con, $fetch_info);
    $fetch_info_data = mysqli_fetch_array($fetch_info_run);
    ?>
    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-12">
                <div class="card rounded-5">
                    <div class="about-img shadow">
                        <img src="assets/images/about.jpg" alt="" class="img-fluid shadow rounded-5" style="height: 300px;">
                    </div>
                </div>

            </div>
            <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
                <div class="about-text">
                    <?php
                    $aboutus = explode(". ", $fetch_info_data['store_about_us']);
                    ?>
                    <h2 class="fw-bold">We Provide Best Quality <br> Services Ever</h2>
                    <p><?= $aboutus[1] . ". " . $aboutus[2] . ". " . $aboutus[3] . "." ?> </p>
                    <a href="about_us_page.php" class="btn btn-warning rounded-5 btn-lg mt-2 fw-bold">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="categories" class="categories p-5">
    <div class="container py-5">
        <div class="row pt-4">
            <div class="col-md-12 m-auto">
                <div class="row mt-4">
                    <div class="col-md-6">
                        <h1 class="mb-4">Our Categories</h1>
                    </div>
                    <div class="col-md-6">
                        <a href="categories.php" class="text-decoration-none float-end pr-3 mt-4 fs-5">View All</a>
                    </div>

                </div>

                <div class="row">
                    <?php
                    $query = "SELECT * FROM categories WHERE status='0' LIMIT 3";
                    $res = mysqli_query($con, $query);
                    if (mysqli_num_rows($res) > 0) {
                        foreach ($res as $item) {
                    ?>
                            <div class="col-md-4 m-auto">
                                <div class="card rounded-5 shadow">
                                    <div class="card-header rounded-top-5 bg-secondary">
                                        <h5 class="text-white text-center"><?= $item['name'] ?></h5>
                                    </div>
                                    <div class="card-body rounded-bottom-5">
                                        <a href="products.php?category=<?= $item['slug']; ?>">
                                            <center>
                                                <img src="uploads/<?= $item['image'] ?>" class="m-4" alt="" height="170px" width="170px">
                                            </center>
                                        </a>
                                    </div>

                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="services" class="services">
    <div class="container py-5">
        <div class="row py-5 ">
            <div class="col-lg-5 m-auto text-center">
                <h1>Our Servies</h1>
                <h6 style="color: red;">You can rely on us in delivering the best services out there!</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card text-center rounded-5 shadow border-0 bg-dark">
                    <div class="card-body rounded-5 ">
                        <i class="fa-brands fa-shopify fa-8x text-white align-center "></i>
                        <h3 class="card-tile text-white ">Best Quality</h3>
                        <p style="font-size: 1rem;" class="lead text-white">Our product is made from the finest materials and is built to last. We use only the highest-quality materials, such as stainless steel and aluminum, to ensure that our product is durable and resistant to wear and tear. We also take great care in the workmanship of our product, making sure that every detail is carefully crafted and put together with precision. In addition, our product is designed to be highly functional and efficient, so you can rely on it to work effectively every time. </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card text-center rounded-5 shadow border-0 bg-dark">
                    <div class="card-body rounded-5 " style="height: auto;">
                        <i class="fa fa-motorcycle fa-8x text-white "></i>
                        <h3 class="card-tile text-white ">Fast Delivery</h3>
                        <p style="font-size: 1rem;" class="lead text-white">At our company, we understand that you want your order as soon as possible. That's why we offer fast delivery options, including same-day and next-day shipping. We also provide tracking information so you can follow the progress of your delivery and know exactly when to expect it. And if you ever have any questions or concerns, our customer service team is here to help. We are committed to providing you with the most convenient and reliable delivery experience possible.</p>
                    </div>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="card text-center rounded-5 shadow border-0 bg-dark">
                    <div class="card-body rounded-5 " style="height: 100hv  ;">
                        <i class="fa fa-percent fa-8x text-white align-center "></i>
                        <h3 class="card-tile text-white ">Discounts</h3>
                        <p style="font-size: 1rem;" class="lead text-white">We are pleased to offer discounts on our products and services to our valued customers. These discounts are designed to help you save money and get more value for your money. The specifics of the discounts may vary, but they could include things like percentage discounts on purchases, free shipping, or free gifts with purchase. To take advantage of these discounts, you may need to meet certain eligibility requirements, such as making a minimum purchase amount.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="trending" class="trending">
    <div class="container py-5">
        <div class="row pt-4">
            <div class="col-md-12 m-auto">
                <div class="row mt-4">
                    <div class="col-md-6">
                        <h1 class="mb-4">What's Trending </h1>
                    </div>
                    <div class="col-md-6">
                        <a href="trending.php" class="text-decoration-none float-end pr-3 mt-4 fs-5">View More</a>
                    </div>

                </div>

                <div class="row">
                    <?php
                    $query = "SELECT product_id,AVG(rating),product.* FROM `rating` JOIN `product` 
                        WHERE rating.product_id=product.p_id GROUP BY product_id ORDER BY AVG(rating) DESC LIMIT 3;";
                    $run = mysqli_query($con, $query);
                    if (mysqli_num_rows($run) > 0) {
                        foreach ($run as $item) {
                    ?>
                            <div class="col-md-4 m-auto">
                                <div class="card rounded-5 shadow" style="height: 400px;">
                                    <div class="card-header rounded-top-5 bg-secondary">
                                        <h5 class="text-white text-center"><?= $item['p_title'] ?></h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <img src="uploads/<?= $item['p_image'] ?>" class="pt-1" alt="" style="height: 150px; width: 150px;">
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="fw-bold">Description: </h6>
                                                <p style="font-size: 0.8rem;" class="fw-100 text-black-50"> <?= $item['p_brief_desc'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6 class="fw-bold mb-0">Rating:</h6>
                                                <div class="list-inline">
                                                    <?php
                                                    $start = 1;
                                                    while ($start <= 5) {
                                                        if ($item['AVG(rating)'] < $start) {
                                                    ?>
                                                            <li class="list-inline-item text-dark"> <i class="fa fa-star-o"></i> </li>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <li class="list-inline-item text-dark"> <i class="fa fa-star"></i> </li>
                                                    <?php
                                                        }
                                                        $start++;
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="fw-bold ">Price: <span class="float-end">$<?= $item['p_discount_price'] ?></span></h6>
                                            </div>
                                        </div>

                                        <div class="d-grid">
                                            <a class="btn btn-warning mt-4 mb-1 rounded-5 btn-lg fw-bold" href="product_view.php?product=<?= $item['p_keyword']; ?>">View Product</a>

                                        </div>

                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
include('includes/footer2.php');
include('includes/footer.php'); ?>