<html>
<head>
<title>Student registration</title>
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
</script>
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
			<!-- Header -->
               
                        <div class="header-overlay">
			<!-- Header -->
				<header id="header" class="alt">
					<a href="logout.php"><img src="../images/dcsa-logo.png" height="50" /></a>
					<nav id="nav">
						<ul>
							<li><a href="admin_home.php">Home</a></li>
							<li><a href="../gallery/load_oper.php">Gallery</a></li>
							<li><a href="change_password.php">Change Password</a></li>
							<li><a href="../dataentry/dataentry_profile.php">Data Entry Operator Profile</a></li>



							
								
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
									<li><a href="course_details.php">Course Registration</a></li>
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

               

			<!-- Main -->
		<section id="main" class="container">
         <div class="row">
		 <div class="12u">					<!-- Form -->
         <section id="cta">
         <h2>Student Registration Form </h2>
         <h3>Select the batch</h3>




 
<form name='newdemo.php' method='POST' action="#">
                                    <div class="row uniform 50%">
                                   <div class="12u 12u(mobilep)">
<select id="batch" name="batch"> 
<?php
mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("dcsa") or die("Cannot connect to database");
$query="select * from batch";
$res=mysql_query($query);
while ($row=mysql_fetch_array($res))
{?>
    <option value="<?php echo $row['batch_id'];?>"><?php echo $row['class']; ?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="row uniform 50%">
<div class="12u 12u(mobilep)">
<input type='submit' name='btnadd1' id="fbut" value='submit'>             
</div>
</div>

</form>
</section>
</div>
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
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{       
  $batch_id=mysql_real_escape_string($_POST['batch']);
   include_once "../assets/db/dbdcsa.php";
   $batch=encryptor('encrypt',$batch_id);
   print '<script>window.location.assign("stdnt_entry.php?batch='.$batch.'");</script>';
}
?>
</html>