<?php
session_start();

require_once "../assets/php/createDatabase.php";
$database = new CreateDatabase("userAdminForm","users");

if(!empty($_GET["activationCode"]) && isset($_GET["activationCode"])){
  $activationCode = $_GET["activationCode"];
  $database->verificationCode($activationCode);
  header("Location: ./register-and-login.php");
}

?>
