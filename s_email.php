<?php
include("conx.php");
 $pwd = $_SESSION['pwd'];
$myname = $_SESSION['name'];
$matric_no = $_SESSION['matric_no'];
$email = $_SESSION['email'];
require "PHPMailer/PHPMailerAutoload.php";

function smtpmailer($to, $from, $from_name, $subject, $body, $myname, $matric_no, $pwd)
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
        $error = "<p>Dear $myname, kindly check your mail for your login details </p>
                              
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
    $subj = 'Your Login Details';
    $msg = "Hi $myname,
	  <p> Below is your login details</p>
	   <p>_______________________________<p>
	   
	   <p>Matric Number: $matric_no <p>
	   <p>Password: $pwd <p>
	   
	  <p> _______________________________<p>
	   
	 <p><a href='http://www.ddiseballot.com.ng/login.php'>Click here to login</a></p>
	  	   
	  DDIS Electroral Team";
    
    $error=smtpmailer($to,$from, $name ,$subj, $msg, $myname, $matric_no, $pwd);
    
 
  
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