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
					$query=  mysql_query("select * from assignment");
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
					$name="";
					$submit_date="";
					$attended=0;
					if($exist>0)
					{
						while($row=  mysql_fetch_assoc($query))
						{
							$table_id=$row['assign_id'];
							if($table_id==$assign_id)
							{
								$table_group_id=$row['group_id'];
								$table_staffkey=$row['staff_id'];
								$table_title=$row['title'];
								$table_desc=$row['descr'];
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
											$unique_id=$rowx['assign_sno'];
											$doc_path=$rowx['doc_path'];
											$submit_date=$rowx['submit_date'];
											$mark=$rowx['mark'];
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
										if($table_staffkey==$table_stdid)
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
                    

		$status="";
														
		if(strtotime($t_last_date)>time())
		{
			if( $attended==0)
			{	
				$status="Not yet Submitted Your Assignment. Submit Soon";
			}
			else
			{
				$status="Your Assignment Submitted Successfully";
			}
		}
		else
		{
			if( $attended==0)
			{	
				$status="You Miss to Submit your Assignment. Meet your Course Teacher";
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
		<section id="main" class="container">
                        
                        <div class="row">
                            <div class="12u">
								<section class="box">
								
                                    <div class="table-wrapper">
										<center><h3> Assignment details </h3></center>
										
										<?PHP if(strtotime($t_last_date)<time())
												{
														?>
														<center><warning>Assignment closed.</warning> </center>
														<?PHP
												}
												if($attended==1)
												{
														?>
														<center><ans>Your Assignment Submitted Successfully.</ans> </center>
														<?PHP
												}
												?>
                                            <table class="alt">
                                                   
                                                    <tbody>
															<tr>
                                                                    <td>Assignment ID</td>
                                                                    <td><?php print "$assign_id"; ?></td>        
                                                            </tr>
                                                            <tr>
                                                                    <td>Title</td>
                                                                    <td><?php print "$table_title"; ?></td>        
                                                            </tr>
                                                             <tr>
                                                                    <td>Description</td>
                                                                    <td><?php print "$table_desc"; ?></td>        
                                                            </tr>
															<tr>
                                                                    <td>Class </td>
                                                                    <td><?php print "$t_class"; ?></td>        
                                                            </tr>
															<tr>
                                                                    <td>Subject</td>
                                                                    <td><?php print "$t_subject"; ?></td>        
                                                            </tr>
															<tr>
                                                                    <td>Course Teacher</td>
                                                                    <td><?php print "$name"; ?></td>        
                                                            </tr>
                                                            <tr>
                                                                    <td>Last date to submit </td>
                                                                    <td><?php print date("d-m-Y  h:i:s a",strtotime($t_last_date)); ?></td>        
                                                            </tr>
															<tr>
                                                                    <td>Your Assignment Status </td>
                                                                    <td><?php print "$status"; ?></td>        
                                                            </tr>
															<?PHP
																if($attended==0)
																{
																	
																		?>
																		<tr>
																			
																			<td colspan="2">
																	<div class="row">
																		<div class="12u">
																			<section id="cta">
																				<form method="post" enctype="multipart/form-data">
																				
																				<h4>Submit Your Assignment Here</h4>
																					<div class="row uniform 50%">
																						<div class="12u 12u(mobilep)">
																						
																							<input type="file" name="notes"  required="true" accept=".pdf,.docx,.doc,.ppt,.pptx,.zip" />
																						</div>
																					</div>
																					<div class="row uniform">
																						<div class="12u">
																						<ul class="actions align-center">
																							<li><input type="submit" value="Upload" /></li>
																							
																						</ul>
																						</div>
																					</div>
																				</form>	
																			</section>
																		</div>
																	</div>
																			</td>
																		</tr>
																		<?PHP
																	
																}
																else
																{
																	
																	?>
																	<tr>
																		<td>Your Submission Date </td>
																		<td><?php print date("d-m-Y  h:i:s a",$submit_date); ?></td>        
																	</tr>
																	<tr>
																			<td>View Your Document </td>
																			<td><a href="<?php print "$doc_path"; ?>" >View document</a></td>        
																	</tr>
																	<tr>
																			<td>Your Marks </td>
																			<td><?php if($mark==NULL) print "not Available"; else print "$mark"?></td>        
																	</tr>
																	<?PHP
																}
															
															?>
															
                                                    </tbody>
                                                    
                                            </table>
											
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
			
	<?php
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
			$bat="";
			$file=$_FILES['notes'];
			$filename=$file['name'];
			$upload_directory='lectures/';
			$max_file_size = 104857600;
			$ext_str = "docx,doc,ppt,pptx,pdf,zip";
			$allowed_extensions=explode(',',$ext_str);
			if(strlen($filename)>30)
			{
				Print '<script>alert(" File Name Should be lesser than 30 characters. please modify and then try again"); </script>';
				exit;
			}
			$ext = substr($filename, strrpos($filename, '.') + 1); //get file extension from last sub string from last . character
			if (!in_array($ext, $allowed_extensions) ) 
			{
				Print '<script>alert(" file format mismatch. please upload only docx,doc,ppt,pptx,pdf,zip file formats"); </script>';
				exit;
			} 
			if (in_array($ext, $allowed_extensions) )
			{
				if(move_uploaded_file($file['tmp_name'],$upload_directory.$filename))
				{

					$path=$upload_directory.$filename;
					$post_date=time();
					if(mysql_query("INSERT INTO `assign_submit` ( `student_id`, `assign_id`, `doc_path`, `submit_date`) VALUES ('$user_id', '$assign_id', '$path','$post_date')"))
						Print '<script>alert("Your assignment submitted  Successfully."); </script>';
					else Print '<script>alert(" Uploading failed."); </script>';
				}
				else
				{
					Print '<script>alert("The file cant moved to target directory."); </script>';
				}
			}

			
			print '<script>window.location.assign("student_home.php");</script>';
		}
	?>

			
	</body>
</html>