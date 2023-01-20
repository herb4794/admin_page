<?php
session_start();

require_once "../www/mailer_controller.php";
$mail = new mailController("userAdminForm","users");

if(!empty($_GET["activationCode"]) && isset($_GET["activationCode"])){
  $activationCode = $_GET["activationCode"];
  $mail->verificationCode($activationCode);
  header("Location: ./register-and-login.php");
}

?>
