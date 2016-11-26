<!DOCTYPE HTML>
<html>
<head>
<title>Attendance</title>
        <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<link rel="stylesheet" href="../assets/css/pcal.css" />
		<script type="text/javascript" src="../lib/jquery/jquery-1.3.2.js"></script>
		<script type="text/javascript" src="../javascripts/jquery.validate.js"></script>
		<script type="text/javascript" src="../javascripts/jquery.validation.functions.js"></script>
		<script type="text/javascript" src="../lib/jquery/jquery-1.3.2.js"></script>
        <script type="text/javascript" src="../javascripts/attendance.js"></script>      
        <script type="text/javascript" src="../javascripts/pacal.js"></script>     
        <script type="text/javascript" src="../javascripts/ppcal.js"></script>     		
		 <script>getbatch()</script>
		<script language="javascript">
		$(function() {
 $("#txtdate").datepicker({
             maxDate: 0
            });
 $( "#txtdate" ).datepicker({
      beforeShowDay: $.datepicker.noWeekends
 });
 }); </script>
 </head>
 <div id="page-wrapper">
			<!-- Header -->
				<header id="header">
					<h1><a href="index.html">Home</a></h1>
					<nav id="nav">
				    <ul><li><a href="../logout.php" class="button">Log out</a></li></ul>
					</nav>
				</header>
			<!-- Main -->
<section id="main" class="container">
					<header><h2>Student Attendance </h2></header>
<div class="row">
<div class="12u">
	<section id="cta">
		<div align="center" class="cta">
		<form action="../attendance/mleavetake.php" method="post">
			<div class="row uniform 50%">
			<div class="12u 12u(mobilep)">
			<input type="text" name="date"  id="txtdate" placeholder="select  date" required/>
			</div></div>
			<div class="row uniform 50%">
			<div class="12u 12u(mobilep)">
			<input type="text" name="rollno" value="" onchange="getname(this.value)" placeholder="Student Key" required="required"/>
			</div></div>
			<div id="list2">
			<div class="row uniform 50%">
			<div class="12u 12u(mobilep)">
			<input type="text" name="stud_name" value="" placeholder="Student name" required="required" readonly/>
			</div></div>
			<div class="row uniform 50%">
			<div class="12u 12u(mobilep)">
			<input type="text" name="sem" value="" placeholder="Semester" required="required" readonly/>
			</div></div>
			</div>
			<div class="row uniform 50%">
			<div class="12u 12u(mobilep)">
			<input type="submit" value="ADD" name="ADD"/>
			</div></div>
		</form>
		</div>
	</section>
</div></div>
</section>
</body>
</div>

</html>