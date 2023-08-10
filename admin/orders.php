<?php

include('../middleware/adminMiddleware.php');
include('includes/header.php');
include('../connect.php');

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Orders</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Reference No.</th>
                                <th>Phone Number</th>
                                <th>Total Price</th>
                                <th>Date</th>
                                <th>View Order Details</th>
                                <th>Status</th>
                                <th>UpdateStatus</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM orders WHERE status='0' OR status='1'";
                            $run = mysqli_query($con, $query);
                            if (mysqli_num_rows($run) > 0) {
                                foreach ($run as $item) {
                            ?>
                                    <tr>
                                        <td><?= $item['ref_id']; ?></td>
                                        <td><?= $item['phone']; ?></td>
                                        <td>$<?= $item['total_price']; ?></td>
                                        <td><?= $item['craetedAt']; ?></td>
                                        <td>
                                            <a href="view-order.php?t=<?= $item['ref_id']; ?>" class="btn btn-primary">View Details</a>
                                        </td>

                                        <form action="updateorderstatus.php" method="POST">
                                            <input type="hidden" name="tracking_no" value="<?= $item['ref_id']; ?>">
                                            <td><select name="order_status" class="form-select">
                                                    <option value="0" <?= $item['status'] == 0 ? "selected" : "" ?>>Pending</option>
                                                    <option value="1" <?= $item['status'] == 1 ? "selected" : "" ?>>On Progress</option>
                                                    <option value="3" <?= $item['status'] == 3 ? "selected" : "" ?>>Cancelled</option>
                                                </select></td>
                                            <td><button type="submit" name="update_order_status" class="btn btn-primary">Update Status</button></td>
                                        </form>


                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6">No Orders Yet</td>

                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                    <a href="order-history.php" class="btn btn-warning float-end"> Order History</a>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include('includes/footer.php') ?>