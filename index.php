<?php
    session_start();
if(isset($_SESSION['uname']))
echo "You are already logged in ...";
else{
?>
<html >

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Index</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        
        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 40px;
        }
        
        input[type=text],
         {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }
    </style>
</head>

<body>
<h2> Login Here</h2>
    <div class="container">
    <form action=<?php echo $_SERVER['PHP_SELF'];?> method="POST">
            Username: <input name="uname" type="text" required> 
            Password: <input name="pass" type="password" required>
            <button type="submit">Login</button><br><br>
            If not registered User<a href="registerForm.php">Register here</a>
</body>
</html>
<?php

}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
   include "Registration.php";
$reg=new Registration();

$result=$reg->Login($_POST['uname'],$_POST['pass']);
if($result==1)
{
    $_SESSION["uname"]= $_POST['uname'];  // Set session variables
    $_SESSION["pass"]= $_POST['pass'];
    header('Location: ./WelMsg.php');
}
else
{
    echo"Invalid User";

}
}

?>