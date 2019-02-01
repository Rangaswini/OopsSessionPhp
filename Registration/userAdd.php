<?php
session_start();
if($_SESSION['uid']==1 || $_SESSION['uRole']=='subAdmin' )
{ 
    include 'registerForm.php';
}
else{
    echo"u are not admin";
}
?>