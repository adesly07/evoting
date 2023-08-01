<?php
include ('../conx.php');
$matric_no = $_SESSION['matric_no'];
$section = $_SESSION['sch_session'];
$myfid = $_SESSION['fid'];
$m_name = $_SESSION['name'];
$m_number = array('1', '2', '3', '4', '5');
$m_replace = array ('K', 'F', 'Z', 'M', 'X');
$m_encode = str_replace($m_number,$m_replace,$matric_no);

$submit = $_POST['submit'];
if ($submit == "Send") {
$c_by = $_POST['c_by'];
$comment = $_POST['s_comment'];
$comment = addslashes ($comment);
$vowel = array ('A', 'E', 'I', 'O', 'U');
$v_replace = array('4', '3', '7', '1', '9');
$c_by = str_replace($vowel,$v_replace,$c_by);

$vowel1 = array ('a', 'e', 'i', 'o', 'u');
$v_replace1 = array('4', '3', '7', '1', '9');
$comment = str_replace($vowel1,$v_replace1,$comment);

$ip = getenv ("REMOTE_ADDR");
$sql2 = mysql_query("insert into comment set fid = '$myfid', comment = '$comment', name = '$c_by', m_comment = '$m_encode', ip = '$ip', date = CURDATE(), time = CURTIME()");
}
                                                   
?>

                                              <table class="table table-hover">
                                                              <thead>
                                                                    <tr>
                                                                        <th><form name="form1" method="post" action="comment.php">
                                                                          <input name="s_comment" type="text" id="s_comment" value="" size="20" placeholder="Write a comment" />
                                                                          <input name="c_by" type="hidden" id="c_by" value="<?php echo $m_name; ?>">
<input type="submit" name="submit" id="submit" value="Send" class="button-list">
                                                                        </form></th>
                                                                    </tr>
                                                </thead>
                                                                <tbody>
                                                                </tbody>
</table>
                           