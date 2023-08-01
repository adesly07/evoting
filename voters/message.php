<?php
include ('../conx.php');
if(!isset($_session)){
session_start();
}
if (!isset($_SESSION['username']) || !isset($_SESSION['password']))
header('LOCATION: '.'../login.php');

$m_encode = $_SESSION['m_encode'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$sql = mysql_query("select * from reg where matric_no = '$m_encode' and password = '$password'");
//if (!$sql) die (mysql_error());
while ($row = mysql_fetch_array($sql)) {
$m_name = $row['name'];
$matric_no = $row['matric_no'];
$file_name2 = $row ['file_name'];
$vowel = array('4', '3', '7', '1', '9');
$v_replace = array ('A', 'E', 'I', 'O', 'U');
$m_name = str_replace($vowel,$v_replace,$m_name);
$m_number = array('K', 'F', 'Z', 'M', 'X');
$m_replace = array ('1', '2', '3', '4', '5');
$matric_no = str_replace($m_number,$m_replace,$matric_no);
$_SESSION['file_name'] = $file_name2;
$_SESSION['name'] = $m_name;
$_SESSION['matric_no'] = $matric_no;
}

$msg = "Send Message";	

$submit = $_POST['submit'];

if ($submit == "Send") {
$c_by = $_POST['c_by'];
$message = $_POST['message'];
$message = addslashes ($message);
$vowel = array ('A', 'E', 'I', 'O', 'U');
$v_replace = array('4', '3', '7', '1', '9');
$c_by = str_replace($vowel,$v_replace,$c_by);
$vowel1 = array ('a', 'e', 'i', 'o', 'u');
$v_replace1 = array('4', '3', '7', '1', '9');
$message = str_replace($vowel1,$v_replace1,$message);

$ip = getenv ("REMOTE_ADDR");
$sql2 = mysql_query("insert into message set matric_no = '$m_encode', name = '$c_by', msg = '$message', s_date = CURDATE(), status = 'UNREAD'");

if ($sql2) {
$msg = "Message sent";	
	
}
else {
$msg = "Error in sending message";	
}
}
 @ $rpp;        //Records Per Page 
    @ $cps;        //Current Page Starting row number 
    @ $lps;        //Last Page Starting row number 
    @ $a;        //will be used to print the starting row number that is shown in the page 
    @ $b;         //will be used to print the ending row number that is shown in the page 
    
 
    if(empty($_GET["cps"])) 
    { 
        $cps = "0"; 
    } 
    else 
    { 
        $cps = $_GET["cps"]; 
    } 
    ///////////////////////////////////////////////////////////////////////////////// 

    $a = $cps+1; 

    $rpp = "30"; 

    $lps = $cps - $rpp; //Calculating the starting row number for previous page 

    if ($cps <> 0) 
    { 
        $prv =  "<a href='message.php?cps=$lps'>Previous</a>"; 
    } 
    else    
    { 
        $prv =  "<font color='cccccc'>Previous</font>"; 
    } 
    ///////////////////////////////////////////////////////////////////////////////// 

    $q="Select SQL_CALC_FOUND_ROWS * from message where matric_no = '$m_encode' order by id DESC limit $cps, $rpp "; 
    $rs=mysql_query($q) or die(mysql_error()); 
    $nr = mysql_num_rows($rs); //Number of rows found with LIMIT in action 

    $q0="Select FOUND_ROWS()"; 
    $rs0=mysql_query($q0) or die(mysql_error()); 
    $row0=mysql_fetch_array($rs0); 
    $nr0 = $row0["FOUND_ROWS()"]; //Number of rows found without LIMIT in action 
	$_SESSION['score_id'] = $row0['score_id'];
    ///////////////////////////////////////////////////////////////////////
    if (($nr0 < 30) || ($nr < 30)) 
    { 
           $b = $nr0; 
    } 
    else 
    { 
        $b = ($cps) + $rpp; 
    } 
    ///////////////////////////////////////////////////////////////////////////////// 
$id = $_REQUEST['id'];
$sql1 = mysql_query("delete from message where id = '$id'");
if(!$sql1) {
die(mysql_error());	

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
      <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">
      <!-- Google font-->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap/css/bootstrap.min.css">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="../assets/icon/themify-icons/themify-icons.css">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="../assets/icon/icofont/css/icofont.css">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
      <link rel="stylesheet" type="text/css" href="../assets/css/jquery.mCustomScrollbar.css">
   <link rel="stylesheet" href="jquery-ui.min.css" type="text/css" /> 
   <script language="javascript" type="text/javascript" src="../tinymce/js/tinymce.js"></script>
	<script language="javascript" type="text/javascript" src="../tinymce/js/tinymce.dev.js"></script>

<script type="text/javascript" src="../tinymce/js/jquery.tinymce.min.js"></script>
<script src="../tinymce/js/tinymce.min.js"></script> 
   <script>tinymce.init({ selector:'textarea' });</script>

  </head>

  <body onLoad="doTimer()">
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">

                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#">
                            <i class="ti-menu"></i>
                        </a>
                        <a class="mobile-search morphsearch-search" href="#">
                            <i class="ti-search"></i>
                        </a>
                        <a href="index.php">
                            <img class="img-fluid" src="../assets/images/logo-dark.png" alt="Theme-Logo" />
                        </a>
                        <a class="mobile-options">
                            <i class="ti-more"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                            </li>

                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            
                            <li class="user-profile header-notification">
                                <a href="#">
<img src="photos/<?php echo $file_name2 ?>" alt="">                                    <span><?php echo $matric_no; ?></span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    <li>
                                        <a href="e_profile.php">
                                            <i class="ti-settings"></i> Edit Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="c_pwd.php">
                                            <i class="ti-user"></i> Change Password
                                        </a>
                                    </li>
                                    <li>
                                    <a href="logout.php?link=index">
                                            <i class="ti-layout-sidebar-left"></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="">
                                <div class="main-menu-header">
                                    <img src="photos/<?php echo $file_name2 ?>" alt="" width = "100" height="100">                                   

                                    <div class="user-details">
 <span><?php echo $m_name; ?></span>                                        <span id="more-details"><?php echo $occupation; ?><i class="ti-angle-down"></i></span>
                                    </div>
                                </div>

                                <div class="main-menu-content">
                                    <ul>
                                        <li class="more-details">
                                            <a href="e_profile.php"><i class="ti-user"></i>Edit Profile</a>
                                            <a href="c_pwd.php"><i class="ti-settings"></i>Change Password</a>
                                            <a href="logout.php?link=index"><i class="ti-layout-sidebar-left"></i>Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
<?php include('menu.php'); ?>
                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-header start -->
                                  <!-- Page-header end -->
                                
                                <!-- Page-body start -->
                                <div class="page-body">
                                    <!-- Basic table card start -->
                                  <div class="card">
                                        <div class="card-header">
                                          <h5><?php echo $msg; ?></h5>
                                          <div class="card-header-right">    <ul class="list-unstyled card-option">        <li><i class="icofont icofont-simple-left "></i></li>        <li><i class="icofont icofont-maximize full-card"></i></li>        <li><i class="icofont icofont-minus minimize-card"></i></li>        <li><i class="icofont icofont-refresh reload-card"></i></li>        <li><i class="icofont icofont-error close-card"></i></li>    </ul></div>
                                        </div>
                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th><form name="form1" method="post" action="message.php">
                                                                          <textarea name="message" cols="35" rows="7" id="message" placeholder="Type in your Message" autofocus="autofocus"></textarea>
                                                                          <input name="c_by" type="hidden" id="c_by" value="<?php echo $m_name; ?>">
<input type="submit" name="submit" id="submit" value="Send" class="button-list">
                                                                        </form></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                </tbody>
</table>
                                            </div>
                                        </div>
                                  </div>
                                    <!-- Basic table card end -->
                                    <!-- Inverse table card start -->
                                    <!-- Inverse table card end -->
                                    <!-- Hover table card start -->
                                    <!-- Hover table card end -->
                                    <!-- Contextual classes table starts -->
                                    <!-- Contextual classes table ends -->
                                    <!-- Background Utilities table start -->
                                    <!-- Background Utilities table end -->
                                </div>
                                <!-- Page-body end -->
                            </div>
                        </div>
                        <!-- Main-body end -->
<div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-header start -->
                                  <!-- Page-header end -->
                                
                                <!-- Page-body start -->
                                <div class="page-body">
                                    <!-- Basic table card start -->
                                  <div class="card">
                                      <div class="card-block table-border-style">
                                      <div class="table-responsive">
                                        <table class="table table-hover">
                                        <tbody>
                                        <tr>
                                          <td class="<?php echo $color; ?>"><div class="card">
                                            <div class="card-header">
                                              <h5>Sent Messages</h5>
                                              <div class="card-header-right">
                                                <ul class="list-unstyled card-option">
                                                  <li><i class="icofont icofont-simple-left "></i></li>
                                                  <li><i class="icofont icofont-maximize full-card"></i></li>
                                                  <li><i class="icofont icofont-minus minimize-card"></i></li>
                                                  <li><i class="icofont icofont-refresh reload-card"></i></li>
                                                  <li><i class="icofont icofont-error close-card"></i></li>
                                                </ul>
                                              </div>
                                            </div>
                                            <div class="card-block table-border-style">
                                              <div class="table-responsive">
                                                <table class="table table-hover">
                                                  <thead>
                                                    <tr>
                                                      <th align="left"><b><font face="verdana" size="1" color="#9999CC"><?php echo " $a - $b of $nr0"; ?></font></b></th>
                                                    </tr>
                                                    <tr>
                                                      <th><table class="table table-hover">
                                                        <thead>
                                                          <tr>
                                                            <th>SN</th>
                                                            <th>Content</th>
                                                            <th>Date</th>
                                                            <th>Time</th>
                                                            <th>&nbsp;</th>
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                                          <?php
//$sql2 = mysql_query("select * from forum where matric_no = '$matric_no' order by fid desc");
while($row = mysql_fetch_array($rs)) {
	$cps = $cps +1;
$id = $row['id'];
$matric_no = $row['matric_no'];
	$mymessage = $row['msg'];
	$sdate = $row['s_date'];
	$mystatus = $row['status'];
$mymessage = stripslashes ($mymessage);
$vowel = array('4', '3', '7', '1', '9');
$v_replace = array ('a', 'e', 'i', 'o', 'u');
$mymessage = str_replace($vowel,$v_replace,$mymessage);
	   ?>
                                                          <tr>
                                                            <td class="<?php echo $color; ?>"><?php echo $cps; ?></td>
                                                            <td class="<?php echo $color; ?>"><?php echo $mymessage; ?></td>
                                                            <td class="<?php echo $color; ?>"><?php echo $sdate; ?></td>
                                                            <td class="<?php echo $color; ?>"><?php echo $mystatus; ?></td>
                                                            
                                                            <td class="<?php echo $color; ?>"><a href="message.php?id=<? echo $id ?>" onClick="return check_deletion()"><img src="../images/delete.png" width="10" height="10" /></a></td>
                                                          </tr>
                                                        </tbody>
                                                        <?php } ?>
                                                      </table></th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    <tr>
                                                      <td class="<?php echo $color; ?>"><b><font face="verdana" size="1" color="#9999CC">
                                                        <?php   echo "$prv"; 

    ///////////////////////////////////////////////////////////////////////////////// 
    
    if ($cps == $nr0) 
    {      
        echo "  |  <font color='CCCCCC'>Next</font>"; 
    } 
    else 
    { 
        if ($nr0 > 30) 
	
        { 
		
            echo "  |  <a href='message.php?cps=$cps&lps=$lps'>Next</a>"; 
        } 
    } 
    ///////////////////////////////////////////////////////////////////////////////// 
    ?>
                                                      </font></b></td>
                                                    </tr>
                                                    <tr>
                                                      <td class="<?php echo $color; ?>"><span class="redtext">
                                                        <?php
                if (!mysql_num_rows($rs)){
				echo "No record found!";
				} 
				?>
                                                      </span></td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </div>
                                            </div>
                                          </div>                                            <b><font face="verdana" size="1" color="#9999CC"></font></b></td>
                                        </tr>
                                        </tbody>
                                        </table>
                                      </div>
                                      </div>
                                  </div>
                                    <!-- Basic table card end -->
                                    <!-- Inverse table card start -->
                                    <!-- Inverse table card end -->
                                    <!-- Hover table card start -->
                                    <!-- Hover table card end -->
                                    <!-- Contextual classes table starts -->
                                    <!-- Contextual classes table ends -->
                                    <!-- Background Utilities table start -->
                                    <!-- Background Utilities table end -->
                                </div>
                                <!-- Page-body end -->
                            </div>
                        </div>
                      </div>
                </div>
                    </div>
                </div>
                
            </div>
        </div>

<!-- Required Jquery -->
<script type="text/javascript" src="../assets/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="../assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="../assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="../assets/js/modernizr/modernizr.js"></script>
<!-- am chart -->
<script src="../assets/pages/widget/amchart/amcharts.min.js"></script>
<script src="../assets/pages/widget/amchart/serial.min.js"></script>
<!-- Todo js -->
<script type="text/javascript " src="../assets/pages/todo/todo.js "></script>
<!-- Custom js -->
<script type="text/javascript" src="../assets/pages/dashboard/custom-dashboard.js"></script>
<script type="text/javascript" src="../assets/js/script.js"></script>
<script type="text/javascript " src="../assets/js/SmoothScroll.js"></script>
<script src="../assets/js/pcoded.min.js"></script>
<script src="../assets/js/demo-12.js"></script>
<script src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script>
var $window = $(window);
var nav = $('.fixed-button');
    $window.scroll(function(){
        if ($window.scrollTop() >= 200) {
         nav.addClass('active');
     }
     else {
         nav.removeClass('active');
     }
 });
</script>
</body>

</html>
