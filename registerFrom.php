<?php
    session_start();

    /*if(isset($_SESSION['uname']))
    {
      echo "You are already logged in ...";
    }*/
    //else{
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
        select,
        textarea {
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


    <h2> Registration Information</h2>
    <div class="container">
        <form action="Registration.php" method="post">
            <input name="id" type="number" placeholder="Enter id">
            <input name="rname" type="text" placeholder="Your Name" required>
            <input name="email" type="email" placeholder="Email"><br><br>

            <!-- gender selection -->
            <p>Gender :</p>
            <input type="radio" name="gender" value="male"> Male<br>
            <input type="radio" name="gender" value="female"> Female<br>
            <input type="radio" name="gender" value="other"> Other <br>


            <!-- for bday -->

            <input type="date" name="dob" placeholder="Date of birth"><br>

            <!-- for  selection -->

            <select name="qualification" type="text" placeholder="Qualification">
            <option value="BE">BE</option>
            <option value="MCA">MCA</option>
            <option value="MCS">MCS</option>
            <option value="CDAC">CDAC</option>
            <option value="CS">CS</option>
            <option value="MTECH">MTECH</option>
            <option value="ME">ME</option>
        </select><br>
            <input name="username" type="text" placeholder="Userame" required> <br>
            <input type="password" name="pass" placeholder="Password" required><br>


            <!-- to upload cv -->
            Select a file: <input type="file" name="photo"><br><br>


            <!-- To give alerts
          <button type="button" onclick="alert('Hello World!')">Click Me!</button> -->

            <!-- submit -->
            <input type="submit">

            <!-- to reset -->
            <input type="reset">

        </form>
    </div>
</body>

</html>
