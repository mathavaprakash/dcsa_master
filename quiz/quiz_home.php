<!DOCTYPE HTML>
<html>
	<head>
		<title>Quiz</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
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
					$batch="";
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
							<li><a href="../users/student_home.php">Home</a></li>
							<li><a href="../users/group_home.php">E - Learning</a></li>
							<li><a href="quiz_home.php">Quiz</a></li>
					
							<li>
								<a href="#" class="icon fa-angle-down"><?php  print "$table_fname"; ?></a>
								<ul>
                                    <li><a href="../users/student_profile_view.php">View Profile</a></li>
									<li><a href="../users/student_edit_profile.php">Edit Profile</a></li>
									<li><a href="../users/std_change_password.php">Change Password</a></li>
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
										
										<th>SNo</th>
										<th>Title</th>
										<th>Author</th>
										<th>Start Time</th>
										<th>End Time</th>
										<th>Link</th>
										
										
									</tr>
                                <tbody>
								<?PHP
									$query=  mysql_query("select * from quiz ORDER BY `end_time` DESC");
									$exist=  mysql_num_rows($query);
									$temp="0";
									$table_id="";
									$table_title="";
									$sno=0;
									if($exist>0)
									{
										while($row=  mysql_fetch_assoc($query))
										{
											$table_id=$row['test_id'];
											$encc_id=encryptor('encrypt',$table_id);
											$table_title=$row['title'];
											$table_staff_id=$row['Staff_Key'];
											$table_batch=$row['batch'];
											$t_st_time=$row['start_time'];
											$t_end_time=$row['end_time'];
											$active=$row['active'];
											$queryx=  mysql_query("select * from test");
											$existx=  mysql_num_rows($queryx);
											$attended=0;
											if($active==1)
											{
												if($existx>0)
												{
													while($rowx=  mysql_fetch_assoc($queryx))
													{
														$table_userid=$rowx['Student_Key'];
														$table_quizid=$rowx['quiz_id'];
														if($user_id==$table_userid && $table_id==$table_quizid)
														{
															$attended=1;
															$unique_id=$rowx['test_id'];
															$enc_id=encryptor('encrypt',$unique_id);
															break;
														}
													}
													
												} 
												if($batch==$table_batch)
												{
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
							<?PHP
								if( strtotime($t_st_time)<time())
									{
										if(strtotime($t_end_time)>time())
										{
											if( $attended=='no')
											{	
												
												?><td><ans_blue><?php print "$table_title"; ?></ans_blue></td>
												<?PHP
											}
											else
											{
												?>
												<td><ans><?php print "$table_title"; ?></ans></td>
												<?PHP
											}
										}
										else
										{
											if( $attended=='no')
											{	
												?>
												<td><warning><?php print "$table_title"; ?></warning></td>
												<?PHP
											}
											else
											{
												?>
												<td><ans><?php print "$table_title"; ?></ans></td>
												<?PHP
											}
										}
										
									}
									else
									{
										?>
										<td><?php print "$table_title"; ?></td>
										<?PHP
									}
										?>				
														<td><?php print "$name"; ?></td>
														<td><?php print date("d-m-Y  h:i:sa",strtotime($t_st_time)); ?></td>
														<td><?php print date("d-m-Y  h:i:sa",strtotime($t_end_time)); ?></td>
														<td><a href="quiz_details_stud.php?id=<?php print "$encc_id"; ?>" > View more</a></td>
																	
														
													</tr>	
												<?php
												}
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