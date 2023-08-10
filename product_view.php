<?php
session_start();
include('includes/header.php');
include('connect.php');
if (isset($_GET['product'])) {
    $product_keyword = $_GET['product'];
    $q = "SELECT * FROM product WHERE p_keyword='$product_keyword' AND p_status='0' LIMIT 1";
    $r = mysqli_query($con, $q);
    $product = mysqli_fetch_array($r);
    $_SESSION['p_id'] = $product['p_id'];
    if ($product) {
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
                    <a class="text-white" href="products.php">
                        <?= $product['p_title']; ?>
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
                        Collections /
                    </a>
                    <a class="text-white text-decoration-none" href="products.php">
                        <?= $product['p_title']; ?>
                    </a>
                </h6>
            </div>
        </div>

        <div class="py-5 bg-light">
            <div class="container product_data mt-3 bg-white">
                <div class="row">
                    <div class="col-md-4">
                        <div class="shadow mt-3">
                            <img src="uploads/<?= $product['p_image']; ?>" alt="Product Image" class="w-100">
                        </div>

                    </div>
                    <div class="col-md-8">
                        <h4 class="fw-bold mt-3"><?= $product['p_title'] ?></h4>
                        <hr>
                        <h6>Product Short Description: </h6>
                        <p class="text-secondary" style="font-size: smaller;"><?= $product['p_brief_desc'] ?></p>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Selling Price: $ <span class="text-success fw-bold"><?= $product['p_discount_price']; ?></span></h4>
                            </div>
                            <div class="col-md-6">
                                <h5>Original Price: $ <s class="text-danger"><?= $product['p_price']; ?></s></h5>
                            </div>

                        </div><br>
                        <?php
                        if ($product['quantity'] == 0) {
                        ?>
                            <div class="col-md-12">
                                <h4 class="text-center fw-bold text-danger">Product Out of Stock</h4>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="row">
                                <div class="col-md-4" style="width: 160px;">
                                    <div class="input-group mb-3">
                                        <button class="input-group-text decrement-btn">-</button>
                                        <input type="hidden" class="product_qty" value="<?= $product['quantity']; ?>">
                                        <input type="text" class="form-control text-center input-qty bg-white" disabled value="1">
                                        <button class="input-group-text increment-btn">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">

                                    <button type="button" class="btn btn-primary px-4 addToCartBtn" value="<?= $product['p_id']; ?>"> <i class="fa fa-shopping-cart me-2"></i>Add to Cart</button>
                                </div>
                                <div class="col-md-6">
                                    <form action="wishlist.php" method="POST">
                                        <input type="hidden" name="pid" value="<?= $product['p_id'] ?>">
                                        <input type="hidden" name="title" value="<?= $product['p_title'] ?>">
                                        <input type="hidden" name="keyword" value="<?= $product['p_keyword'] ?>">
                                        <input type="hidden" name="image" value="<?= $product['p_image'] ?>">
                                        <input type="hidden" name="price" value="<?= $product['p_discount_price'] ?>">
                                        <button class="btn btn-danger px-4"> <i class="fa fa-heart me-2"></i>Add to Wishlist</button>
                                    </form>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <br>
                        <h6>Product Description: </h6>
                        <p><?= $product['p_desc'] ?></p>
                        
                    </div>
                </div>
                <br>
                <br>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4 text-center m-auto">
                            <h1><span id="avg_rating">0.0</span>/5.0</h1>
                            <div>
                                <i class="fa fa-star star-light main_star mr-1"></i>
                                <i class="fa fa-star star-light main_star mr-1"></i>
                                <i class="fa fa-star star-light main_star mr-1"></i>
                                <i class="fa fa-star star-light main_star mr-1"></i>
                                <i class="fa fa-star star-light main_star mr-1"></i>
                            </div>
                            <span id="total_review">0</span> Reviews
                        </div>
                        <div class="col-sm-4 progressSection">
                            <div class='holder'>
                                <div>
                                    <div class="progess-label-left">
                                        <b>5</b> <i class="fa fa-star mr-1 text-warning"></i>
                                    </div>
                                    <div class="progress-label-right">
                                        <span id="total_five_star_review"> 0 </span> Reviews
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" id="five_star_progress">

                                    </div>
                                </div>
                            </div>
                            <div class="holder">
                                <div>
                                    <div class="progess-label-left">
                                        <b>4</b> <i class="fa fa-star mr-1 text-warning"></i>
                                    </div>
                                    <div class="progress-label-right">
                                        <span id="total_four_star_review"> 0 </span> Reviews
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" id="four_star_progress">

                                    </div>
                                </div>
                            </div>
                            <div class="holder">
                                <div>
                                    <div class="progess-label-left">
                                        <b>3</b> <i class="fa fa-star mr-1 text-warning"></i>
                                    </div>
                                    <div class="progress-label-right">
                                        <span id="total_three_star_review"> 0 </span> Reviews
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" id="three_star_progress">

                                    </div>
                                </div>
                            </div>
                            <div class="holder">
                                <div>
                                    <div class="progess-label-left">
                                        <b>2</b> <i class="fa fa-star mr-1 text-warning"></i>
                                    </div>
                                    <div class="progress-label-right">
                                        <span id="total_two_star_review"> 0 </span> Reviews
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" id="two_star_progress">

                                    </div>
                                </div>
                            </div>
                            <div class="holder">
                                <div>
                                    <div class="progess-label-left">
                                        <b>1</b> <i class="fa fa-star mr-1 text-warning"></i>
                                    </div>
                                    <div class="progress-label-right">
                                        <span id="total_one_star_review"> 0 </span> Reviews
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" id="one_star_progress">

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-4 text-center m-auto">
                            <button class="btn btn-primary" id="add_review"> Add Review </button>
                        </div>
                    </div>
                </div>
                <div id="display_review">

                </div>
            </div>
            <!-- The Modal -->
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Write your Review</h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body text-center">
                            <?php
                            if (isset($_SESSION['auth'])) {
                            ?>
                                <h4>
                                    <i class="fa fa-star star-light submit_star  mr-1 " id='submit_star_1' data-rating='1'></i>
                                    <i class="fa fa-star star-light submit_star  mr-1 " id='submit_star_2' data-rating='2'></i>
                                    <i class="fa fa-star star-light submit_star   mr-1 " id='submit_star_3' data-rating='3'></i>
                                    <i class="fa fa-star star-light submit_star  mr-1 " id='submit_star_4' data-rating='4'></i>
                                    <i class="fa fa-star star-light submit_star  mr-1 " id='submit_star_5' data-rating='5'></i>
                                </h4>
                                <div class="form-group">
                                    <input type="text" class="form-control" id='userEmail' name='userName' placeholder="Enter Email">
                                </div>
                                </br>
                                <div class="form-group">
                                    <textarea name="userMessage" id="userMessage" class="form-control" placeholder="Enter message"></textarea>
                                </div>
                                </br>
                                <div class="form-group">
                                    <button class="btn btn-primary" id='sendReview'>Submit</button>
                                </div>
                                </br>
                            <?php
                            } else {
                                echo "You are not authorized";
                            }
                            ?>

                        </div>

                    </div>
                </div>
            </div>


        </div>

<?php
    } else {
        echo "Product not found";
    }
} else {
    echo "Something Went Wrong";
}
include('includes/footer2.php');
include('includes/footer.php')
?>

<!-- <script>
    function reloadPage(){
        location.reload(true);
    }
</script> -->