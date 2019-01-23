<?php
    session_start();

if( isset($_SESSION['uname']) )
{
            echo "welcome".$_SESSION['uname']."!";
?> 
<html>
<body>
<form action=<?php echo $_SERVER['PHP_SELF'];?> method="POST">
            Welcome!!!!
            <button type="submit">Logout</button><br><br>
            </form>
            </body>
            </html>

            <?php
           
}
else{
    echo "Login First";
}
 if($_SERVER["REQUEST_METHOD"]=="POST")
 {
      session_destroy();
      header('Location: ./index.php');
    
 }

?>