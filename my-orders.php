<?php
session_start();
include('includes/header.php');
// include('functions/myfunctions.php');
include('connect.php');

?>
<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-whites">
            <a class="text-white" href="index.php">
                Home /
            </a>
            <a class="text-white" href="my-orders.php">
                My Orders
            </a>
        </h6>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Reference Number</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Price</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $userId = $_SESSION['user_id'];
                            $query = "SELECT * FROM orders WHERE user_id='$userId'";
                            $run = mysqli_query($con, $query);
                            if (mysqli_num_rows($run) > 0) {
                                foreach ($run as $item) {
                            ?>
                                    <tr>
                                        <td><?= $item['ref_id']; ?></td>
                                        <td><?= $item['email']; ?></td>
                                        <td><?= $item['phone']; ?></td>
                                        <td><?= $item['total_price']; ?></td>
                                        <td><?= $item['craetedAt']; ?></td>
                                        <td>
                                            <a href="view-order.php?t=<?= $item['ref_id']; ?>" class="btn btn-primary">View Details</a>
                                        </td>
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

                </div>
            </div>
        </div>
    </div>
</div>



<?php include('includes/footer.php') ?>