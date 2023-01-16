<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'config.php';
require_once 'C:\xampp7.4\htdocs\admin_page\vendor\autoload.php';


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
    $this->mail = new PHPMailer(true);
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

  public function createUser()
  {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $user_type = $_POST['user_type'];
    $activationCode = md5($email . time());
    $status = 0;

    if ($name && $email && $phone != null) {
      if ($password == $confirmPassword) {
        $checkEmail = "SELECT * FROM $this->tableName WHERE email = '$email' ";
        $checkEmailRun = $this->conn->query($checkEmail);
        if ($checkEmailRun->rowCount() > 0) {
          $_SESSION['status'] = "Email id is already taken.!";
          header("location: ../www/register-and-login.php");
        } else {
          $sql = "INSERT INTO users (name ,password ,email ,phone ,user_type, activationcode, status)
          VALUES ('$name', '$password', '$email' ,'$phone' ,'$user_type',:activationCode, :status)";
          $stmt = $this->conn->prepare($sql);
          $stmt->bindParam(':activationCode', $activationCode, PDO::PARAM_STR);
          $stmt->bindParam(':status', $status, PDO::PARAM_STR);
          $stmt->execute();
          $lastInsertId = $this->conn->lastInsertId();
          if ($lastInsertId) {
            $to = $email;
            $msg = "Thank For Your Register";
            $subject = "HVAR Development Department";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
            $headers .= "From: HVAR.mail | Programing Blog (Demo) <herb4794@gmail.com>" . "\r\n";
            $msg .= "<html></body><div><div>Dear $name,</div></br></br>";
            $msg .= "<div style='padding-top:8px;'>Please click The following link For verifying and activation of your account</div>
            <div style='padding-top:10px;'><a href='http://localhost/admin_page/src/www/verification.php?activationCode=$activationCode'>Click Here</a></div> 
            </body></html>";
            mail($to, $subject, $msg, $headers);
          }
          header("location: ../www/register-and-login.php");
          $_SESSION['status'] = "User Added Successfully";
          return true;
        }
      } else {
        $_SESSION["status"] = "Password and Confirm Password is not match";
        header("location: ../www/register-and-login.php");
      }
    } else {
      $_SESSION["status"] = "Registration Not Null";
      header("location: ../www/register-and-login.php");
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

  public function forGotPassword($email, $name)
  {
    $sql = "SELECT * FROM $this->tableName WHERE email= :email";
    $stmt = $this->conn->prepare($sql);
    $forgotPasswordCode = md5($email . time());
    $stmt->execute([
      'email' => $email
    ]);
    $result = $stmt->fetch();
    if ($stmt->rowCount() > 0) {
      $sql = "UPDATE users SET forgotPasswordCode = '$forgotPasswordCode' WHERE email = '$email'";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $subject = "HVAR Support Department";
      $msg = "Please Check This To Change Your Password";
      $msg .= "<html></body><div><div>Dear $name ,</div></br></br>";
      $msg .= "<div style='padding-top:8px;'>Please click The following link For verifying and activation of your account</div>
        <div style='padding-top:10px;'><a href='http://localhost/admin_page/src/www/revisePassword.php?forgotIdVerification=$forgotPasswordCode'>Click Here</a></div> 
        </body></html>";

      try {
        $this->mail->isSMTP();
        $this->mail->CharSet = "utf-8";
        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = "ssl";

        $this->mail->Host = 'smtp.gmail.com';
        $this->mail->Port = 465;
        $this->mail->SMTPOptions = array(
          'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
          )
        );
        $this->mail->isHTML(true);

        $this->mail->Username = 'herb4794@gmail.com';
        $this->mail->Password = 'zmzoxeublicbskpf';

        $this->mail->setFrom('herb4794@mail.com', 'HVAR.mail');
        $this->mail->Subject = $subject;
        $this->mail->Body = $msg;
        $this->mail->addAddress($email, $name);

        $this->mail->send();
        $_SESSION["emailStatus"] = "Email has been sent";
      } catch (Exception $e) {
        echo  $_SESSION["emailStatus"] = $this->mail->ErrorInfo;
      }
    }
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

  public function verificationCode($activationCode)
  {
    $sql = "SELECT * FROM $this->tableName WHERE activationcode = :activationCode";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':activationCode', $activationCode, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      $status = 0;
      $sql = "SELECT id FROM $this->tableName WHERE activationcode = :activationCode and status = :status";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':activationCode', $activationCode, PDO::PARAM_STR);
      $stmt->bindParam(':status', $status, PDO::PARAM_STR);
      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        $status = 1;
        $sql = "UPDATE $this->tableName SET status = $status WHERE activationcode = :activationCode";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':activationCode', $activationCode, PDO::PARAM_STR);
        $stmt->execute();
      } else {
        $_SESSION["msg"] = "Your account is already active, no need to activate again";
      }
    } else {
      $_SESSION["msg"] = "Wrong activation code";
    }
  }
}
