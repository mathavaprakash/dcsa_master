<!DOCTYPE HTML>
<html>
	<head>
		<title>Department of Computer Science and Applications</title>
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
                    $_SESSION['regno']=$user_id;
                    //$encrp=$_SESSION['encr'];  
                    
                    $query=  mysql_query("select * from mas_students");
                    $exist=  mysql_num_rows($query);
                    $temp="0";
                    $table_fname="";
					$t_batch=0;
                    if($exist>0)
                    {
                        while($row=  mysql_fetch_assoc($query))
                        {
                            $table_userid=$row['Student_Key'];
                            if($user_id==$table_userid)
                            {
                                $temp=1;
                                $table_fname=$row['First_Name'];
								$t_batch=$row['batch'];
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
							<!-- Image -->
						<section class="box alt">
							<div class="row no-collapse 50% uniform">
								<div class="4u"><span class="image fit"><a href="group_home.php"><img src="images/e-learn.jpg" alt="E-Learning" /></a></span></div>
								<div class="4u"><span class="image fit"><a href="../quiz/quiz_home.php"><img src="images/quiz.jpg" alt="Quiz" /></a></span></div>
								<div class="4u"><span class="image fit"><a href="../timetable/timetable_view.php"><img src="images/time-table.jpg" alt="attendance" /></a></span></div>
							
							</div>
							
							<div class="row no-collapse 50% uniform">
								<div class="4u"><span class="image fit"><a href="student_profile_view.php"><img src="images/my-profile.jpg" alt="My Profile" /></a></span></div>
								<div class="4u"><span class="image fit"><a href="student_edit_profile.php"><img src="images/edit-profile.jpg" alt="Edit Profile" /></a></span></div>
								<div class="4u"><span class="image fit"><a href="std_change_password.php"><img src="images/change-pwd.jpg" alt="Change Password" /></a></span></div>
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