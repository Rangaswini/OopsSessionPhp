<?php
    session_start();


   /* if( !isset($_SESSION['uname']) )
    die( "Login required." );*/
    

    

function __autoload($class){
    
    include_once($class.".php");
   
   }
  
    $conn=new Connect();
    error_reporting(E_ALL);
ini_set('display_errors', 1); 
    
$row=$conn->showData($_POST['uname'],$_POST['pass']);
if(!$row)
    {
        header('Location: ./index.php');

    }
else{
    $_SESSION["uname"]= $_POST['uname'];  // Set session variables
$_SESSION["pass"]= $_POST['pass'];
    echo "welcome".$_POST['uname']."!";

}

?>