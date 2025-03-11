<?php
session_start();
require_once '../assets/php/createDatabase.php';
$database = new CreateDatabase("product_database", "product_table");

// TODO Add Product Information Function
if (isset($_POST['addProduct'])) {
  header("location: product_control.php");
  $database->getDataByAdminPage();
} else {
  header("location: product_control.php");
}
if (isset($_POST['DeleteProductbtn'])) {
  $_SESSION['status'] = "User Deleted Successfully";
  header("location: product_control.php");
  $database->deleteProductData();
} else {
  $_SESSION['status'] = "User Deleted Failed";
  header("location: product_control.php");
}

// TODO: Eide Product Information Function
if (isset($_POST['UpdateProduct'])) {
  $product_id = $_POST['product_id'];
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_discount = $_POST['product_discount'];
  $product_description = $_POST['product_description'];
  $target_dir = '../assets/images/products/items/';
  $old_image = $_POST['oldImage'];
  $product_image = $_FILES['product_image']['name'];
  $conn = $database->con;
  
  $database->updateProductData(
    $product_id,
    $product_name,
    $product_description,
    $product_image,
    $product_price,
    $product_discount,
    $old_image,
    $target_dir
  );
}
