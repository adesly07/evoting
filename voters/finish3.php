<?php
include ('../conx.php');
$matric_no = $_SESSION['matric_no'];
$section = $_SESSION['sch_session'];
$email = $_SESSION['email'];
$m_number = array('1', '2', '3', '4', '5');
$m_replace = array ('K', 'F', 'Z', 'M', 'X');
$m_encode = str_replace($m_number,$m_replace,$matric_no);
$m_encode = base64_encode($m_encode);
$section = base64_encode($section);

$sql = mysql_query("select * from result where matric_no = '$m_encode' and sch_session = '$section'");
while ($row = mysql_fetch_array($sql)) {
$v_code = $row['v_code'];
$v_code = base64_decode($v_code);
}
                                                    
?>
<table align="center" class="table table-hover">
  <thead>
    <tr>
      <th height="32" valign="top">&nbsp;</th>
    </tr>
    <tr>
      <th height="32" valign="top"><span class="red">Thank you for participating in this session  election.</span></th>
    </tr>
    <tr>
      <th height="32" valign="top">Election result will be out soon</th>
    </tr>
    <tr>
      <th width="17%" valign="top">&nbsp;</th>
    </tr>
    <tr>
      <th valign="top">To verify your vote, use the verification code below</th>
    </tr>
    <tr>
      <th valign="top"><a href="v_result.php?v_code=<?php echo $v_code; ?>" target="_parent"><font color="#FF0000"><?php echo $v_code; ?></font></a></th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>
