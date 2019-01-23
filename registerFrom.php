<?php
    session_start();

    if(isset($_SESSION['uname']))
    {
      echo "You are already logged in ...";
    }
    else{
?>
<html>

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
        <form action="" method="post">
            <input name="id" type="number" placeholder="Enter id">
            <input name="rname" type="text" placeholder="Your Name" required>
            <input name="email" type="email" placeholder="Email"><br><br>
            <p>Gender :</p>
            <input type="radio" name="gender" value="male"> Male<br>
            <input type="radio" name="gender" value="female"> Female<br>
            <input type="radio" name="gender" value="other"> Other <br>
            <input type="date" name="dob" placeholder="Date of birth"><br>
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
            Select a file: <input type="file" name="photo"><br><br>
            <input type="submit">
            <input type="reset">

        </form>
    </div>
</body>

</html>
<?php
    }
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    include "Registration.php";

$reg=new Registration();

$result1=$reg->register($_POST['id'],$_POST['rname'],$_POST['email'],$_POST['gender'],$_POST['dob'],$_POST['qualification'],$_POST['username'],$_POST['pass']);
if(!$result1)
{
echo"not Inserted";}
else
{
    echo"Inserted";
}
}

?>
