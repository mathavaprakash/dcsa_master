 <!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
	<title>Staff Edit Page</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" type="image/png" href="dcsa/operator1/images/logo.png" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<!--[if lte IE 8]>
		<link rel="stylesheet" href="../assets/css/ie8.css" /><![endif]-->
                
                <!-- here start the validation codes-->
                
           
                <link rel="stylesheet" type="text/css" href="../stylesheets/jquery.validate.css" />
                <link rel="stylesheet" type="text/css" href="../stylesheets/style.css" />
       <?php
            
                    session_start();
 include_once "../assets/db/dbdcsa.php";
                    if($_SESSION['userid']){
                    }
                    else
                    {
                        header("location:index.php");
                    }
                    $userid=$_SESSION['userid']; 
                    $userid=  encryptor('decrypt',$_SESSION['userid']); 
                    $_SESSION['userid']=encryptor('encrypt',$userid); 

                    
                ?>
        
                
	</head>
	<body>
			<div id="page-wrapper">
			<div class="header-overlay">
			<!-- Header -->
				<header id="header" class="alt">
					<a href="../logout.php"><img src="../images/dcsa-logo.png" height="50" /></a>
					<nav id="nav">
						<ul>
							<li><a href="admin_home.php">Home</a></li>
							<li><a href="../gallery/load_oper.php">Gallery</a></li>
							
							<li><a href="../dataentry/dataentry_profile.php">Data Entry Operator Profile</a></li>



							
								
							<li>
								<a href="#" class="icon fa-angle-down">Attendance</a>
								<ul>
									<li><a href="../attendance/attendancehome.php">Add Attendance</a></li>
									<li><a href="../attendance/attendanceview.php">View Attendance</a></li>
								</ul>
							</li>
							<li>
								<a href="#" class="icon fa-angle-down">Time Table</a>
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
									<li><a href="course_details.php">Course Registration</a></li>
									<li><a href="batch.php">Batch Registration</a></li>
								</ul>
							</li>
							<li>
								<a href="#" class="icon fa-angle-down">Calendar</a>
								<ul>
								    <li><a href="calender.php">View Calendar</a></li>
								    <li><a href="cal_event_add.php">Create Events</a></li>
									<li><a href="view_events.php">view Events</a></li>
									

								</ul>
							</li>
							<li>
								<a href="#" class="icon fa-angle-down">Manage</a>
								<ul>
									<li><a href="edit2.php">Staff Profile</a></li>
									<li><a href="../dataentry1/report_stud.php">Student Profile</a></li>
									<li><a href="change_password.php">Change Password</a></li>
								</ul>
							</li>
							 <li><a href="logout.php" class="button">Log out</a></li>
						</ul>
					</nav>
				</header>
			<!-- Header -->
				

			<!-- Main -->
				<section id="main" class="container">
					<div class="row">
						<div class="12u">					<!-- Form -->
                            <section id="cta">
                                    <h2> STAFF EDIT PAGE </h2>
                                            <form method="post" action="edit2.php">
                                                    
							<div class="row uniform 50%">
								<div class="12u 12u(mobilep)">
									<input type="text" name="Staff_key" id="Staff_key" value="" placeholder="Staff_key" />
								</div>
</div>
                               
                                                   
                                                    <div class="row uniform 50%">
                                                              	<div class="12u 12u(mobilep)">	
                                                                    <input type="submit" value="Submit"/>
                                                                    <!--<a href="#" class="button special fit">View/Edit/Delete</a>	-->
			

              
                                                                				
                                                                    			
                                                                </div>
                                                  </div>
                                                		
                                                			
                                                               
                                                    
						</form>
					
				</section>
                                                </div>
                                        </div>
                                </section>
			<!-- Footer -->
				
    <?php
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
           

            

            $Staff_Key=mysql_real_escape_string($_POST['Staff_key']);
            
            
            mysql_connect("localhost", "root", "") or die(mysql_error());
            mysql_select_db("dcsa") or die("cannot connect database");
            $query=  mysql_query("select * from mas_staff");
            $exist=  mysql_num_rows($query);
            $table_Staff_Key="";
           
            
            
            //$table_isactive="";
            $tem="0";
            if($exist>0)
            {
                while($row=  mysql_fetch_assoc($query))
                {
                    $table_Staff_Key=$row['Staff_Key'];
                    
                   
                    //$table_isactive=$row['IsActive'];
                    if($Staff_Key==$table_Staff_Key) 
                    {
                        
                        $_SESSION['userid']=$table_Staff_Key;
                           print '<script>window.location.assign("staff_view.php");</script>';
                           
                        }
                       else
                    {
							echo "Invalid data";
                            //print '<script>alert("Student Key not exist in Database.")</script>';
                            //print '<script>window.location.assign("student_edit.php");</script>';
                    }
                    }
                  
                    
                }
               
            }
     

                   
                   
                   
        ?>
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