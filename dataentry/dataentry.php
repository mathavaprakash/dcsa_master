<!DOCTYPE HTML>
<html>
	<head>
		<title>Admin Home</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<link rel="icon" type="image/png" href="../images/logo.png" />
                <?php            
                    session_start();
					include_once "../assets/db/dbdcsa.php";
             
                    if($_SESSION['userid']){
                    }
                    else
                    {
                        header("location:../index.php");
                    }
					
                    
                ?>
	</head>
	<body  class="landing">
		<div id="page-wrapper">
			<div class="header-overlay">
			<!-- Header -->
				<header id="header" class="alt">
					<a href="logout.php"><img src="../images/dcsa-logo.png" height="50" /></a>
					<nav id="nav">
						<ul>
							<li><a href="admin_home.php">Home</a></li>
							<li><a href="../gallery/load_oper.php">Gallery</a></li>
							<li><a href="change_password.php">Change Password</a></li>
							


							
								
							<li>
								<a href="#" class="icon fa-angle-down">Attendance</a>
								<ul>
									<li><a href="../attendance/attendancehome.php">Add Attendance</a></li>
									<li><a href="../attendance/attendanceview.php">View Attendance</a></li>
								</ul>
							</li>
							<li>
								<a href="#" class="icon fa-angle-down">DataEntry</a>
								<ul>
									<li><a href="student_registration.php">Student Registration</a></li>
									<li><a href="staff_registration.php">Staff Registration</a></li>
									<li><a href="course_registration.php">Course Registration</a></li>
									<li><a href="batch.php">Batch Registration</a></li>
								</ul>
							</li>
							<li>
								<a href="#" class="icon fa-angle-down">Calendar</a>
								<ul>
								    <li><a href="calender.php">View Calendar</a></li>
								    <li><a href="cal_event_add.php">Create Events</a></li>
									

								</ul>
							</li>
							
							








                            <li><a href="logout.php" class="button">Log out</a></li>
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
								<div class="4u"><span class="image fit"><a href="group_home_staff.php">
									<img src="../users/images/e-learn.jpg" alt="E-Learning" /></a></span></div>
								<div class="4u"><span class="image fit"><a href="mad_create_assign.php">
									<img src="../users/images/give-assign.jpg" alt="Create Assignment" /></a></span></div>
								<div class="4u"><span class="image fit"><a href="notes_create.php">
									<img src="../users/images/give-notes.jpg" alt="Create Notes" /></a></span></div>
							</div>
							<div class="row no-collapse 50% uniform">
								<div class="4u"><span class="image fit"><a href="../quiz/quiz_home_staff.php">
									<img src="../users/images/quiz.jpg" alt="Quiz" /></a></span></div>
								<div class="4u"><span class="image fit"><a href="../quiz/create_test.php">
									<img src="../users/images/create-quiz.jpg" alt="New Quiz" /></a></span></div>
								<div class="4u"><span class="image fit"><a href="report_guru.php">
									<img src="../users/images/my-students.jpg" alt="My Gurukula Students" /></a></span></div>
							</div>
							<div class="row no-collapse 50% uniform">
								<div class="4u"><span class="image fit"><a href="staff_profile_view.php">
									<img src="../users/images/my-profile.jpg" alt="My Profile" /></a></span></div>
								<div class="4u"><span class="image fit"><a href="edit_profile.php">
									<img src="../users/images/edit-profile.jpg" alt="Edit Profile" /></a></span></div>
								<div class="4u"><span class="image fit"><a href="change_password.php">
									<img src="../users/images/change-pwd.jpg" alt="Change Password" /></a></span></div>
							</div>
							
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
							<script type="text/javascript" src="http://widget.supercounters.com/hit.js"></script>
							<script type="text/javascript">sc_hit(1214356,147,5);	</script>
							<br>
							<noscript><a href="http://www.supercounters.com">Page visits counter</a></noscript>
						</li>
					</ul>
				</footer>
		</div>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/jquery.scrollgress.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]>
		<script src="../users/assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>

	</body>
        


</html>