<?php
session_start();

require_once "../assets/php/createDatabase.php";
$database = new CreateDatabase("userAdminForm", "users");

if (!empty($_GET["forgotIdVerification"]) && isset($_GET["forgotIdVerification"])) {
  $forgotIdVerification = $_GET["forgotIdVerification"];
} else {
  header("Location: forgot.php");
}

if (isset($_POST["forgotPasswordBtn"])) {
  $password = $_POST["forgotPassword"];
  $result = $database->forGotPasswordResetPage($forgotIdVerification, $password);
  header("Location: register-and-login.php");
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <title></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <form method="post">
    <div class="form-group">
      <label for="">Password</label>
      <input type="password" class="form-control" name="forgotPassword" placeholder="Password">
    </div>
    <div class="modal-footer">
      <button type="submit" name="forgotPasswordBtn" class="btn btn-primary">Update</button>
    </div>
  </form>
</body>

</html>