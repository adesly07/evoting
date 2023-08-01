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
$reg_num = $_SESSION['reg_num'];
$sql = mysql_query("select * from reg where reg_num = '$reg_num'");
//if (!$sql) die (mysql_error());
while ($row = mysql_fetch_array($sql)) {
$c_name = $row['name'];
$pwd = $row['password'];
$reg_num = $row['reg_num'];
$occupation = $row['occupation'];
$gender = $row['gender'];
$phone = $row['phone'];
$address = $row['address'];
$m_status = $row['m_status'];
$acc_name = $row['acc_name'];
$acc_no = $row['acc_no'];
$acc_type = $row['acc_type'];
$bank = $row['bank'];
$cdate = $row['date'];
$file_name1 = $row ['file_name1'];
$file_name2 = $row ['file_name2'];
}

$submit = $_POST['submit'];
if ($submit)
{  // text1

//$sn = $_POST['sn'];
$myreg_num = $_POST['reg_num'];
$myname = $_POST['name'];
$myaddress = $_POST['address'];
$mphone = $_POST['phone'];
$mygender = $_POST['gender'];
$myoccupation = $_POST['occupation'];
//$myemail = $_POST['email'];
$mym_status = $_POST['m_status'];
$myacc_name = $_POST['acc_name'];
$myacc_no = $_POST['acc_no'];
$myacc_type = $_POST['acc_type'];
$mybank = $_POST['bank'];
$sql2 = mysql_query("UPDATE reg SET name = '$myname', address = '$myaddress', phone = '$mphone', gender = '$mygender', occupation = '$myoccupation', m_status = '$mym_status', acc_name = '$myacc_name', acc_type = '$myacc_type', acc_no = '$myacc_no', bank = '$mybank' where reg_num = '$myreg_num'");
if($sql2){
	header("Location:e_profile.php");
} else {
$error = "Error in Updating Data, try again.";		
}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Restorer Investment Limited</title>
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
<img src="../images/user.png" alt="">                                    <span><?php echo $m_name; ?></span>
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
                                                            <h5>View Profile | <?php echo $pwd; ?> | <a href="c_details.php">Back</a></h5>
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
                                                                        <th width="33%">Registration Number</th>
                                                                        <th width="67%"><?php echo $reg_num; ?></th>
                                                                    </tr>
                                                                    <tr>
                                                                      <th>Name</th>
                                                                      <th><?php echo $c_name; ?></th>
                                                                    </tr>
                                                                    <tr>
                                                                      <th>Phone Number</th>
                                                                      <th><?php echo $phone; ?></th>
                                                                    </tr>
                                                                    <tr>
                                                                      <th>Gender</th>
                                                                      <th><?php echo $gender; ?></th>
                                                                    </tr>
                                                                    <tr>
                                                                      <th>Address</th>
                                                                      <th><?php echo $address; ?></th>
                                                                    </tr>
                                                                    <tr>
                                                                      <th>Occupation</th>
                                                                      <th><?php echo $occupation; ?></th>
                                                                    </tr>
                                                                    <tr>
                                                                      <th>Marital Status</th>
                                                                      <th><?php echo $m_status; ?></th>
                                                                    </tr>
                                                                    <tr>
                                                                      <th>Account Name</th>
                                                                      <th><?php echo $acc_name; ?></th>
                                                                    </tr>
                                                                    <tr>
                                                                      <th>Account Number</th>
                                                                      <th><?php echo $acc_no; ?></th>
                                                                    </tr>
                                                                    <tr>
                                                                      <th>Account Type</th>
                                                                      <th><?php echo $acc_type; ?></th>
                                                                    </tr>
                                                                    <tr>
                                                                      <th>Bank</th>
                                                                      <th><?php echo $bank; ?></th>
                                                                    </tr>
                                                                        <tr>
                                                                      <th colspan="2"><input name="declare" type="checkbox" disabled value="" checked> I declare that the above information is true and <br>correct to the best of my knowledge and belief in all the rules <br>and regulations of RESTORER INVESTMENT LIMITED <br>if my application is approved</th>
                                                                    </tr>
                                                                    <tr>
                                                                      <th colspan="2"></th>
                                                                    </tr>
                                                                    <tr>
                                                                      <th colspan="2">Signature: <img src="../member/signature/<?php echo $file_name1 ?>" alt="">  Thumb Print: <img src="../member/thumb/<?php echo $file_name2 ?>" alt=""> Date: <?php echo $cdate; ?>  </th>
                                                                    </tr>
                                                           </thead>
                                                                <tbody>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12 col-xl-6">
                                                <div class="card project-task">
                                                    <div class="card-header">
                                                        <div class="card-header-left ">
                                                            <h5>Edit Profile | <a href="upload_pix.php">Upload Passport</a>| <a href="upload_pix1.php">Upload Signature</a> | <a href="upload_pix2.php">Upload Thumb Print</a></h5>
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
   <form id="form1" name="form1" method="post" action="e_profile.php">
     <table class="table table-hover">
       <thead>
         <tr>
           <th width="33%">Registration Number</th>
           <th width="67%"><input name="reg_num" type="text" id="reg_num" value="<?php echo $reg_num; ?>" readonly="readonly"></th>
         </tr>
         <tr>
           <th>Name</th>
           <th><input name="name" type="text" id="name" value="<?php echo $c_name; ?>" readonly="readonly"></th>
         </tr>
         <tr>
           <th>Phone Number</th>
           <th><input name="phone" type="text" id="phone" value="<?php echo $phone; ?>" readonly="readonly"></th>
         </tr>
         <tr>
           <th>Gender</th>
           <th><input name="gender" type="text" id="gender" value="<?php echo $gender; ?>"></th>
         </tr>
         <tr>
           <th>Address</th>
           <th><textarea name="address" id="address"><?php echo $address; ?></textarea></th>
         </tr>
         <tr>
           <th>Occupation</th>
           <th><input name="occupation" type="text" value="<?php echo $occupation; ?>"></th>
         </tr>
         <tr>
           <th>Marital Status</th>
           <th><input name="m_status" type="text" value="<?php echo $m_status; ?>"></th>
         </tr>
         <tr>
           <th>Account Name</th>
           <th><input name="acc_name" type="text" value="<?php echo $acc_name; ?>"></th>
         </tr>
         <tr>
           <th>Account Number</th>
           <th><input name="acc_no" type="text" value="<?php echo $acc_no; ?>"></th>
         </tr>
         <tr>
           <th>Account Type</th>
           <th><input name="acc_type" type="text" value="<?php echo $acc_type; ?>"></th>
         </tr>
         <tr>
           <th>Bank</th>
           <th><input name="bank" type="text" value="<?php echo $bank; ?>"></th>
         </tr>
         <tr>
           <th>&nbsp;</th>
           <th><input type="submit" name="submit" id="submit" value="Update Profile"></th>
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
