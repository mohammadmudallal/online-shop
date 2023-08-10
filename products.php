<?php
session_start();
include('includes/header.php');
include('connect.php');
if (isset($_GET['category'])) {
    $cat_slug = $_GET['category'];
    $q = "SELECT * FROM categories WHERE slug='$cat_slug' AND status='0' LIMIT 1";
    $r = mysqli_query($con, $q);
    $cat = mysqli_fetch_array($r);
    if ($cat) {
        $cid = $cat['id'];
?>
        <div class="py-3 bg-warning">
            <div class="container">
                <h6 class="text-whites">
                    <a class="text-white" href="index.php">
                        Home /
                    </a>
                    <a class="text-white" href="categories.php">
                        Collections /
                    </a>
                    <a class="text-white" href="products.php">
                        <?= $cat['name']; ?>
                    </a>
                </h6>
            </div>
        </div>
        <div class="py-3 bg-warning">
            <div class="container">
                <h6 class="text-whites">
                    <a class="text-white text-decoration-none" href="index.php">
                        Home /
                    </a>
                    <a class="text-white text-decoration-none" href="categories.php">
                        Collections /
                    </a>
                    <a class="text-white text-decoration-none" href="products.php">
                        <?= $cat['name']; ?>
                    </a>
                </h6>
            </div>
        </div>
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1><?= $cat['name']; ?></h1>
                        <hr>
                        <div class="row">
                            <?php
                            $query = "SELECT * FROM product WHERE cat_id='$cid' AND p_status='0'";
                            $res = mysqli_query($con, $query);
                            if (mysqli_num_rows($res) > 0) {
                                foreach ($res as $item) {
                            ?>
                                    <div class="col-md-4 mt-3">
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
                                                <h6 class="fw-bold mb-0">Brand: <span class="fload-end"><?= $item['p_brand'] ?></span></h6>
                                                
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
                            } else {
                                echo "No data available";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php

    } else {
        echo "Something Went Wrong";
    }
} else {
    echo "Something Went Wrong";
}
include('includes/footer2.php');
include('includes/footer.php')

?>