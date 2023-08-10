<?php
include('../middleware/adminMiddleware.php');
include('includes/header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Manage Information</h4>
                </div>
                <div class="card-body">
                    <form action="addinfo.php" method="POST" enctype="multipart/form-data">
                        <?php
                        $query = "SELECT * FROM info WHERE id=2";
                        $run = mysqli_query($con,$query);
                        $data = mysqli_fetch_array($run);
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="mb-0" for="">About Us</label>
                                <textarea required name="about_us" style="resize: none;" rows="3" class="form-control mb-2"><?= $data['store_about_us'] ?></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Address</label>
                                <textarea required name="address" style="resize: none;" rows="3" class="form-control mb-2" ><?= $data['store_address'] ?></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Phone Number</label>
                                <input type="text" required name="phone" value="<?= $data['store_phone_number'] ?>" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Email</label>
                                <input type="text" required name="email" value="<?= $data['store_email'] ?>" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Facebook Account</label>
                                <input type="text" required name="fb" value="<?= $data['store_facebook_account'] ?>" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Instagram Account</label>
                                <input type="text" required name="instagram" value="<?= $data['store_instagram_account'] ?>" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Twitter Account</label>
                                <input type="text" required name="twitter" value="<?= $data['store_twitter_account'] ?>" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Location</label>
                                <input type="text" required name="location" value="<?= $data['store_location'] ?>" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" required name="infoBtn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>