<?php
include ('../conx.php');
$matric_no = $_SESSION['matric_no'];
$section = $_SESSION['sch_session'];
$v_code = $_SESSION['v_code'];
$email = $_SESSION['email'];
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
<form name="form1" method="post" action="process.php"><table class="table table-hover">
                                                          <thead>
                                                                    <tr>
                                                                      <th height="32" colspan="3" valign="top">THE POST OF <?php echo strtoupper($a_post); ?></th>
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
	$vowel = array('4', '3', '7', '1', '9');
$v_replace = array ('A', 'E', 'I', 'O', 'U');
$name = str_replace($vowel,$v_replace,$name);

	//$_SESSION['name'] = $name;
	
/*	$sql2 = mysql_query("select * from result where a_post = '$a_post'");
while ($row = mysql_fetch_array($sql2)) 
if (mysql_num_rows($sql2)) {
$check = 'checked';
} else {
$check = 'Unchecked';	
}
*/																?>                                                                <tr>
                                                                      <th height="32" valign="top">&nbsp;</th>
                                                                      <th valign="top">&nbsp;</th>
                                                                      <th valign="top">&nbsp;</th>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                        <th width="17%" align="right" valign="top">&nbsp;
                                                                        <input type="radio" name="option" id="radio" value="<?php echo $vid; ?>" <?php echo $check; ?>>
                                                                        <br>                                                                        <br></th>
                                                                        <th width="17%" align="left" valign="top"><img src="../aspirant/photos/<?php echo $file_name2 ?>" alt="" width="100" height="100"></th>
                                                                        <th width="17%" align="left" valign="top">&nbsp;</th>
                                                                    </tr>
                                                                    <tr>
                                                                      <th align="left" valign="top">&nbsp;</th>
                                                                      <th align="left" valign="top"><?php echo $name; ?></th>
                                                                      <th align="left" valign="top">&nbsp;</th>
                                                                    </tr>
                                                            </thead>
                                                                <tbody>
                                                                </tbody>
                                                                <?php }} ?>
                                                            </table>  
  <p>                                                              <input type="submit" name="Submit" id="Submit" value="Next" />                                                            
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