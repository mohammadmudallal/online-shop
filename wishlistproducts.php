<?php
ob_start();
session_start();
include('includes/header.php');
// include('functions/myfunctions.php');
include('connect.php');

?>
<div class="py-3 bg-warning">
    <div class="container">
        <h6 class="text-whites">
            <a class="text-white text-decoration-none" href="index.php">
                Home /
            </a>
            <a class="text-white" href="cart.php">
                Wishlist
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
            <a class="text-white text-decoration-none" href="cart.php">
                Wishlist
            </a>
        </h6>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="card card-body shadow">
            <div class="row">
                <div class="col-md-12">
                    <div id="mycart">
                        <?php
                        if (isset($_SESSION['auth'])) {
                            $userid = $_SESSION['user_id'];
                            // $pid = $_SESSION['pid'];
                            $query = "SELECT wishlist.*,product.p_keyword FROM wishlist JOIN product 
                            WHERE user_id='$userid' AND wishlist.product_id=product.p_id;";
                            $res = mysqli_query($con, $query);
                            //$data = mysqli_fetch_array($res);
                            if (mysqli_num_rows($res) > 0) {
                        ?>
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h6>Product</h6>
                                    </div>
                                    <div class="col-md-2">
                                        <h6>Price</h6>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <h6>Action</h6>
                                    </div>
                                </div>

                                <?php
                                foreach ($res as $citem) {
                                ?>
                                    <div class="card product_data shadow-sm mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-3">
                                                <img src="uploads/<?= $citem['product_image']; ?>" alt="Image" width="80px">
                                            </div>
                                            <div class="col-md-3">
                                                <h5><?= $citem['product_title']; ?></h5>
                                            </div>
                                            <div class="col-md-2">
                                                <h5>$ <?= $citem['product_price']; ?></h5>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="product_view.php?product=<?= $citem['p_keyword'] ?>" class="btn btn-primary">View product</a>
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-danger removeWishlist" value="<?= $citem['id'] ?>">Remove from wishlist</button>
                                            </div>
                                        </div>
                                    </div>


                                <?php
                                }
                                ?>
                               
                            <?php
                            } else {
                            ?>

                                <div class="card card-body shadow text-center">
                                    <h4 class="py-3">Your wishlist is empty</h4>
                                </div>

                        <?php
                            }
                        } else {
                            header("Location: login.php");
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('includes/footer2.php');
include('includes/footer.php');
ob_end_flush();
?>