<?php

include('../middleware/adminMiddleware.php');
include('includes/header.php');
include('../connect.php');

if (isset($_GET['t'])) {
    $track_no = $_GET['t'];
    $userId = $_SESSION['user_id'];
    $query = "SELECT * FROM orders WHERE ref_id='$track_no'";
    $run = mysqli_query($con, $query);
    $orderData = mysqli_fetch_array($run);
    if (mysqli_num_rows($run) < 0) {
?>
        <h4>Something went wrong</h4>
    <?php
        die();
    }
} else {
    die();
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <span class="text-white fs-4">View Order</span>
                    <a href="orders.php" class="btn btn-warning float-end"><i class="fa fa-reply"></i> Back</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Delivery Details</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label class="fw-bold">Name</label>
                                    <div class="border p-1">
                                        <?= $orderData['name']; ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="fw-bold">E-mail</label>
                                    <div class="border p-1">
                                        <?= $orderData['email']; ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="fw-bold">Phone Number</label>
                                    <div class="border p-1">
                                        <?= $orderData['phone']; ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="fw-bold">Reference No.</label>
                                    <div class="border p-1">
                                        <?= $orderData['ref_id']; ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="fw-bold">Address</label>
                                    <div class="border p-1">
                                        <?= $orderData['address']; ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="fw-bold">Zip Code</label>
                                    <div class="border p-1">
                                        <?= $orderData['pincode']; ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <h4>Order Details</h4>
                            <hr>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $order_query = "SELECT orders.id, orders.ref_id, orders.user_id, order_info.*, product.* 
                                            FROM orders JOIN order_info JOIN product 
                                            WHERE order_info.order_id=orders.id AND product.p_id = order_info.prod_id 
                                            AND orders.ref_id = '$track_no';";
                                    $order_query_run = mysqli_query($con, $order_query);
                                    if (mysqli_num_rows($order_query_run) > 0) {
                                        foreach ($order_query_run as $item) {
                                    ?>
                                            <tr>
                                                <td class="align-middle">
                                                    <img src="../uploads/<?= $item['p_image']; ?>" width="50px" height="50p" alt="<?= $item['p_title']; ?>">
                                                    <?= $item['p_title'] ?>
                                                </td>
                                                <td class="align-middle">
                                                    <?= $item['price'] ?>
                                                </td>
                                                <td class="align-middle">
                                                    <?= $item['qty'] ?>
                                                </td>
                                            </tr>

                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <hr>
                            <h4>Total Price: <span class="float-end fw-bold">$<?= $orderData['total_price']; ?></span></h4>
                            <hr>
                            <label class="fw-bold">Payment Mode: </label>
                            <div class="border p-1 mb-3">
                                <?= $orderData['payment_mode']; ?>
                            </div>
                            <div>
                            <form action="updateorderstatus.php" method="POST">
                                            <input type="hidden" name="tracking_no" value="<?= $item['ref_id']; ?>">
                                            <select name="order_status" class="form-select">
                                                    <option value="0" <?= $orderData['status'] == 0 ? "selected" : "" ?>>Pending</option>
                                                    <option value="1" <?= $orderData['status'] == 1 ? "selected" : "" ?>>On Progress</option>
                                                    <option value="3" <?= $orderData['status'] == 3 ? "selected" : "" ?>>Cancelled</option>
                                                </select>
                                                <br>
                                            <button type="submit" name="update_order_status_returned" class="btn btn-primary">Update Status</button></td>
                                        </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>



<?php
include('includes/footer.php');

?>