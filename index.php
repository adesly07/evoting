<?php
include("conx.php");
$sql = mysql_query("select * from current");
while($row = mysql_fetch_array($sql)){
$period = $row['period'];
}
if($period == "ELECTION DAY"){
header("location:send_reminder.php");
} else {
header('location:login.php');
}

?>
