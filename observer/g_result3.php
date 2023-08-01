<?php
include ('../conx.php');
$url1 = $_SERVER['REQUEST_URL'];
header ("Refresh: 4; URL = $url1");

$a_post = $_REQUEST['a_post'];
$section = $_SESSION['sch_session'];
$a_post1 = base64_encode($a_post);
$section2 = base64_encode($section);
$sql3 = mysql_query("select * from result where a_post = '$a_post1' and sch_session = '$section2'");
$count2 = mysql_num_rows($sql3);

?>
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
                                                                <th width="40%">Aspirants</th>
                                                                <th width="22%">Votes</th>
                                                                <th width="38%">Percentage (%)</th>
                                                              </tr>
                                                            </thead>
                                                            <tbody>
  <?php 
$sqlr = mysql_query("select * from a_reg where sch_session = '$section' and a_post = '$a_post'");
while($row = mysql_fetch_array($sqlr)) {
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
                                                            <?php } ?>
                                                          </table></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="17%" valign="top">
                                                                        <figure class="highcharts-figure">
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
$sqlo = mysql_query("select * from result where a_post = '$a_post1' and sch_session = '$section2'");
while ($row = mysql_fetch_array($sqlo)) {
$a_name = $row['a_name'];	

$sqli = mysql_query("select * from result where a_post = '$a_post1' and a_name = '$a_name' and sch_session = '$section2'");
$count = mysql_num_rows($sqli);

$p_vote = ($count/$count2) * 100;
$a_name = base64_decode($a_name);
$vowel = array('4', '3', '7', '1', '9');
$v_replace = array ('A', 'E', 'I', 'O', 'U');
$myname = str_replace($vowel,$v_replace,$a_name);
?>                {
                    name: "<?php echo $myname; ?>",
                    y: <?php echo $p_vote; ?>,
                    drilldown: "<?php echo $a_name; ?>"
                },
				<?php }?>

                
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
                                                         