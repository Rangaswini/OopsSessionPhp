<?php
require 'vendor/autoload.php';

use Rango\Registration\Registration;
use Rango\Registration\Connect;

    session_start();
if(isset($_SESSION['uname']))
{
echo "You are already logged in ...";
?>

<html >

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form action=<?php echo $_SERVER['PHP_SELF'];?> method="POST">
            <button type="submit" >Logout</button><br><br>
            </form>
            </body>
            </html>            <?php
            if($_SERVER["REQUEST_METHOD"]=="POST")
            {
                  session_destroy();
                  header('Location: ./index.php');
            }
}

else{
   
?>

<h2> Login Here</h2>
    <div class="container">
    <form action=<?php echo $_SERVER['PHP_SELF'];?> method="POST">
            Username(EmailID): <input name="uname" type="text" value="<?php if(isset($_COOKIE['userName'])) {echo$_COOKIE['userName'];}?>"> 
            Password: <input name="pass" type="password" value="<?php if(isset($_COOKIE['pass'])) {echo$_COOKIE['pass'];}?>">
            <input type="checkbox" name="remember" <?php if(isset($_COOKIE['userName'])) {?> checked <?php }?> /><label>Remember Me</label><br>
            <button type="submit">Login</button><br><br>
            If not registered User<a href="registerForm.php">Register here</a>
</body>
</html>
<?php


}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
 //include "Registration.php";
$reg=new Registration();

$result=$reg->Login($_POST['uname'],$_POST['pass']);

    
if($result==1)
{
    $_SESSION["uname"]= $_POST['uname'];  // Set session variables
    $_SESSION["pass"]= $_POST['pass'];
    $_SESSION['remember']=isset($_POST['remember']) ? $_POST['remember'] : '';
    header('Location: ./WelMsg.php');
}
// else if($result==2)
// {
//     header('Location: ./WelMsg.php');
// }
else
{
    echo"Invalid User";

}
}

?>