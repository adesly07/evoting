<?php
include ('../conx.php');
if (!isset($_SESSION['username']) || !isset($_SESSION['password']))
header('LOCATION: '.'../login.php');

$username = $_SESSION['username'];
$password = $_SESSION['password'];
$m_name = $_SESSION['name'];
$reg_num = $_SESSION['reg_num'];
$sql = mysql_query("select * from create_login where username = '$username' and password = '$password'");
//if (!$sql) die (mysql_error());
while ($row = mysql_fetch_array($sql)) {
$m_name = $row['name'];
}
$id = $_REQUEST['id'];
$sql1 = mysql_query("select * from loan where id = '$id'");
while ($row = mysql_fetch_array($sql1)) {
$myname = $row['name'];
}

$submit = $_POST['submit'];
if ($submit == "OK") {
$sn = $_POST['sn'];	
$status = $_POST['status'];
$sql2 = mysql_query("update loan set status = '$status' where id = '$sn'");	
if($sql2) {
header ('location:r_loan.php');	
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
  <style type="text/css">
  .style3 {font-family: verdana, tohama, arial}
  </style>
  <link rel="stylesheet" href="jquery-ui.min.css" type="text/css" /> 
<script src="datetimepicker_css.js"></script>

</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader"></div>
    <!-- Pre-loader end -->
  <div id="pcoded" class="pcoded">
    <div class="pcoded-container navbar-wrapper">
    <div class="pcoded-main-container">
          <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
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
                                          <h5><?php echo $myname; ?></h5>
                                        </div>
                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th><form name="form1" method="post" action="c_status2.php">
                                                                        
                                                                          <p>
                                                                            Status 
                                                                            <select name="status" id="status">
                                                                              <option value="DISAPPROVED" selected>DISAPPROVED</option>
                                                                              <option value="APPROVED">APPROVED</option>
                                                                            </select>
                                                                            <input name="sn" type="hidden" id="sn" value="<?php echo $id; ?>">
                                                                            <input type="submit" name="submit" value="OK">
                                                                          </p>
                                                                        </form></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    
                                                                </tbody>
</table>
                                            </div>
                                        </div>
                                    </div>
                                  
                                </div>
                                <!-- Page-body end -->
                            </div>
                        </div>
                      <!-- Main-body end --></div>
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
<script src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script><script>
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
