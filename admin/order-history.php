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
                    <h4 class="text-white">Orders
                    <a href="orders.php" class="btn btn-warning float-end">Back</a>
                    </h4>
                    
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Reference Number</th>
                                <th>Total Price</th>
                                <th>status</th>
                                <th>Comment</th>
                                <th>Deliverd By</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM orders JOIN users 
                            WHERE status!='0' AND (orders.deliveredBy=users.id) AND users.type = 'delivery' 
                            ORDER BY status ASC;";
                            $run = mysqli_query($con, $query);
                            if (mysqli_num_rows($run) > 0) {
                                foreach ($run as $item) {
                            ?>
                                    <tr>
                                        <td><?= $item['ref_id']; ?></td>
                                        <td>$<?= $item['total_price']; ?></td>
                                        <td><?php
                                         if($item['status'] == '2'){
                                            echo "Paid";
                                         } else if($item['status'] =='3'){
                                            echo "Returned";
                                         }
                                         ?></td>
                                         <td><?= $item['comments'] ?></td>
                                         <td>
                                         <?= $item['f_name']." ".$item['l_name'] ; ?>
                                         </td>
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