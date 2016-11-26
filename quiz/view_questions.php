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
				$enc_id=0;
				if($_GET['id'])
				{
				$enc_id=$_GET['id'];
				}
				else
				{
				   header("location:../index.html");
				}
				$quiz_id=encryptor('decrypt',$enc_id);
                    //$test_id=$_SESSION['test_id'];
                   /* $marks=0;
                    //$marks=$_SESSION['mark'];
					$query=  mysql_query("select * from test");
                    $exist=  mysql_num_rows($query);
                    $table_quizid=0;
					$t_st_time=0;
					$t_end_time=0;
                    if($exist>0)
                    {
                        while($row=  mysql_fetch_assoc($query))
                        {
                           $t_test_id=$row['test_id'];
                            if($test_id==$t_test_id)
                            {
                                $table_quizid=$row['quiz_id'];
								$marks=$row['marks'];
								$t_st_time=$row['start_time'];
								$t_end_time=$row['end_time'];
                                break;
                            }
                        }
                        
                    } */
					$tot_ques=0;
					
					$query=  mysql_query("select * from quiz");
                    $exist=  mysql_num_rows($query);
                    if($exist>0)
                    {
                        while($row=  mysql_fetch_assoc($query))
                        {
                           $t_quiz_id=$row['test_id'];
                            if($quiz_id==$t_quiz_id)
                            {
                                $tot_ques=$row['total_questions'];
                                break;
                            }
                        }
                        
                    } 
					
					//$tot_ques=$_SESSION['tot_ques'];
					$ques_count=$quiz_id*100;
					$max_ques=$ques_count+$tot_ques;
                   
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
						<section class="box  align-left">
                            <form method="post" action="#" >
                                <?php
                                   
                                    $query=  mysql_query("select * from questions");
                                    $exist=  mysql_num_rows($query);
                                    $qcount=0;
                                    $qid="";
                                    $question="";
                                    $opt_a="";
                                    $opt_b="";
                                    $opt_c="";
                                    $opt_d="";
                                    $answer="";
                                    if($exist>0)
                                    {
                                        for($i=$ques_count+1;$i<=$max_ques;$i++)
										{
											$query=  mysql_query("select * from questions where q_id='$i'");
											$row=  mysql_fetch_array($query);
											$qid=$row['q_id'];
                                                $qcount+=1;
                                                $question=$row['question'];
                                                $opt_a=$row['a'];
                                                $opt_b=$row['b'];
                                                $opt_c=$row['c'];
                                                $opt_d=$row['d'];
                                                $answer=$row['answer'];

                                                ?>
                                                <br/><h4><?php echo "$qcount";?>) <?php echo "$question";?> </h4>
                                                    <div class="row uniform align-left">
                                                        <div class="row uniform">
															<?PHP
																if($answer=='a')
																{ ?>
																<div class="6u 12u(mobilep)" >
																		
																		<h4> <ans>A) <?php echo "$opt_a";?></ans> </h4>
																</div> 
																<?PHP
																}
																else
																{
																	?>
																<div class="6u 12u(mobilep)" >
																		
																		<h4> A) <?php echo "$opt_a";?> </h4>
																</div> 
																<?PHP
																}
																
																if($answer=='b')
																{ ?>
																<div class="6u 12u(mobilep)">
																		
																		<h4><ans>B) <?php echo "$opt_b";?> </ans></h4>
																</div>
																<?PHP
																}
																else
																{
																	?>
																<div class="6u 12u(mobilep)">
																		
																		<h4>B) <?php echo "$opt_b";?> </h4>
																</div>
																<?PHP
																}
																if($answer=='c')
																{ ?>
																<div class="6u 12u(mobilep)">
																		
																		<h4><ans>C) <?php echo "$opt_c";?></ans></h4>
																</div>
																<?PHP
																}
																else
																{
																	?>
																<div class="6u 12u(mobilep)">
																		
																		<h4>C) <?php echo "$opt_c";?></h4>
																</div>
																<?PHP
																}
																if($answer=='d')
																{ ?>
																<div class="6u 12u(mobilep)">
																	   
																		<h4><ans>D) <?php echo "$opt_d";?></ans> </h4>
																</div>
																<?PHP
																}
																else
																{
																	?>
																<div class="6u 12u(mobilep)">
																	   
																		<h4>D) <?php echo "$opt_d";?> </h4>
																</div>
																<?PHP
																}
															?>
                                                        </div>
                                                        <!--<div class="row uniform">
                                                            <h3>  <?php //echo "$answer";?></h3>
                                                        </div>-->
                                                    </div>
                                                <?php    
                                            
                                        }
                                    }
                                ?> 
                                <div class="row uniform">
                                        <div class="12u ">	
											</br></br>
											<ul class="actions align-center">
												
													<li><a href="../quiz/quiz_home_staff.php" class="button special fit">Home</a></li>
												</ul>
                                            </div>                         
                                    </div>
                                
                                    
                                    
                                                    
				</form>   
                        
                            
                        </section>
                            
                   </section >
				</div>				   
                </div>        
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
                </section>
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