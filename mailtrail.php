<?php
session_start();
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;

// Import PHPMailer classes into the global namespace
 // These must be at the top of your script, not inside a function
 
 
 //Load Composer's autoloader
 require 'vendor/autoload.php';
 
 $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
 try {
     //Server settings
     $mail->SMTPDebug = 2;                                 // Enable verbose debug output
     $mail->isSMTP();                                      // Set mailer to use SMTP
     $mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
     $mail->SMTPAuth = true;                               // Enable SMTP authentication
     $mail->Username = 'alshayakapoor@gmail.com';                 // SMTP username
     $mail->Password = 'Vrushali@123';                           // SMTP password
     $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
     $mail->Port = 587;                                    // TCP port to connect to
 
     //Recipients
     $mail->setFrom($_SESSION['email'], 'Mailer');
     $mail->addAddress($_SESSION['email'], 'Joe User');     // Add a recipient
     
 
     //Attachments
       // Optional name
 
     //Content
    // $mail->isHTML(true);                                  // Set email format to HTML
     $mail->Subject = 'Here is the subject';
     $mail->Body    = "OTP".$_SESSION['otp'];
     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
     $mail->send();
     ?>
     <form action="" method="post">
     <input type="password" placeholder="OTP" name="otpvalue"><br>
     <input type="submit" name="encrypt" value="Verify">
     </form>
      <?php
      
 if(isset($_POST['encrypt'])) 
 {
    $rno=$_SESSION['otp'];
    $urno=$_POST['otpvalue'];
    
    if(!strcmp($rno,$urno))
    {
        include "Registration.php";

        $reg=new Registration();

        $result1=$reg->register($_SESSION['id'],$_SESSION['rname'],$_SESSION['email'],$_SESSION['gender'],$_SESSION['dob'],$_SESSION['qualification'],$_SESSION['uname'],$_SESSION['pass']);
        if(!$result1)
        {
        echo"not Inserted";}
        else
        {
            echo"Inserted";
            ?>

            <a href="index.php">Home</a>
            <?php
        }
        //echo"valid";
    }
    else{
    echo "<p>Invalid OTP</p>";
    }
 }

 } catch (Exception $e) {
     echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
 }
 
 exit();
?>