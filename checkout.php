<?php
session_start();
include('connect.php');
include('includes/header.php');

$userid = $_SESSION['user_id'];
$order = "SELECT * FROM carts WHERE user_id='$userid'";
$order_run = mysqli_query($con,$order);
if(mysqli_num_rows($order_run) > 0){
?>
<div class="py-3 bg-warning">
    <div class="container">
        <h6 class="text-whites">
            <a class="text-white" href="index.php">
                Home /
            </a>
            <a class="text-white" href="checkout.php">
                Checkout
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
            <a class="text-white text-decoration-none" href="checkout.php">
                Checkout
            </a>
        </h6>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-body shadow">
                <form action="functions/placeorder.php" method="POST">
                <div class="row">
                    <div class="col-md-7">
                        <h5>Basic Details</h5>
                        <hr>
                        <?php
                        $select_users = "SELECT * FROM users WHERE id='$userid'";
                        $select_users_run = mysqli_query($con,$select_users);
                        $data = mysqli_fetch_array($select_users_run);
                        ?>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Name</label>
                                <input type="text" name="name" required value="<?= $data['f_name']." ".$data['l_name'] ?>"  class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">E-mail</label>
                                <input type="email" name="email" required value="<?= $data['email'] ?>" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Phone</label>
                                <input type="text" name="phone" required value="<?= $data['phone'] ?>"  class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Pin Code</label>
                                <input type="text" name="pincode" required placeholder="Enter zip code"  class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">City</label>
                                <input type="text" name="city" required value="<?= $data['city'] ?>"  class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Address</label>
                                <input type="text" name="address" required value="<?= $data['address'] ?>"  class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <h5>Order Details</h5>
                        <hr>
                        <div class="row align-items-center">
                            <?php
                            if (isset($_SESSION['auth'])) {
                                $userid = $_SESSION['user_id'];
                                $query = "SELECT id,prod_id,prod_qty,p_id,p_title,p_discount_price,p_image FROM `carts` JOIN `product`
                 WHERE prod_id=p_id AND user_id='$userid' ORDER BY id DESC";
                                $res = mysqli_query($con, $query);
                                $total_price = 0;
                                foreach ($res as $citem) {
                            ?>
                                    <div class="card product_data shadow-sm mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-2">
                                                <img src="uploads/<?= $citem['p_image']; ?>" alt="Image" width="80px">
                                            </div>
                                            <div class="col-md-5">
                                                <h5><?= $citem['p_title']; ?></h5>
                                            </div>
                                            <div class="col-md-3">
                                                <h5>$ <?= $citem['p_discount_price']; ?></h5>
                                            </div>
                                            <div class="col-md-2">
                                                <h5>x<?= $citem['prod_qty']; ?></h5>
                                            </div>
                                        </div>
                                    </div>


                            <?php
                            $total_price += $citem['p_discount_price'] * $citem['prod_qty'];
                                }
                            } else {
                                redirect("login.php", "You have to login");
                            }
                            ?>
                            <hr>
                            <h5>Total Price: <span class="float-end fw-bold">$ <?= $total_price ?></span></h5>
                            <div>
                                <input type="hidden" name="payment_mode" value="COD">
                                <button type="submit" name="placeOrderBtn" class="btn btn-primary w-100">Confirm and place order | COD</button>
                            </div>
                        </div>

                    </div>
                </div>
                </form>
            </div>

        </div>

    </div>
</div>
<?php
}else {
?>
<div class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-body shadow">
                <h3 class="text-center">No Items in Carts</h3>
            </div>
        </div>
    </div>
</div>
<?php
}
?>


<?php
include('includes/footer2.php');
include('includes/footer.php') ?>