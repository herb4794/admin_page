<?php
session_start();
@include('connect.php');
@include('../assets/php/createDatabase.php');
require_once '../www/mailer_controller.php';
$database = new CreateDatabase("userAdminForm", "users");
$mail = new mailController("userAdminForm", "users");

// TODO Delete User Information Function
if (isset($_POST['DeleteUserbtn'])) {
  $_SESSION['status'] = "User Deleted Successfully";
  header("location: registered.php");
  $database->deleteUserData();
} else {
  $_SESSION['status'] = "User Deleted Failed";
  header("location: registered.php");
}

if (isset($_POST['addUser'])) {
  $mail->createUser();
}


// TODO Eide User Information Function
if (isset($_POST['UpdateUser'])) {
  $user_id = $_POST['user_id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $user_type = $_POST['user_type'];
  $target_dir = "../assets/images/products/items/";
  $user_image = $target_dir . basename($_FILES["user_image"]['name']);

  $query = "UPDATE users SET name='$name',
    email='$email', phone='$phone',
    password='$password',user_type='$user_type',
    image='$user_image' WHERE id='$user_id'";

  $query_run = mysqli_query($conn, $query);

  if ($query_run) {
    move_uploaded_file($_FILES["user_image"]['tmp_name'], $user_image);
    $_SESSION['status'] = "User Updated Successfully";
    header("location: registered.php");
  } else {
    $_SESSION['status'] = "User Updating Failed";
    header("location: registered.php");
  }
}
// TODO Register User Function
if (isset($_POST['submits'])) {
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $user_type = $_POST['user_type'];
  $configPassword = $_POST['confirmPassword'];

  $select = "SELECT * FROM users WHERE email = '$email' or name = '$name'";

  $results = mysqli_query($conn, $select);

  if (mysqli_num_rows($results) == 1) {
    $_SESSION['status'] = "user is exist!";
    header("location: ../www/register.php");
  }
  if ($configPassword != $password) {
    $_SESSION['status'] = "password incorrect!";
    header("location: ../www/register.php");
  }
  if (mysqli_num_rows($results) == 0) {
    $user_query = "INSERT INTO users (name ,password ,email ,phone ,user_type)
    VALUES ('$name', '$password', '$email' ,'$phone' ,'$user_type')";
    $query_run = mysqli_query($conn, $user_query);
    $_SESSION['status'] = "User Added Successfully";
    header("location: ../www/login.php");
  } else {
    header("location: ../www/register.php");
  }
}

// TODO Login Function
if (isset($_POST['login'])) {
  $database->loginMethod();
}
