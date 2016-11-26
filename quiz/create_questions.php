<!DOCTYPE HTML>
<html>
	<head>
		<title>Department of Computer Science & Applications</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" type="image/png" href="images/logo.png" />
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
                    
                    $user_id=  encryptor('decrypt',$_GET['uid']);
                    $test_id=encryptor('decrypt',$_GET['id']);
                   // $user_id=  $_SESSION['regno'];
                    $_SESSION['regno']=$user_id;
                   
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
					$tot_ques="";
					$active="";
                    if($exist>0)
                    {
                        while($row=  mysql_fetch_assoc($query))
                        {
                            $table_qid=$row['test_id'];
                            if($test_id==$table_qid)
                            {
                                $temp=1;
                                $title=$row['title'];
                                $duration=$row['duration'];
								$tot_ques=$row['total_questions'];
								$active=$row['active'];
								$ques_count=($test_id*100)+1;
								if($active=="1")
								{
									print '<script>alert("test already created");</script>';
									 header("location:../users/staff_home.php");
									 exit;
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
									<li><a href="../users/edit_profile.php">Edit Profile</a></li>
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
							<section id="cta">
							<!-- Form -->
								
									<h2>Create Test</h2>
                            <form method="post" action="#" >
                                <?php
								$max_ques=$ques_count+$tot_ques;
                                 for($i=$ques_count;$i<$max_ques;$i++)
                                {
											
                                                ?>
												<div class="row uniform align-left">
													<div class="row uniform">
															<div class="12u 12u(mobilep)">
																<?PHP print ($i%100);?><textarea placeholder="Enter the question" name="<?php echo $i; ?>textarea1[]" required="true" id="textarea"></textarea><br/>
															</div> 
                                                        
                                                            <div class="6u 12u(mobilep)">
																<input type="text" name="<?php echo $i; ?>box1[]" value="" id="box1" required="true"  placeholder="Option A" />
                                                            </div>
                                                            <div class="6u 12u(mobilep)">
																<input type="text" name="<?php echo $i; ?>box2[]" value="" id="box2" required="true" placeholder="Option B"/>
                                                            </div>
                                                             <div class="6u 12u(mobilep)">
																<input type="text" name="<?php echo $i; ?>box3[]" value="" id="box3" required="true" placeholder="Option C"/>
                                                             </div>
                                                             <div class="6u 12u(mobilep)">
																<input type="text" name="<?php echo $i; ?>box4[]" value="" id="box4" required="true" placeholder="Option D"/>
                                                            </div>
                                                            <div class="12u 12u(mobilep)"> Correct Answer(select option)
																<select name="<?php echo $i; ?>box5[]" id="box5" required="true">
																	<option value="a">A</option>
																	<option value="b">B</option>
																	<option value="c">C</option>
																	<option value="d">D</option>
																</select>
																
                                                            </div>
															<div class="6u 12u(mobilep)">
                                                            
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php   

                                }
                                ?> 
										<div class="row uniform">
											<div class="12u">
												<ul class="actions">
													<li><input type="submit" value="Submit"/></li>
													<li><input type="reset" class="button alt"value="Reset"/></li>
												</ul>
											</div>
										</div>
                                
                                    
                                    
                                                    
								</form>   
                   	
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
					<!-- BEGIN: Powered by Supercounters.com -->
					
						<script type="text/javascript" src="http://widget.supercounters.com/hit.js">
						</script>
						<script type="text/javascript">sc_hit(1214356,147,5);
						</script>
						<br>
						<noscript><a href="http://www.supercounters.com">Page visits counter</a></noscript>
					
					<!-- END: Powered by Supercounters.com -->
					</li>
				</ul>
				</footer>
                </section>
		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
                        
                        
                        
<?php
     
    
	$query="select * from questions";
	$res=mysql_query($query);
    if($_SERVER['REQUEST_METHOD']=='POST') 
	{
		
		$max_ques=$ques_count+$tot_ques;
		for($i=$ques_count;$i<$max_ques;$i++)
		{
			$a=$i."textarea1";
			foreach ( $_POST[$a] as $key=>$value ) 
			{
				$values = mysql_real_escape_string($value);
				//echo "Demo:".$values;
			}
			$b=$i."box1";
			foreach ( $_POST[$b] as $key=>$value ) 
			{
				$values1 = mysql_real_escape_string($value);
				//echo "Demo1:".$values1;
				//}
			}
			$c=$i."box2";
			//if ($_POST['box2']) {
			foreach ( $_POST[$c] as $key=>$value ) 
			{
				$values2 = mysql_real_escape_string($value);
				//echo "Demo2:".$values2;
			}
			$d=$i."box3";
			foreach ( $_POST[$d] as $key=>$value ) 
			{
				$values3 = mysql_real_escape_string($value);
				//echo "Demo3:".$values3;
			}
			$e=$i."box4";
			foreach ( $_POST[$e] as $key=>$value )
			{
				$values4 = mysql_real_escape_string($value);
				//echo "Demo4:".$values4;

			}
			$f=$i."box5";
			foreach ( $_POST[$f] as $key=>$value ) 
			{
				$values5 = mysql_real_escape_string($value);
				//echo "Demo5:".$values5;
			}
			
			$query=  mysql_query("select * from quiz");
			$exist=  mysql_num_rows($query);
			if($exist>0)
			{
				while($row=  mysql_fetch_assoc($query))
				{
					$qid=$row['test_id'];
				}
			}
			
			mysql_query("INSERT INTO `questions`(`q_id`,`question`, `a`, `b`, `c`, `d`,`answer`) VALUES ('$i','$values','$values1','$values2','$values3','$values4','$values5')");
			
		}
		mysql_query("UPDATE `dcsa`.`quiz` SET `active` = '1' WHERE `quiz`.`test_id` = $test_id");

		print '<script>alert("your Test created successfully");</script>';
		$_SESSION['encregno']=encryptor('encrypt',$user_id);
		print '<script>window.location.assign("../users/staff_home.php");</script>';
    }
?>
	</body>
</html>