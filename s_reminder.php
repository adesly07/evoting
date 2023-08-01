<?php
include("conx.php");
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$myname = $_SESSION['name'];
$m_encode = $_SESSION['m_encode'];
$email = $_SESSION['email'];
require "PHPMailer/PHPMailerAutoload.php";

function smtpmailer($to, $from, $from_name, $subject, $body, $myname)
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
            $error ="Message not sent.";
            return $error; 
        }
        else 
        {
            
            
        $error = "";  
         header("location:voters/");  
         return $error;
        }
    }
   
    $to   = $email;
    $from = '';
    $name = '';
   $myname = $myname;
    $subj = 'Voter Reminder';
    $msg = "Hi $myname, you have not cast your vote.
<p>Login <p><a href='http://www.ddiseballot.com.ng/login.php'>here</a></p> to your platform to vote for your preferred candidate.</p>

DDIS Electroral Team";
    
    $error=smtpmailer($to,$from, $name ,$subj, $msg, $myname);
    
 
  
?>
<html>
    <head>
        <title>Email</title>
    </head>
    <body style="background: white;">
        <center><h2 style="padding-top:70px;color: black;"><?php echo $error; ?>
        </h2></center>
    </body>
    
</html>
