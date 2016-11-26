<!DOCTYPE HTML>
<?php
mysql_connect("localhost", "root", "") or die (mysql_error());
//echo "Connected to Mysql<br/><hr/>";
mysql_select_db("calendario") or die (mysql_error());
//echo"Connected to Database<br/><hr>";
?>

<html>
	<head>
		<title>Department of Computer Science & Applications</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" type="image/png" href="images/logo.png" />
		<link rel="stylesheet" href="assets/css/main.css" />

                
                
                <script src="javascripts/jquery.validate.js" type="text/javascript">
                </script>
                <script src="javascripts/jquery.validation.functions.js" type="text/javascript"></script>
                
<script>
function goLastMonth(month, year){
if(month == 1) {
--year;
month = 13;
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
background-color: #00ff00;
}
.event{
background-color: #FF8080;
}
</style>		
	</head>
        
	<body class="landing special">
		<div id="page-wrapper">
			<div class="header-overlay">
			<!-- Header -->
				<header id="header" class="alt">
					<a href="index.html"><img src="images/dcsa-logo.png" height="50" /></a>
					<nav id="nav">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li>
								<a href="#" class="icon fa-angle-down">Department</a>
								<ul>
									<!--<li><a href="generic.html">Staff</a></li>-->
									<li>
										<a href="#" class="icon fa-angle-right">Programmes</a>
										<ul>
											<li><a href="#">MCA</a></li>
											<li><a href="#">M.Sc (IT)</a></li>
											<li><a href="#">M.Phil</a></li>
										</ul>
									</li>
									<li>
										<a href="#" class="icon fa-angle-right">Syllabus</a>
										<ul>
											<li><a href="assets/docs/mca.pdf" target="_blank">MCA (2011 Onwards)</a></li>
											<li><a href="assets/docs/mca-15.pdf" target="_blank">MCA (2015 Onwards)</a></li>
											<li><a href="assets/docs/msc-it.pdf" target="_blank">M.Sc (IT)</a></li>
											<li><a href="assets/docs/m.phil(cs).pdf" target="_blank">M.Phil</a></li>
										</ul>
									</li>
									<li><a href="faculty.php">Faculty</a></li>	
									<li><a href="timetable_view.php">Time Table</a></li>	
									<li><a href="calender.php">Calender</a></li>									
								</ul>
							</li>
							<li><a href="gallery/gallery.php">Gallery</a></li>
							<li><a href="#">E-Content</a></li>
							<li><a href="contact.php">Contact Us</a></li>
							<li><a href="login.php" class="button">Sign In</a></li>
						</ul>
					</nav>
				</header>
			</div>
			<!-- Banner -->
				<section id="banner-empty">
				
				</section>
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
?>

    <section id="main" class="container">
        <div class="row">
            <div class="12u">	
				<section class="box special">
                    <div class="table-wrapper">
                        <table class="alt" border='5'  >
                                                    <tr>
                                <td rowspan="12"><input style='width:50px;' type='button' value='<<'name='previousbutton' onclick ="goLastMonth(<?php echo $month.",".$year?>)"></td>
                                <td colspan='7' align="center"><?php echo $monthName.", ".$year; ?></td>
                                <td rowspan="12"><input style='width:50px;' type='button' value='>>'name='nextbutton' onclick ="goNextMonth(<?php echo $month.",".$year?>)"></td>
                            </tr>
                            <tr></tr><tr>

                                <td width='80px'>Sun</td>
                                <td width='80px'>Mon</td>
                                <td width='80px'>Tue</td>
                                <td width='80px'>Wed</td>
                                <td width='80px'>Thu</td>
                                <td width='80px'>Fri</td>
                                <td width='80px'>Sat</td>
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
$todaysDate = date("m/d/Y");
$dateToCompare = $monthstring. '/' . $daystring. '/' . $year;
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
echo "><a href='".$_SERVER['PHP_SELF']."?month=".$monthstring."&day=".$daystring."&year=".$year."&v=true'>".$i."</a></td>";
}
$sqlEvent = "select * FROM eventcalendar where eventDate='".$month."/".$day."/".$year."'";
$resultEvents = mysql_query($sqlEvent);
echo "<hr>";
while ($events = mysql_fetch_array($resultEvents)){
echo "<br/><center> <font size=4>";
echo"EVENTS";
echo "<br/>";
echo "Title: ".$events['Title']."<br>";
echo "Detail: ".$events['Detail']."<br> </font></center> ";
}

?>
<?php
?>
</table>
</div>
                            </section>   
                        </div>
                    </div>
                     
                </section>
               

				
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
                        </section>
		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>