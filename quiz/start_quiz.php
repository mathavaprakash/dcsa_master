<!DOCTYPE HTML>
<html>
	<head>
		<title>Department of Computer Science & Applications</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" type="image/png" href="../images/logo.png" />
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
					$table_group_id="";
                    if($exist>0)
                    {
                        while($row=  mysql_fetch_assoc($query))
                        {
                            $table_qid=$row['test_id'];
							$end_time=0;
                            if($test_id==$table_qid)
                            {
                                $temp=1;
                                $title=$row['title'];
								$author=$row['Staff_Key'];
								$table_group_id=$row['group_id'];
								$duration=$row['duration'];
								$tot_ques=$row['total_questions'];
								$end_time=$row['end_time'];
								$ques_count=$table_qid*100;
								$max_ques=$ques_count+$tot_ques;
								$test_taken="no";
								$query=  mysql_query("select * from test");
								$exist=  mysql_num_rows($query);
								$attended='no';
							  
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
											$test_taken="yes";
											print '<script>alert("already you taken this test")</script>';
											
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
            <section id="main" class="container">
                        
                        <div class="row">
                            <div class="12u">
								<section class="box">
								<form method="post" action="#">
									<h3 align="center"><?php print "$title"; ?></h3>
									<h4> <warning>Guidelines for Quiz</warning></h4>
									<ol>
												<li>Your quiz will start at when you click Start quiz Button given bellow.</li>
												<li>You have <ans_blue><?php print "$duration"; ?> minute(s)</ans_blue> for attend this quiz.</li>
												<li>You can attend this test only once before <ans_blue><?php print date("d-m-Y  h:i:sa",strtotime($end_time)); ?></ans_blue> </li>
												<li>When you Take quiz, every question have 4 options. you can select any one option or leave it blank. </li>
												<li>No negative marks. Each correct answer you will get +1 mark.</li>
												<li>You can submit your quiz whenever you finish the quiz. If you fail to submit before end of deadline, system will auto-submit after end of deadline</li>
												<li>Your start time and Timer shown on top of the screen</li>
												<li>After <ans_blue><?php print date("d-m-Y  h:i:sa",strtotime($end_time)); ?></ans_blue> , you will view your marks and correct answers for this test
											</ol>
											
											<h3 align="center"><ans>All the Best...</ans></h3>
                                   
											<div class="row uniform">
												<div class="12u ">	
											
													<ul class="actions align-center">
											
													<li><input type="submit" value="Start Quiz" /></li>
											
													<li><a href="quiz_home.php" class="button">Take Later</a></li>
													</ul>
												</div>                         
											</div>
											
											
										</form>
					
				</section>

			</div>
		</div>
		</section>
		<?php
            
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {      
			//date_default_timezone_set('Asia/Kolkata');
			//$timstamp = time();
			
			//$st_time = date("Y-m-d H:i:s",time());
			if($test_taken=="no")
			{
				$st_time = time();
				$end_time=time()+($duration*60);
				mysql_query("INSERT INTO `test`(`quiz_id`,`Student_Key`, `duration`, `start_time`,`end_time`) VALUES ('$test_id','$user_id','$duration','$st_time','$end_time')");
			  //print '<script>alert("test started")</script>';
						$query=  mysql_query("select * from test");
						$exist=  mysql_num_rows($query);
						
						$table_fname="";
						if($exist>0)
						{
							while($row=  mysql_fetch_assoc($query))
							{
								$table_userid=$row['Student_Key'];
								$table_quizid=$row['quiz_id'];
								if($user_id==$table_userid && $test_id==$table_quizid)
								{
									
								   
									$_SESSION['tid']=$row['test_id'];
									break;
								}
							}
							
						} 
						
				$_SESSION['id']=$test_id;		
				$_SESSION['new_test']="yes";
				$_SESSION['encregno']=encryptor('encrypt',$user_id);
				//print '<script>window.open("online_test.php","newwind");</script>';
				print '<script>window.open("online_test.php");</script>';
			}
			else{
				print '<script>alert("You Cant take Test")</script>';
				print '<script>window.open("../users/student_home.php");</script>';
			}
			
        }
?>
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