<?php
include('../conx.php');
$sql2 = mysql_query("select * from message where status = 'UNREAD'");
$count = mysql_num_rows($sql2);

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
                                    <a href="message.php">
                                        <span class="pcoded-micon"><i class="ti-layers"></i><b>M</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Message<span class="redtext"><strong><sup><?php echo $count; ?></sup></strong></span></span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                               <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Pre-election phase </span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
<a href="e_list.php">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Eligibility List</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
<a href="r_aspirant.php">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Aspirant Registration</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
<a href="a_office.php">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Add Office</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
<a href="e_datetime.php">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Set Date and Time</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li><li class=" ">
<a href="a_session.php">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Add Session</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="u_current.php">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Update Current Session</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
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
<a href="g_result.php?a_post=<?php echo $mypost; ?>">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"><?php echo $mypost; ?></span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                            
                                        </li><?php } ?>
                                       
                                   
                                       
                                    </ul>
                              </li>
                                                                                            <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Post-election phase </span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
<a href="e_audit.php">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Election Audit</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        
                                       
                                      
                                       
                                    </ul>
                              </li>
                              
                            </ul>
