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
					
                    $user_id=  encryptor('decrypt', $_SESSION['encregno']);   
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
									<li><a href="edit_profile.php">Edit Profile</a></li>
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
							<!-- Image -->
						<section class="box alt">
							<div class="row no-collapse 50% uniform">
								<div class="4u"><span class="image fit"><a href="group_home_staff.php"><img src="images/e-learn.jpg" alt="E-Learning" /></a></span></div>
								<div class="4u"><span class="image fit"><a href="mad_create_assign.php"><img src="images/give-assign.jpg" alt="Create Assignment" /></a></span></div>
								<div class="4u"><span class="image fit"><a href="notes_create.php"><img src="images/give-notes.jpg" alt="Create Notes" /></a></span></div>
							</div>
							<div class="row no-collapse 50% uniform">
								<div class="4u"><span class="image fit"><a href="../quiz/quiz_home_staff.php"><img src="images/quiz.jpg" alt="Quiz" /></a></span></div>
								<div class="4u"><span class="image fit"><a href="../quiz/create_test.php"><img src="images/create-quiz.jpg" alt="New Quiz" /></a></span></div>
								<div class="4u"><span class="image fit"><a href="report_guru.php"><img src="images/my-students.jpg" alt="My Gurukula Students" /></a></span></div>
							</div>
							<div class="row no-collapse 50% uniform">
								<div class="4u"><span class="image fit"><a href="staff_profile_view.php"><img src="images/my-profile.jpg" alt="My Profile" /></a></span></div>
								<div class="4u"><span class="image fit"><a href="edit_profile.php"><img src="images/edit-profile.jpg" alt="Edit Profile" /></a></span></div>
								<div class="4u"><span class="image fit"><a href="change_password.php"><img src="images/change-pwd.jpg" alt="Change Password" /></a></span></div>
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
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>

	</body>
        


</html>