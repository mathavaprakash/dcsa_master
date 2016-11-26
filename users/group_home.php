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
                    $_SESSION['encregno']=encryptor('encrypt',$user_id); 
                    //$_SESSION['regno']=$user_id;
                    //$encrp=$_SESSION['encr'];  
                    
                    $query=  mysql_query("select * from mas_students");
                    $exist=  mysql_num_rows($query);
                    $temp="0";
                    $table_fname="";
					$batch=0;
                    if($exist>0)
                    {
                        while($row=  mysql_fetch_assoc($query))
                        {
                            $table_userid=$row['Student_Key'];
                            if($user_id==$table_userid)
                            {
                                $temp=1;
                                $table_fname=$row['First_Name'];
								$batch=$row['batch'];
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
							<li><a href="student_home.php">Home</a></li>
							<li><a href="group_home.php">E - Learning</a></li>
							<li><a href="../quiz/quiz_home.php">Quiz</a></li>
					
							<li>
								<a href="#" class="icon fa-angle-down"><?php  print "$table_fname"; ?></a>
								<ul>
                                    <li><a href="student_profile_view.php">View Profile</a></li>
									<li><a href="student_edit_profile.php">Edit Profile</a></li>
									<li><a href="std_change_password.php">Change Password</a></li>
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
		<section id="main" class="container 100%">
			<div class="row">
                <div class="12u">
					<section class="box">
						<div class="table-wrapper">
							<table class="alt">
								<thead>
									<tr>
										<th>S.No</th>
										<th>Title</th>
										<th>Subject</th>
										<th>Staff</th>
										<th>Last Date</th>
										<th>Link</th>
										
										
									</tr>
                                <tbody>
								<?PHP
									$query=  mysql_query("SELECT * FROM `assignment` ORDER BY `assignment`.`last_date` DESC");
									$exist=  mysql_num_rows($query);
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
									$name="";
									$sno=0;
									if($exist>0)
									{
										while($row=  mysql_fetch_assoc($query))
										{
											$t_batch=$row['batch'];
											if($t_batch==$batch)
											{
												$table_id=$row['assign_id'];
												$table_group_id=$row['group_id'];
												$table_staff_id=$row['staff_id'];
												$table_title=$row['title'];
												$t_last_date=$row['last_date'];
												$queryx=  mysql_query("select * from assign_submit");
												$existx=  mysql_num_rows($queryx);
												$attended=0;
											  
												if($existx>0)
												{
													while($rowx=  mysql_fetch_assoc($queryx))
													{
														$table_student_id=$rowx['student_id'];
														$table_assign_id=$rowx['assign_id'];
														if($user_id==$table_student_id && $table_id==$table_assign_id)
														{
															$attended=1;
															break;
														}
													}
													
												} 
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
															$t_subject=$row1['Subject'];
															break;
														}
													}
												}
												
											
												$query1=  mysql_query("select * from mas_staff");
												$exist1=  mysql_num_rows($query1);
												$name="";
												if($exist>0)
												{
													while($row1=  mysql_fetch_assoc($query1))
													{
														$table_stdid=$row1['Staff_Key'];
														if($table_staff_id==$table_stdid)
														{
															$name=$row1['First_Name'] . " " . $row1['Last_Name'];
															break;
														}
													}
												}
												
												$sno+=1;	
												$enc_id=encryptor('encrypt',$table_id); 
											?>
												<tr>
													
													<td><?php print "$sno"; ?></td>
													<?PHP
													if(strtotime($t_last_date)>time())
													{
														if( $attended==0)
														{	
															?><td><ans_blue><?php print "$table_title"; ?></ans_blue></td><?PHP
														}
														else
														{
															?><td><ans><?php print "$table_title"; ?></ans></td><?PHP
														}
													}
													else
													{
														if( $attended==0)
														{	
															?><td><warning><?php print "$table_title"; ?></warning></td><?PHP
														}
														else
														{
															?><td><ans><?php print "$table_title"; ?></td></ans><?PHP
														}
													}	
													
													
													?>
													
													<td><?php print "$t_subject"; ?></td>
													<td><?php print "$name"; ?></td>
													<td><?php print date("d-m-Y  h:i:sa",strtotime($t_last_date)); ?></td>
													<td><a href="assign_details1.php?id=<?php print "$enc_id"; ?>" > View More</a></td>
													<?PHP
													?>
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
										<th>Teacher</th>
										<th>post date</th>
										<th>View Document</th>
										
									</tr>
                                <tbody>
								<?PHP
									$query=  mysql_query("select * from notes");
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
									$name="";
									$sno=0;
									if($exist>0)
									{
										while($row=  mysql_fetch_assoc($query))
										{
											$t_batch=$row['batch'];
											if($t_batch==$batch)
											{
												
												$table_group_id=$row['group_id'];
												$table_staff_id=$row['staff_id'];
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
												$query1=  mysql_query("select * from mas_staff");
												$exist1=  mysql_num_rows($query1);
												$name="";
												if($exist>0)
												{
													while($row1=  mysql_fetch_assoc($query1))
													{
														$table_stdid=$row1['Staff_Key'];
														if($table_staff_id==$table_stdid)
														{
															$name=$row1['First_Name'] . " " . $row1['Last_Name'];
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
														<td><?php print "$name"; ?></td>
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