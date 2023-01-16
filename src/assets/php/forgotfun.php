<?php
session_start();
require_once "createDatabase.php";
$database = new createDatabase("userAdminForm", "users");

if (isset($_POST["forgot-username-btn"])) {
  $email = $_POST["forgot-username"];
  $name = $database->userProfile( $email);
  $result = $database->forgotPassword($email,$name['name']);
  $_SESSION["forgotPassword"] = $result['email'];
  header("location: ../../www/forgot.php");
}
