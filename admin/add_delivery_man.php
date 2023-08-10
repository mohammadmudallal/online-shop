<?php
include('includes/header.php');
include('../connect.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Add Delivery
                    </h4>
                </div>
                <div class="card-body">
                    <form action="deliverycode.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="mb-0" for="">First Name</label>
                                <input type="text" required name="fname" placeholder="Enter first name" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Last Name</label>
                                <input type="text" required name="lname" placeholder="Enter last name" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Email</label>
                                <input type="email" required name="email" placeholder="Enter email" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Password</label>
                                <input type="password" required name="pass" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" placeholder="Enter password" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Confrim Password</label>
                                <input type="password" required name="confirmpass" placeholder="Re-enter password" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">City</label>
                                <input type="text" required name="city" placeholder="Enter city" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Address</label>
                                <input type="text" required name="address" placeholder="Enter address" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Phone Number</label>
                                <input type="phone" name="mobile" pattern="^\+961(78|03|76|71|80|81)\d{6}$" class="form-control" required placeholder="Enter mobile number in the following format: +96100000000">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mt-2" required name="addDeliveryBtn">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>