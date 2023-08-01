<?php
include ('../conx.php');
require "../PHPMailer/PHPMailerAutoload.php";

function smtpmailer($to, $from, $from_name, $subject, $body)
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
		$sql = mysql_query("select * from reg where status = 'Allow'");
		while($to = mysql_fetch_array($sql)){
        $mail->AddAddress($to['email']);
		}
        if(!$mail->Send())
        {
            $error ="Please try Later, Error Occured while Sending Mail...";
            return $error; 
        }
        else 
        {
            
            //header('location:confirm.php');
        $error = ""; 
         header("location:u_current.php");  
           return $error;
        }
    }
   
    $to   = '';
    $from = '';
    $name = '';
   //$myname = $myname;
    //$pwd = $pwd;
    $matric_no = $matric_no;
    $subj = 'Voter Reminder';
    $msg = "Election holds today.
<p>Login <a href='http://www.ddiseballot.com.ng/login.php'>here</a> to your platform to vote for your preferred candidate.</p>

DDIS Electroral Team";
    
    $error=smtpmailer($to,$from, $name ,$subj, $msg);
    
 
  
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