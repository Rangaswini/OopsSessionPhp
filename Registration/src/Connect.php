<?php
namespace Rango\Registration;
//require 'vendor/autoload.php';
use \PDO;


   class Connect{
   
     public $servername = "localhost";
         public $Cusername = "root";
      public $Cpassword = "root";
        public  $db="Test";
     public function __construct(){
       
      $this->conn = new PDO("mysql:host=".$this->servername.";dbname=".$this->db,$this->Cusername,$this->Cpassword);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         }
}


?>