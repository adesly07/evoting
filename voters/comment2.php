<?php
include ('../conx.php');
$matric_no = $_SESSION['matric_no'];
$section = $_SESSION['sch_session'];
$myfid = $_SESSION['fid'];

$url1 = $_SERVER['REQUEST_URL'];
header ("Refresh: 4; URL = $url1");
                                                   
?>
<table class="table table-hover">
  <thead>
    <tr>
      <th align="left">Comments:</th>
    </tr>
  </thead>
  <tbody>
    <?php
$sql2 = mysql_query("select * from comment where fid = '$myfid' order by fid desc");
while($row = mysql_fetch_array($sql2)) {
	$cps = $cps +1;
$id = $row['id'];
$fid = $row['fid'];
$c_name = $row['name'];
$comment = $row['comment'];
$m_comment = $row['m_comment'];
	$pdate = $row['date'];
	$ptime = $row['time'];
$comment = stripslashes ($comment);
$vowel = array('4', '3', '7', '1', '9');
$v_replace = array ('a', 'e', 'i', 'o', 'u');
$comment = str_replace($vowel,$v_replace,$comment);
$vowel1 = array('4', '3', '7', '1', '9');
$v_replace1 = array ('A', 'E', 'I', 'O', 'U');
$c_name = str_replace($vowel1,$v_replace1,$c_name);

$sql = mysql_query("select * from reg where matric_no = '$m_comment'");
while ($row = mysql_fetch_array($sql)) {
$myfile = $row ['file_name'];
}
	   ?>
    <tr>
      <td class="<?php echo $color; ?>"><span class="main-menu-header"><img src="photos/<?php echo $myfile; ?>" alt="" width = "50" height="50" align="left" /></span><?php echo $c_name; ?><br /><?php echo $comment; ?> <br /><?php echo $pdate; ?> <?php echo $ptime; ?><hr /></td>
    </tr>
  </tbody>
  
  <?php } ?>
</table>
