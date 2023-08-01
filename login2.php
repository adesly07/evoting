<?php
include("conx.php");
$msg = "Sign in to vote";

$submit = $_POST['submit'];
if($submit)
{  // text1
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password = base64_encode($password);
$m_number = array('1', '2', '3', '4', '5');
$m_replace = array ('K', 'F', 'Z', 'M', 'X');
$m_encode = str_replace($m_number,$m_replace,$username);

$sql1 = mysql_query("select * from reg where matric_no = '$m_encode' and password = '$password' and status = 'Allow'");
while($row = mysql_fetch_array($sql1)){
$email = $row['email'];	
$name = $row['name'];	
}
$vowel = array('4', '3', '7', '1', '9');
$v_replace = array ('A', 'E', 'I', 'O', 'U');
$name = str_replace($vowel,$v_replace,$name);

if(mysql_num_rows($sql1)){
  $sql4 = mysql_query("select * from current");
while($row = mysql_fetch_array($sql4)) {
	$period = $row['period'];
}
if ($period == 'ELECTION DAY') {
	$_SESSION['name'] = $name;
	$_SESSION['email'] = $email;
$_SESSION['m_encode'] = $m_encode;
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
header("location: s_reminder.php");
} else {

$_SESSION['m_encode'] = $m_encode;
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
header("location: voters/");
}
} else {
	//$password = base64_encode($password);
$sql = mysql_query("select * from create_login where username = '$username' and password = '$password'");
if(mysql_num_rows($sql)) {
	while($row = mysql_fetch_array($sql)) {
	$cid = $row['cid'];
	$s_question = $row['s_question'];
	if($s_question == "") {
$_SESSION['cid'] = $cid;
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
header("location: s_question.php");
	} else {
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
header("location: mgt/");
	}
	}
} else {
$password = base64_encode($password);
$sql2 = mysql_query("select * from a_reg where matric_no = '$m_encode' and password = '$password' and status = 'Allow'");
if(mysql_num_rows($sql2)) {
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
$_SESSION['m_encode'] = $m_encode;
header("location: aspirant/");
} else {
$msg = "Invalid Username or Password";	
}
}
	
}



}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-Voting</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="CodedThemes">
    <meta name="keywords" content=" Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="CodedThemes">
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body class="fix-menu">
    <!-- Pre-loader start -->
    <!-- Pre-loader end -->
    <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="signup-card card-block auth-body mr-auto ml-auto">
                        <form id="form1" name="form1" method="post" action="login.php">
                            
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary"><span class="text-center"><img src="assets/images/auth/logo-dark.png" alt="logo.png"></span></h3><br><span class="redtext"><?php echo $msg; ?></span>
                                    </div>
                                </div>
                                <hr/>
                                <div class="input-group">
                                    <input name="username" type="text" class="form-control" id="username" placeholder="Username" autofocus required>
                                    <span class="md-line"></span>
                        </div>
                                <div class="input-group">
                                    <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
                                    <span class="md-line"></span>
                          </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
<input type="submit" name="submit" id="submit" value="Login to Vote" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">                                    </div>
                                    <span class="col-md-12">
                                    
                                </span> </div>
                                <hr/>
                                <div class="row">
                                    
                              <div class="col-md-12">
<h3 class="text-center txt-primary"><a href="signup.php">Click here to Register</a></h3>
                              </div>
                                </div>
                            </div>
                        </form>
                        <!-- end of form -->
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
	
    <!-- Required Jquery -->
    <script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="assets/js/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="assets/js/modernizr/css-scrollbars.js"></script>
    <script type="text/javascript" src="assets/js/common-pages.js"></script>
</body>

</html>
