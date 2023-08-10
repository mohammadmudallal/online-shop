<?php
include('../middleware/adminMiddleware.php');
include('includes/header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Product</h4>
                </div>
                <div class="card-body">
                    <form action="addproduct.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="mb-0" for="">Select Category</label>
                                <select name="cat_id" class="form-select mb-2" required>
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
                                <input type="text" required name="title" placeholder="Enter Product Title" class="form-control mb-2">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="">Brand</label>
                                <input type="text" required name="brand" placeholder="Enter Brand Name" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Brief Description</label>
                                <textarea required name="brief_desc" style="resize: none;" rows="3" class="form-control mb-2" placeholder="Enter Brief Description"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Description</label>
                                <textarea required name="description" style="resize: none;" rows="3" class="form-control mb-2" placeholder="Enter Description"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Upload Image</label>
                                <input type="file" required name="image" class="form-control mb-2">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="">Price</label>
                                <input type="text" required name="price" placeholder="Enter Product Price" class="form-control mb-2">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="">Price After Discount</label>
                                <input type="text" required name="disc_price" placeholder="Enter New Price" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Quantity</label>
                                <input type="number" required name="qty" placeholder="Enter Quantity" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Keyword</label>
                                <input type="text" required name="keyword" placeholder="Enter Keyword" class="form-control mb-2">
                            </div>
                            <div class="col-md-6">
                                <label for="">Status</label>
                                <input type="checkbox" name="status">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" required name="add_product_button">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>