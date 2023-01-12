<?php

echo $_SESSION["msg"];

?>

<!doctype html>
<html lang="en">

<head>
  <title>User Login Index</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <div class="container">
      <div class="row">
        <form name="insert" action="profile_config.php" method="post">
          <table width="100%" border="0">
            <tr>
              <th height="62" scope="row">Name </th>
              <td width="71%"><input type="text" name="name" id="name" value="" class="form-control" required /></td>
            </tr>
            <tr>
              <th height="62" scope="row">Email id </th>
              <td width="71%"><input type="email" name="email" id="email" value="" class="form-control" required /></td>
            </tr>
            <tr>
              <th height="62" scope="row">Password </th>
              <td width="71%"><input type="password" name="password" id="password" value="" class="form-control" required /></td>
            </tr>
            <tr>
              <th height="62" scope="row"></th>
              <td width="71%"><input type="submit" name="userRegister" value="Submit" class="btn-group-sm" /> </td>
            </tr>
          </table>
        </form>
      </div>
    </div>

  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>