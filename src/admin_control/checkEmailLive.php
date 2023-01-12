<?php
@include 'connect.php';

if (isset($_POST['checkEmailButton'])) {
  $email = $_POST['email'];

  $checkEmail = "SELECT * FROM users WHERE email = '$email' ";
  $checkEmail_run = mysqli_query($conn, $checkEmail);

  if (mysqli_num_rows($checkEmail_run) > 0) {
    echo "Email id already taken.!";
  } else {
    echo "It's Available";
  }
}
?>