<?php
use Rango\Registration\Registration;
use Rango\Registration\Connect;

require 'vendor/autoload.php';

    session_start();
    if(!($_SESSION['uid']==1 || $_SESSION['uRole']=='subAdmin'))
    {
    if(isset($_SESSION['uname']))
    {
      echo "You are already logged in ...";
      ?>

      <html>
      <body>
      <form action=<?php echo $_SERVER['PHP_SELF'];?> method="POST">
                  <input type="submit" name="logout" value="Logout" ><br><br>
                  </form>
                  </body>
                  </html>           
                   <?php
                  if(isset($_POST['logout']))
                  {
                        session_destroy();
                        header('Location: ./index.php');
                  }
      }
      
    }
    if(!isset($_SESSION['uname']) || ($_SESSION['uid']==1) || $_SESSION['uRole']=='subAdmin')
    {
?>

    <h2> Registration Information</h2>
    <div class="container">
        <form action="" method="post">
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
            <input type="password" name="pass" placeholder="Password" required><br>
            <!-- Select a file: <input type="file" name="photo"><br><br> -->
            <?php
            if($_SESSION['uid']==1 || $_SESSION['uRole']=='subAdmin')
            {
            ?>
            <input name="role" type="text" placeholder="Enter Role"><br><br>
            <?php
            }
            ?>
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
    $rndno=rand(100000, 999999);
 $message = "otp number.".$rndno; 
 $to=$_POST['email']; 
 $subject = "OTP"; $txt = "OTP: ".$rndno.""; 
// mail($to,$subject,$txt,$headers); 
 $_SESSION['email']=$_POST['email']; 
 $_SESSION['msg']=$message;
 $_SESSION['otp']=$rndno;
 

 $_SESSION['rname']=$_POST['rname']; 
 $_SESSION['email']=$_POST['email']; 
 $_SESSION['gender']=$_POST['gender']; 
 $_SESSION['qualification']=$_POST['qualification']; 
 $_SESSION['dob']=$_POST['dob']; 
 $_SESSION['pass']=$_POST['pass']; 
 $_SESSION['role']=$_POST['role']; 

 


 header('Location: ./mailtrail.php');




}

?>
