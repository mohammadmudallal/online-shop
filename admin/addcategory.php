<?php
session_start();
include('../connect.php');
include('../functions/myfunctions.php');

if (isset($_POST['add_cat_button'])) {
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $desc = $_POST['description'];
    $keyword = $_POST['keyword'];
    $status = isset($_POST['status']) ? '1' : '0';
    $pop = isset($_POST['popular']) ? '1' : '0';

    $image = $_FILES['image']['name'];
    $path = "../uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_ext;

    $query = "INSERT INTO categories (name,slug,description,keyword,status,popular,image) 
    VALUES ('$name','$slug','$desc','$keyword','$status','$pop','$filename')";

    $result = mysqli_query($con, $query);

    if ($result) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
        // header('Location: addcategory_form.php');
        // $_SESSION['message'] = "Category Added Successfully";
        redirect("addcategory_form.php", "Category Added Successfully");
    } else {
        redirect("addcategory_form.php", "Something Went Wrong");
    }
} else if (isset($_POST['update_cat_button'])) {
    $category_id = $_POST['cat_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $desc = $_POST['description'];
    $keyword = $_POST['keyword'];
    $status = isset($_POST['status']) ? '1' : '0';
    $pop = isset($_POST['popular']) ? '1' : '0';

    if (isset($category_id)) {

        $new_image = $_FILES['image']['tmp_name'];
        $old_img = $_POST['old_image'];

        if ($new_image != "") {
            //$update_filename = $new_image;
            $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
            $update_filename = time() . '.' . $image_ext;
        } else {
            $update_filename = $old_img;
        }

        $path = "../uploads";
        $query = "UPDATE categories SET 
    name='$name',slug='$slug',description='$desc',keyword='$keyword',status='$status',popular='$pop',image='$update_filename' 
    WHERE id='$category_id'";

        $res = mysqli_query($con, $query);

        if ($res) {
            if ($_FILES['image']['name'] != "") {
                move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename);
                if (file_exists("../uploads/" . $old_img)) {
                    unlink("../uploads/" . $old_img);
                }
            }
            redirect("editcategory.php?id=$category_id", "Category Updated Successfully");
        } else {
            redirect("editcategory.php?id=$category_id", "Something went wrong");
        }
    }else{
        $_SESSION['message'] = "Select a category";
    }
} else if (isset($_POST['delete_cat_btn'])) {
    $category_id = $_POST['category_id'];
    $cat_query = "SELECT * FROM categories WHERE id='$category_id'";
    $cat_res = mysqli_query($con, $cat_query);
    $cat_data = mysqli_fetch_array($cat_res);
    $img = $cat_data['image'];
    $query = "DELETE FROM categories WHERE id='$category_id'";
    $res = mysqli_query($con, $query);

    if ($res) {
        echo 200;
        //redirect("category.php","Category Deleted Successfully");
    } else {
        echo 500;
        //redirect("category.php","Something Went Wrong");
    }
}
