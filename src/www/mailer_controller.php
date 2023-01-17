<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/PHPMailer/PHPMailer/src/Exception.php';
require '../../vendor/PHPMailer/PHPMailer/src/PHPMailer.php';
require '../../vendor/PHPMailer/PHPMailer/src/SMTP.php';
// require_once './vendor/autoload.php'; 


class mailController   {
  private const MAILNAME = 'herb4794@gmail.com';
  private const MAILPASS = 'zmzoxeublicbskpf';
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
    $password = ""
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
}



?>
