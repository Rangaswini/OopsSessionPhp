<?php
include "Connect.php";

function __autoload($class){
    
     include_once($class.".php");
    
    }

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
        $stmt =$this->conn->conn->prepare("SELECT * FROM registerUser WHERE username = '$uname' AND pass = '$pass' ;");
        $stmt->execute();
        $r=$stmt->rowCount();
        return $r;
    }
    public function register($id,$rname,$email,$gender,$dob,$qualification,$username,$pass)
    {
        $sql="INSERT INTO registerUser (id,rname,email,gender,dob,qualification,username,pass) VALUES ('$id', '$rname', '$email', '$gender', '$dob', '$qualification', '$username', '$pass')";
        $q = $this->conn->conn->prepare($sql);
        $q->execute();
        return true;
    }
}

?>
