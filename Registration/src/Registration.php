<?php

namespace Rango\Registration;
use Rango\Registration\Connect;
require 'vendor/autoload.php';


// include "Connect.php";

// function __autoload($class){
    
//      include_once($class.".php");
    
//     }

     error_reporting(E_ALL);
     ini_set('display_errors', 1); 
class Registration{
    public $conn;
    public function __construct()
    {
        $this->conn=new Connect();
        

    }
    public function Login($uname,$pass)
    {
        $pass=md5($pass);
        $stmt =$this->conn->conn->prepare("SELECT * FROM registerUser WHERE email = '$uname' AND pass = '$pass' ;");
        $stmt->execute();
        $r=$stmt->rowCount();
        return $r;
    }
    public function register($rname,$email,$gender,$dob,$qualification,$pass)
    {
        $stmt =$this->conn->conn->prepare("SELECT * FROM registerUser WHERE email = '$email';");
        $stmt->execute();
        $r=$stmt->rowCount();
        if($r==1)
        {
            echo"This email is already registered with us, try with another email";
            ?>
            <a href="registerForm.php">Try again</a>
            <?php

        }
        else{
             $pass=md5($pass);

             $sql="INSERT INTO registerUser (rname,email,gender,dob,qualification,pass) VALUES ('$rname', '$email', '$gender', '$dob', '$qualification','$pass')";
             $q = $this->conn->conn->prepare($sql);
             $q->execute();
             return true;
        }
    }
}

?>
