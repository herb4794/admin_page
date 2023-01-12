<?php 
session_start();
require_once "createDatabase.php";

$database = new createDatabase("userAdminForm", "users");

if(isset($_POST["forgot-username-btn"])){
  $name = $_POST["forgot-username"];
  $result = $database->forgotPassword($name);
  $_SESSION["forgotPassword"] = $result['password'];
  header("location: ../../www/forgot.php");
}
?>