<!DOCTYPE HTML>
<html>
	<head>
		<title>Student Profile</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
               <?php
                session_start();
				include_once "../assets/db/dbdcsa.php";
                    if($_SESSION['regno'])
                    {
                        
                    }
                    else
                    {
                        header("location:../index.html");
                    }        
                   
                    $user_id=$_SESSION['regno']; 
            $query=  mysql_query("select * from mas_students");
            $exist=  mysql_num_rows($query);
            $temp="0"; 
            $table_fname="";
            $table_lname="";
            $table_mobile="";
            $table_email="";
            $table_gender="";
            
            $table_role="";
            $table_pwd="";
            if($exist>0)
            {
                while($row=  mysql_fetch_assoc($query))
                {
                    
                    $table_userid=$row['Student_Key'];
                    $table_pwd=$row['Password'];
                    if(($user_id==$table_userid) )
                    {
                        $temp=1;
                        $table_fname=$row['First_Name'];
                        $table_lname=$row['Last_Name'];
                        $table_mobile=$row['Mobile'];
                        $table_email=$row['Email'];
                        $table_gender=$row['Gender'];
                       
                        
                        break;
                    }
                }
                if($temp==0)
                {
                    print '<script>alert("invalid profile")</script>';
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
								<section class="box">
                                    <div class="table-wrapper">
                                            <table class="alt">
                                                   
                                                    <tbody>
                                                            <tr>
                                                                    <td>User ID</td>
                                                                    <td><?php print "$table_userid"; ?></td>        
                                                            </tr>
                                                            <tr>
                                                                    <td>First Name</td>
                                                                    <td><?php print "$table_fname"; ?></td>        
                                                            </tr>
                                                            <tr>
                                                                    <td>Last Name</td>
                                                                    <td><?php print "$table_lname"; ?></td>        
                                                            </tr>
                                                            <tr>
                                                                    <td>Gender</td>
                                                                    <td><?php print "$table_gender"; ?></td>        
                                                            </tr>
                                                            <tr>
                                                                    <td>Mobile Number</td>
                                                                    <td><?php print "$table_mobile"; ?></td>        
                                                            </tr>
                                                            <tr>
                                                                    <td>Email ID</td>
                                                                    <td><?php print "$table_email"; ?></td>        
                                                            </tr>
                                                            
                                                            
                                                    </tbody>
                                                    
                                            </table>
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