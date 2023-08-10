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
            <a class="text-white" href="index.php">
                Home /
            </a>
            <a class="text-white" href="cart.php">
                Cart
            </a>
        </h6>
    </div>
</div>
<div class="py-3 bg-warning">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white text-decoration-none" href="index.php">
                Home /
            </a>
            <a class="text-white text-decoration-none" href="cart.php">
                Cart
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
                            $query = "SELECT id,prod_id,prod_qty,p_id,p_title,p_discount_price,p_image FROM `carts` JOIN `product`
                 WHERE prod_id=p_id AND user_id='$userid' ORDER BY id DESC";
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
                                    <div class="col-md-2">
                                        <h6>Quantity</h6>
                                    </div>
                                    <div class="col-md-2">
                                        <h6>Action</h6>
                                    </div>
                                </div>

                                <?php
                                foreach ($res as $citem) {
                                ?>
                                    <div class="card product_data shadow-sm mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-3">
                                                <img src="uploads/<?= $citem['p_image']; ?>" alt="Image" width="80px">
                                            </div>
                                            <div class="col-md-3">
                                                <h5><?= $citem['p_title']; ?></h5>
                                            </div>
                                            <div class="col-md-2">
                                                <h5>$ <?= $citem['p_discount_price']; ?></h5>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="row">
                                                    <input type="hidden" class="prodId" value="<?= $citem['prod_id'] ?>">
                                                    <div class="input-group mb-3" style="width: 140px;">
                                                        <button class="input-group-text update decrement-btn">-</button>
                                                        <input type="text" class="form-control text-center input-qty bg-white" disabled value="<?= $citem['prod_qty'];  ?>">
                                                        <button class="input-group-text update increment-btn">+</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-danger btn-sm deleteItem" value="<?= $citem['id']; ?>">
                                                    <i class="fa fa-trash me-2"></i>Remove</button>
                                            </div>
                                        </div>
                                    </div>


                                <?php
                                }
                                ?>
                                <div class="float-end">
                                    <a href="checkout.php" class="btn btn-outline-primary">Proceed to checkout</a>
                                </div>
                            <?php
                            } else {
                            ?>

                                <div class="card card-body shadow text-center">
                                    <h4 class="py-3">Your cart is empty</h4>
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