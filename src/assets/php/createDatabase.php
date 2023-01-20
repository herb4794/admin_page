<?php
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

require_once 'config.php';
// require '../PHPMailer/src/Exception.php';
// require '../PHPMailer/src/PHPMailer.php';
// require '../PHPMailer/src/SMTP.php';

class CreateDatabase extends Config
{
  public $dbms = 'mysql';
  public $serverName;
  public $userName;
  public $password;
  public $databaseName;
  public $tableName;
  public $con;
  public $supDns;
  public $headers;
  public $ms;
  protected $mail;
  // Class Constructor
  public function __construct(
    $databaseName = "",
    $tableName = "",
    $serverName = "localhost",
    $userName = "root",
    $password = ""
  ) {
    $this->serverName = $serverName;
    $this->databaseName = $databaseName;
    $this->tableName = $tableName;
    $this->userName = $userName;
    $this->password = $password;
    $this->supDns = "$this->dbms:host=$serverName;dbname=$databaseName";

    // Create connection
    $this->con = mysqli_connect($serverName, $userName, $password, $databaseName);
    // $this->mail = new PHPMailer(true);
    if (!$this->con) {
      die("Connection failed: " . mysqli_connect_error());
    }

    try {

      $this->conn = new PDO($this->supDns, $userName, $password);
      $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      die('Error' . $e->getMessage());
    }
  }

  public function updateProduct()
  {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['price'];
    $product_discount = $_POST['discount'];
    $product_description = $_POST['description'];
    $target_dir = '../assets/images/products/items/';

    $old_image = $_POST['oldProductImage'];
    $product_image = $_FILES['product_image']['name'];

    $conn = $this->con;
    if ($product_image != null) {
      $product_image = $target_dir . basename($_FILES['product_image']['name']);

      $update_image = $product_image;
      $allowed_extension = array('png', 'jpg', 'jpeg');
      $imageFileType = strtolower(pathinfo($update_image, PATHINFO_EXTENSION));
      if (!in_array($imageFileType, $allowed_extension)) {
        $_SESSION['status'] = "You are allowed with only jpg, png, jpeg";
        header("location: userIndex.php");
      }
    } else {
      $update_image = $old_image;
    }

    $sql = "UPDATE product_table SET product_name='$product_name', product_price='$product_price',
      product_discount='$product_discount', product_image='$update_image',
      product_description='$product_description' WHERE id='$product_id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
      move_uploaded_file($_FILES['product_image']['tmp_name'], $product_image);
      $_SESSION['status'] = "Product Updated Successfully";
      header("location: userIndex.php");
    } else {
      $_SESSION['status'] = "Product Updating Failed";
      header("location: userIndex.php");
    }
  }


  public function getDataByAdminPage()
  {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_discount = $_POST['product_discount'];
    $product_description = $_POST['product_description'];
    $target_dir = '../assets/images/products/items/';
    $product_image = $target_dir . basename($_FILES['product_image']['name']);
    $allowed_extension = array('png', 'jpg', 'jpeg');
    $imageFileType = strtolower(pathinfo($product_image, PATHINFO_EXTENSION));
    $conn = $this->con;


    $sql = "INSERT INTO $this->tableName (`product_name`, `product_price`, `product_discount`, `product_image`, `product_description`) VALUES (?,?,?,?,?)";

    if (!in_array($imageFileType, $allowed_extension)) {
      $_SESSION['status'] = "You are allowed with only jpg, png, jpeg";
    } else {
      if ($conn->connect_error) {
        die('connection failed :' . $conn);
      } else {
        move_uploaded_file($_FILES['product_image']['tmp_name'], $product_image);
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sddss", $product_name, $product_price, $product_discount, $product_image, $product_description);
        $stmt->execute();
        $stmt->close();
      }
    }
  }

  public function getData()
  {
    $sql = "SELECT * FROM $this->tableName";

    $result = $this->conn->query($sql);


    if ($result->rowCount() > 0) {
      return $result;
    } else {
      die();
    }
  }

  public function editProductData()
  {
    $product_id = $_GET['product_id'];

    $sql = "SELECT*FROM $this->tableName WHERE id='$product_id' LIMIT 1";

    $result = $this->conn->query($sql);

    if ($result->rowCount() > 0) {
      return $result;
    } else {
      die();
    }
  }


  public function editUserData()
  {
    $user_id = $_GET['user_id'];

    $sql = "SELECT*FROM $this->tableName WHERE id='$user_id' LIMIT 1";

    $result = $this->conn->query($sql);

    if ($result->rowCount() > 0) {
      return $result;
    } else {
      die();
    }
  }
  public function deleteUserData()
  {
    $user_id = $_POST['delete_id'];

    $sql = "DELETE FROM $this->tableName WHERE id='$user_id' LIMIT 1";

    $result = $this->conn->query($sql);

    if ($result->rowCount() > 0) {
      return $result;
    } else {
      die();
    }
  }

  public function deleteProductData()
  {
    $product_id = $_POST['delete_Product_id'];

    $sql = "DELETE FROM $this->tableName WHERE id='$product_id' LIMIT 1";

    $result = $this->conn->query($sql);

    if ($result->rowCount() > 0) {

      return $result;
    } else {
      die();
    }
  }

  public function countProductData()
  {
    $sql = "SELECT count(*) as total from $this->tableName";
    $result = $this->conn->query($sql);
    $data = $result->fetch();
    echo $data['total'];
  }

  public function userInfo($forgotPasswordCode)
  {
    $sql = "SELECT * FROM $this->tableName WHERE forgotPasswordCode = '$forgotPasswordCode'";
    $result = $this->conn->query($sql);

    if ($result) {
      return $result;
    }
  }

  public function updateProductData(
    $id,
    $productName,
    $productDescription,
    $product_image,
    $productPrice,
    $productDiscount,
    $old_image,
    $target_dir
  ) {
    if ($product_image != null) {
      $product_image = $target_dir . basename($_FILES["product_image"]['name']);

      $update_image = $product_image;
      $allowed_extension = array('png', 'jpg', 'jpeg');
      $imageFileType = strtolower(pathinfo($update_image, PATHINFO_EXTENSION));

      if (!in_array($imageFileType, $allowed_extension)) {
        header('location: product_control.php');
        die($_SESSION["status"] = "Error you for only upload to png, jph and jpeg file");
      }
    } else {
      $update_image = $old_image;
    }
    $sql = "UPDATE $this->tableName SET product_name = :productName,
       product_image = :productImage , product_description = :productDescription,
        product_price = :productPrice, product_discount = :productDiscount WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([
      'id' => $id,
      'productName' => $productName,
      'productDescription' => $productDescription,
      'productImage' => $update_image,
      'productPrice' => $productPrice,
      'productDiscount' => $productDiscount
    ]);

    if ($stmt->execute()) {
      move_uploaded_file($_FILES["product_image"]['tmp_name'], $product_image);
      $_SESSION["status"] = "Upload data Complete";
      return true;
    }
  }

  public function loginMethod()
  {
    $email = $_POST["loginEmail"];
    $password = $_POST["loginPassword"];

    $select = "SELECT * FROM $this->tableName WHERE email = '$email' or name = '$email' and password = '$password' ";
    $result = $this->conn->query($select);

    $row = $result->fetch();

    if ($result->rowCount() > 0) {
      $login = $this->conn->prepare($select);
      $login->execute();
      if ($row['status'] == 1) {
        if ($row['user_type'] == 'admin') {
          $_SESSION['admin_name'] = $row['name'];
          header("location: admin_page.php");
        } else if ($row['user_type'] == 'user') {
          $_SESSION['user_name'] = $row['name'];
          header("location:../www/index.php");
        } else if ($result->rowCount() == 0) {
          $_SESSION["status"] = 'incorrect email or password !';
          header("location:../www/register-and-login.php");
        }
      } else {
        $_SESSION["status"] = 'Please active your Email !';
        header("location:../www/register-and-login.php");
      }
    } else {
      $_SESSION["status"] = 'Error email or password !';
      header("location:../www/register-and-login.php");
    }
  }

  public function deleteUserInterfaceData()
  {
    $user_id = $_GET['id'];

    $sql = "DELETE FROM $this->tableName WHERE id='$user_id' LIMIT 1";

    $result = $this->conn->query($sql);

    if ($result->rowCount() > 0) {
      return $result;
    } else {
      die();
    }
  }

  public function readUpdateProductInfo($id)
  {
    $sql = "SELECT * FROM product_table WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id' => $id]);
    $result = $stmt->fetch();
    return $result;
  }

  public function userProfile($email)
  {
    $sql = "SELECT * FROM users WHERE email= :email";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['email' => $email]);
    $result = $stmt->fetch();
    return $result;
  }

  public function forGotPasswordResetPage($forgotPasswordCode, $password)
  {

    $sql = "UPDATE $this->tableName SET password = :password WHERE forgotPasswordCode = :forgotIdVerification";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':forgotIdVerification', $forgotPasswordCode, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch();
    return $result;
  }
}

?>
