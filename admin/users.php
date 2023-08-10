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
                    <h4 class="text-white">Users</h4>
                </div>
                <div class="m-3 mb-0">
                    <h4>
                        Regular Users
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">Username</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Phone Number</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Number Of Orders</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT users.*,COUNT(*) AS nbOfOrders FROM `orders` JOIN users 
                            WHERE orders.user_id=users.id GROUP BY users.id;
                            ";
                            $run = mysqli_query($con, $query);
                            if (mysqli_num_rows($run) > 0) {
                                foreach ($run as $item) {
                            ?>
                                    <tr>
                                        <td class="text-center"><?= $item['f_name'] . " " . $item['l_name']; ?></td>
                                        <td class="text-center"><?= $item['email']; ?></td>
                                        <td class="text-center"><?= $item['phone']; ?></td>
                                        <td class="text-center"><?= $item['city'] . ", " . $item['address']; ?></td>
                                        <td class="text-center"><?= $item['nbOfOrders']; ?></td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6">No Users Yet</td>

                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">Username</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Feedback</th>
                            </tr>
                        </thead>
                        <br>
                        <br>
                        <div class="m-3 mb-0">
                            <h4>
                                Users' Feedback
                            </h4>
                        </div>
                        <tbody>
                            <?php
                            $query = "SELECT users.*,feedbacks.feedback FROM users JOIN feedbacks 
                            WHERE users.id=feedbacks.user_id; ";
                            $run = mysqli_query($con, $query);
                            if (mysqli_num_rows($run) > 0) {
                                foreach ($run as $item) {
                            ?>
                                    <tr>
                                        <td class="text-center"><?= $item['f_name'] . " " . $item['l_name']; ?></td>
                                        <td class="text-center"><?= $item['email']; ?></td>
                                        <td class="text-center"> <a class="btn btn-primary" href="showfeedback.php?id=<?= $item['id']; ?>">Show Feedback</a></td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6">No Users Yet</td>

                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">Username</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Phone Number</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Number Of Delivered Orders</th>
                            </tr>
                        </thead>
                        <br>
                        <br>
                        <div class="m-3 mb-0">
                            <h4>
                                Delivery Users
                            </h4>
                        </div>
                        <tbody>
                            <?php
                            $query = "SELECT users.*,COUNT(*) AS nbOfDeliveredOrders FROM `orders` JOIN users 
                            WHERE users.type='delivery' AND (orders.deliveredBy=users.id) 
                            GROUP BY users.id;";
                            $run = mysqli_query($con, $query);
                            if (mysqli_num_rows($run) > 0) {
                                foreach ($run as $item) {
                            ?>
                                    <tr>
                                        <td class="text-center"><?= $item['f_name'] . " " . $item['l_name']; ?></td>
                                        <td class="text-center"><?= $item['email']; ?></td>
                                        <td class="text-center"><?= $item['phone']; ?></td>
                                        <td class="text-center"><?= $item['city'] . ", " . $item['address']; ?></td>
                                        <td class="text-center"><?= $item['nbOfDeliveredOrders']; ?></td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6">No Users Yet</td>

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