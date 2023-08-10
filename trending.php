<?php
session_start();
include('includes/header.php');
include('connect.php');
?>
        <div class="py-3 bg-warning">
            <div class="container">
                <h6 class="text-whites">
                    <a class="text-white" href="index.php">
                        Home /
                    </a>
                    <a class="text-white" href="categories.php">
                        Trending /
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
                        Trending 
                    </a>
                </h6>
            </div>
        </div>
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                        <div class="row">
                            <?php
                           $query = "SELECT product_id,AVG(rating),product.* FROM `rating` JOIN `product` 
                           WHERE rating.product_id=product.p_id GROUP BY product_id ORDER BY AVG(rating) DESC;";
                            $res = mysqli_query($con, $query);
                            if (mysqli_num_rows($res) > 0) {
                                foreach ($res as $item) {
                            ?>
                                    <div class="col-md-4 mt-3">
                                    <div class="card rounded-5 shadow" style="height: 400px;">
                                        <div class="card-header rounded-top-5 bg-secondary">
                                            <h5 class="text-white text-center"><?= $item['p_title'] ?></h5>
                                        </div>
                                        <div class="card-body rounded-bottom-5">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <img src="uploads/<?= $item['p_image'] ?>" class="pt-1 mb-5" alt="" height="170px" width="170px">
                                                </div>
                                                <div class="col-md-6">
                                                    <h6 class="fw-bold">Description: </h6>
                                                    <h6 class="fw-100 text-black-50"> <?= $item['p_brief_desc'] ?></h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h6 class="fw-bold p-3 pb-0 pt-0 mb-0">Rating:</h6>
                                                    <div class="list-inline text-center">
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
                                                    <h6 class="fw-bold p-3 pb-0 pt-0 mb-0">Price: <span class="float-end">$<?= $item['p_discount_price'] ?></span></h6>
                                                </div>
                                            </div>
                                            <div class="d-grid">
                                                <a class="btn btn-warning rounded-5 btn-lg mt-2 fw-bold" href="product_view.php?product=<?= $item['p_keyword']; ?>">View Product</a>

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

   
include('includes/footer2.php');
include('includes/footer.php') 

?>