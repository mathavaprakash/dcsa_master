<html>
	<head>
		<title>Department of Computer Science & Applications</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<link rel="icon" type="image/png" href="../images/logo.png" />
		<link rel="icon" type="image/png" href="../images/logo.png" />

		<!--[if lte IE 8]><script src="../assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../assets/css/main.css" />
		<link rel="stylesheet" type="text/css" href="../stylesheets/jquery.validate.css" />
                <link rel="stylesheet" type="text/css" href="../stylesheets/style.css" />

		<!--[if lte IE 8]><link rel="stylesheet" href="../assets/css/ie8.css" /><![endif]-->

                <script src="../lib/jquery/jquery-1.3.2.js" type="text/javascript">
                </script>
                <script src="../javascripts/jquery.validate.js" type="text/javascript">
                </script>
                <script src="../javascripts/jquery.validation.functions.js" type="text/javascript"></script>

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
                    

                    
                    $user_id=  encryptor('decrypt',$_SESSION['userid']);
					$_SESSION['user_id']=$user_id;
                    $_SESSION['userid']=encryptor('encrypt',$user_id); 
                    //$_SESSION['regno']=$user_id;
                    //$encrp=$_SESSION['encr'];  
                    //$group_id=encryptor('decrypt',$_GET['gid']);
					//$_SESSION['group_id']=$grid;
                   
                ?>
				<script type="text/javascript">
            /* <![CDATA[ */
            jQuery(function(){
                
				jQuery("#txtbox1").validate({
					expression:"if(VAL) return true; else return false;",
					message: "please enter Class"
				});
				jQuery("#txtbox2").validate({
					expression:"if(VAL) return true; else return false;",
					message: "please enter Batch"
				});
		});
</script>
	</head>
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
         <h2> BATCH DETAILS </h2>
                                   <form name='new_class.php' method='post' >
                                   
<div class="row uniform 50%">
<div class="12u 12u(mobilep)">

   <input type="text"  name="class" id="txtbox1" placeholder="course">
   </div></div>
 <div class="row uniform 50%">
   <div class="12u 12u(mobilep)">
   <input type="text"  name="batch_id" id="txtbox2" placeholder="Batch">
   </div></div>
  
  <div class="row uniform 50%">
  <div class="12u 12u(mobilep)">
<input type="submit" name="btn3" id="pbut" value="Add the class"/>

</div></div>
</form>
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

			<?php
if(isset ($_POST['btn3']))
        {
        $error='false';
//session_start();
$class=mysql_real_escape_string($_POST['class']);
$batch_id=mysql_real_escape_string($_POST['batch_id']);

if($error='false')
{
mysql_connect("localhost","root","")or die(mysql_error());
mysql_select_db("dcsa")or die("cannot select db");
$query=mysql_query("select * from batch");
mysql_query("INSERT INTO batch(class,batch_id)VALUES('$class','$batch_id')");
print '<script>alert("New Class Added Successfully")</script>';
print '<script>window.location.assign("batch.php");</script>';

}
}
?>