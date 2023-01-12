<?php

class Config
{
  public const DBHOST = 'localhost';
  public const DBNAME = 'product_database';
  public const DBPASS = '';
  public const DBUSER = 'root';
  public $dns = 'mysql:host=' . self::DBHOST . ';dbname=' . self::DBNAME . '';
  public $conn = null;

  public function __construct()
  {
    try{
      $this->conn = new PDO($this->dns,self::DBUSER,self::DBPASS);
      $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }catch(PDOException $e){
      die('Error'.$e->getMessage());
      
    }
  }

}


$obj = new config;

?>