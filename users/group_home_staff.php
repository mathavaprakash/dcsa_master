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
                    if($_SESSION['encregno']){
                    }
                    else
                    {
                        header("location:../index.html");
                    }
                    
                    $user_id=  encryptor('decrypt',$_SESSION['encregno']);
					$_SESSION['user_id']=$user_id;
                    $_SESSION['encregno']=encryptor('encrypt',$user_id); 
                    //$_SESSION['regno']=$user_id;
                    //$encrp=$_SESSION['encr'];  
                    //$group_id=encryptor('decrypt',$_GET['gid']);
					//$_SESSION['group_id']=$grid;
                    $query=  mysql_query("select * from mas_staff");
                    $exist=  mysql_num_rows($query);
                    $temp="0";
                    $table_fname="";
                    if($exist>0)
                    {
                        while($row=  mysql_fetch_assoc($query))
                        {
                            $table_userid=$row['Staff_Key'];
                            if($user_id==$table_userid)
                            {
                                $temp=1;
                                $table_fname=$row['First_Name'];
                                break;
                            }
                        }
                        if($temp==0)
                        {
                             header("location:../index.html");
                        }
                    }
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
							<li><a href="staff_home.php">Home</a></li>
							<li>
								<a href="#" class="icon fa-angle-down">E-Learning</a>
								<ul>
									<li><a href="group_home_staff.php">Group Home</a></li>
									<li><a href="mad_create_assign.php">Give Assignment</a></li>
									<li><a href="notes_create.php">Give Notes</a></li>
								</ul>
							</li>
							<li>
								<a href="#" class="icon fa-angle-down">Quiz</a>
								<ul>
									<li><a href="../quiz/quiz_home_staff.php">Quiz Home</a></li>
									<li><a href="../quiz/create_test.php">Create Quiz</a></li>
								</ul>
							</li>
							<li>
								<a href="#" class="icon fa-angle-down"><?php  print "$table_fname"; ?></a>
								<ul>
                                    <li><a href="staff_profile_view.php">View Profile</a></li>
									<li><a href="staff_edit_profile.php">Edit Profile</a></li>
									<li><a href="change_password.php">Change Password</a></li>
									<li><a href="report_guru.php">My Students</a><li>
								</ul>
							</li>
                            <li><a href="../logout.php" class="button">Log out</a></li>
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
				<h3 align="center">Your Assignment List</h3>
					<section class="box">
						<div class="table-wrapper">
							<table class="alt">
								<thead>
									<tr>
										<th>S.No</th>
										<th>Title</th>
										<th>subject</th>
										<th>Class</th>
										<th>Last date</th>
										<th>Link</th>
										
									</tr>
                                <tbody>
								<?PHP
									$query=  mysql_query("SELECT * FROM `assignment` ORDER BY `assignment`.`last_date` DESC");
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
											$table_staffkey=$row['staff_id'];
											if($table_staffkey==$user_id)
											{
												$table_id=$row['assign_id'];
												$table_group_id=$row['group_id'];
												$table_batch_id=$row['batch'];
												$table_title=$row['title'];
												$t_last_date=$row['last_date'];
											
												$query1=  mysql_query("select * from study_group");
												$exist1=  mysql_num_rows($query1);
												$t_subject="";
												
												if($exist1>0)
												{
													while($row1=  mysql_fetch_assoc($query1))
													{
														$t_group_id=$row1['Group_ID'];
														if($t_group_id==$table_group_id)
														{
															//$t_batch=$row1['Batch'];
															$t_subject=$row1['Subject'];
															break;
														}
													}
												}
												$query2=  mysql_query("select * from batch");
												$exist2=  mysql_num_rows($query2);
												$t_class="";
												if($exist2>0)
												{
													while($row2=  mysql_fetch_assoc($query2))
													{
														$t_batch_id=$row2['batch_id'];
														if($t_batch_id==$table_batch_id)
														{
															$t_class=$row2['class'];
															break;
														}
													}
												}
												$enc_id=encryptor('encrypt',$table_id); 
												$sno+=1;
												?>
													<tr>
														<td><?php print "$sno"; ?></td>
														<td><?php print "$table_title"; ?></td>
														<td><?php print "$t_subject"; ?></td>
														<td><?php print "$t_class"; ?></td>
														<td><?php print date("d-m-Y  h:i:sa",strtotime($t_last_date)); ?></td>
														<td>	<a href="assign_details.php?id=<?php print "$enc_id"; ?>&mode=<?php print "submit"; ?>" > View More</a></td>
													</tr>	
												<?php
															
															
												
											}
										}
										
									}
								?>
                                    
                                             
                                    
								</tbody>
                            </table>
						</div>
					</section>
					<h3 align="center">Your Notes List</h3>
					<section class="box">
						<div class="table-wrapper">
							<table class="alt">
								<thead>
									<tr>
										<th>S.No</th>
										<th>Title</th>
										<th>Subject</th>
										<th>Class</th>
										<th>post date</th>
										<th>View Document</th>
										
									</tr>
                                <tbody>
								<?PHP
									$query=  mysql_query("select * from notes ORDER BY `notes`.`post_date` DESC");
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
									$t_post_date="";
									$sno=0;
									if($exist>0)
									{
										while($row=  mysql_fetch_assoc($query))
										{
											$t_post_date=0;
											$table_staffkey=$row['staff_id'];
											if($table_staffkey==$user_id)
											{
												$table_id=$row['notes_id'];
												$table_group_id=$row['group_id'];
												$table_batch_id=$row['batch'];
												$table_title=$row['title'];
												$t_post_date=$row['post_date'];
												$t_path=$row['doc_path'];
												$query1=  mysql_query("select * from study_group");
												$exist1=  mysql_num_rows($query1);
												$t_subject="";
												
												if($exist1>0)
												{
													while($row1=  mysql_fetch_assoc($query1))
													{
														$t_group_id=$row1['Group_ID'];
														if($t_group_id==$table_group_id)
														{
															//$t_batch=$row1['Batch'];
															$t_subject=$row1['Subject'];
															break;
														}
													}
												}
												$query2=  mysql_query("select * from batch");
												$exist2=  mysql_num_rows($query2);
												$t_class="";
												if($exist2>0)
												{
													while($row2=  mysql_fetch_assoc($query2))
													{
														$t_batch_id=$row2['batch_id'];
														if($t_batch_id==$table_batch_id)
														{
															$t_class=$row2['class'];
															break;
														}
													}
												}
												$sno+=1;
												?>
													<tr>
														<td><?php print "$sno"; ?></td>
														<td><?php print "$table_title"; ?></td>
														<td><?php print "$t_subject"; ?></td>
														<td><?php print "$t_class"; ?></td>
														<td><?php print date("d-m-Y h:i a",$t_post_date); ?></td>
														<td><a href="<?php print "$t_path"; ?>" >View document</a></td>
													</tr>	
												<?php
																	
											}
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
						
			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
						<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
						<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; GRI-DCSA. All rights reserved.</li>
					</ul>
				</footer>

		</div>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/jquery.scrollgress.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>
	</body>
</html>