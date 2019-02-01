<?php
use Rango\Registration\Registration;
use Rango\Registration\Connect;
require 'vendor/autoload.php';

    session_start();

if( isset($_SESSION['uname']) )
{
            echo "welcome".$_SESSION['uname']."!";

           
       if($_SESSION['uid']==1 || $_SESSION['uRole']=='subAdmin' )
       {    
      ?>
            <html>
       <body>
          You can do registration of other users also<a href="userAdd.php">Register here</a>
          <br><br>
          You can do registration of other users also<a href="userDelete.php">Delete</a>
          <br><br>
          You can do registration of other users also<a href="userDisplay.php">Display</a>
          <br><br>
          You can do registration of other users also<a href="userUpdate.php">Update</a>
          <br><br>
          
       <?php

       }
       ?>
     <form action="" method="post">
     <input type="submit" name="logout" value="logout">
     </form>
            <?php
             
             
             }

else{
    echo "Login First";
    ?>
    <a href="index.php">Home</a>
    <?php

}
if(isset($_POST['logout']))
{
      session_destroy();
    header('Location: ./index.php');
}

            ?>
            