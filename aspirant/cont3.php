<?php
include ('../conx.php');
$matric_no = $_SESSION['matric_no'];
$section = $_SESSION['sch_session'];

$s_no = $_SESSION['s_no'];
if($s_no == '') {
$s_no = "1";
} else {
$s_no = $s_no;	
}
//$s_no = $s_no + 1;
$sql1 = mysql_query("select * from o_name where s_no = '$s_no'");
while($row = mysql_fetch_array($sql1)) {
$a_post = $row['name'];	
}
$_SESSION['s_no'] = $s_no;
$_SESSION['a_post'] = $a_post;
	if(!mysql_num_rows($sql1)) {
	header ('location: finish.php');	
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

    $rpp = "10"; 

    $lps = $cps - $rpp; 
//Calculating the starting row number for previous page 

    if ($cps <> 0) 
    { 
        $prv =  "<span class='si_filters_links'><a href='cont.php?cps=$lps'>Previous</a></span>"; 
    } 
    else    
    { 
        $prv =  "<span class='si_filters_links'><font color='cccccc'>Previous</font></span>"; 
    } 
    ///////////////////////////////////////////////////////////////////////////////// 

    $q="Select SQL_CALC_FOUND_ROWS * from o_name where name = '$a_post' limit $cps, $rpp"; 
    $rs=mysql_query($q) or die(mysql_error()); 
    $nr = mysql_num_rows($rs); //Number of rows found with LIMIT in action 

    $q0="Select FOUND_ROWS()"; 
    $rs0=mysql_query($q0) or die(mysql_error()); 
    $row0=mysql_fetch_array($rs0); 
    $nr0 = $row0["FOUND_ROWS()"]; //Number of rows found without LIMIT in action 
	$_SESSION['id'] = $row0['id'];
    ///////////////////////////////////////////////////////////////////////
    if (($nr0 < 10) || ($nr < 10)) 
    { 
           $b = $nr0; 
    } 
    else 
    { 
        $b = ($cps) + $rpp; 
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
                                                    <div class="card-block p-b-10">
                                                        <div class="table-responsive">
                                                          <form name="form1" method="post" action="process.php"><table class="table table-hover">
                                                          <thead>
                                                                    <tr>
                                                                      <th height="32" valign="top">THE POST OF <?php echo strtoupper($a_post); ?></th>
                                                                    </tr>
    <?php
	//$sql = mysql_query("select * from a_reg where a_post = 'President'");
	while ($row = mysql_fetch_array($rs)) {
		  	$cps = $cps +1; 

	//while($row = mysql_fetch_array($sql)) {
	//$s_no = $row['s_no'];
	$o_name = $row['name'];
	$sql = mysql_query("select * from a_reg where a_post = '$a_post'");
	while($row = mysql_fetch_array($sql)) {
	
	$name = $row['name'];	
	$a_post = $row['a_post'];	
	$vid = $row['vid'];	
	$file_name2 = $row ['file_name'];
	
	//$_SESSION['name'] = $name;
	
	$sql2 = mysql_query("select * from result where a_post = '$a_post'");
while ($row = mysql_fetch_array($sql2)) 
if (mysql_num_rows($sql2)) {
$check = 'checked';
} else {
$check = 'Unchecked';	
}
																?>                                                                <tr>
                                                                      <th height="32" valign="top">&nbsp;</th>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                        <th width="17%" valign="top">&nbsp;
                                                                        <input type="radio" name="option" id="radio" value="<?php echo $vid; ?>" <?php echo $check; ?>>                                                                          <img src="photos/<?php echo $file_name2 ?>" alt="" width="100" height="100"> <br><?php echo $name; ?> <br></th>
                                                                    </tr>
                                                            </thead>
                                                                <tbody>
                                                                </tbody>
                                                                <?php }} ?>
                                                            </table>  <p>                                                              <input type="submit" name="Submit" id="Submit" value="Next" />                                                            
                                                            <p>
                                                              
                                                              
                                                              
                                                              <?   echo "$prv"; 

    ///////////////////////////////////////////////////////////////////////////////// 
    
    if ($cps == $nr0) 
    {      
        echo "<span class='si_filters_links'>  |  </span><span class='si_filters_links'><font color='CCCCCC'>Next</font></span>"; 
    } 
    else 
    { 
        if ($nr0 > 10) 
	
        { 
		
            echo " <span class='si_filters_links'> | </span> <span class='si_filters_links'><a href= 'cont.php?cps=$cps&lps=$lps'>Next</a></span>"; 
        } 
    } 
    ///////////////////////////////////////////////////////////////////////////////// 
    ?>                                                                                                                                                                                    
                                                          </form>
                                                          
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
