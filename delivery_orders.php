<?php
session_start();
include('connect.php');
if (isset($_SESSION['auth'])) {
    if ($_SESSION['user_type'] == "delivery") {


?>

        <!doctype html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Senior Project</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
            <link href="assets/css/bootstrap.min.css" rel="stylesheet">
            <link href="assets/css/custom.css" rel="stylesheet">
            <link href="assets/css/owl.theme.default.min.css" rel="stylesheet">
            <link href="assets/css/owl.carousel.min.css" rel="stylesheet">
            <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
            <!-- Bootstrap theme -->
            <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
        </head>

        <body>

            <nav class="navbar navbar-expand-lg bg-dark fixed-top">
                <div class="container">
                    <?php
                    if (isset($_SESSION['auth'])) {
                    ?>
                        <a class="navbar-brand text-white" href="#"><?php echo "Hello" . " " . $_SESSION['auth_user']['name'] . "!"; ?></a>
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active text-white" aria-current="page" href="logout.php">Logout</a>
                            </li>
                        </ul>
                    <?php
                    }
                    ?>
                </div>
            </nav>

            <div class="container mt-5 pt-5">
                <div class="table-responsive">
                
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Phone Number</th>
                                <th>Total Price</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Approve Order</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM orders WHERE status!='0' AND status !='3'  ORDER BY status ASC";
                            $run = mysqli_query($con, $query);
                            if (mysqli_num_rows($run) > 0) {
                                foreach ($run as $item) {
                            ?>
                                    <tr>
                                        <td><?= $item['id']; ?></td>
                                        <td><?= $item['phone']; ?></td>
                                        <td>$<?= $item['total_price']; ?></td>
                                        <td><?= $item['craetedAt']; ?></td>
                                        <td>
                                            <?php
                                            if ($item['status'] == 1) {
                                                echo "On progress";
                                            } else if ($item['status'] == 2) {
                                                echo "Delivered";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <form action="update_status.php" method="POST">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <input type="hidden" name="order_id" value="<?= $item['id']; ?>">
                                                            <?php if ($item['status'] == 1) { ?>
                                                                <input type="text" name="ref_no" class="form-control" required placeholder="Enter Refernece No."> <br>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <button class="btn btn-primary w-100" name="updateStatus">Activate</button>
                                                        </div>
                                                    <?php
                                                            } else {
                                                    ?>
                                                        <div>
                                                            <h5>This order has been delivered</h5>
                                                        </div>
                                                    <?php
                                                            }
                                                    ?>
                                                    </div>
                                                </div>

                                            </form>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>

    <?php
    }
} else {
    header('Location: index.php');
}
    ?>

    <?php include('includes/footer.php'); ?>