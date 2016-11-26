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
                    $assign_id=encryptor('decrypt',$_GET['id']);
					//$enc_id=encryptor('encrypt',$assign_id); 
					//$mode=$_GET['mode'];
                    $query=  mysql_query("select * from mas_staff");
                    $exist=  mysql_num_rows($query);
                    $temp="0";
					$t_submit_date=0;
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
					$t_assign_id="";
					$query=  mysql_query("select * from assign_submit");
					$exist=  mysql_num_rows($query);

					$temp="0";
					$table_title="";
					$sno=0;
					if($exist>0)
					{
						while($row=  mysql_fetch_assoc($query))
						{
							$t_sno=$row['assign_sno'];
							if($t_sno==$assign_id)
							{
								$t_student_id=$row['student_id'];
								$t_assign_id=$row['assign_id'];
								
								$t_marks=$row['mark'];
								$t_submit_date=$row['submit_date'];
								$t_doc_path=$row['doc_path'];
								
								$query1=  mysql_query("select * from mas_students");
								$exist1=  mysql_num_rows($query1);
								$name="";
								if($exist>0)
								{
									while($row1=  mysql_fetch_assoc($query1))
									{
										$table_stdid=$row1['Student_Key'];
										if($t_student_id==$table_stdid)
										{
											$name=$row1['First_Name'] . " " . $row1['Last_Name'];
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
								<section class="box">
								
                                    <div class="table-wrapper">
										<center><h4> Assignment details </h4></center>
                                            <table class="alt">
                                                   
                                                    <tbody>
															
                                                            <tr>
                                                                    <td>Student Name</td>
                                                                    <td><?php print "$name"; ?></td>        
                                                            </tr>
                                                             <tr>
                                                                    <td>Submit Date</td>
                                                                    <td><?php print date("d-m-Y  h:i:s a",$t_submit_date); ?></td>        
                                                            </tr>
															<tr>
                                                                    <td>View Document </td>
                                                                    <td><a href="<?php print "$t_doc_path"; ?>" > View Assignment</a></td>        
                                                            </tr>
															<tr>
                                                                    <td>Marks</td>
                                                                    <td><?php print "$t_marks"; ?></td>        
                                                            </tr>
                                                            
                                                    </tbody>
                                                    
                                            </table><hr />
											<div class="row">
												<div class="12u">
													<section id="cta">
														<form method="post" enctype="multipart/form-data">
														
														<h4>Update Mark for Assignment</h4>
															<div class="row uniform 50%">
																<div class="12u 12u(mobilep)">
																
																	<input type="number" name="mark" min="0" max="100" required="true" value=<?php print "$t_marks"; ?> />
																</div>
															</div>
															<div class="row uniform">
																<div class="12u">
																<ul class="actions align-center">
																	<li><input type="submit" value="Update" /></li> <?PHP $enc_as_id=encryptor('encrypt',$t_assign_id); ?>
																	<li><a  href="assign_details.php?id=<?php print "$enc_as_id"; ?>&mode=<?php print "$mode"; ?>" class="button">Go Back</a></li>
																	
																</ul>
																</div>
															</div>
														</form>	
													</section>
												</div>
											</div>
									</div>
								
								
									<embed width="90%" height="500px" src="<?php print "$t_doc_path"; ?>" type="application/pdf">&nbsp; </embed>
									
								
								</section>									
							</div>
						</div>
					
								
                                            <!--<a href="#" class="button special fit">Log In</a>	-->			
                                        	
					
				
						
			<!-- Footer -->
				<footer id="footer"> 
					<ul class="icons">
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>						
					</ul>
					<ul class="copyright">
						<li>&copy; GRI-DCSA. All rights reserved.</li>
						
					</ul>
				</footer>
		</section>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/jquery.scrollgress.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>
			
			
	<?php
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$mark=mysql_real_escape_string($_POST['mark']);
		$ass_id=encryptor('encrypt',$t_assign_id);
		$aaa="assign_details.php?id=".$ass_id."&mode=".$mode."";
		
		
			mysql_query("UPDATE `dcsa`.`assign_submit` SET `mark` = '$mark' WHERE `assign_submit`.`assign_sno` = $assign_id");
			print '<script>alert("Mark Updated Successfully. ")</script>';
			
			print '<script>window.location.assign("'.$aaa.'");</script>';
			

	}
	?>
	</body>
</html>