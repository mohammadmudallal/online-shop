<?php
session_start();
include('includes/header.php');
include('connect.php');
?>
<div class="py-3 bg-warning">
            <div class="container">
                <h6 class="text-whites">
                    <a class="text-white" href="index.php">
                        Home /
                    </a>
                    <a class="text-white" href="categories.php">
                        Collections /
                    </a>
                </h6>
            </div>
        </div>
        <div class="py-3 bg-warning">
            <div class="container">
                <h6 class="text-whites">
                    <a class="text-white text-decoration-none" href="index.php">
                        Home /
                    </a>
                    <a class="text-white text-decoration-none" href="categories.php">
                        Collections 
                    </a>
                </h6>
            </div>
        </div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Our Collections</h1>
                <hr>
                <div class="row">
                <?php  
                 $query = "SELECT * FROM categories WHERE status='0'";
                 $res = mysqli_query($con,$query);
                 //$categories = mysqli_fetch_array($res);
                 if(mysqli_num_rows($res) > 0){
                    foreach($res as $item){
                        ?>
                        <div class="col-md-4">
                                <div class="card rounded-5 shadow mt-4">
                                    <div class="card-header rounded-top-5 bg-secondary">
                                        <h5 class="text-white text-center"><?= $item['name'] ?></h5>
                                    </div>
                                    <div class="card-body rounded-bottom-5">
                                        <a href="products.php?category=<?= $item['slug']; ?>">
                                            <center>
                                                <img src="uploads/<?= $item['image'] ?>" class="m-4" alt="" height="170px" width="170px">
                                            </center>
                                        </a>
                                    </div>

                                </div>
                            </div>                     
                        <?php
                    }
                 }else{
                    echo "No data available";
                 }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php 
include('includes/footer2.php');
include('includes/footer.php') ?>