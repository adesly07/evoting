<?php
include ('../conx.php');
if (!isset($_SESSION['username']) || !isset($_SESSION['password']))
header('LOCATION: '.'../login.php');

$username = $_SESSION['username'];
$password = $_SESSION['password'];
$sql = mysql_query("select * from create_login where username = '$username' and password = '$password'");
//if (!$sql) die (mysql_error());
while ($row = mysql_fetch_array($sql)) {
$m_name = $row['name'];
$_SESSION['name'] = $m_name;
}
$msg = "Create User";
$submit = $_POST['submit'];
if ($submit == "Create User")
{  // text1
$name = $_POST['name'];
$user = $_POST['user'];
$pwd = $_POST['n_pwd'];
$sec = $_POST['section'];
$confirm = $_POST['confirm'];
if ($pwd != $confirm) {
$msg = "New Password and Confirm Password does not Match.";	
	
} else {
	$pwd = base64_encode($pwd);
$sql2 = mysql_query ("insert into create_login set name = '$name', username = '$user', password = '$pwd', t_section = '$sec'");
if ($sql2) {
$msg = "User has been created successfully";
} else {
$msg = "Error in creating user. Try again later";
}
}
}
$id = $_REQUEST['id'];
$sql1 = mysql_query("delete from create_login where cid = '$id'");
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
<script language="JavaScript">
function check_deletion()
	{
		if (confirm("Are you sure you want to delete this record?"))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
</script>

  </head>

  <body>
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
                                    <img src="../images/user.png" alt="">                                   
                                    <span><?php echo $m_name; ?></span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    <li>
                                        <a href="#">
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
                                    <img src="../images/user.png" alt="" width="50" height="50">                                   

                                    <div class="user-details">
 <span><?php echo $m_name; ?></span>                                        <span id="more-details">Administrator<i class="ti-angle-down"></i></span>
                                    </div>
                                </div>

                                <div class="main-menu-content">
                                    <ul>
                                        <li class="more-details">
                                            <a href="#"><i class="ti-user"></i>Edit Profile</a>
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
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                        <div class="row">
                                            <!-- card1 start --><!-- card1 end -->
                                            <!-- card1 start --><!-- card1 end -->
                                            <!-- card1 start --><!-- card1 end -->
                                            <!-- card1 start --><!-- card1 end -->
                                            <!-- Statestics Start -->
                                           
                                            <!-- Email Sent End -->
                                            <!-- Data widget start -->
              <div class="col-md-12 col-xl-6">
                                                <div class="card project-task">
                                                    <div class="card-header">
                                                        <div class="card-header-left ">
                                                          <h5><?php echo $msg; ?></h5>
                                                      </div>
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
                                                    <div class="card-block p-b-10">
                                                        <div class="table-responsive">
   <form id="form1" name="form1" method="post" action="c_user.php">
     <table class="table table-hover">
       <thead>
         <tr>
           <th width="33%"><span class="error"><a href="#">Name</a></span></th>
           <th width="67%"><input name="name" type="text" id="name" value=""></th>
         </tr>
          <tr>
           <th width="33%"><span class="error">Username</span></th>
           <th width="67%"><input name="user" type="text" id="user" value=""></th>
         </tr>
         <tr>
           <th>Password</th>
           <th><input type="password" name="n_pwd" id="n_pwd"></th>
         </tr>
         <tr>
           <th>Confirm Password</th>
           <th><input type="password" name="confirm" id="confirm"></th>
         </tr>
         <tr>
           <th>Section</th>
           <th><select name="section" id="section">
             <option value="Electoral Representative" selected>Electoral Representative</option>
             <option value="Election Observer">Election Observer</option>
           </select></th>
         </tr>
         <tr>
           <th>&nbsp;</th>
           <th><input type="submit" name="submit" id="submit" value="Create User"></th>
         </tr>
         </thead>
       <tbody>
       </tbody>
     </table>
   </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
              <div class="col-md-12 col-xl-6">
                                                <div class="card project-task">
                                                    <div class="card-header">
                                                        <div class="card-header-left ">
                                                            <h5>Created Users</h5>
                                                        </div>
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
                                                    <div class="card-block p-b-10">
                                                        <div class="table-responsive">
                                                           <table class="table table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th width="33%">Name</th>
                                                                        <th width="33%">Username</th>
                                                                        <th width="33%">Section</th>
                                                                        <th width="33%">&nbsp;</th>
                                                                    </tr>
                                                                    <?php
$sql1 = mysql_query("select * from create_login order by cid desc");																
while($row = mysql_fetch_array($sql1)) {
	$mysn = $row['cid'];
	$myname = $row['name'];
	$myuser = $row['username'];
	$mysec = $row['t_section'];
	
																		
																	?>
                                                                    <tr>
                                                                      <th><?php echo $myname; ?></th>
                                                                      <th><?php echo $myuser; ?></th>
                                                                      <th><?php echo $mysec; ?></th>
                                                                      <th><a href="c_user.php?id=<? echo $mysn ?>" onClick="return check_deletion()"><img src="../images/delete.png" width="10" height="10" /></a></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                </tbody>
<?php } ?>
 </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                                <!-- Data widget End -->
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div id="styleSelector">

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
