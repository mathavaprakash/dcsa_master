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
                        header("location:index.php");
                    }
                    $userid=$_SESSION['userid']; 
                    $userid=  encryptor('decrypt',$_SESSION['userid']); 
                    $_SESSION['userid']=encryptor('encrypt',$userid); 

                    
                ?>

</head>
  <?php
if($_SERVER["REQUEST_METHOD"]=="GET")
{       
  $Staff_Key=mysql_real_escape_string($_GET['Staff_Key']);
  include_once "../assets/db/dbdcsa.php";
  $batch_id=encryptor('decrypt',$Staff_Key);          
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
         <h2> COURSE DETAILS </h2>
                                   <form name='stdnt_entry.php' method='post' >
                                   <div class="row uniform 50%">
   <div class="12u 12u(mobilep)">
  <input type="text" id="year" name="Staff_Key" value="<?php echo $batch_id; ?>" readonly=""/><br>
  </div></div>
   <div class="row uniform 50%">
  <div class="12u 12u(mobilep)">
<select id="Batch" name="Batch"> 
<?php
include_once "../assets/db/dbdcsa.php";

/*mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("dcsa") or die("Cannot connect to database");*/
$query="select * from batch";
$res=mysql_query($query);
while ($row=mysql_fetch_array($res))
{?>
    <option value="<?php echo $row['batch_id'];?>"><?php echo $row['batch_id']; ?></option>
<?php
}
?>
</select>
</div>
</div><br>
<div class="row uniform 50%">
<div class="12u 12u(mobilep)">
<input type="text" name="Group_Id" id="gid" placeholder="Subject ID" /><br>
</div>
</div>
<div class="row uniform 50%">
<div class="12u 12u(mobilep)">
<input type="text" id="Subject" name="Subject" placeholder="Subject Name"><br>
</div></div>
<div class="row uniform 50%">
<div class="12u 12u(mobilep)">
<input type="text" id="SSubject" name="short_sub" placeholder="Short Name of the subject"><br>
</div></div>
<div class="row uniform 50%">
<div class="12u 12u(mobilep)">
<input type="text" id="semester" name="semester" placeholder="Semester"><br>
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
$Staff_Key=mysql_real_escape_string($_POST['Staff_Key']);
$Group_Id=mysql_real_escape_string($_POST['Group_Id']);
$Subject=mysql_real_escape_string($_POST['Subject']);
$Batch=mysql_real_escape_string($_POST['Batch']);
$semester=mysql_real_escape_string($_POST['semester']);
$short_sub=mysql_real_escape_string($_POST['short_sub']);
include_once "../assets/db/dbdcsa.php";
//mysql_connect("localhost","root","")or die(mysql_error());
//mysql_select_db("dcsa")or die("cannot select db");
$query=mysql_query("select * from study_group");
$exist=  mysql_num_rows($query);
$bat_ky="";
$sub_ky="";
if($exist>0)
{
               
					 while($row=  mysql_fetch_assoc($query))
                {
					$bat_ky=$row['Batch'];
					$sub_ky=$row['Subject'];

					if($Batch==$bat_ky and $Subject==$sub_ky)
					{
                           print '<script>alert("Subject already exists in the database")</script>'; 
                           $batch1=encryptor('encrypt',$Staff_Key);
                           print '<script>window.location.assign("course_entry.php?Staff_Key='.$batch1.'");</script>';

                           //print '<script>window.location.assign("demo.php");</script>';
                           break;
                     }
                      
                }

mysql_query("INSERT INTO study_group(Staff_Key,Group_Id,Subject,Batch,semester,short_sub)VALUES('$Staff_Key','$Group_Id','$Subject','$Batch','$semester','$short_sub')");

//echo "new uesr added";
print '<script>alert(" Course Assigned Successfully")</script>';
$batch1=encryptor('encrypt',$Staff_Key);
print '<script>window.location.assign("course_entry.php?Staff_Key='.$batch1.'");</script>';
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
