<?php 

$serverName = "localhost";
$userName = "root";
$password = "root";
$databaseName = "userAdminForm";
$conn = mysqli_connect($serverName, $userName, $password, $databaseName);

if(!$conn){
  header("location: ../admin_control/error.php");
  die();
}

?>
