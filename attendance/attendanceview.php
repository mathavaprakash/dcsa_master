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
 <script language="javascript">
 /*$(function () {
           
        });
jQuery("#txtdate").validate({
        expression: "if (!isValidDate(parseInt(VAL.split('-')[2]), parseInt(VAL.split('-')[0]), parseInt(VAL.split('-')[1]))) return false; else return true;",
        message: "Please enter a valid Date"
});*/
		</script>
               
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
		<form action="../attendance/attendanceview.php" method="post">
			<div class="row uniform 50%">
			<div class="12u 12u(mobilep)">
			<input type="text" name="date" onchange="getorder(this.value)"  id="txtdate" placeholder="select  date" required/>
			</div></div>
			<div class="row uniform 50%">
			<div class="12u 12u(mobilep)">
			<div id="list1"><select name="batch" onchange="getsem(this.value)" ><option>select batch</option></select></div>
			</div></div>
			<div class="row uniform 50%">
			<div class="12u 12u(mobilep)">
			<div id="list2"><select name="semester"><option>select semester</option></select></div>
			</div></div>
			<div class="row uniform 50%">
			<div class="12u 12u(mobilep)">
			<input type="submit" value="submit" name="submit"/>
			</div></div>
		</form>
		</div>
	</section>
</div></div>
</section>
</body>
</div>
 
<?php

 if(isset($_POST['submit']))
 {
	include_once '../assets/db/dbdcsa.php';
	$tdate=mysql_real_escape_string($_POST['date']);
	$tbatch=mysql_real_escape_string($_POST['batch']);
	$tsem=mysql_real_escape_string($_POST['semester']);
	$error=0; 
	$res1=mysql_query("select * from stud_attend where batch='$tbatch' && sem='$tsem'");
	if(mysql_num_rows($res1)==0)
	{
		$error=1;
		print '<script>alert("DATA NOT FOUND");</script>';
	}
	$tmonth=date('M',strtotime($tdate));
	$res3=mysql_query("select distinct(date) from stud_attend where batch='$tbatch' and sem='$tsem' and month='$tmonth'");  			 
	$test=0;
	$tempvar="";
	if(mysql_num_rows($res3)>0)
	{
	    while($t1=mysql_fetch_array($res3))
		{
			$tempvar.=$t1['date'];
		}
		$datearray=explode('|',$tempvar);
		for($j=0;$j<count($datearray)-1;$j++)
		{
		  if($datearray[$j]==$tdate)
		  {
			$test=1; 
			break;
		  }
		}
		if($test==0)
		{
			   $error=1;
               print '<script>alert("DATE NOT MATCHED");</script>';
			   			 
		}
	}
	if($error==0)
	{
		$date=encryptor('encrypt',$tdate);
		$batch=encryptor('encrypt', $tbatch);
		$sem=encryptor('encrypt', $tsem);
		print '<script>window.location.assign("../attendance/attendanceviewsubmit.php?date='.$date.'&&batch='.$batch.'&&sem='.$sem.'");</script>';
	}
	
 }
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
						<li>&copy; GRI-DCSA. All rights reserved 2016.</li>
					</ul>
				</footer>
</html>