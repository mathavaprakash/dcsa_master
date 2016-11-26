<!DOCTYPE HTML>
<html>
<head>
<title>Attendance</title>
        <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
        <script src="../DCSA-master/attendance.js"></script>        
</head>
<div id="page-wrapper">
			<!-- Header -->
				<header id="header">
					<h1><a href="index.html">Home</a></h1>
					<nav id="nav">
				    <ul><li><a href="logout.php" class="button">Log out</a></li></ul>
					</nav>
				</header>
			<!-- Main -->
				<section id="main" class="container 75%">
				
					<header><h2>Student Attendance </h2></header>

<?php 
    session_start();
	$stafid=$_SESSION['stafid'];
    $batch=$_SESSION['batch'];
	$subject=$_SESSION['subject'];
	$sem=$_SESSION['sem'];
	echo '<form align="right" method="get"><ul type="circle"> <a href="attendanceview.php?stafid='.$stafid.'">total view</a></ul></form>';
?>
   
  <div class="row">
		<div class="12u">
			<section id="cta">
<div align="center" class="big">
<form action="attendancetake.php" method="post">
<div class="row uniform 50%">
<div class="12u 12u(mobilep)">
<input type="date" name="date" required/>
</div></div>
<div class="row uniform 50%">
<div class="12u 12u(mobilep)">
<input type="text" name="batch" value="<?php echo $batch; ?>" placeholder="batch" readonly="readonly"/>
</div></div>
<div class="row uniform 50%">
<div class="12u 12u(mobilep)">
<input type="text" name="sem" value="<?php echo $sem; ?>" placeholder="sem" readonly="readonly"/>
</div></div>
<div class="row uniform 50%">
<div class="12u 12u(mobilep)">
<input type="text" name="subject" value="<?php echo $subject; ?>" placeholder="subject" readonly="readonly"/>
</div></div>
<label>total hours:</label>
 <select name="hours" class="dropotron">
 <option>1</option>
 <option>2</option>
 </select>
<input type="submit" value="goto" name="submit1"/>
</form>
</div>
</section>
</div></div>
</section>
</body>
</div>
<?php 
    /*if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$tbatch=$_POST['batch'];
		$tsem=$_POST['semester'];
		$tcourse=$_POST['course'];
		echo $tbatch."  and  ".$tsem."and".$tcourse;
	}*/
?>
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
</html>
