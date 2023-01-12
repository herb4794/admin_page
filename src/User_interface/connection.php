<?php
session_start();
require_once('../assets/php/createDatabase.php');

require_once('../assets/php/utility.php');

$database = new CreateDatabase('product_database', 'product_table');
$utility = new Utility();

if (isset($_GET["userInfo"])) {
  $result = $database->getData();
  $element = '';
  if ($result) {
    foreach ($result as $row) {
      $element .= '<tr>
      <td>
        <div class="d-flex px-2 py-1 ">
          <div class="d-flex flex-column justify-content-center ">
            <h6 class="mb-0 text-sm">' . $row['product_name'] . '</h6>
            <p class="text-xs text-secondary mb-0"></p>
          </div>
        </div>
      </td>
      <td>
        <p class="text-xs font-weight-bold mb-0">' . $row['product_description'] . '</p>
        <p class="text-xs text-secondary mb-0"></p>
      </td>
      <td class="align-middle text-center text-sm">
      <img src="' . $row['product_image'] . ' " class="img-thumbnail rounded mx-auto d-block"
      width="50" height="50">
      </td>
      <td class="align-middle text-center">
        <span class="text-secondary text-xs font-weight-bold">' . $row['product_price'] . '</span>
      </td>
      <td class="align-middle text-center">
      <span class="text-secondary text-xs font-weight-bold">' . $row['product_discount'] . '</span>
      </td>
      <td  class="align-middle text-center">
      <a href="#" id="' . $row['id'] . '" class="btn btn-success btn-sm rounded-pill py-0 editLink" data-toggle="modal"
      data-target="#editProductModal">Edit</a>

      <a href="#" id="' . $row['id'] . '" class= "btn btn-danger btn-sm rounded-pill py-0 deleteLink">Delete</a>
    </td>
    </tr>';
    }
    echo $element;
  } else {
    '<tr>
    <td colspan="6">No Users Found in the Database!</td>
  </tr>';
  }
}

if (isset($_GET["updateProduct"])) {
  $id = $_GET["id"];
  $productData = $database->readUpdateProductInfo($id);
  echo json_encode($productData);
}

if (isset($_POST["editProduct"])) {
  $product_id = $_POST['product_id'];
  $product_name = $_POST['product_name'];
  $product_price = $_POST['price'];
  $product_discount = $_POST['discount'];
  $product_description = $_POST['description'];
  $target_dir = '../assets/images/products/items/';
  $old_image = $_POST['oldProductImage'];
  $product_image = $_FILES['product_image']['name'];

  if ($database->updateProductData(
    $product_id,
    $product_name,
    $product_description,
    $product_image,
    $product_price,
    $product_discount,
    $old_image,
    $target_dir
  )) {
    isset($_GET["showAlertInfo"]);
  };
}

if (isset($_GET["showAlertInfo"])) {
  echo $utility->showMessage("info", $_SESSION["status"]);
  unset($_SESSION["status"]);
}

if (isset($_GET["deleteBtn"])) {
  $database->deleteUserInterfaceData();
}
