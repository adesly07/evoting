<?php
include ('../conx.php');
if (!isset($_SESSION['username']) || !isset($_SESSION['password']))
header('LOCATION: '.'../login.php');

$username = $_SESSION['username'];
$password = $_SESSION['password'];
$section = $_SESSION['sch_session'];
$r_status = $_SESSION['status'];

$sql = mysql_query("select * from create_login where username = '$username' and password = '$password'");
//if (!$sql) die (mysql_error());
while ($row = mysql_fetch_array($sql)) {
$m_name = $row['name'];
$_SESSION['name'] = $m_name;
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
  <style type="text/css">
  .style3 {font-family: verdana, tohama, arial}
  </style>
  <script type="text/javascript" src="jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="jquery-ui.min.js"></script>	
<link rel="stylesheet" href="jquery-ui.min.css" type="text/css" />
<script type="text/javascript">
$(function() {
	
	//autocomplete
	$(".auto").autocomplete({
		source: "search3.php",
		minLength: 1
	});				

});
</script>
   <link rel="stylesheet" href="jquery-ui.min.css" type="text/css" /> 
<script src="datetimepicker_css.js"></script>

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
                                                          <table width="100%" border="0">
                                                            <tr>
                                                              <td><strong>Mass upload of voters</strong></td>
                                                            </tr>
                                                            <tr>
                                                              <td><form action="upload_file.php" method="post" enctype="multipart/form-data" name="form2" id="form2">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
           
            <tr>
              <td align="left"><h3> (Excel Sheet) :: </h3>
                <p class="content">
                  <?php
			if ((isset($_POST["Submit"])) && isset($_FILES['file']['name']))
			{
				$dir = "vlist/";
				$userfile_name = $_FILES['file']['name'];
				$userfile_tmp = $_FILES['file']['tmp_name'];
				$userfile_size = $_FILES['file']['size'];
				$userfile_type = $_FILES['file']['type'];
				$userfile_ext = strtolower(pathinfo($userfile_name, PATHINFO_EXTENSION));
				if ($userfile_ext == "xls")
				{
					
					if (@move_uploaded_file($userfile_tmp, $dir.$userfile_name))
					{
						$checker = 0;
						require_once 'excel/reader.php';
						$data = new Spreadsheet_Excel_Reader();
						$thefilename =$dir.$userfile_name; 
						$data->read("$thefilename");
						
						error_reporting(E_ALL ^ E_NOTICE);
						$tbname = "e_list";
						echo "Total No of Lines:".$data->sheets[0]['numCols']."<br />";
						for ($j = 1; $j <= $data->sheets[0]['numCols']+300; $j++)
						{
						
							$matric_no = $data->sheets[0]['cells'][$j+1][1];
							$s_name = $data->sheets[0]['cells'][$j+1][2];
							//$sch_session = strtoupper($data->sheets[0]['cells'][$j+1][3]);
							//$mark = strtoupper($data->sheets[0]['cells'][$j+1][4]);
							//$bank_branch = strtoupper($data->sheets[0]['cells'][$j+1][4]);
							//echo $bank_teller." : ".$paidby." : ".$bank_name." : ".$bank_branch;
$m_number = array('1', '2', '3', '4', '5');
$m_replace = array ('K', 'F', 'Z', 'M', 'X');
$matric_no = str_replace($m_number,$m_replace,$matric_no);
$s_name = strtoupper($s_name);
$vowel = array('A', 'E', 'I', 'O', 'U');
$v_replace = array ('4', '3', '7', '1', '9');
$s_name = str_replace($vowel,$v_replace,$s_name);

							//Checks if record exists before
				$sql = "select * from e_list where matric_no = '$matric_no' and sch_session = '$section'";
							$execute = @mysql_query($sql) or die ("Error Occured. Unable to connect");
							$num = @mysql_num_rows($execute);
							if ($num<=0)
							{
								//Record doesn't exist, load teller
								if (($matric_no!="") || ($s_name!=""))
								{


$sql = mysql_query ("insert into e_list set s_name = '$s_name', matric_no = '$matric_no', sch_session = '$section'");
if ($sql){
$msg = "Record Successfully Inserted";
}





					/*$sql = "INSERT INTO result VALUES('','$bank_teller','$bank_name','$xsession','$user','$bank_branch','$paidby')";
								$execute = @mysql_query($sql, $conn) or die ("Error Occured. Unable to connect");*/
								$checker++;
								}
							}
							
						}
						
						if ($checker > 0)
						{
							echo '<script language="javascript">';
							echo 'alert ("Voters List loaded.")';
							echo '</script>';
						}
						else
						{
							echo '<script language="javascript">';
							echo 'alert ("Record Already Exist.")';
							echo '</script>';
						}
					}
				}
				else
				{
					echo '<script language="javascript">';
					echo 'alert ("Poor File Format. Please Load an Excel Format (xls).")';
					echo '</script>';
				}
				
			}
			?>
                  Note: The Excel File must be in 2000 - 2003 format (.xls). 2007 till date format (.xlsx) will not upload. <br />
                  The File has been assumed to have a header, so loading will start from the second cells (i.e. A2, B2, C2, D2)</p></td>
            </tr>
            <tr>
              <td><input type="file" name="file" />
                <input type="submit" name="Submit" id="Submit" value="Upload File" /></td>
            </tr>
            <tr>
              <td align="center">&nbsp;</td>
            </tr>
          </table>
        </form></td>
                                                            </tr>
                                                            <tr>
                                                              <td>&nbsp;</td>
                                                            </tr>
                                                          </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-xl-6">
                                                <div class="card project-task">
                                                    <div class="card-header">
                                                        <div class="card-header-left ">
                                                            <h5><?php echo $section; ?> Eligibility Voters</h5>
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
                                                                        <th>Matric Number</th>
                                                                        <th>Name</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
       <?php
$sql2 = mysql_query("select * from e_list where sch_session = '$section' order by id desc");
while($row = mysql_fetch_array($sql2)) {
	$myname = $row['s_name'];
	$mymat = $row['matric_no'];
	$m_number = array('K', 'F', 'Z', 'M', 'X');
$m_replace = array ('1', '2', '3', '4', '5');
$mymat = str_replace($m_number,$m_replace,$mymat);
		$vowel = array('4', '3', '7', '1', '9');
$v_replace = array ('A', 'E', 'I', 'O', 'U');
$myname = str_replace($vowel,$v_replace,$myname);			 

	   
	   ?>                                                             <tr>
                                                                        <td>
<?php echo $mymat; ?>   
                                                                        </td>
                                                                        <td>
<?php echo $myname; ?>   
                                                                        </td>
                                                                    </tr>
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
