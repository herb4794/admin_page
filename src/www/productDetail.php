<?php
session_start();
require_once '../assets/php/createDatabase.php';
$productArr;
$database = new createDatabase("product_database", "product_table");
$product_id;
$_POST['product_id'];

if (isset($_POST['goBack'])) {
    $productArr = [];
   $_POST = array();
    header("location: ../www/index.php");
}


if (isset($_POST['add'])) {
    $product_id = $_POST['product_id'];
};

$result = $database->getData();


while ($row = $result->fetch()) {
    foreach ($row as $id) {
        if ($id == $product_id) {
            $productArr = array(
            'product_id' => $id,
              'product_name' => $row['product_name'],
              'product_description' => $row['product_description'],
              'product_price' => $row['product_discount'],
            );
        }
    }
}


?>
<html>

  <head>
    <title>Product Detail</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../assets/css/productDetail.css" />
  </head>

  <body>

    <form  method="post" class="card">
      <h1><?php echo $productArr['product_description'] ?></h1>
      <p class="price"><?php echo $productArr['product_price'] ?></p>
      <p><?php echo $productArr['product_name'] ?></p>
      <p>
        <button type="submit" name="goBack">go back</button>
      </p>
    </form>

    <script src="../assets/js/productDetail.js" >
    </script>
  </body>


</html>
