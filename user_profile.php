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
                    <div class="card">
                        <div class="card-header">
                            <h4>My Profile</h4>
                        </div>
                        <?php
                        $userid = $_SESSION['user_id'];
                        $query =  "SELECT * FROM users WHERE id='$userid'";
                        $run = mysqli_query($con,$query);
                        $data = mysqli_fetch_array($run)
                        ?>
                        <div class="card-body">
                            <form action="authcode.php" method="POST">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Fisrt Name</label>
                                    <input type="text" name="fisrtname" class="form-control" value="<?= $data['f_name'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Last Name</label>
                                    <input type="text" name="lastname" class="form-control" value="<?= $data['l_name'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Mobile Number</label>
                                    <input type="phone" name="mobile" pattern="^\+961(78|03|76|71|80|81)\d{6}$" value="<?= $data['phone'] ?>" class="form-control" required placeholder="Enter your mobile number in the following format: +96100000000">

                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">City</label>
                                    <input type="text" name="city" class="form-control" value="<?= $data['city'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control" value="<?= $data['address'] ?>">
                                </div>
                                <button type="submit" name="update_prof_button" class="btn btn-primary">Submit</button>
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