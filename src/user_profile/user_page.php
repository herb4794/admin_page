<?php

session_start();

require_once "../assets/php/createDatabase.php";

$database = new CreateDatabase("userAdminForm", "users");

$user_name = $_SESSION["user_name"];
$result = $database->userProfile($user_name);

if (!isset($user_name)) {
  header("Location: ../User_interface/includes/error.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>user page</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">


</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <div class="container text-center">
      <h1 class="title"><span>user</span>profile page</h1>
      <section class="profile-container">

        <div class="profile">
          <img class="rounded-circle w-25 p-3 shadow-sm mb-2 bg-body" src="<?= $result['image']; ?> ?>" style="left: 90px;" alt="">
          <h3><?php echo $result['email']; ?></h3>
          <span class="info"></span>
        </div>


      </section>
    </div>
  </main>


  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <script src="user.js"></script>
</body>

</html>