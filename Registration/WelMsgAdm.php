<?php
use Rango\Registration\Registration;
use Rango\Registration\Connect;
require 'vendor/autoload.php';

    session_start();

if( isset($_SESSION['uname']) )
{
            echo "welcome Admin".$_SESSION['uname']."!";
?> 
<html>
<body>
<form action=<?php echo $_SERVER['PHP_SELF'];?> method="POST">

        You can register other users also<a href="registerForm.php">Register here</a>
        <a href="deleteUser.php">Delete User</a>



            <button type="submit">Logout</button><br><br>
            </form>
            

            <?php
}
else{
    echo "Login First";
    ?>
    <a href="index.php">Home</a>
    <?php

}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
      session_destroy();
      header('Location: ./index.php');
}

            ?>