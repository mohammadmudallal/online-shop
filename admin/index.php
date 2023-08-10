<?php
include('../middleware/adminMiddleware.php');
include('includes/header.php');
include('../connect.php');
//echo strrpos($_SERVER['SCRIPT_NAME'],"/")
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row mt-4">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <?php
                        $query = "SELECT COUNT(*) AS orders FROM `orders`;";
                        $run = mysqli_query($con, $query);
                        $data = mysqli_fetch_array($run)
                        ?>
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-secondary shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                                <i class="fa fa-table"></i>
                            </div>
                            <div class="text-end pt-1">
                                <h3 class="mb-0 text-capitalize fw-bold">Orders</h3>
                                <h4 class="mb-0"><?= $data['orders'] ?></h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="text-white"> Orders</p>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <?php
                        $query_users = "SELECT COUNT(*) AS users FROM `users` WHERE type='user';";
                        $run_users = mysqli_query($con, $query_users);
                        $data_users = mysqli_fetch_array($run_users)
                        ?>
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-success shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                                <i class="fa fa-user-o"></i>
                            </div>
                            <div class="text-end pt-1">
                                <h3 class="mb-0 text-capitalize fw-bold">Users</h3>
                                <h4 class="mb-0"><?= $data_users['users'] ?></h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="text-white"> Users</p>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <?php
                        $query_categories = "SELECT COUNT(*) AS categories FROM `categories`";
                        $run_categories = mysqli_query($con, $query_categories);
                        $data_categories = mysqli_fetch_array($run_categories)
                        ?>
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-warning shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                                <i class="fa fa-list-alt"></i>
                            </div>
                            <div class="text-end pt-1">
                                <h3 class="mb-0 text-capitalize fw-bold">Categories</h3>
                                <h4 class="mb-0"><?= $data_categories['categories'] ?></h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="text-white"> Users</p>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <?php
                        $query_products = "SELECT COUNT(*) AS products FROM `product`";
                        $run_products = mysqli_query($con, $query_products);
                        $data_products = mysqli_fetch_array($run_products)
                        ?>
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-info shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                                <i class="fa fa-mobile"></i>
                            </div>
                            <div class="text-end pt-1">
                                <h3 class="mb-0 text-capitalize fw-bold">Products</h3>
                                <h4 class="mb-0"><?= $data_products['products'] ?></h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="text-white"> Users</p>
                        </div>

                    </div>
                </div>
                <div class="col-xl-6 mb-xl-0 mb-4 mt-5">
                    <h3>More Details</h3>
                    <hr class="bg-dark">
                </div>
                <div class="col-xl-6 mb-xl-0 mb-4 mt-5">
                    <h3>Category Details</h3>
                    <hr class="bg-dark">
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 mt-4">
                    <div class="card">
                        <?php
                        $query_total = "SELECT SUM(total_price) AS price FROM `orders` WHERE status = 2;";
                        $run_total = mysqli_query($con, $query_total);
                        $data_total = mysqli_fetch_array($run_total);
                        $query_paid = "SELECT COUNT(*) AS paidOrders FROM orders WHERE status=2";
                        $run_paid = mysqli_query($con, $query_paid);
                        $data_paid = mysqli_fetch_array($run_paid);
                        ?>
                        <div class="card-header p-3 pt-2">
                            <div class="pt-1">
                                <h3 class="mb-0 text-capitalize fw-bold">Paid Orders</h3>
                                <h4 class="mb-0"><?= $data_paid['paidOrders'] ?></h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="text-dark fw-bold"> Total Price:</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-dark fw-bold float-end"> <span class="text-success">+$<?= $data_total['price'] ?></span></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 mt-4">
                    <div class="card">
                        <?php
                        $query_total_returned = "SELECT SUM(total_price) AS price FROM `orders` WHERE status = 3;";
                        $run_total_returned = mysqli_query($con, $query_total_returned);
                        $data_total_returned = mysqli_fetch_array($run_total_returned);
                        $query_paid_returned = "SELECT COUNT(*) AS paidOrders FROM orders WHERE status=3";
                        $run_paid_returned = mysqli_query($con, $query_paid_returned);
                        $data_paid_returned = mysqli_fetch_array($run_paid_returned);
                        ?>
                        <div class="card-header p-3 pt-2">
                            <div class="pt-1">
                                <h3 class="mb-0 text-capitalize fw-bold">Returned Orders</h3>
                                <h4 class="mb-0"><?= $data_paid_returned['paidOrders'] ?></h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="text-dark fw-bold"> Users:</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-dark fw-bold float-end"> <span class="text-danger">-$<?= $data_total_returned['price'] ?></span></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4 mt-4">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Number of Products</th>
                            </tr>
                        </thead>
                        <?php
                        $table = "SELECT categories.name,COUNT(product.cat_id) AS count FROM `product` INNER JOIN categories
                         WHERE product.cat_id=categories.id GROUP BY categories.name;";
                        $run_table = mysqli_query($con, $table);
                        if (mysqli_num_rows($run_table) > 0) {
                            foreach ($run_table as $value) {

                        ?>
                                <tbody>
                                    <tr>
                                        <td><?= $value['name'] ?></td>
                                        <td><?= $value['count'] ?></td>
                                    </tr>
                                </tbody>
                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>