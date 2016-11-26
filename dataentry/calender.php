<!DOCTYPE HTML>
<?php
mysql_connect("localhost", "root", "") or die (mysql_error());
//echo "Connected to Mysql<br/><hr/>";
mysql_select_db("dcsa") or die (mysql_error());
//echo"Connected to Database<br/><hr>";
?>

<html>
	<head>
		<title>Event Calendar</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" type="text/css" href="tcal.css" />
	<script type="text/javascript" src="tcal.js"></script> 
<meta charset="utf-8" />
<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" type="image/png" href="../images/logo.png" />
		<link rel="stylesheet" href="../assets/css/main.css" />
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

		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<script type="text/javascript" src="assets/js/script.js" ></script>

		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" type="text/css" href="stylesheets/jquery.validate.css" />
                <link rel="stylesheet" type="text/css" href="stylesheets/style.css" />


                
                
                <script src="javascripts/jquery.validate.js" type="text/javascript">
                </script>
                <script src="javascripts/jquery.validation.functions.js" type="text/javascript"></script>
<!--<script>
window.onload=function(){
document.getElementById("button").style.display='none';
document.getElementById("button1").style.display='none';

}
function showButton(){
  document.getElementById("button").style.display='block';
  document.getElementById("button1").style.display='block';

}

</script>-->

              
<script>
function goLastMonth(month, year){
if(month == 1) {
--year;month = 13;
}
--month
var monthstring= ""+month+"";
var monthlength = monthstring.length;
if(monthlength <=1){
monthstring = "0" + monthstring;
}
document.location.href ="<?php $_SERVER['PHP_SELF'];?>?month="+monthstring+"&year="+year;
}
function goNextMonth(month, year){
if(month == 12) {
++year;
month = 0;
}
++month
var monthstring= ""+month+"";
var monthlength = monthstring.length;
if(monthlength <=1){
monthstring = "0" + monthstring;
}
document.location.href ="<?php $_SERVER['PHP_SELF'];?>?month="+monthstring+"&year="+year;
}
</script>
<style>
.today{
background-color:yellow;
}
.event{
background-color:lime;
}
</style>		
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

			<!-- Main -->
		


			<!-- Banner -->
			

			<!-- Main -->
<?php
if (isset($_GET['day'])){
$day = $_GET['day'];
} else {
$day = date("j");
}
if(isset($_GET['month'])){
$month = $_GET['month'];
} else {
$month = date("n");
}
if(isset($_GET['year'])){
$year = $_GET['year'];
}else{
$year = date("Y");
}
$currentTimeStamp = strtotime( "$day-$month-$year");
$monthName = date("F", $currentTimeStamp);
$numDays = date("t", $currentTimeStamp);
$counter = 0;
?><!--
<br>
<br>
<input type="button" id="userText" value="operations" onclick="showButton()"/><br><br>

<input type="button" id="button" value="Addevent" /><br>
<input type="button" id="button1" value="edit Event" /><br>-->



                        <section id="main" class="container">
        <div class="row">
            <div class="8u">					
                    <div class="table-wrapper">
                        <table class="alt" border='5'>
                                                    <tr>
                                <td rowspan="12"><input style='width:50px;' type='button' value='<<'name='previousbutton' onclick ="goLastMonth(<?php echo $month.",".$year?>)"></td>
                                <td colspan='7' align="center"><?php echo $monthName.", ".$year; ?></td>
                                <td rowspan="12"><input style='width:50px;' type='button' value='>>'name='nextbutton' onclick ="goNextMonth(<?php echo $month.",".$year?>)"></td>
                            </tr>
                            <tr></tr><tr>

                                <td width='100px'>Sun</td>
                                <td width='100px'>Mon</td>
                                <td width='100px'>Tue</td>
                                <td width='100px'>Wed</td>
                                <td width='100px'>Thu</td>
                                <td width='100px'>Fri</td>
                                <td width='100px'>Sat</td>
                            </tr>
<?php
echo "<tr>";
for($i = 1; $i < $numDays+1; $i++, $counter++){
$timeStamp = strtotime("$year-$month-$i");
if($i == 1) {
$firstDay = date("w", $timeStamp);
for($j = 0; $j < $firstDay; $j++, $counter++) {
echo "<td>&nbsp;</td>";
}
}
if($counter % 7 == 0) {
echo"</tr><tr>";
}
$monthstring = $month;
$monthlength = strlen($monthstring);
$daystring = $i;
$daylength = strlen($daystring);
if($monthlength <= 1){
$monthstring = "0".$monthstring;
}
if($daylength <=1){
$daystring = "0".$daystring;
}
$todaysDate = date("d/m/Y");
$dateToCompare = $daystring. '/' . $monthstring. '/' . $year;
echo "<td align='center' ";
if ($todaysDate == $dateToCompare){
echo "class ='today'";
} else{
$sqlCount = "select * from eventcalendar where eventDate='".$dateToCompare."'";
$noOfEvent = mysql_num_rows(mysql_query($sqlCount));
if($noOfEvent >= 1){
echo "class='event'";
}
}
echo "><a href='".$_SERVER['PHP_SELF']."?month=".$daystring."&day=".$monthstring."&year=".$year."&v=true'>".$i."</a></td>";
}

?>
<div style="flex:1;padding-right:5px;">
<?php
$sqlEvent = "select * FROM eventcalendar where eventDate='".$day."/".$month."/".$year."'";
$resultEvents = mysql_query($sqlEvent);
echo "<hr>";
while ($events = mysql_fetch_array($resultEvents)){
echo "<br/><center> <font size=4>";
echo"EVENTS";
echo "<br/>";
echo "Title: ".$events['Title']."<br>";
echo "Detail: ".$events['Detail']."<br> </font></center> ";
}

?></div>

</table>
</div>
                               
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
</html>