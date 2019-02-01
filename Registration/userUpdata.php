<?php
session_start();
$_SESSION['up_id']=$_GET['u_id'];
//echo $_GET['u_id']; exit();
 include 'registerForm.php';


// $delResult=$reg->updateUser($_GET["u_id"],$_SESSION['rname'],$_SESSION['email'],$_SESSION['gender'],$_SESSION['dob'],$_SESSION['qualification'],$_SESSION['pass'],$_SESSION['role']);
//                 if($delResult==1)
//                 {
//                     echo"Record updated  Successfully";
//                 }
//                 else
//                 {
//                     echo"Record not updated";
//                 }
?>