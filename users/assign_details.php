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
					$enc_id=encryptor('encrypt',$assign_id); 
					$mode=$_GET['mode'];
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
                                                                    <td>Last date to submit </td>
                                                                    <td><?php print date("d-m-Y  h:i:s a",strtotime($t_last_date)); ?></td>        
                                                            </tr>
															
                                                    </tbody>
                                                    
                                            </table><hr />
											
											
											
									<form method="POST" action="report_pdf.php">
										<div class="row uniform">
											<div class="12u ">	
													<ul class="actions fit">
														<li><a href="assign_details.php?id=<?php print "$enc_id"; ?>&mode=<?php print "submit"; ?>" class="button fit">Submitted</a></li>
														<li><a href="assign_details.php?id=<?php print "$enc_id"; ?>&mode=<?php print "late_submit"; ?>" class="button fit">Late Submitted</a></li>
														<li><a href="assign_details.php?id=<?php print "$enc_id"; ?>&mode=<?php print "not_submit"; ?>" class="button fit">Not Submitted</a></li>
													</ul>
													<ul class="actions fit">
														<li><a href="assign_details.php?id=<?php print "$enc_id"; ?>&mode=<?php print "all"; ?>" class="button fit">View All</a></li>
												
														<li><input name="Printpdf" type="submit" class="button fit" value="Print Report"/></li>
													</ul>
												</div>                         
										</div>
                                    </form>	
									<?PHP
									if($mode=="all")									
									{
										?>
										<h3 align="center"> All Students Assignment Report </h3>	
										<?PHP
									}
									if($mode=="submit")									
									{
										?>
										<h3 align="center"><ans> Assignment submitted students details </ans>	</h3>
										<?PHP
									}
									if($mode=="late_submit")									
									{
										?>
										<h3 align="center"><ans_blue> Assignment late submited students details</ans_blue> </h3>	
										<?PHP
									}
									if($mode=="not_submit")									
									{
										?>
										<h3 align="center"><warning> Assignment Not submited students details</warning> </h3>	
										<?PHP
									}
									?>
							<table class="alt">
								<thead>
									<tr>
										<th>S.No</th>
										<th>Reg No</th>
										<th>Name</th>
										
										<th>Submit date</th>
										
										<th>Marks</th>
										<th>More Details</th>
										
									</tr>
                                <tbody>
								<?PHP
									
									mysql_query("DELETE from `temp_report_assign` where sno!=-1");
			
									$temp="0";
									$table_title="";
									$sno=0;
									$t_submit_date="";
									$t_marks=0;
									$t_doc_path="";
								if($mode=="all")
								{
									$query1=  mysql_query("select * from mas_students ORDER BY `mas_students`.`Student_Key` ASC");
									$exist1=  mysql_num_rows($query1);
									$name="";
									if($exist>0)
									{
										while($row1=  mysql_fetch_assoc($query1))
										{
											$table_batch=$row1['batch'];
											if($t_batch==$table_batch)
											{
												$table_stdid=$row1['Student_Key'];
												$name=$row1['First_Name'] . " " . $row1['Last_Name'];
												
												$query=  mysql_query("select * from assign_submit");
												$exist=  mysql_num_rows($query);
												$submit_details=0;
												if($exist>0)
												{
													while($row=  mysql_fetch_assoc($query))
													{
														
														$t_student_id=$row['student_id'];
														$t_assign_id=$row['assign_id'];
														$submit_details=0;
														$t_marks=0;
														if($assign_id==$t_assign_id and $t_student_id==$table_stdid)
														{
															$submit_details=1;
															
															$enc_assign_id=encryptor('encrypt',$row['assign_sno']);
															$t_marks=$row['mark'];
															$t_submit_date=$row['submit_date'];
															$t_doc_path=$row['doc_path'];
															break;
														}
													}
												}
														
												$sno+=1;	
												?>
													<tr>
														<td><?php print "$sno"; ?></td>
														<td><?php print "$table_stdid"; ?></td>
														<td><?php print "$name"; ?></td>
														<td><?php  if($submit_details==1) print date("d-m-Y  h:i:s a",$t_submit_date); else print "Not Submitted";?></td>
														
														<td><?php if($t_marks!=NULL) print "$t_marks";  else print "---";?></td>
														<td><?PHP if($submit_details==1) 
																	{
																		?><a href="assign_mark.php?id=<?php print "$enc_assign_id"; ?>&mode=<?php print "$mode"; ?>" > View & Mark</a>
																		<?PHP
																	}
															?>
														</td>
													
														<!--<td>
														<ul class="actions small">
															<li><a href="#" class="button special small">Small</a></li>
															
														</ul>							
																						</td>-->
													</tr>	
												<?php
												if($submit_details==1)
													$cdate=date("d-m-Y  h:i:s a",$t_submit_date);
												else
													$cdate="Not Submitted";
												mysql_query("INSERT INTO `temp_report_assign` (`sno`, `reg_no`, `name`, `submit_date`, `marks`) VALUES ('$sno', '$table_stdid', '$name', '$cdate', '$t_marks')");
				
											}
										}
										
									}
								}
								elseif($mode=="not_submit")
								{
									$query1=  mysql_query("select * from mas_students");
									$exist1=  mysql_num_rows($query1);
									$name="";
									if($exist>0)
									{
										while($row1=  mysql_fetch_assoc($query1))
										{
											$table_batch=$row1['batch'];
											if($t_batch==$table_batch)
											{
												$table_stdid=$row1['Student_Key'];
												$name=$row1['First_Name'] . " " . $row1['Last_Name'];
												
												$query=  mysql_query("select * from assign_submit");
												$exist=  mysql_num_rows($query);
												$submit_details=0;
												if($exist>0)
												{
													while($row=  mysql_fetch_assoc($query))
													{
														$t_sno=$row['assign_sno'];
														$t_student_id=$row['student_id'];
														$t_assign_id=$row['assign_id'];
														$submit_details=0;
														if($assign_id==$t_assign_id and $t_student_id==$table_stdid)
														{
															$submit_details=1;
															$t_marks=$row['mark'];
															$t_submit_date=$row['submit_date'];
															$t_doc_path=$row['doc_path'];
															break;
														}
													}
												}
												if($submit_details==0)
												{
													$sno+=1;	
													?>
														<tr>
															<td><?php print "$sno"; ?></td>
															<td><?php print "$table_stdid"; ?></td>
															<td><?php print "$name"; ?></td>
															<td><?php print "Not Submitted";?></td>
															
															<td><?php if($t_marks!=NULL) print "$t_marks";  else print "---";?></td>
															<td>not available</td>
															
															<!--<td>
															<ul class="actions small">
																<li><a href="#" class="button special small">Small</a></li>
																
															</ul>							
																							</td>-->
														</tr>	
													<?php
													if($submit_details==1)
														$cdate=date("d-m-Y  h:i:s a",$t_submit_date);
													else
														$cdate="Not Submitted";
													mysql_query("INSERT INTO `temp_report_assign` (`sno`, `reg_no`, `name`, `submit_date`, `marks`) VALUES ('$sno', '$table_stdid', '$name', '$cdate', '$t_marks')");
												}
											}
										}
										
									}
								}
								elseif($mode=="submit")
								{
									$query=  mysql_query("select * from assign_submit");
									$exist=  mysql_num_rows($query);
									mysql_query("DELETE from `temp_report_assign` where sno!=-1");
			
									$temp="0";
									$table_title="";
									$sno=0;
									if($exist>0)
									{
										while($row=  mysql_fetch_assoc($query))
										{
											$t_sno=$row['assign_sno'];
											$enc_assign_id=encryptor('encrypt',$row['assign_sno']);
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
											if($assign_id==$t_assign_id and $t_submit_date<strtotime($t_last_date))
											{
											$sno+=1;	
											?>
												<tr>
													<td><?php print "$sno"; ?></td>
													<td><?php print "$t_student_id"; ?></td>
													<td><?php print "$name"; ?></td>
													<td><?php print date("d-m-Y  h:i:s a",$t_submit_date); ?></td>
													
													<td><?php if($t_marks!=NULL) print "$t_marks";  else print "---";?></td>
													<td><a href="assign_mark.php?id=<?php print "$enc_assign_id"; ?>&mode=<?php print "$mode"; ?>" > View & Mark</a></td>
													<!--<td>
													<ul class="actions small">
														<li><a href="#" class="button special small">Small</a></li>
														
													</ul>							
																					</td>-->
												</tr>	
											<?php
											$cdate=date("d-m-Y  h:i:s a",$t_submit_date);
											mysql_query("INSERT INTO `temp_report_assign` (`sno`, `reg_no`, `name`, `submit_date`, `marks`) VALUES ('$sno', '$table_stdid', '$name', '$cdate', '$t_marks')");
			
											}
										}
										
									}
								}
								elseif($mode=="late_submit")
								{
									$query=  mysql_query("select * from assign_submit");
									$exist=  mysql_num_rows($query);
									mysql_query("DELETE from `temp_report_assign` where sno!=-1");
			
									$temp="0";
									$table_title="";
									$sno=0;
									if($exist>0)
									{
										while($row=  mysql_fetch_assoc($query))
										{
											$t_sno=$row['assign_sno'];
											$enc_assign_id=encryptor('encrypt',$row['assign_sno']);
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
											if($assign_id==$t_assign_id and $t_submit_date>strtotime($t_last_date))
											{
											$sno+=1;	
											?>
												<tr>
													<td><?php print "$sno"; ?></td>
													<td><?php print "$t_student_id"; ?></td>
													<td><?php print "$name"; ?></td>
													<td><?php print date("d-m-Y  h:i:s a",$t_submit_date); ?></td>
													
													<td><?php if($t_marks!=NULL) print "$t_marks";  else print "---";?></td>
													<td><a href="assign_mark.php?id=<?php print "$enc_assign_id"; ?>" > View & Mark</a></td>
													<!--<td>
													<ul class="actions small">
														<li><a href="#" class="button special small">Small</a></li>
														
													</ul>							
																					</td>-->
												</tr>	
											<?php
											$cdate=date("d-m-Y  h:i:s a",$t_submit_date);
											mysql_query("INSERT INTO `temp_report_assign` (`sno`, `reg_no`, `name`, `submit_date`, `marks`) VALUES ('$sno', '$table_stdid', '$name', '$cdate', '$t_marks')");
			
											}
										}
										
									}
								}
								?>
                                 
                                    
								</tbody>
                            </table>
							</div>
									
                                            <!--<a href="#" class="button special fit">Log In</a>	-->			
                                        	
					</div>
				</section>
						
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