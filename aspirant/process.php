<?php
include ('../conx.php');
if(!isset($_session)){
session_start();
}
$v_code = $_SESSION['v_code'];
$matric_no = $_SESSION['matric_no'];
$section = $_SESSION['sch_session'];
$a_post = $_SESSION['a_post'];
$s_no = $_SESSION['s_no'];
$m_number = array('1', '2', '3', '4', '5');
$m_replace = array ('K', 'F', 'Z', 'M', 'X');
$m_encode = str_replace($m_number,$m_replace,$matric_no);

$submit = $_POST['Submit'];
if ($submit == 'Next')
{  // text1
$option = $_POST['option'];
$sql1 = mysql_query("select * from a_reg where vid = '$option' and a_post = '$a_post'");
while($row = mysql_fetch_array($sql1)) {
$a_name = $row ['name'];
$a_name = strtoupper($a_name);

}
$vowel = array('A', 'E', 'I', 'O', 'U');
$v_replace = array ('4', '3', '7', '1', '9');
$n_encode = str_replace($vowel,$v_replace,$a_name);
$m_encode = base64_encode($m_encode);
$section = base64_encode($section);
$n_encode = base64_encode($n_encode);
$a_post = base64_encode($a_post);

$ip = getenv("REMOTE_ADDR");
$sql = mysql_query("insert into result set matric_no = '$m_encode', v_code = '$v_code', sch_session = '$section', a_name = '$n_encode', a_post = '$a_post', vid = '$option', s_no = '$s_no', ip = '$ip', date = CURDATE(), time = CURTIME(), status = 'PENDING'");
if($sql) {
$s_no = $s_no + 1;
$_SESSION['s_no'] = $s_no;
header('location:cont.php');	
}
}

?>
