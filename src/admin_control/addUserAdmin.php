<?php
session_start();
@include('connect.php');

if (isset($_POST['adminAddUser'])) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];
  $user_type = $_POST['user_type'];

  if ($password == $confirmPassword) {

    $checkEmail = "SELECT * FROM users WHERE email='$email' ";
    $checkEmail_query = mysqli_query($conn, $checkEmail);

    if (mysqli_num_rows($checkEmail_query) > 0) {
      $_SESSION['status'] = "Eamil id is already taken.!";
      header("location: registered.php");
    } else {
      $user_query = "INSERT INTO users (name ,password ,email ,phone ,user_type)
    VALUES ('$name', '$password', '$email' ,'$phone' ,'$user_type')";
      $user_query_run = mysqli_query($conn, $user_query);

    }

    if ($user_query_run) {
      $_SESSION['status'] = "User Added Successfully";
      header('location: registered.php');
    } else {
      $_SESSION['status'] = "User Registration Failed";
      header("location: registered.php");
    }
  } else {
    $_SESSION['status'] = "Password and Confirm Password is not match";
    header("location: registered.php");
  }
}

?>