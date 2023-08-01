<?php
include('../conx.php');
?>
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Menu</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="active">
                                    <a href="index.php">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>O</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Overview</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                        <li>
                                    <a href="s_report.php">
                                        <span class="pcoded-micon"><i class="ti-layers"></i><b>R</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Send Report</span>
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
									
										$sql1 = mysql_query("select * from o_name order by s_no asc");
			while($row = mysql_fetch_array($sql1)) {
				
	$mypost = $row['name'];	
										
			
										?>   
                                        <li class=" ">
<a href="g_result2.php?a_post=<?php echo $mypost; ?>">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"><?php echo $mypost; ?></span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                            
                                        </li><?php } ?>
                                       
                                   
                                       
                                    </ul>
                              </li>
                                                                                           
                              
                            </ul>
