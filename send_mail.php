<?php
include("conx.php");
 $pwd = $_SESSION['password'];
$myname = $_SESSION['name'];
$email = $_SESSION['email'];
require "PHPMailer/PHPMailerAutoload.php";

function smtpmailer($to, $from, $from_name, $subject, $body, $myname,  $pwd)
    {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true; 
 
        $mail->SMTPSecure = 'ssl'; 
        $mail->Host = 'mail.ddiseballot.com.ng';
        $mail->Port = 465;  
        $mail->Username = 'admin@ddiseballot.com.ng';
        $mail->Password = 'smysoft@2023';   
   
   //   $path = 'reseller.pdf';
   //   $mail->AddAttachment($path);
   
        $mail->IsHTML(true);
        $mail->From="admin@ddiseballot.com.ng";
        $mail->FromName=$from_name;
        $mail->Sender=$from;
        $mail->AddReplyTo($from, $from_name);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($to);
        if(!$mail->Send())
        {
            $error ="Please try Later, Error Occured while Sending Mail...";
            return $error; 
        }
        else 
        {
            
            //header('location:confirm.php');
        $error = "<p>Dear $myname, kindly check your mail for your password details </p>
                                                                   <hr/>
<p><a href='login.php'>Click here to login</a></p></h3>
                                <hr/>";  
           return $error;
        }
    }
   
    $to   = $email;
    $from = '';
    $name = '';
   $myname = $myname;
    $pwd = $pwd;
    $matric_no = $matric_no;
    $subj = 'Your Password';
    $msg = "Hi $myname,
	  <p> Below is your password</p>
	   <p>_______________________________<p>
	   
	   <p>Username: Your matric number <p>
	   <p>Password: $pwd <p>
	   
	  <p> _______________________________<p>
	   
	 <p><a href='http://www.ddiseballot.com.ng/login.php'>Click here to login</a></p>
	  	   
	  DDIS Electroral Team";
    
    $error=smtpmailer($to,$from, $name ,$subj, $msg, $myname, $pwd);
    
 
  
?>
<html>
    <head>
        <title>Email</title>
    </head>
    <body style="background: white;">
        <center><h4 style="padding-top:70px;color: black;"><?php echo $error; ?>
        </h4></center>
    </body>
    
</html>