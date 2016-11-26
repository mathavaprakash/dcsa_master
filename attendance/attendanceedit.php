<!DOCTYPE HTML>
<html>
<head>
<title>Student Attendance</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css"/>
		<script type="text/javascript" src="javascripts/attendance.js"></script>
		<script type="text/javascript">
        </script>
		<?php
		
		session_start();
		$table_fname1=$_SESSION['sname2'];
		$stafid=$_SESSION['stafid'];
		$batch=$_SESSION['batch'];
		
		if($_SESSION['sname2'])
		{
			
		}
		else
		{
			header("location:index.html");
		}
	    //getbatch($stafid);
        ?>
		<script>getbatch()</script>
</head>
<body>
<div id="page-wrapper">
<!-- Header -->
	<header id="header">
		<h1><a href="index.html">Home</a></h1>
		 <nav id="nav">
		<ul>	
		<li><a href="attendanceedit.php">Edit</a></li>
		<li><a href="attendancedelete.php">Delete</a></li>
		<li><a href="attendancehome.php">Add</a></li>
		<li><a href="#" class="icon fa-angle-down"> <?php print "$table_fname1"; ?> </a></li>
		<li><a href="logout.php" class="button">Log out</a></li>
		</ul>
		</nav>

	</header>
	</div>
</body>				
			<!-- Main -->
<section id="main" class="container 75%">
<header><h2>Student Attendance </h2><br/>Edit</header>
  <div class="row">
		<div class="12u">
			<section id="cta">
<div align="center" class="big">
<form action="attendanceeditsubmit.php" method="post">
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
