<?php

function __autoload($class){
    
     include_once($class.".php");
    
    }
     error_reporting(E_ALL);
    ini_set('display_errors', 1); 
class Registration{
    public function Login($uname,$pass)
    {
        $conn=new Connect();
        $stmt =$conn->conn->prepare("SELECT * FROM registerUser WHERE username = '$uname' AND pass = '$pass' ;");
        $stmt->execute();
        $r=$stmt->rowCount();
        return $r;
    }
    public function register($id,$rname,$email,$gender,$dob,$qualification,$username,$pass)
    {
        $conn=new Connect();
        $sql="INSERT INTO registerUser (id,rname,email,gender,dob,qualification,username,pass) VALUES ('$id', '$rname', '$email', '$gender', '$dob', '$qualification', '$username', '$pass')";
        $q = $conn->conn->prepare($sql);
        $q->execute();
        return true;
    }
}

?>
