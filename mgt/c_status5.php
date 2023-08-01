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
$sql1 = mysql_query("select * from account where id = '$id'");
while ($row = mysql_fetch_array($sql1)) {
$myname = $row['name'];
$myreg = $row['reg_num'];
$mya_no = $row['a_no'];
$myprog = $row['programme'];
$mycapital = $row['capital'];
$myperiod = $row['p_month'];
$cdate = $row['cdate'];
}

$submit = $_POST['submit'];
if ($submit == "OK") {
$sn = $_POST['sn'];	
$name = $_POST['name'];	
$reg_num = $_POST['reg_num'];	
$capital = $_POST['capital'];	
$a_no = $_POST['a_no'];	
$status = $_POST['status'];
$period = $_POST['period'];
$r_perce = $_POST['r_perce'];
$edate = $_POST['e_date'];
$d_paid = date('d/m/Y');
$month = date('F');
$year = date('Y');
$ip = $_SERVER['REMOTE_ADDR'];
$roi = (($r_perce / 100) * $capital) * $period;
$t_amt = ($roi + $capital) ; 
if($status == 'DISAPPROVED') {
$sql3 = mysql_query("update account set status = '$status', n_priv = 'INACTIVE' where id = '$sn'");	
header ('location:investment.php');	
} else {
$sql2 = mysql_query("update account set p_month = '$period', status = '$status', n_priv = 'ACTIVE' where id = '$sn'");	
if($sql2) {
$sql4 = mysql_query("insert into payment set reg_num = '$reg_num', name = '$name', a_no = '$a_no', narration = 'Investment Capital', amount = '$capital', amt_pd = '$capital', roi_percent = '$r_perce', roi = '$roi', i_profit = '$t_amt', e_period = '$period', e_date = '$edate', e_month = '$emonth', e_year = '$eyear', d_paid = '$d_paid', month = '$month', year = '$year', status = '$status', ip = '$ip', d_user = '$m_name'");
header ('location:investment.php');	
}
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Information System</title>
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
                                          <h5><?php echo $myname; ?> | <?php echo $mycapital; ?> | <?php echo $mymonth; ?> | <?php echo $cdate; ?> </h5>
                                        </div>
                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th><form name="form1" method="post" action="c_status5.php">
                                                                        
                                                                          <p>
                                                                            Status 
                                                                            <select name="status" id="status">
                                                                              <option value="DISAPPROVED" selected>DISAPPROVED</option>
                                                                              <option value="APPROVED">APPROVED</option>
                                                                            </select>
                                                                            <input name="sn" type="hidden" id="sn" value="<?php echo $id; ?>">
                                                                            <input name="name" type="hidden" id="name" value="<?php echo $myname; ?>">
                                                                            <input name="reg_num" type="hidden" id="reg_num" value="<?php echo $myreg; ?>">
                                                                              <input name="a_no" type="hidden" id="a_no" value="<?php echo $mya_no; ?>">
                                                                              <input name="capital" type="hidden" id="capital" value="<?php echo $mycapital; ?>">
                                                                      </p>
                                                                          <p>Period in month 
                                                                            <input name="period" type="text" id="period" value="<?php echo $myperiod; ?>">
                                                                          <p>Eligibility Date
                                                                            <input type="text" name="e_date" id="e_date">
                                                                          <img src="images2/cal.gif" alt="" style="cursor:pointer" onclick="javascript:NewCssCal('e_date','yyyyMMdd','arrow')"/></p>
                                                                          <p>ROI percentage 
                                                                            <select name="r_perce" id="r_perce">
                                                                              <option value="15" selected>15</option>
                                                                              <option value="20">20</option>
                                                                              <option value="25">25</option>
                                                                              <option value="30">30</option>
                                                                              <option value="35">35</option>
                                                                              <option value="40">40</option>
                                                                              <option value="50">50</option>
                                                                            </select>%
                                                                          </p>
                                                          <p>
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
