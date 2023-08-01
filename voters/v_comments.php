<?php
include ('../conx.php');
if(!isset($_session)){
session_start();
}
if (($matric_no != "") && (!isset($_SESSION["starttime"])) && (!isset($_SESSION["endtime"])))
{
	header("location:index.php");
	exit;
}
$myetime = $_SESSION['endtime'];
$mystime = $_SESSION['starttime'];
$matric_no = $_SESSION['matric_no'];
$m_name = $_SESSION['name'];
$file_name2 = $_SESSION['file_name'];
$section = $_SESSION['sch_session'];

$myfid = $_REQUEST['fid'];
$sql5 = mysql_query("select * from forum where fid = '$myfid'");
while($row = mysql_fetch_array($sql5)) {
$myfid = $row['fid'];
$mymatric = $row['matric_no'];
	$mycontent = $row['content'];
	$cby = $row['created_by'];
	//$phone = $row['phone'];
	$pdate = $row['pdate'];
	$ptime = $row['ptime'];
$mycontent = stripslashes ($mycontent);

$vowel = array('4', '3', '7', '1', '9');
$v_replace = array ('a', 'e', 'i', 'o', 'u');
$mycontent = str_replace($vowel,$v_replace,$mycontent);
$vowel1 = array('4', '3', '7', '1', '9');
$v_replace1 = array ('A', 'E', 'I', 'O', 'U');
$cby = str_replace($vowel1,$v_replace1,$cby);
$sql = mysql_query("select * from a_reg where matric_no = '$mymatric' and sch_session = '$section'");
while ($row = mysql_fetch_array($sql)) {
$file = $row ['file_name'];
$a_post = $row ['a_post'];
$_SESSION['fid'] = $myfid;
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
<script src="datetimepicker_css.js"></script>
<script src="highcharts.js"></script>
<script src="data.js"></script>
<script src="drilldown.js"></script>
<script src="export-data.js"></script>
<script src="accessibility.js"></script>
<link href="style.css" rel="stylesheet" type="text/css" />

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
                                      <div class="card-block table-border-style">
                                      <div class="table-responsive">
                                        <table class="table table-hover">
                                        <tbody>
                                        <tr>
                                          <td class="<?php echo $color; ?>"><div class="card">
                                            <div class="card-header">
                                              <h5>Forum</h5>
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
                                                      <th align="left"><span class="main-menu-header"><img src="../aspirant/photos/<?php echo $file; ?>" alt="" width = "100" height="100" align="left"></span><a href="#"><?php echo $cby; ?></a> FOR <?php echo strtoupper($a_post); ?><br><font color="#000000"><?php echo $mycontent; ?></font><br><?php echo $pdate; ?> <?php echo $ptime; ?></th>
                                                    </tr>
                                                    <tr>
                                                      <th align="left">&nbsp;</th>
                                                    </tr>
                                                    <tr>
                                                      <th align="left"><iframe src="comment.php" name="I1" width="200" marginwidth="1" height="100" marginheight="1" scrolling="No" frameborder="0" class="mtable" id="I1" border="0"> Your browser does not support inline frames or is currently configured not to display inline frames. </iframe></th>
                                                    </tr>
                                                    <tr>
                                                      <th align="left">&nbsp;</th>
                                                    </tr>
                                                    <tr>
                                                      <th><iframe src="comment2.php" name="I1" width="400" marginwidth="1" height="500" marginheight="1" scrolling="Yes" frameborder="0" class="mtable" id="I2" border="0"> Your browser does not support inline frames or is currently configured not to display inline frames. </iframe></th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                   
                                                    <tr>
                                                      <td class="<?php echo $color; ?>">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td class="<?php echo $color; ?>"></td>
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
                                    <!-- Basic table card start --><!-- Basic table card end -->
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
