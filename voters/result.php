<?php
include ('../conx.php');
$section = $_SESSION['sch_session'];
$sql2 = mysql_query("select * from result where a_post = 'Vice President'");
$count2 = mysql_num_rows($sql2);

                                                    
?>
<script src="datetimepicker_css.js"></script>
<script src="highcharts.js"></script>
<script src="data.js"></script>
<script src="drilldown.js"></script>
<script src="export-data.js"></script>
<script src="accessibility.js"></script>
<link href="style.css" rel="stylesheet" type="text/css" />

<body>
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
        text: 'RESULT FOR THE POST OF PRESIDENT'
    },
    subtitle: {
        text: '2021/2022 SESSION'
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
$sql = mysql_query("select * from result where a_post = 'Vice President'");
while ($row = mysql_fetch_array($sql)) {
$a_name = $row['a_name'];	

$sql1 = mysql_query("select * from result where a_post = 'Vice President' and a_name = '$a_name'");
$count = mysql_num_rows($sql1);

$p_vote = ($count/$count2) * 100
?>                {
                    name: "<?php echo $a_name; ?>",
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

</body>