<?php
include("conx.php");
//Define cipher
$ciper = "aes-256-cbc";
//Generate a 256-bit encryption key
$encryption_key = openssl_random_pseudo_bytes(32);
//Generate an initialization vector
$iv_size = openssl_cipher_iv_length($ciper);
$iv = openssl_random_pseudo_bytes($iv_size);
//Data to encrypt
$data = "Sample Text";
$encrypted_data = openssl_encrypt($data, $ciper, $encryption_key, 0, $iv);
//Decryption
// Define cipher
$ciper = "aes-256-cbc";
//Decrypt Data
$decrypted_data = openssl_decrypt($encrypted_data, $ciper, $encryption_key, 0, $iv);

$msg = "Fill the form below to sign up.";

$submit = $_POST['submit'];
if($submit)
{  // text1
	$name = $_POST['name'];
	$matric_no = $_POST['matric_no'];
	$phone = $_POST['phone_no'];
	$email = $_POST['email'];
	$declare = $_POST['declare'];
	$ip = getenv ("REMOTE_ADDR");
	$name = addslashes($name);
	$name = strtoupper($name);
$vowel = array('A', 'E', 'I', 'O', 'U');
$v_replace = array ('4', '3', '7', '1', '9');
$n_encode = str_replace($vowel,$v_replace,$name);
$m_number = array('1', '2', '3', '4', '5');
$m_replace = array ('K', 'F', 'Z', 'M', 'X');
$m_encode = str_replace($m_number,$m_replace,$matric_no);
$p_number = array('6', '2', '5', '1', '4');
$p_replace = array ('O', 'E', 'D', 'P', 'G');
$p_encode = str_replace($p_number,$p_replace,$phone);

	//$ip = $_SERVER['REMOTE_ADDR'];
	$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
$pwd = substr(str_shuffle($permitted_chars), 0, 5);

$sql1 = mysql_query("select * from e_list where matric_no = '$matric_no'");
if(!mysql_num_rows($sql1)) {
$msg = "Your matric number does not match our eligibility list. Contact Electoral Commission for complaint.";	
} else  {
$sql = mysql_query("INSERT INTO reg SET matric_no = '$m_encode', password = '$pwd', name = '$n_encode', phone_no = '$p_encode', email = '$email', declaration = '$declare', status = 'Allow', ip = '$ip', date = CURDATE()");
if($sql){
	$_SESSION['matric_no'] = $matric_no;
	$_SESSION['name'] = $name;
	$_SESSION['pwd'] = $pwd;
	header("location:confirm.php");
} else {
$msg = "Error in registration, try again.";		
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
                        <form id="form1" name="form1" method="post" action="signup.php">
                            
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary"><span class="text-center"><img src="assets/images/auth/logo-dark.png" alt="logo.png"></span></h3><br><span class="redtext"><?php echo $msg; ?></span>
                                    </div>
                                </div>
                                <hr/>
                                <div class="input-group">
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" autofocus required>
                                    <span class="md-line"></span>
                              </div>
                                <div class="input-group">
                                    <input name="matric_no" type="text" class="form-control" id="matric_no" placeholder="Matric Number" required>
                                    <span class="md-line"></span>
                              </div>
                                    <div class="input-group">
                                      <input name="phone_no" type="text" class="form-control" id="phone_no" placeholder="Phone Number" required>
                                      <span class="md-line"></span> </div>
                              <div class="input-group">
                                      
                                    <input name="email" type="text" class="form-control" id="email" placeholder="Email Number" required>
                                    <span class="md-line"></span>
                              </div>

<div class="row m-t-25 text-left">
                                    <div class="col-md-12">
                                        <div class="checkbox-fade fade-in-primary">
                                            <label>
                                                <input name="declare" type="checkbox" id="declare" value="Declared" required>
                                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                <span class="text-inverse">I declare that the above information is true and correct to the best of my knowledge.</span>
                                             </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkbox-fade fade-in-primary">
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
<input type="submit" name="submit" id="submit" value="Sign Up" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">                                    </div>
                                    <span class="col-md-12">
                                    
                                </span> </div>
                                <hr/>
                                <div class="row">
                                    
                              <div class="col-md-12">
<h3 class="text-center txt-primary"><a href="login.php">Click here to login</a></h3>
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
