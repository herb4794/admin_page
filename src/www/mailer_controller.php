<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../../vendor/autoload.php'; 


class mailController   {
  private const MAILNAME = 'hkctgroupporject@gmail.com';
  private const MAILPASS = 'afpitgtynhtqjerv';
  protected $mail;
  public $databaseName;
  public $serverName;
  public $userName;
  public $password;
  public $supDns;
  public $tableName;
  public $conn;
  public function __construct(
    $databaseName = "",
    $tableName = "",
    $serverName = "localhost",
    $userName = "root",
    $password = "root"
  )
  {
    //initialization mail function
    $this->mail = new PHPMailer(true);
    $this->databaseName = $databaseName;
    $this->tableName = $tableName;
    $this->userName = $userName;
    $this->password = $password;
    $this->serverName = $serverName;
    $this->supDns = "mysql:host=$serverName;dbname=$databaseName";

 try {

      $this->conn = new PDO($this->supDns, $this->userName, $this->password);
      $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      die('Error' . $e->getMessage());
    }

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

        $this->mail->Username = self::MAILNAME;
        $this->mail->Password = self::MAILPASS;

        $this->mail->setFrom(Self::MAILNAME, 'HVAR.mail');
        $this->mail->Subject = $subject;
        $this->mail->Body = $msg;

        $this->mail->addAddress($email, $name);

        $this->mail->send();
        $_SESSION["emailStatus"] = "Email has been sent";
        
      } catch (Exception $e) {
        $_SESSION["emailStatus"] = $this->mail->ErrorInfo;
      }
    }
    return $result;
  }

  public function getUserProfile($email)
  {
    $sql = "SELECT * FROM users WHERE email= :email";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['email' => $email]);
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

  public function createUser()
  {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = md5($_POST['password']);
    $confirmPassword = $_POST['confirmPassword'];
    $user_type = $_POST['user_type'];
    $activationCode = md5($email . time());
    $status = 1;

    if ($name && $email && $phone != null) {
      if ($password = $confirmPassword) {
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


          $_SESSION['status'] = "User Added Successfully"; 
          header("location: ../www/register-and-login.php");
          $result = true;

            if($result == true){
              // $msg = "Thank For Your Register";
              // $subject = "HVAR Development Department";
              // $msg .= "<html></body><div><div>Dear $name,</div></br></br>";
              // $msg .= "<div style='padding-top:8px;'>Please click The following link For verifying and activation of your account</div>
              // <div style='padding-top:10px;'><a href='http://localhost/admin_page/src/www/verification.php?activationCode=$activationCode'>Click Here</a></div> 
              // </body></html>";
              // $this->mail->isSMTP();
              // $this->mail->CharSet = "utf-8";
              // $this->mail->SMTPAuth = true;
              // $this->mail->SMTPSecure = "ssl";

              // $this->mail->Host = 'smtp.gmail.com';
              // $this->mail->Port = 465;
              // $this->mail->SMTPOptions = array(
              //   'ssl' => array(
              //     'verify_peer' => false,
              //     'verify_peer_name' => false,
              //     'allow_self_signed' => true
              //   )
              // );
              // $this->mail->isHTML(true);

              // $this->mail->Username = self::MAILNAME;
              // $this->mail->Password = self::MAILPASS;

              // $this->mail->setFrom(Self::MAILNAME, 'HVAR.mail');
              // $this->mail->Subject = $subject;
              // $this->mail->Body = $msg;

              // $this->mail->addAddress($email, $name);

              // $this->mail->send();

            }
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
}



?>
