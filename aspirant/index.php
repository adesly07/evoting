<?php
include ('../conx.php');
if (!isset($_SESSION['username']) || !isset($_SESSION['password']))
header('LOCATION: '.'../login.php');

$m_encode = $_SESSION['m_encode'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$sql = mysql_query("select * from a_reg where matric_no = '$m_encode' and password = '$password'");
//if (!$sql) die (mysql_error());
while ($row = mysql_fetch_array($sql)) {
$apost = $row['a_post'];
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
$sql4 = mysql_query("select * from current");
while($row = mysql_fetch_array($sql4)) {
	$section = $row['sch_session'];
	$r_status = $row['status'];
	$period = $row['period'];
$_SESSION['sch_session'] = $section;
}
$m_encode2 = base64_encode($m_encode);
$section2 = base64_encode($section);
if($period == "ELECTION DAY") {
$sql2 = mysql_query("select * from instruction where sch_session = '$section'");
while($row = mysql_fetch_array($sql2)) {
	$mystime = $row['starttime'];
	$myetime = $row['endtime'];
}
	$_SESSION['starttime'] = $mystime;
	$_SESSION['endtime'] = $myetime;
$sql3 = mysql_query("select * from result where matric_no = '$m_encode2' and sch_session = '$section2'");
$count = mysql_num_rows($sql3);
 if ($count > 0)
 {
	 $sql = mysql_query("select * from result where matric_no = '$m_encode2' and sch_session = '$section2'");
while ($row = mysql_fetch_array($sql)) {
$v_code = $row['v_code'];
$v_code = base64_decode($v_code);
}

$link = "You have already cast your vote. Thank you for participating in this session election. <br>
To verify your vote, use the verification code below<br>
<a href='v_result.php?v_code=$v_code'><font color='#FF0000'>$v_code</font></a>";
} else {
$link = "<a href='commence.php'>COMMENCE VOTING</a>";	
}
} else {
$mystime = "Not yet set";
$myetime = "Not yet set";
$link = "<font color='#FF0000'>Voting yet to commence</font>";
}
$myapost = base64_encode($apost);
$sql2 = mysql_query("select * from result where a_post = '$myapost' and sch_session = '$section2'");
$t_vote = mysql_num_rows($sql2);

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
 <script src="highcharts.js"></script>
<script src="data.js"></script>
<script src="drilldown.js"></script>
<script src="export-data.js"></script>
<script src="accessibility.js"></script>
<link href="style.css" rel="stylesheet" type="text/css" />

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
 <span><?php echo $m_name; ?></span>                                        <span id="more-details">Aspirant<i class="ti-angle-down"></i></span>
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
                                            <!-- card1 start --><!-- card1 end -->
                                            <!-- card1 start -->
                                            <!-- card1 end -->
                                            <!-- card1 start -->
                                            <!-- card1 end -->
                                            <!-- card1 start -->
                                          <!-- card1 end -->
                                            <!-- Statestics Start -->
                                           
                                            <!-- Email Sent End -->
                                            <!-- Data widget start -->
<div class="col-md-12 col-xl-6">
                                                <div class="card project-task">
                                                    <div class="card-header">
                                                        <div class="card-header-left ">
                                                            <h5>Voting Duration (<?php echo $section; ?> Session) </h5>
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
                                 <th>Start time</th>
                                 <th>End time</th>
                               </tr>
                             </thead>
                             <tbody>
                               <tr>
                                 <td><h4><font color="#FF0000"><?php echo $mystime; ?></font></h4></td>
                                 <td><h4><font color="#FF0000"><?php echo $myetime; ?></font></h4></td>
                                </tr>
                               <tr>
                                 <td colspan="2"></td>
                                </tr>
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
                                                            <h5>Click the button below to vote your preferred candidate</h5>
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
                                                                        <th><?php echo $link; ?> </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>&nbsp;</th>
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
                           <figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
        Total Vote: <?php echo $t_vote; ?>
    </p>
</figure>
<script> 
// Create the chart
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'BAR GRAPH OF RESULT FOR THE POST OF <?php echo strtoupper($apost); ?>'
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
                format: '{point.y:.1f}%'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.1f}%</b> of total vote<br/>'
    },
    series: [
        {
            name: "Aspirant",
            colorByPoint: true,
            data: [
<?php
$sql = mysql_query("select * from result where a_post = '$myapost' and sch_session = '$section2'");
while ($row = mysql_fetch_array($sql)) {
$a_name = $row['a_name'];

$sql1 = mysql_query("select * from result where a_post = '$myapost' and a_name = '$a_name' and sch_session = '$section2'");
$a_vote = mysql_num_rows($sql1);

$p_vote = ($a_vote/$t_vote) * 100;
$a_name = base64_decode($a_name);
$vowel = array('4', '3', '7', '1', '9');
$v_replace = array ('A', 'E', 'I', 'O', 'U');
$m_name = str_replace($vowel,$v_replace,$a_name);

?>                {
                    name: "<?php echo $m_name; ?> (<?php echo $a_vote; ?>)",
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
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12 col-xl-6">
                                                <div class="card project-task">
                                                    <div class="card-header">
                                                        <div class="card-header-left ">
                                                            <h5>Election Results  (<?php echo $section; ?> Session) </h5>
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
                                                                <th width="26%">Name</th>
                                                                <th width="26%">Post</th>
                                                                <th width="48%">Votes</th>
                                                                <th width="48%">Percentage (%)</th>
                                                              </tr>
                                                            </thead>
                                                            <tbody>
  <?php 
  if ($r_status == 'PENDING') {
$a_post = '#';	
	
} else {

$sql1 = mysql_query("select * from a_reg where sch_session = '$section'");
while($row = mysql_fetch_array($sql1)) {
$a_name = $row['name'];	
$a_post = $row['a_post'];	
$vid = $row['vid'];	
$s_no = $row['s_no'];
$a_post1 = base64_encode($a_post);
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
                                                                <td><a href="g_result.php?a_post=<?php echo $a_post; ?>" title="Click to view  graphical result for the post of <?php echo strtolower($a_post); ?>"><?php echo $a_post; ?></a></td>
                                                                <td><?php echo $a_count; ?>/<?php echo $t_count; ?></td>
                                                                <td><?php echo number_format($p_vote,2); ?></td>
                                                              </tr>
                                                            </tbody>
                                                            <?php }} ?>
                                                          </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                
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
