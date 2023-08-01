<?php
include("conx.php");
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$cid = $_SESSION['cid'];
$m_encode = $_SESSION['m_encode'];

$msg = "Add Secret Question.";

$submit = $_POST['submit'];
if($submit)
{  // text1
	$mycid = $_POST['cid'];
	$s_question = $_POST['s_question'];
	$s_answer = $_POST['s_answer'];
	$s_question = strtoupper($s_question);
	$s_answer = strtoupper($s_answer);
$vowel = array('A', 'E', 'I', 'O', 'U');
$v_replace = array ('4', '3', '7', '1', '9');
$s_question = str_replace($vowel,$v_replace,$s_question);
$vowel1 = array('A', 'E', 'I', 'O', 'U');
$v_replace1 = array ('4', '3', '7', '1', '9');
$s_answer = str_replace($vowel1,$v_replace1,$s_answer);
$s_question = base64_encode($s_question);
$s_answer = base64_encode($s_answer);
$sql = mysql_query("update create_login SET s_question = '$s_question', s_answer = '$s_answer' where cid = '$mycid'");
if($sql){
	header("location: mgt/");
} else {
$msg = "Error in adding secret question, try again.";
	header("location: login.php");
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
                        <form id="form1" name="form1" method="post" action="s_question.php">
                            
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary"><span class="text-center"><img src="assets/images/auth/logo-dark.png" alt="logo.png"></span></h3><br><span class="redtext"><?php echo $msg; ?></span>
                                    </div>
                                </div>
                                <hr/>
                                <div class="input-group">
                                   
                                    <select name="s_question" id="s_question" class="form-control">
                                      <option selected>Select a secret question</option>
                                      <option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
                                      <option value="What is the name of your spouse">What is the name of your spouse</option>
                                      <option value="What is the name of your pet?">What is the name of your pet?</option>
                                      <option value="What is your birth month?">What is your birth month?</option>
                                    </select>
                                    <span class="md-line"></span>
                            </div>
                                <div class="input-group">
                                    <input name="s_answer" type="text" class="form-control" id="s_answer" placeholder="Answer" required>
                                    <input name="cid" type="hidden" id="cid" value="<?php echo $cid; ?>">
                                    <span class="md-line"></span>
                        </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
<hr/>
<input type="submit" name="submit" id="submit" value="OK" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">                                    </div>
                                    <span class="col-md-12">
                                    
                                </span> </div>
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
