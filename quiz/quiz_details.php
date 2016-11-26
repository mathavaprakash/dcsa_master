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
					$uid=encryptor('encrypt',$user_id); 
					$test_id=encryptor('decrypt',$_GET['id']);
					$enc_id=encryptor('encrypt',$test_id); 
					$mode=$_GET['mode'];
                    //$_SESSION['regno']=$user_id;
                    //$encrp=$_SESSION['encr'];  
                    //$test_id=$_GET['id'];
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
					
					$query=  mysql_query("select * from quiz");
                    $exist=  mysql_num_rows($query);
                    $temp="0";
                    $table_qid="";
                    $title="";
                    $duration="";
					$tot_ques=0;
					$ques_count=0;
					$batch="";
					$active="";
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
                    if($exist>0)
                    {
                        while($row=  mysql_fetch_assoc($query))
                        {
                            $table_id=$row['test_id'];
							if($test_id==$table_id)
							{
								$temp=1;
								$table_staffkey=$row['Staff_Key'];
								$table_title=$row['title'];
								$t_batch=$row['batch'];
								$table_group_id=$row['group_id'];
								$duration=$row['duration'];
								$t_st_time=$row['start_time'];
								$t_end_time=$row['end_time'];
								$tot_ques=$row['total_questions'];
								$active=$row['active'];
								$query1=  mysql_query("select * from study_group");
								$exist1=  mysql_num_rows($query1);
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
								if($exist2>0)
								{
									while($row2=  mysql_fetch_assoc($query2))
									{
										$t_batch_id=$row2['batch_id'];
										if($t_batch_id==$t_batch)
										{
											$t_class=$row2['class'];
											
											break;
										}
									}
								}
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
							<li><a href="../users/staff_home.php">Home</a></li>
							<li>
								<a href="#" class="icon fa-angle-down">E-Learning</a>
								<ul>
									<li><a href="../users/group_home_staff.php">Group Home</a></li>
									<li><a href="../users/mad_create_assign.php">Give Assignment</a></li>
									<li><a href="../users/notes_create.php">Give Notes</a></li>
								</ul>
							</li>
							<li>
								<a href="#" class="icon fa-angle-down">Quiz</a>
								<ul>
									<li><a href="quiz_home_staff.php">Quiz Home</a></li>
									<li><a href="create_test.php">Create Quiz</a></li>
								</ul>
							</li>
							<li>
								<a href="#" class="icon fa-angle-down"><?php  print "$table_fname"; ?></a>
								<ul>
                                    <li><a href="../users/staff_profile_view.php">View Profile</a></li>
									<li><a href="../users/staff_edit_profile.php">Edit Profile</a></li>
									<li><a href="../users/change_password.php">Change Password</a></li>
									<li><a href="../users/report_guru.php">My Students</a><li>
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
					<section class="box">
						<div class="table-wrapper">
							<center><h3> Test details </h3>
										
							<?PHP if($active==0) 
									{
										?><warning> Quiz Incomplete. Please Enter Questions </warning> <?PHP
									}
							?>
							</center>
							<table class="alt">
								<tbody>
									<tr>
											<td>Quiz ID</td>
											<td><?php print "$test_id"; ?></td>        
									</tr>
									<tr>
											<td>Title</td>
											<td><?php print "$table_title"; ?></td>        
									</tr>
									 <tr>
											<td>Class</td>
											<td><?php print "$t_class"; ?></td>        
									</tr>
									<tr>
											<td>Subject</td>
											<td><?php print "$t_subject"; ?></td>        
									</tr>
									<tr>
											<td>Total Questions </td>
											<td><?php print "$tot_ques"; ?></td>        
									</tr>
									<tr>
											<td>Duration (Mins)</td>
											<td><?php print "$duration"; ?></td>        
									</tr>
									<tr>
											<td>Start Time </td>
											<td><?php print date("d-m-Y  h:i:sa",strtotime($t_st_time)); ?></td>        
									</tr>
									<tr>
											<td>End Time</td>
											<td><?php print date("d-m-Y  h:i:sa",strtotime($t_end_time)); ?></td>        
									</tr>
									<tr>
									<?PHP if($active==0) 
											{
												?><td>create Questions</td>
												<td><a href="create_questions.php?id=<?php print "$enc_id"; ?>&uid=<?PHP print "$uid";?>" > Click Here</a></td>
											
												
												<?PHP
											}
											else
											{
												?> <td>View Questions</td>
											
											<td><a href="view_questions.php?id=<?php print "$enc_id"; ?>" > Click Here</a></td>
											   <?PHP
											}
									?>
                                    </tr>
                                </tbody>
                            </table>
							<form method="POST" action="pdf1.php">
								<div class="row uniform">
									<div class="12u ">	
										<ul class="actions fit">
											<li><a href="quiz_details.php?id=<?php print "$enc_id"; ?>&mode=<?php print "attended"; ?>" class="button fit">attended</a></li>
											<li><a href="quiz_details.php?id=<?php print "$enc_id"; ?>&mode=<?php print "not_attend"; ?>" class="button fit">Not attended</a></li>
											<li><a href="quiz_details.php?id=<?php print "$enc_id"; ?>&mode=<?php print "all"; ?>" class="button fit">View All</a></li>
											<li><input name="Printpdf" type="submit" class="button fit" value="Print Report"/></li>
										
										</ul>
									</div>                         
								</div>
							</form>		
							<?PHP
									if($mode=="all")									
									{
										?>
										<h3 align="center"> All Students Quiz  Report </h3>	
										<?PHP
									}
									if($mode=="attended")									
									{
										?>
										<h3 align="center"><ans> Quiz Participated students details </ans>	</h3>
										<?PHP
									}
									
									if($mode=="not_attend")									
									{
										?>
										<h3 align="center"><warning> Quiz Not Participated students details</warning> </h3>	
										<?PHP
									}
									?>
							
							
							<table class="alt">
								<thead>
									<tr>
										<th>S.No</th>
										<th>Reg No</th>
										<th>Name</th>
										
										<th>Start Time</th>
										<th>Finish Time</th>
										<th>Sec</th>
										<th>Marks</th>
										<th></th>
										
									</tr>
                                <tbody>
								<?PHP
									
									mysql_query("DELETE from temp_report_quiz where sno!=-1");
			
									$temp="0";
									$table_title="";
									$sno=0;
									$table_student_key="";
									$table_marks=0;
								if($mode=="attended")
								{
									$table_student_key="";
									$query=  mysql_query("select * from test");
									$exist=  mysql_num_rows($query);
									if($exist>0)
									{
										while($row=  mysql_fetch_assoc($query))
										{
											$table_id=$row['test_id'];
											$table_quizid=$row['quiz_id'];
											$table_student_key=$row['Student_Key'];
											$table_marks=$row['marks'];
											$start_time=$row['start_time'];
											$end_time=$row['end_time'];
											$query1=  mysql_query("select * from mas_students");
											$exist1=  mysql_num_rows($query1);
											$name="";
											if($exist>0)
											{
												while($row1=  mysql_fetch_assoc($query1))
												{
													$table_stdid=$row1['Student_Key'];
													if($table_student_key==$table_stdid)
													{
														$name=$row1['First_Name'] . " " . $row1['Last_Name'];
														break;
													}
												}
											}
											if($test_id==$table_quizid)
											{
											$sno+=1;	
											?>
												<tr>
													<td><?php print "$sno"; ?></td>
													<td><?php print "$table_student_key"; ?></td>
													<td><?php print "$name"; ?></td>
													<td><?php print date("d-m-Y  h:i:s",$start_time); ?></td>
													<td><?php print date("d-m-Y  h:i:s",$end_time); ?></td>
													<td><?php $diff=$end_time-$start_time; print "$diff";  ?></td>
													<td><?php print "$table_marks"; ?></td>
													
												</tr>	
											<?php
											mysql_query("INSERT INTO `temp_report_quiz`( `sno`,`reg_no`, `name`, `st_time`, `end_time`, `time_taken`,`marks`) VALUES ($sno,'$table_student_key','$name','$start_time','$end_time',$diff,$table_marks)");
			
											}
										}
										
									}
								}
								elseif($mode=="all")
								{
									$query1=  mysql_query("select * from mas_students");
									$exist1=  mysql_num_rows($query1);
									$table_student_key="";
									$name="";
									$submit_details=0;
									if($exist>0)
									{
										while($row1=  mysql_fetch_assoc($query1))
										{
											$table_batch=$row1['batch'];
											$table_marks=0;
											if($t_batch==$table_batch)
											{
												$table_stdid=$row1['Student_Key'];
												$name=$row1['First_Name'] . " " . $row1['Last_Name'];
												$query=  mysql_query("select * from test");
												$exist=  mysql_num_rows($query);
												
												if($exist>0)
												{
													while($row=  mysql_fetch_assoc($query))
													{
														$table_id=$row['test_id'];
														$table_quizid=$row['quiz_id'];
														$table_student_key=$row['Student_Key'];
														
														$start_time=$row['start_time'];
														$end_time=$row['end_time'];
														$submit_details=0;
														if($test_id==$table_quizid and $table_student_key==$table_stdid)
														{
															$submit_details=1;
															$table_marks=$row['marks'];
															break;
														}
													}
												}
												$sno+=1;
												$stdate="Nill";
												$enddate="Nill";
												$diff=0;
												if($submit_details==0)
												{
													
													
													?>
														<tr>
															<td><?php print "$sno"; ?></td>
															<td><?php print "$table_stdid"; ?></td>
															<td><?php print "$name"; ?></td>
															<td colspan="3" align="center"><?php print "Nill"; ?></td>
															<td><?php  print "$table_marks"; ?></td>
														
														</tr>	
													<?php
													
													$stdate="Nill";
													$enddate="Nill";
												}
												else
												{
													?>
														<tr>
															<td><?php print "$sno"; ?></td>
															<td><?php print "$table_stdid"; ?></td>
															<td><?php print "$name"; ?></td>
															<td><?php print date("d-m-Y  h:i:s",$start_time); ?></td>
															<td><?php print date("d-m-Y  h:i:s",$end_time); ?></td>
															<td><?php $diff=$end_time-$start_time; print "$diff";  ?></td>
															<td><?php print "$table_marks"; ?></td>
															
														</tr>	
													<?php
													$stdate=date("d-m-Y  h:i:s a",$start_time);
													$enddate=date("d-m-Y  h:i:s a",$end_time);
												}
													
													mysql_query("INSERT INTO `temp_report_quiz`( `sno`,`reg_no`, `name`, `st_time`, `end_time`, `time_taken`,`marks`) VALUES ($sno,'$table_stdid','$name','$stdate','$enddate',$diff,$table_marks)");
												
											}
										}
										
									}
								}
								elseif($mode=="not_attend")
								{
									$query1=  mysql_query("select * from mas_students");
									$exist1=  mysql_num_rows($query1);
									$table_student_key="";
									$name="";
									$submit_details=0;
									if($exist>0)
									{
										while($row1=  mysql_fetch_assoc($query1))
										{
											$table_batch=$row1['batch'];
											if($t_batch==$table_batch)
											{
												$table_stdid=$row1['Student_Key'];
												$name=$row1['First_Name'] . " " . $row1['Last_Name'];
												$query=  mysql_query("select * from test");
												$exist=  mysql_num_rows($query);
												$table_marks=0;
												if($exist>0)
												{
													while($row=  mysql_fetch_assoc($query))
													{
														$table_id=$row['test_id'];
														$table_quizid=$row['quiz_id'];
														$table_student_key=$row['Student_Key'];
														
														$start_time=$row['start_time'];
														$end_time=$row['end_time'];
														$submit_details=0;
														if($test_id==$table_quizid and $table_student_key==$table_stdid)
														{
															$submit_details=1;
															$table_marks=$row['marks'];
															break;
														}
													}
												}
												if($submit_details==0)
												{
													$sno+=1;
													$diff=0;
													?>
														<tr>
															<td><?php print "$sno"; ?></td>
															<td><?php print "$table_stdid"; ?></td>
															<td><?php print "$name"; ?></td>
															<td colspan="3" align="center"><?php print "Nill"; ?></td>
															
															<td><?php print "$table_marks"; ?></td>
															
														</tr>	
													<?php
													
														$stdate="Nill";
														$enddate="Nill";
													
													mysql_query("INSERT INTO `temp_report_quiz`( `sno`,`reg_no`, `name`, `st_time`, `end_time`, `time_taken`,`marks`) VALUES ($sno,'$table_stdid','$name','$start_time','$end_time',$diff,$table_marks)");
												}
											}
										}
										
									}
								}
								?>
                                 
                                    
								</tbody>
                            </table>
							
                                             				
											
									</div>
								<!--	<form method="POST" action="pdf1.php">
									<div class="row uniform">
                                        <div class="12u ">	
											</br></br>
											<ul class="actions align-center">
												
													<li><input name="Printpdf" type="submit"  value="print"/></li>
												</ul>
                                            </div>                         
                                    </div>
                                            
                                            
											</form>  -->
                                            <!--<a href="#" class="button special fit">Log In</a>	-->			
                                        	
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