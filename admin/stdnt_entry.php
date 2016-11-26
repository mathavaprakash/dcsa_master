<html>
<head>
<title>Student Entry Page</title>
<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<script type="text/javascript" src="../assets/js/script.js" ></script>

		<!--[if lte IE 8]><script src="../assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../assets/css/main.css" />
		<link rel="stylesheet" type="text/css" href="../stylesheets/jquery.validate.css" />
                <link rel="stylesheet" type="text/css" href="../stylesheets/style.css" />
<link rel="icon" type="image/png" href="../images/logo.png" />

		<!--[if lte IE 8]><link rel="stylesheet" href="../assets/css/ie8.css" /><![endif]-->

                <script src="../lib/jquery/jquery-1.3.2.js" type="text/javascript">
                </script>
                <script src="../javascripts/jquery.validate.js" type="text/javascript">
                </script>
                <script src="../javascripts/jquery.validation.functions.js" type="text/javascript"></script>

                <script type="text/javascript">
            /* <![CDATA[ */
            jQuery(function(){
            
                jQuery("#fname").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter firstname"
                });
				jQuery("#lname").validate({
					expression:"if(VAL) return true; else return false;",
					message: "please enter lastname"
				});
				jQuery("#sno").validate({
                    expression: "if (VAL.length == 8 && VAL) return true; else return false;",
                    message: "Please enter a valid StudentNumber"
                });
				
			});
</script>
<?php
            
                    session_start();
 include_once "../assets/db/dbdcsa.php";
                    if($_SESSION['userid']){
                    }
                    else
                    {
                        header("location:../index.php");
                    }
                    $userid=$_SESSION['userid']; 
                    $userid=  encryptor('decrypt',$_SESSION['userid']); 
                    $_SESSION['userid']=encryptor('encrypt',$userid); 

                    
                ?>

</head>
  <?php
if($_SERVER["REQUEST_METHOD"]=="GET")
{       
  $batch=mysql_real_escape_string($_GET['batch']);
  include_once "../assets/db/dbdcsa.php";
  $batch_id=encryptor('decrypt',$batch);          
	?>
<body>
<div id="page-wrapper">
			<!-- Header -->
               
                        <div class="header-overlay">
			<!-- Header -->
				<header id="header" class="alt">
					<a href="logout.php"><img src="../images/dcsa-logo.png" height="50" /></a>
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
									<li><a href="course_registration.php">Course Registration</a></li>
									<li><a href="batch.php">Batch Registration</a></li>
								</ul>
							</li>
							<li>
								<a href="#" class="icon fa-angle-down">Calendar</a>
								<ul>
								    <li><a href="calender.php">View Calendar</a></li>
								    <li><a href="cal_event_add.php">Create Events</a></li>
									<li><a href="view_events.php">View Events</a></li>
									

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
			</div>
			<!-- Main -->
		<section id="main" class="container">
         <div class="row">
		 <div class="12u">					<!-- Form -->
         <section id="cta">
         <h2> STUDENT DETAILS </h2>
                                   <form name='stdnt_entry.php' method='post' >
                                   <div class="row uniform 50%">
   <div class="12u 12u(mobilep)">
  <input type="text" id="year" name="batch" value="<?php echo $batch_id; ?>" readonly=""/><br>
  </div></div>
  <div class="row uniform 50%">
   <div class="12u 12u(mobilep)">
   <input type="text" id="sno" name="Student_Key" placeholder="Student_Key" value="<?php echo "$batch_id"; ?>"><br>
   </div></div>
   
                                    <div class="row uniform 50%">
                                    <div class="12u 12u(mobilep)">
		<input type="text" name="First_Name" id="fname" placeholder="FirstName" />
</div>
</div>
<div class="row uniform 50%">
<div class="12u 12u(mobilep)">
   <input type="text" id="lname" name="Last_Name" placeholder="LastName"><br>
   </div></div>
   
  <div class="row uniform 50%">
  <div class="12u 12u(mobilep)">
<center><input type="submit" value="ADD" name='login'/></center>
</div></div>
</form>
</section>
</div>
</div>
</section>
<?php
}
if(isset($_POST['login']))
{
$First_Name=mysql_real_escape_string($_POST['First_Name']);
$Last_Name=mysql_real_escape_string($_POST['Last_Name']);
$batch=mysql_real_escape_string($_POST['batch']);
$Student_Key=mysql_real_escape_string($_POST['Student_Key']);
include_once "../assets/db/dbdcsa.php";
//mysql_connect("localhost","root","")or die(mysql_error());
//mysql_select_db("dcsa")or die("cannot select db");
$query=mysql_query("select * from mas_students");
$exist=  mysql_num_rows($query);
$std_ky="";
$std_key="";
$rest = substr("$Student_Key", 0, -3);  // returns "abcde"
//print_r($arr2);

if($exist>0)
{
                while($row=  mysql_fetch_assoc($query))
                {
					$std_ky=$row['Student_Key'];
					
					if($batch!=$rest)
					{
                           print '<script>alert("Enter the valid Student Number")</script>'; 
                           $batch1=encryptor('encrypt',$batch);
                           print '<script>window.location.assign("stdnt_entry.php?batch='.$batch1.'");</script>';

                           //print '<script>window.location.assign("demo.php");</script>';
                           break;
                     }

               

					if($Student_Key==$std_ky)
					{
                           print '<script>alert("Student no already exist in the database")</script>'; 
                           $batch1=encryptor('encrypt',$batch);
                           print '<script>window.location.assign("stdnt_entry.php?batch='.$batch1.'");</script>';

                           //print '<script>window.location.assign("demo.php");</script>';
                           break;
                     }
                      
                }

mysql_query("INSERT INTO mas_students(First_Name,Last_Name,batch,Student_Key)VALUES('$First_Name','$Last_Name','$batch','$Student_Key')");
//echo "new uesr added";
print '<script>alert(" Student Registered Successfully")</script>';
$batch1=encryptor('encrypt',$batch);
print '<script>window.location.assign("stdnt_entry.php?batch='.$batch1.'");</script>';
}
}

?>
<!-- Footer -->
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
