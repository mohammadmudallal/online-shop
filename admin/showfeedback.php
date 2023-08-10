<?php
include('../middleware/adminMiddleware.php');
include('includes/header.php');
include('../connect.php');
if(isset($_GET['id'])){
    $userid = $_GET['id'];
}
?>


<div class="py-5">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>My Profile</h4>
                        </div>
                        <?php
                        $query = "SELECT users.*,feedbacks.feedback FROM users JOIN feedbacks 
                       WHERE users.id=feedbacks.user_id AND users.id='$userid';";
                        $run = mysqli_query($con, $query);
                        $data = mysqli_fetch_array($run)
                        ?>
                        <div class="card-body">

                            <div class="mb-3">
                                <label class="fw-bold">First Name</label>
                                <div class="border p-1 ">
                                    <?= $data['f_name']; ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">Last Name</label>
                                <div class="border p-1 ">
                                    <?= $data['l_name']; ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">Email Address</label>
                                <div class="border p-1 ">
                                    <?= $data['email']; ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">Address</label>
                                <div class="border p-1 ">
                                    <?= $data['city'].", ".$data['address']; ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">Feedback</label>
                                <div class="border p-1 ">
                                    <?= $data['feedback']; ?>
                                </div>
                            </div>
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