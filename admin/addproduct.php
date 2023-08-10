<?php
session_start();
include('../connect.php');
include('../functions/myfunctions.php');

if (isset($_POST['add_product_button'])) {
    try {
        $category_id = $_POST['cat_id'];
        $title = $_POST['title'];
        $brand = $_POST['brand'];
        $brief_desc = $_POST['brief_desc'];
        $desc = $_POST['description'];
        $price = $_POST['price'];
        $disc_price = $_POST['disc_price'];
        $quantity = $_POST['qty'];
        $keyword = $_POST['keyword'];
        $status = isset($_POST['status']) ? '1' : '0';


        $image = $_FILES['image']['name'];
        $path = "../uploads";
        $image_ext = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time() . '.' . $image_ext;

        if ($title != "" && $quantity != "" && $price != "") {
            $query = "INSERT INTO product (p_title,cat_id,p_brand
        ,p_desc,p_brief_desc,p_price,p_discount_price,p_image,quantity,p_keyword,p_status)
         VALUES ('$title','$category_id','$brand',\"$desc\",\"$brief_desc\",'$price',
        '$disc_price','$filename','$quantity','$keyword','$status')";

            $res = mysqli_query($con, $query);

            if ($res) {

                $id = mysqli_insert_id($con);
                $insert_cat = "INSERT INTO prod_cat (productid,category_id) VALUES ('$id','$category_id')";
                $run = mysqli_query($con, $insert_cat);
                if ($run) {
                    move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
                    redirect("addproduct_form.php", "Product Added Successfully");
                }
            } else {
                redirect("addproduct_form.php", "Something went wrong");
            }
        } else {
            redirect("addproduct_form.php", "All Fields Are Mandatory!");
        }
    } catch (\Throwable $th) {
        redirect("addproduct_form.php", "Select a category!");
    }
} else if (isset($_POST['update_product_button'])) {
    $product_id = $_POST['p_id'];
    $category_id = $_POST['cat_id'];
    $title = $_POST['title'];
    $brand = $_POST['brand'];
    $brief_desc = $_POST['brief_desc'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $disc_price = $_POST['disc_price'];
    $quantity = $_POST['qty'];
    $keyword = $_POST['keyword'];
    $status = isset($_POST['status']) ? '1' : '0';

    $new_image = $_FILES['image']['name'];
    $old_img = $_POST['old_image'];

    if ($new_image != "") {
        //$update_filename = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time() . '.' . $image_ext;
    } else {
        $update_filename = $old_img;
    }

    $path = "../uploads";

    $query = "UPDATE product SET p_title='$title',cat_id='$category_id',
    p_brand='$brand',p_desc=\"$desc\",p_brief_desc=\"$brief_desc\",p_price='$price',p_discount_price='$disc_price',
    p_image='$update_filename',quantity='$quantity',p_keyword='$keyword',p_status='$status' WHERE p_id='$product_id'";

    $res = mysqli_query($con, $query);
    if ($res) {
        if ($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename);
            if (file_exists("../uploads/" . $old_img)) {
                unlink("../uploads/" . $old_img);
            }
        }
        redirect("editproduct.php?p_id=$product_id", "Product Updated Successfully");
    } else {
        redirect("editcategory.php?p_id=$product_id", "Something went wrong");
    }
} else if (isset($_POST['delete_product_btn'])) {
    $product_id = $_POST['product_id'];
    $fetch_query = "SELECT * FROM product WHERE p_id='$product_id'";
    $res = mysqli_query($con, $fetch_query);
    $data = mysqli_fetch_array($res);
    $img = $data['p_image'];
    $del_query = "DELETE FROM product WHERE p_id='$product_id'";
    $del_res = mysqli_query($con, $del_query);
    if ($res) {
        if (file_exists("../uploads/" . $img)) {
            unlink("../uploads/" . $img);
        }
        // redirect("category.php","Product Deleted Successfully");
        echo 200;
    } else {
        //redirect("category.php","Something Went Wrong");
        echo 500;
    }
}
