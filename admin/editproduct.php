<?php
include('../middleware/adminMiddleware.php');
include('includes/header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            //echo "connected";
            if (isset($_GET['p_id'])) {
                $id = $_GET['p_id'];
                $query = "SELECT * FROM product WHERE p_id=$id";
                $res = mysqli_query($con, $query);
                if (mysqli_num_rows($res) > 0) {
                    $data = mysqli_fetch_array($res);
            ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Product</h4>
                        </div>
                        <div class="card-body">
                            <form action="addproduct.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" name="p_id" value="<?= $data['p_id']; ?>">
                                        <label class="mb-0" for="">Select Category</label>
                                        <select required name="cat_id" class="form-select mb-2">
                                            <option selected>Select Category</option>
                                            <?php
                                            $categories = getAll("categories");
                                            if (mysqli_num_rows($categories) > 0) {
                                                foreach ($categories as $item) {
                                            ?>
                                                    <option value="<?= $item['id']; ?>"><?= $item['name'] ?></option>

                                            <?php
                                                }
                                            } else {
                                                echo "No category available";
                                            }

                                            ?>


                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0" for="">Title</label>
                                        <input type="text" value="<?= $data['p_title']; ?>" required name="title" placeholder="Enter Product Title" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0" for="">Brand</label>
                                        <input type="text" value="<?= $data['p_brand']; ?>" required name="brand" placeholder="Enter Brand Name" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="">Short Description</label>
                                        <textarea required name="brief_desc" style="resize: none;" rows="3" class="form-control mb-2" placeholder="Enter Description"> <?= $data['p_brief_desc']; ?> </textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="">Description</label>
                                        <textarea required name="description" style="resize: none;" rows="3" class="form-control mb-2" placeholder="Enter Description"> <?= $data['p_desc']; ?> </textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="">Upload Image</label>
                                        <input type="file" required name="image" class="form-control mb-2">
                                        <label for="">Current Image</label>
                                        <input type="hidden" name="old_image" value="<?= $data['p_image'] ?>">
                                        <img src="../uploads/<?= $data['p_image'] ?>" height="50px" width="50px" alt="">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0" for="">Price</label>
                                        <input type="text" value="<?= $data['p_price']; ?>" required name="price" placeholder="Enter Product Price" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0" for="">Price After Discount</label>
                                        <input type="text" value="<?= $data['p_discount_price']; ?>" required name="disc_price" placeholder="Enter New Price" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="">Quantity</label>
                                        <input type="number" value="<?= $data['quantity']; ?>" required name="qty" placeholder="Enter Quantity" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="">Keyword</label>
                                        <input type="text" value="<?= $data['p_keyword']; ?>" required name="keyword" placeholder="Enter Keyword" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Status</label>
                                        <input type="checkbox" <?= $data['p_status'] ? "Checked" : ""; ?> name="status">
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary" required name="update_product_button">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            <?php
                } else {
                    echo "Product not found for given id";
                }
            } else {
                echo "Id missing from url";
            }
            ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>