<!DOCTYPE html>
<html lang="en">

<head>
  <title></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <form name="insert" action="" method="post">

    <table width="100%" border="0">
      <tr>
        <td colspan="2">
          <font color="#FF0000"><?php echo $_SESSION['action1']; ?><?php echo $_SESSION['action1'] = ""; ?></font>
        </td>

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

        <td width="71%"><input type="submit" name="login" value="Submit" class="btn-group-sm" /> </td>
      </tr>
    </table>
  </form>
</body>

</html>