<html>
<head>
    <title>Calender Event</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<script type="text/javascript" src="../assets/js/script.js" ></script>
<link rel="stylesheet" href="../assets/css/main.css" />
<link rel="stylesheet" type="text/css" href="stylesheets/jquery.validate.css" />
<link rel="stylesheet" type="text/css" href="../stylesheets/style.css" />
<script src="../lib/jquery/jquery-1.3.2.js" type="text/javascript"> </script>
<script src="javascripts/jquery.validate.js" type="text/javascript"> </script>
<script src="javascripts/jquery.validation.functions.js" type="text/javascript"></script>
<link rel="icon" type="image/png" href="../images/logo.png" />

<script src="js/jquery.min.js"></script>
<script>
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

$(document).ready(function(){
    $("#txtdate").hide();
    $("#pbut").hide();
    $("#fbut").hide();
    $("#but1").click(function(){
        $("#but1").hide();
        $("#but2").show();
        $("#txtdate").show();
        $("#pbut").show();
        $("#txtdate1").hide();
        $("#fbut").hide();
    });
    $("#txtdate1").hide();
    $("#but2").click(function(){
        $("#but2").hide();
        $("#but1").show();
        $("#txtdate").hide();
        $("#txtdate1").show();
        $("#pbut").hide();
        $("#fbut").show();
    });
});
</script>


    <link href="pcal.css" rel="Stylesheet"
        type="text/css" />
    <script type="text/javascript" src="pacal.js"></script>
    <script type="text/javascript" src="ppcal.js"></script>
    <script language="javascript">
        $(document).ready(function () {
            $("#txtdate").datepicker({
                minDate: 0
            });
        });</script>
        <script language="javascript">
        $(document).ready(function () {
            $("#txtdate1").datepicker({
                maxDate: 0
            });
        });
</script>
<script language="javascript" type="text/javascript">
jQuery(function(){
                	jQuery("#title").validate({
					expression:"if(VAL) return true; else return false;",
					message: "please enter the event title"
				});
				jQuery("#detail").validate({
					expression:"if(VAL) return true; else return false;",
					message: "please enter the event detail"
				});
				
			});

    </script>
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
			<!-- Main -->
		<section id="main" class="container">
         <div class="row">
		 <div class="12u">					<!-- Form -->
         <section id="cta">
         <h2> ADD EVENTS </h2>
         <form name='test1.php' method='POST' action="">
          <div class="row uniform 50%">
           <div class="12u 12u(mobilep)">
<input type="button" id="but1" value="Add Future Events">
</div>
</div>
<div class="row uniform 50%">
<div class="12u 12u(mobilep)">
<input type="button" id="but2" value="Add Past Events">
</div>
</div>
<div class="row uniform 50%">
<div class="12u 12u(mobilep)">
<input type="text" name="Title" id="title" placeholder="Title of the event" required/>
</div>
</div>
<div class="row uniform 50%">
   <div class="12u 12u(mobilep)">
<input type="text" name="Detail" id="detail" placeholder="Detail of the event" required/>
</div>
</div>

<div class="row uniform 50%">
<div class="12u 12u(mobilep)">

<input type="text" name="eventDate1"  id="txtdate" placeholder="select the future date">
</div>
</div>
<div class="row uniform 50%">
<div class="12u 12u(mobilep)">

<input type="text" name="eventDate"  id="txtdate1" placeholder="select past the date">
</div>
</div>
<div class="row uniform 50%">
<div class="12u 12u(mobilep)">
<input type='submit' name='btnadd' id="pbut" value='Future Events'>             
</div>
</div>
<div class="row uniform 50%">
   <div class="12u 12u(mobilep)">
<input type='submit' name='btnadd1' id="fbut" value='Past Events'>             
</div>
</div>

<!--<div class="row uniform">
   <div class="6u 12u(mobilep)">
<input type='submit' name='btnadd' value='Add Event'>             
</div>
</div>-->
</form>
</section>
</div>
<a href="calender.php"> click here to go back to calendar <br/><br/></a>

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



<?php
if(isset ($_POST['btnadd']))
        {
        $error='false';
//session_start();
$Title=mysql_real_escape_string($_POST['Title']);
$Detail=mysql_real_escape_string($_POST['Detail']);
$eventDate=mysql_real_escape_string($_POST['eventDate1']);
$OrderYear="";
if($error='false')
{
include_once "../assets/db/dbdcsa.php";

/*mysql_connect("localhost","root","")or die(mysql_error());
mysql_select_db("dcsa")or die("cannot select db");*/
$query=mysql_query("select * from eventcalendar");
mysql_query("SELECT EXTRACT(YEAR FROM eventDate) AS OrderYear,FROM eventcalender WHERE Id=1");
echo "$OrderYear";
mysql_query("INSERT INTO eventcalendar(Title,Detail,eventDate)VALUES('$Title','$Detail','$eventDate')");
print '<script>alert("Future Events Added Successfully")</script>';
}
}
?>
<?php
if(isset ($_POST['btnadd1']))
{
$error='false';
//session_start();
$Title=mysql_real_escape_string($_POST['Title']);
$Detail=mysql_real_escape_string($_POST['Detail']);
$eventDate=mysql_real_escape_string($_POST['eventDate']);
if($error='false')
{
include_once "../assets/db/dbdcsa.php";
/*mysql_connect("localhost","root","")or die(mysql_error());
mysql_select_db("dcsa")or die("cannot select db");*/
$query=mysql_query("select * from eventcalendar");
mysql_query("INSERT INTO eventcalendar(Title,Detail,eventDate)VALUES('$Title','$Detail','$eventDate')");
print '<script>alert("Past Events Added Successfully")</script>';}
}
?>
        
</body>
</html>
