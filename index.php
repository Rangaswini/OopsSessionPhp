<?php
    session_start();

    
  
?>
<!DOCTYPE html>
<html lang="en">

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
        <form action="welcome.php" method="post">
            Username: <input name="uname" type="text" required> 
            Password: <input name="pass" type="password" required>
            <button type="submit">Login</button><br><br>
            If not registered User<a href="registerForm.php">Register here</a>




</body>
</html>