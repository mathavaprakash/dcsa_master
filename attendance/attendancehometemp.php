<!DOCTYPE HTML>
<html>
<head>
<title>Student Attendance</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="../assets/css/main.css"/>
	<script src="../lib/jquery/jquery-1.3.2.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="../javascripts/attendance.js"></script>
	<script>getbatch1()</script>
    <?php
    /*session_start();
	$table_fname=$_SESSION['staffname'];
	$stafid=$_SESSION['stafid'];
	if($_SESSION['staffname'])
	{
		$_SESSION['sname2']=$table_fname;
	}
	else
	{
	    header("../index.html");
    }*/
	
?>
</head>
<body>
<div id="page-wrapper">
<!-- Header -->
	<header id="header">
		<h1><a href="index.html">Home</a></h1>
		 <nav id="nav">
						<ul>	
					<!--<li><a href="../attendance/attendanceedit.php">Edit</a></li>
					<li><a href="../attendance/attendancedelete.php">Delete</a></li>
					<li><a href="../attendance/attendancehome.php">Add</a></li>-->
						<li><a href="#" class="icon fa-angle-down"> <?php print "$table_fname"; ?> </a></li>
                          <li><a href="logout.php" class="button">Log out</a></li>
						</ul>
					</nav>

	</header>
	</div>
</body>				
			<!-- Main -->
<section id="main" class="container 75%">
<header><h2>Student Attendance </h2><br>Add</header>

<?php 
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
<div id="list1"><label for="batch"></label><select class="dropotron" name="batch"><option>select batch</option></select></div>
</div></div>
<div class="row uniform 50%">
<div class="12u 12u(mobilep)">
<div id="list2"><label for="semester"></label><select name="semester" onfocus="getsems(batch.value)"  class="dropotron">
<option>select semester</option></select></div>
</div></div>
<div class="row uniform 50%">
<div class="12u 12u(mobilep)">
<div id="list3"><label for="course"></label><select name="subject" onfocus="getcourse(batch.value,semester.value)" class="dropotron">
<option>select course</option></select></div>
</div></div>
<label>total hours:</label>
 <select name="hours" class="dropotron">
 <option>1</option>
 <option>2</option>
 </select>
 <div class="row uniform 50%">
<div class="12u 12u(mobilep)">
<input type="submit" value="goto" name="submit1"/>
</div></div>
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
