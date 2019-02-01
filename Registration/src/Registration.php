<?php

namespace Rango\Registration;
use \PDO;
use Rango\Registration\Connect;
require 'vendor/autoload.php';


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
        $stmt = $this->conn->conn->query("SELECT userid,uRole FROM registerUser WHERE email = '$uname' AND pass = '$pass'");
        //return $stmt;
        foreach ($stmt as $row)
        {
            $_SESSION['uid']=$row['userid'];
            $_SESSION['uRole']=$row['uRole'];

        }
        if($stmt->rowCount()==1)
        {
            if(!empty($_SESSION['remember']))
            {
                setcookie("userName", $_SESSION['uname'], time()+3600);
                setcookie("pass", $_SESSION['pass'], time()+3600);
        
            }
            else{
                if(isset($_COOKIE['userName']))
                {
                    setcookie("userName","");
        
                }
                if(isset($_COOKIE['pass']))
                {
                    setcookie("pass","");
        
                }
                }
        }
        if($stmt->rowCount()==1 || $_SESSION['uid']==1 || $_SESSION['uRole']=='subAdmin')
        {
            return 1;
       }

    }
    public function register($rname,$email,$gender,$dob,$qualification,$pass,$role="user")
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

             $sql="INSERT INTO registerUser (rname,email,gender,dob,qualification,pass,uRole) VALUES ('$rname', '$email', '$gender', '$dob', '$qualification','$pass','$role')";
             $q = $this->conn->conn->prepare($sql);
             $q->execute();
             return true;
        }
    }
    public function deleteUser($uid)
    {
        $sql = "DELETE FROM registerUser WHERE userid = ?";        
        $q =$this->conn->conn->prepare($sql);

         $q->execute(array($uid));  
         $r=$q->rowCount();

             return $r;
    }
    public function display($role)
    {
        if($role=='all')
        {
            $stmt1 = $this->conn->conn->query("SELECT * FROM registerUser");
        }
        else if($role=='subAdmin'){

        $stmt1 = $this->conn->conn->query("SELECT * FROM registerUser WHERE userid=1 || uRole='subAdmin'");
        }
        else{
            $stmt1 = $this->conn->conn->query("SELECT * FROM registerUser WHERE uRole='user'");

        }
        $rows = $stmt1->fetchAll(PDO::FETCH_NUM);
       
        return $rows;
    }
    public function displayPages($role)
    {
        if($role=='all')
        {
            $stmt1 = $this->conn->conn->query("SELECT * FROM registerUser LIMIT $_SESSION[page1],2");
        }
        else if($role=='subAdmin'){

        $stmt1 = $this->conn->conn->query("SELECT * FROM registerUser WHERE userid=1 || uRole='subAdmin' LIMIT $_SESSION[page1],2 ");
        }
        else{
            $stmt1 = $this->conn->conn->query("SELECT * FROM registerUser WHERE uRole='user' LIMIT $_SESSION[page1],2 ");

        }
        $rows = $stmt1->fetchAll(PDO::FETCH_NUM);
       
        return $rows;
    }
    public function countRow($role)
    {
        if($role=='all')
        {
            $stmt1 = $this->conn->conn->query("SELECT * FROM registerUser");
        }
        else if($role=='subAdmin'){

        $stmt1 = $this->conn->conn->query("SELECT * FROM registerUser WHERE userid=1 || uRole='subAdmin' ");
        }
        else{
            $stmt1 = $this->conn->conn->query("SELECT * FROM registerUser WHERE uRole='user' ");

        }
        $rows = $stmt1->fetchAll(PDO::FETCH_NUM);
       
        return $rows;  
    }
    public function updateUser($userid,$rname,$email,$gender,$dob,$qualification,$pass,$role)
    { 
        $stmt=$this->conn->conn->prepare("UPDATE registerUser SET rname='$rname',email='$email',gender='$gender',dob='$dob',qualification='$qualification',pass='$pass',uRole='$role' WHERE userid=$userid ");
        $stmt->execute();
        $r=$stmt->rowCount();
        return $r;
    }
}

?>
