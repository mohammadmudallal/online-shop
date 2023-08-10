<?php
session_start();
include('connect.php');
include('profileheader.php');
?>


<div class="py-5" id="#myorders">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Reference No.</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $userId = $_SESSION['user_id'];
                            $query = "SELECT * FROM orders WHERE user_id='$userId' ORDER BY status ASC";
                            $run = mysqli_query($con, $query);
                            if (mysqli_num_rows($run) > 0) {
                                foreach ($run as $item) {
                            ?>
                                    <tr>
                                        <td><?= $item['ref_id']; ?></td>
                                        <td><?= $item['email']; ?></td>
                                        <td><?= $item['phone']; ?></td>
                                        <td>$<?= $item['total_price']; ?></td>
                                        <td>
                                            <?php
                                            if($item['status']==0) echo "pending";
                                            if($item['status']==1) echo "On progress";
                                            if($item['status']==2) echo "Delivered";
                                            if($item['status']==3) echo "Cancelled";
                                            ?>
                                        </td>
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

</div>
</div>

<?php
include('includes/footer.php');
?>
<script>
    $(".sidebar ul li").on('click', function() {
        $(".sidebar ul li.active").removeClass('active');
        $(this).addClass('active');
        $('open-btn').on('click', function() {
            $('.sidebar').addClass('active');
        });
        $('close-btn').on('click', function() {
            $('.sidebar').removeClass('active');
        });
    });
</script>