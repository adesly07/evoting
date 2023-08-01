                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Menu</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="active">
                                    <a href="index.php">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                               
                        <li>
                                    <a href="#">
                                        <span class="pcoded-micon"><i class="ti-layers"></i><b>M</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Message</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="a_post.php">
                                        <span class="pcoded-micon"><i class="ti-layers"></i><b>A</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Add Post</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                               <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Election Results</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                     <?php 
									 $sql4 = mysql_query("select * from current");
while($row = mysql_fetch_array($sql4)) {
	$section = $row['sch_session'];
	$r_status = $row['status'];
}
if ($r_status == 'PENDING') {
$a_post = '#';	
	
} else {

										$sql1 = mysql_query("select * from o_name order by s_no asc");
			while($row = mysql_fetch_array($sql1)) {
				
	$mypost = $row['name'];	
										
			
										?>   
                                        <li class=" ">
<a href="g_result.php?a_post=<?php echo $mypost; ?>">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"><?php echo $mypost; ?></span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                            
                                        </li><?php }} ?>
                                       
                                   
                                       
                                    </ul>
                              </li>
                                                                                           <li>                                      

                            </ul>
