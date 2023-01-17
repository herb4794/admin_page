<?php
session_start();
require_once "mailer_controller.php";
require_once "../assets/php/createDatabase.php";
// $database = new CreateDatabase("userAdminForm", "users");
$mail = new mailController("userAdminForm","users");

if (isset($_POST["forgot-username-btn"])) {
  $email = $_POST["forgot-username"];
  // $name = $database->userProfile($email);
  $result = $mail->getUserProfile($email);
  $result = $mail->forGotPassword($email,$name['name']);
  $_SESSION["forgotPassword"] = $result['email'];  
  header("location: forgot.php");
}else{
  $_SESSION["forgotPassword"]= "Senting Error";
}

?>
