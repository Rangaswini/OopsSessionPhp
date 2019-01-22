<?php
    session_start();

function __autoload($class){
    
     include_once($class.".php");
    
    }
   
     $conn=new Connect();
    
error_reporting(E_ALL);
ini_set('display_errors', 1); 
class Registration extends Connect{
    
    public $id;
    public $name;
    public $email;
    public $gender;
    public $dob;
    public $qualification;
    public $username;
    public $pass;
    public function __construct($id,$name,$email,$gender,$dob,$qualification,$username,$pass){
        $this->id=$id;
        $this->name=$name;
        $this->email=$email;
        $this->gender=$gender;
        $this->dob=$dob;
        $this->qualification=$qualification;
        $this->username=$username;
        $this->pass=$pass;

    }

}
/*$obj=new Registration($_POST['id'],$_POST['rname'],$_POST['email'],$_POST['gender'],$_POST['dob'],$_POST['qualification'],$_POST['username'],$_POST['pass']);
print_r($obj);
//$conn=new Connect();*/
$data = [
    'id'=> $_POST['id'],
    'rname' => $_POST['rname'],
    'email'=>$_POST['email'],
    'gender' => $_POST['gender'],
    'dob' =>$_POST['dob'],
    'qualification' =>$_POST['qualification'],
    'username' => $_POST['username'],
    'pass' => $_POST['pass'],
];
$result=$conn->insertData($data);
if($result)
{
    echo"inserted";
}
else{
    echo"not";
}
?>
<!DOCTYPE html>
<html>


</body>

</html>