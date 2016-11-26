<!DOCTYPE HTML>
<html>
	<head>
		<title>Department of Computer Science & Applications</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" type="image/png" href="images/logo.png" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<link rel="stylesheet" type="text/css" href="../stylesheets/jquery.validate.css" />
                <link rel="stylesheet" type="text/css" href="../stylesheets/style.css" />
                <script src="../lib/jquery/jquery-1.3.2.js" type="text/javascript">
                </script>
                <script src="../javascripts/jquery.validate.js" type="text/javascript">
                </script>
                <script src="../javascripts/jquery.validation.functions.js" type="text/javascript"></script>
                <script type="text/javascript">
            /* <![CDATA[ */
            jQuery(function(){
                jQuery("#class").validate({
                    expression: "if (VAL != '0') return true; else return false;",
                    message: "Please enter the Required field"
                });
                jQuery("#subject").validate({
                    expression:"if(VAL != '0') return true; else return false;",
                    message:"Please enter the Required field"
                });
                jQuery("#box1").validate({
                    expression:"if(VAL) return true; else return false;",
                    message:"Please enter the Required field"
                });
                jQuery("#stdate").validate({
                    expression:"if(VAL)return true; else return false;",
                    message:"Please enter the Required field"
                });
				jQuery("#enddate").validate({
                    expression:"if(VAL) return true; else return false;",
                    message:"Please enter the Required field"
                });
				jQuery("#box3").validate({
                    expression:"if(VAL) return true; else return false;",
                    message:"Please enter the Required field"
                });
				jQuery("#box5").validate({
                    expression:"if(VAL) return true; else return false;",
                    message:"Please enter the Required field"
                });
				
            });
            </script>
			
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
				
                   
                    //$user_id=  encryptor('decrypt',$_SESSION['encregno']);
                    //$test_id=$_GET['id'];
                    //$user_id=  $_SESSION['regno'];
                    $_SESSION['regno']=$user_id;
                    //$encrp=$_SESSION['encr'];  
                   
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
                             header("location:index.html");
                        }
                    }
                    
                    
                    
                ?>
	<script>
	function getbatch2(str) {	
	if (str == "") {
	document.getElementById("list1").innerHTML = "";
	return;
	} else {
	if (window.XMLHttpRequest) {
	// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp = new XMLHttpRequest();
	} 
	else {
	// code for IE6, IE5
	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function()
	{
	   if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
	   {
			 document.getElementById("list1").innerHTML =
			 xmlhttp.responseText;
	   }
	};
	xmlhttp.open("GET","getbatch2.php?",true);
	xmlhttp.send();
	}
	}
	
	
	function getsems2(str,id) {
	if (str == "") {
	document.getElementById("list2").innerHTML = "";
	return;
	} else {
	if (window.XMLHttpRequest) {
	// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp = new XMLHttpRequest();
	} else {
	// code for IE6, IE5
	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
	if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
	{
	document.getElementById("list2").innerHTML =
	xmlhttp.responseText;
	}
	};
	
	xmlhttp.open("GET","getsems2.php?q="+str+'|'+"<?PHP echo $user_id; ?>",true);
	xmlhttp.send();
	}
	}
	</script>
	<script>
	      getbatch2()
	</script>
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
								
									<h2>Enter Test Details</h2>
                            <form method="post" action="#" >
								<div class="row uniform 50%">
									<div class="12u 12u(mobilep)">
									<h4>Select Class</h4>
										<div id="list1">
											<select  name="class" id="class">
												<option value="0">select Class</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row uniform 50%">
									<div class="12u 12u(mobilep)">
									<h4>Select Subject</h4>
										<div id="list2">
											<select name="subject" onfocus="getsems2(batch.value)" id="subject">
												<option value="0">select subject</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row uniform 50%">
									<div class="12u 12u(mobilep)">
									<h4>test title</h4>
                                        <input type="text" name="box1" value="" id="box1" required="true" placeholder="Title" />
									</div>
								</div>
								
								<div class="row uniform 50%">
									<div class="12u 12u(mobilep)">
									<h4>Start Date & Time</h4>
                                        <input type="datetime-local" name="stdate" required="true" id="stdate"/>
									</div>
								</div>
								<div class="row uniform 50%">
									<div class="12u 12u(mobilep)">
									<h4>End Date & Time</h4>
                                        <input type="datetime-local" name="enddate" required="true" id="enddate"/>
									</div>
								</div>
								<div class="row uniform 50%">
									<div class="12u 12u(mobilep)">
									<h4>Time Duration (Mins)</h4>
                                        <input type="number" min="1" max="150" name="box3" id="box3" required="true" placeholder="Enter Duration in minutes"/>
									</div>
								</div>
								
								<div class="row uniform 50%">
									<div class="12u 12u(mobilep)">
									<h4>No of Questions</h4>
                                        <input type="number" min="1" max="50" name="box5"  id="box5" required="true" placeholder="No of Questions"/>
									</div>
								</div>
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
					</section>
                            
                           
                        
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
                        
                        
    <?php
               
		$query=  mysql_query("select * from quiz");
		if($_SERVER['REQUEST_METHOD']=='POST') 
		{
		 
			$title =mysql_real_escape_string( $_POST['box1']);
			
			$Time_dur=mysql_real_escape_string( $_POST['box3']);
			$class=mysql_real_escape_string( $_POST['class']);
			$subject=mysql_real_escape_string( $_POST['subject']);
			
			$ques=mysql_real_escape_string( $_POST['box5']);
			$stdate=mysql_real_escape_string( $_POST['stdate']);
			$enddate=mysql_real_escape_string( $_POST['enddate']);
			$time_now=strtotime("now");
			$time_st=strtotime($stdate);
			$time_end=strtotime($enddate);
			
			if($class==0 or $class=="")
			{
				print '<script>alert("Select Correct Class");</script>';
				print '<script>window.location.assign("create_test.php");</script>';
				exit;
			}
			if($subject==0 or $subject=="")
			{
				print '<script>alert("Select Correct Subject");</script>';
				print '<script>window.location.assign("create_test.php");</script>';
				exit;
			}
			if($time_st<$time_now or $time_end<$time_st)
			{
				print '<script>alert("Select Correct Start time and End time");</script>';
				print '<script>window.location.assign("create_test.php");</script>';
				exit;
			}
			if($ques<0)
			{
				print '<script>alert("Please enter Valid Questions count");</script>';
				print '<script>window.location.assign("create_test.php");</script>';
				exit;
			}
			
			mysql_query("INSERT INTO `quiz`( `title`, `Staff_Key`, `duration`, `batch`,`group_id` ,`total_questions`,`start_time`,`end_time`,`active`) VALUES ('$title','$user_id','$Time_dur','$class','$subject','$ques','$stdate','$enddate',0)");
			print '<script>alert("your test created successfully");</script>';
			$query=  mysql_query("select * from quiz");
			$exist=  mysql_num_rows($query);
			$max="0";
			if($exist>0)
			{
				while($row=  mysql_fetch_assoc($query))
				{
					$table_qid=$row['test_id'];
					if($table_qid>$max)
					{
						$max=$table_qid;
					}
				}
			}
			$ass_id=encryptor('encrypt',$max);
			$uid=encryptor('encrypt',$user_id);
			$aaa="create_questions.php?id=".$ass_id."&uid=".$uid."";
			print '<script>window.location.assign("'.$aaa.'");</script>';
			//print '<script>window.location.assign("create_questions.php");</script>';
    }

    ?>
	</body>
</html>