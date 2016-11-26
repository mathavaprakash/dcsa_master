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
					$test_id=encryptor('decrypt',$_GET['id']);
					//$test_id=$_GET['id'];
                    $query=  mysql_query("select * from mas_students");
                    $exist=  mysql_num_rows($query);
                    $temp="0";
                    $table_fname="";
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
                    
                    $query=  mysql_query("select * from quiz");
                    $exist=  mysql_num_rows($query);
                    $temp="0";
                    $table_qid="";
                    $title="";
                    $duration="";
					$tot_ques=0;
					$ques_count=0;
					$t_st_time="";
					$t_end_time="";
					$encc_id="";
					$enc_test_id="";
					$table_group_id="";
                    if($exist>0)
                    {
                        while($row=  mysql_fetch_assoc($query))
                        {
                            $table_qid=$row['test_id'];
							
                            if($test_id==$table_qid)
                            {
                                $temp=1;
								$encc_id=encryptor('encrypt',$table_qid);
                                $title=$row['title'];
								$author=$row['Staff_Key'];
								$table_group_id=$row['group_id'];
								$duration=$row['duration'];
								$tot_ques=$row['total_questions'];
								$t_st_time=$row['start_time'];
								$t_end_time=$row['end_time'];
								$ques_count=$table_qid*100;
								$max_ques=$ques_count+$tot_ques;
								$test_taken="no";
								$query=  mysql_query("select * from test");
								$exist=  mysql_num_rows($query);
								$attended='no';
								$st_time="";
								$en_time="";
								$marks=0;
								if($exist>0)
								{
									while($row=  mysql_fetch_assoc($query))
									{
										$table_userid=$row['Student_Key'];
										$table_quizid=$row['quiz_id'];
										if($user_id==$table_userid && $test_id==$table_quizid)
										{
											$attended='yes';
											$unique_id=$row['test_id'];
											$enc_test_id=encryptor('encrypt',$unique_id);
											$st_time=$row['start_time'];
											$en_time=$row['end_time'];
											$marks=$row['marks'];
											$test_taken="yes";
											
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
										if($author==$table_stdid)
										{
											$name=$row1['First_Name'] . " " . $row1['Last_Name'];
											break;
										}
									}
								}
								$query1=  mysql_query("select * from study_group");
								$exist1=  mysql_num_rows($query1);
								if($exist1>0)
								{
									while($row1=  mysql_fetch_assoc($query1))
									{
										$t_group_id=$row1['Group_ID'];
										if($t_group_id==$table_group_id)
										{
											$t_batch=$row1['Batch'];
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
		<section id="main" class="container">           
			<div class="row">
				<div class="12u">
					<section class="box">
						<div class="table-wrapper">
							<center><h3> Quiz details </h3>
								<?PHP if($attended=='yes') 
									{
										?><ans> You Completed this Quiz </ans> <?PHP
									}
									else
									{
										?><warning> you are not attended this test </warning> <?PHP
									}
								?>
							
							</center>
							<table class="alt">
								<tbody>
									<!--<tr>
											<td>Register Number</td>
											<td><?php //print "$user_id"; ?></td>        
									</tr>
									<tr>
											<td>Name</td>
											<td><?php //print "$table_fname"; ?></td>        
									</tr>
									
									<tr>
											<td>Class </td>
											<td><?php //print "$t_class"; ?></td>        
									</tr>-->
									<tr>
											<td>Title</td>
											<td><?php print "$title"; ?></td>        
									</tr>
									<tr>
											<td>Author </td>
											<td><?php print "$name"; ?></td>        
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
									
									
									<?PHP
									if( strtotime($t_st_time)<time())
									{
										if(strtotime($t_end_time)>time())
										{
											if( $attended=='no')
											{	
												
												?><tr><td>Take Test</td>
												<td><a href="start_quiz.php?id=<?php print "$encc_id"; ?>" > Click Here</a></td>
												</tr>
												<?PHP
											}
											else
											{
												?>
												<tr>
													<td>Your Status</td>
													<td> <ans>You Attended Successfully</ans></td>
												</tr>
												<tr>
													<td>You Start at</td>
													<td> <?php print date("d-m-Y  h:i:sa",$st_time); ?></td>
												</tr>
												<tr>
													<td>You Finish at</td>
													<td> <?php print date("d-m-Y  h:i:sa",$en_time); ?></td>
												</tr>
												<tr>
													<td>Your Marks</td>
													<td> displayed soon</td>
												</tr>
												<?PHP
											}
										}
										else
										{
											if( $attended=='no')
											{	
												?>
												<tr><td> Test Status</td>
												<td> <warning>Test Closed</warning></td></tr>
												<?PHP
											}
											else
											{
												?>
												<tr>
													<td>Your Status</td>
													<td> <ans>You Attended Successfully</ans></td>
												</tr>
												<tr>
													<td>You Start at</td>
													<td> <?php print date("d-m-Y  h:i:sa",$st_time); ?></td>
												</tr>
												<tr>
													<td>You Finish at</td>
													<td> <?php print date("d-m-Y  h:i:sa",$en_time); ?></td>
												</tr>
												<tr>
													<td>Your Marks</td>
													<td> <?PHP print "$marks"; ?></td>
												</tr>
												<tr><td>View Correct Answer</td>
												<td><a href="test_answer.php?id=<?php print "$enc_test_id"; ?>" > View Answer</a></td>
												</tr>
												<?PHP
											}
										}
										
									}
									else
									{
										?><tr><td>Test Status</td>
										<td> Available Soon</td></tr>
										<?PHP
									}
									?>
                                    
                                </tbody>
                            </table>
												
						</div>
						</section>
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