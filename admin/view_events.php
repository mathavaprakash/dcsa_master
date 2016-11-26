<!DOCTYPE HTML>
<html>
	<head>
		<title>Department of Computer Science & Applications</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<link rel="icon" type="image/png" href="../images/logo.png" />
               <?php
            
                    session_start();
 include_once "../assets/db/dbdcsa.php";
                    if($_SESSION['userid']){
                    }
                    else
                    {
                        header("location:../index.php");
                    }
                    $userid=$_SESSION['userid']; 
                    

                    
                    $user_id=  encryptor('decrypt',$_SESSION['userid']);
					$_SESSION['user_id']=$user_id;
                    $_SESSION['userid']=encryptor('encrypt',$user_id); 
                    //$_SESSION['regno']=$user_id;
                    //$encrp=$_SESSION['encr'];  
                    //$group_id=encryptor('decrypt',$_GET['gid']);
					//$_SESSION['group_id']=$grid;
                   
                ?>
	</head>
	<body  class="landing">
		<div id="page-wrapper">
			<div class="header-overlay">
			<!-- Header -->
				<header id="header" class="alt">
					<a href="../logout.php"><img src="../images/dcsa-logo.png" height="50" /></a>
					<nav id="nav">
						<ul>
							<li><a href="admin_home.php">Home</a></li>
							<li><a href="../gallery/load_oper.php">Gallery</a></li>
							
							<li><a href="../dataentry/dataentry_profile.php">Data Entry Operator Profile</a></li>



							
								
							<li>
								<a href="#" class="icon fa-angle-down">Attendance</a>
								<ul>
									<li><a href="../attendance/attendancehome.php">Add Attendance</a></li>
									<li><a href="../attendance/attendanceview.php">View Attendance</a></li>
								</ul>
							</li>
							<li>
								<a href="#" class="icon fa-angle-down">Time Table</a>
								<ul>
									<li><a href="../attendance/attendancehome.php">Add Attendance</a></li>
									<li><a href="../attendance/attendanceview.php">View Attendance</a></li>
								</ul>
							</li>
							<li>
								<a href="#" class="icon fa-angle-down">DataEntry</a>
								<ul>
									<li><a href="student_registration.php">Student Registration</a></li>
									<li><a href="staff_registration.php">Staff Registration</a></li>
									<li><a href="course_registration.php">Course Registration</a></li>
									<li><a href="batch.php">Batch Registration</a></li>
								</ul>
							</li>
							<li>
								<a href="#" class="icon fa-angle-down">Calendar</a>
								<ul>
								    <li><a href="calender.php">View Calendar</a></li>
								    <li><a href="cal_event_add.php">Create Events</a></li>
									<li><a href="view_events.php">view Events</a></li>
									

								</ul>
							</li>
							<li>
								<a href="#" class="icon fa-angle-down">Manage</a>
								<ul>
									<li><a href="edit2.php">Staff Profile</a></li>
									<li><a href="../dataentry1/report_stud.php">Student Profile</a></li>
									<li><a href="change_password.php">Change Password</a></li>
								</ul>
							</li>
							 <li><a href="logout.php" class="button">Log out</a></li>
						</ul>
					</nav>
				</header>

			</div>
			<section id="banner-empty">
					
				</section>
	
			<!-- Main -->
		<section id="main" class="container">
			<div class="row">
                <div class="12u">
				<h3 align="center">ALL EVENTS</h3>
					<section class="box">
						<div class="table-wrapper">
						 <div class="row uniform 50%">
                            <div class="12u 12u(mobilep)"><center>
                            <input type="button" name='btnadd' id="pbut" value='Edit Events' onclick="window.location='cal_event_edit.php';"> <input type="button" name='btnadd' id="pbut" value='Delete Events'onclick="window.location='cal_event_delete.php';">               
                            </center>
                            </div>
                            </div><br></br.>
							<table class="alt">
								<thead>
									<tr>
										<th>S.No</th>
										<th>Title</th>
										<th>Detail</th>
										<th>Event Date</th>
										<th>Date Added</th>
										
										
									</tr>
                                <tbody>
								<?PHP
									$query=  mysql_query("SELECT * FROM `eventcalendar` ORDER BY `eventcalendar`.`EventDate` DESC");
									$exist=  mysql_num_rows($query);
									$temp="0";
									$table_title="";
									$t_group_id=0;
									$t_batch=0;
									$t_subject="";
									$table_id=0;
									$table_group_id=0;
									$table_staffkey=0;
									$table_title="";
									$t_batch_id=0;
									$t_subject="";
									$t_last_date="";
									$table_batch_id=0;
									$sno=0;
									if($exist>0)
									{
										while($row=  mysql_fetch_assoc($query))
										{
											
											
												$table_id=$row['Id'];
												$table_group_id=$row['Title'];
												$table_batch_id=$row['Detail'];
												$table_title=$row['eventDate'];
												$t_last_date=$row['dateAdded'];
											
												$query1=  mysql_query("select * from eventcalendar");
												$exist1=  mysql_num_rows($query1);
												$t_subject="";
												
												
												?>
													<tr>
														<td><?php print "$table_id"; ?></td>
														<td><?php print "$table_group_id"; ?></td>
														<td><?php print "$table_batch_id"; ?></td>

														<td><?php print "$table_title"; ?></td>
														<td><?php print "$t_last_date"; ?></td>
														
														<!--<td>	<a href="assign_details.php?id=<?php print "$enc_id"; ?>&mode=<?php print "submit"; ?>" > View More</a></td>-->
													</tr>	
												<?php
															
															
												
											}
										}
										
									
								?>
                                    
                                             
                                    
								</tbody>
                            </table>
                           

						</div>
					</section>
					
						</div>
					
				</div>
			
		</section>			
						
			<footer id="footer"> 
					<ul class="icons">
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>						
					</ul>
					<ul class="copyright">
						<li>&copy; GRI-DCSA. All rights reserved.</li>
						<li>
							<script type="text/javascript" src="http://widget.supercounters.com/hit.js"></script>
							<script type="text/javascript">sc_hit(1214356,147,5);	</script>
							<br>
							<noscript><a href="http://www.supercounters.com">Page visits counter</a></noscript>
						</li>
					</ul>
				</footer>
		</div>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/jquery.scrollgress.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]>
		<script src="../users/assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>

	</body>
</html>