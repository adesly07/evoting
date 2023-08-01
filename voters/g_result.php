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

$section2 = base64_encode($section);

$a_post = $_REQUEST['a_post'];
$a_post1 = base64_encode($a_post);
$sql2 = mysql_query("select * from result where a_post = '$a_post1' and sch_session = '$section2'");
$count2 = mysql_num_rows($sql2);

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
                            <div class="main-body">
                              <div class="page-wrapper">

                                    <div class="page-body">
                                        <div class="row">
                                            <!-- card1 start -->
                                            <div class="col-md-6 col-xl-3"></div>
                                            <!-- card1 end -->
                                            <!-- card1 start --><!-- card1 end -->
                                            <!-- card1 start --><!-- card1 end -->
                                            <!-- card1 start --><!-- card1 end -->
                                            <!-- Statestics Start -->
                                           
                                            <!-- Email Sent End -->
                                            <!-- Data widget start -->
                                      <div class="col-md-12 col-xl-6">
                                                <div class="card project-task">
                                                    <div class="card-header">
                                                        
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
                                                                      <th valign="top">RESULT FOR THE POST OF <?php echo strtoupper($a_post); ?></th>
                                                                    </tr>
                                                                    <tr>
                                                                      <th valign="top"><table class="table table-hover">
                                                            <thead>
                                                              <tr>
                                                                <th width="26%">Aspirants</th>
                                                                <th width="48%">Votes</th>
                                                                <th width="48%">Percentage (%)</th>
                                                              </tr>
                                                            </thead>
                                                            <tbody>
  <?php 
  $sql4 = mysql_query("select * from current");
while($row = mysql_fetch_array($sql4)) {
	$r_status = $row['status'];
}

  if ($r_status == 'PENDING') {
$a_post = '#';	
	
} else {

$sql1 = mysql_query("select * from a_reg where sch_session = '$section' and a_post = '$a_post'");
while($row = mysql_fetch_array($sql1)) {
$a_name = $row['name'];	
//$a_post = $row['a_post'];	
$vid = $row['vid'];	
$s_no = $row['s_no'];
//$a_post1 = base64_encode($a_post);

$sql5 = mysql_query("select * from result where sch_session = '$section2' and s_no = '$s_no' and a_post = '$a_post1'");
$t_count = mysql_num_rows($sql5);
$sql6 = mysql_query("select * from result where sch_session = '$section2' and vid = '$vid' and a_post = '$a_post1'");
$a_count = mysql_num_rows($sql6);
$p_vote = ($a_count/$t_count) * 100;

$vowel = array('4', '3', '7', '1', '9');
$v_replace = array ('A', 'E', 'I', 'O', 'U');
$a_name = str_replace($vowel,$v_replace,$a_name);			 
	 
							 ?>
                                                              <tr>
                                                                <td><?php echo $a_name; ?></td>
                                                                <td><?php echo $a_count; ?>/<?php echo $t_count; ?></td>
                                                                <td><?php echo number_format($p_vote,2); ?></td>
                                                              </tr>
                                                            </tbody>
                                                            <?php }} ?>
                                                          </table></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="17%" valign="top"><figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
        Total Numbers of Vote: <?php echo $count2; ?>
    </p>
</figure>
<script> 
// Create the chart
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'BAR GRAPH OF RESULT FOR THE POST OF <?php echo strtoupper($a_post); ?>'
    },
    subtitle: {
        text: '<?php echo $section; ?> SESSION'
    },
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Percentage of Votes'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.2f}%'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total vote<br/>'
    },
    series: [
        {
            name: "Aspirant",
            colorByPoint: true,
            data: [
<?php
$sql = mysql_query("select * from result where a_post = '$a_post1' and sch_session = '$section2'");
while ($row = mysql_fetch_array($sql)) {
$a_name = $row['a_name'];	

$sql1 = mysql_query("select * from result where a_post = '$a_post1' and a_name = '$a_name' and sch_session = '$section2'");
$count = mysql_num_rows($sql1);

$p_vote = ($count/$count2) * 100;
$a_name = base64_decode($a_name);
$vowel = array('4', '3', '7', '1', '9');
$v_replace = array ('A', 'E', 'I', 'O', 'U');
$m_name = str_replace($vowel,$v_replace,$a_name);
?>                {
                    name: "<?php echo $m_name; ?> (<?php echo $count; ?>)",
                    y: <?php echo $p_vote; ?>,
                    drilldown: "<?php echo $a_name; ?>"
                },
				<?php } ?>

                
            ]
        }
    ],
	/////////////
    
});
</script>

                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                </tbody>
                                                          </table>
                                                        </div>
                                                    </div>
                                                </div>
                                          </div>
                                      <!-- Data widget End -->
                                                
                                      </div>
                                </div>
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
