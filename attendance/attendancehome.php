<!DOCTYPE HTML>
<html>
<head>
<title>Attendance</title>
        <meta charset="utf-8" />
		<html xmlns="http://www.w3.org/1999/xhtml">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<link rel="stylesheet" href="../assets/css/pcal.css" />
		 <link rel="stylesheet" type="text/css" href="../stylesheets/jquery.validate.css" />
		 <link rel="stylesheet" type="text/css" href="../stylesheets/style.css" />
		 <script src="../lib/jquery/jquery-1.3.2.js" type="text/javascript"></script>
		 <script src="../javascripts/jquery.validate.js" type="text/javascript"></script>
		 <script src="../javascripts/jquery.validation.functions.js" type="text/javascript"></script>
		<script src="../lib/jquery/jquery-1.3.2.js" type="text/javascript"></script>
        <script type="text/javascript" src="../javascripts/attendance.js"></script>      
        <script type="text/javascript" src="../javascripts/pacal.js"></script>     
        <script type="text/javascript" src="../javascripts/ppcal.js"></script>     		
		<script>getclass()</script>
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
 $(function () {
           
        });
jQuery("#txtdate").validate({
        expression: "if (!isValidDate(parseInt(VAL.split('-')[2]), parseInt(VAL.split('-')[0]), parseInt(VAL.split('-')[1]))) return false; else return true;",
        message: "Please enter a valid Date"
});
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
<br/>
<div class="row">
<div class="12u">
	<section id="cta">
	<div align="center" class="cta">
		<form action="attendancehome.php" method="post">
		
				<div class="row uniform 50%">
				<div class="12u 12u(mobilep)">
				<input type="text" name="date" onchange="getorder(this.value)"  id="txtdate" placeholder="select  date" required/>
				<!--<input type="date" onchange="getorder(this.value)" name="date" required/>-->
				</div></div>
		<div id="orderid">
				<div class="row uniform 50%">
				<div class="12u 12u(mobilep)">
				<input type="text" name="order" value="" readonly="readonly" placeholder="select date" required/>
				</div></div>
		</div>
				<div class="row uniform 50%">
				<div class="12u 12u(mobilep)">
				<div id="list1"><select name="batch" onchange="getsems(this.value)"><option>select batch</option></select></div>
				</div></div>
				<div class="row uniform 50%">
				<div class="12u 12u(mobilep)">
				<div id="list2"><select name="semester"><option>select semester</option></select></div>
				</div></div>
				<div class="row uniform 50%">
				<div class="12u 12u(mobilep)">
				<input type="submit" value="goto" name="submit1"/>
				</div></div>
		</form>
	</section>
</div></div>
</div>
</section>
</body>
</div>
<?php 
    if($_SERVER['REQUEST_METHOD']=="POST")
	{
		include_once '../assets/db/dbdcsa.php';
		$tdate=$_POST['date'];
		$torder=$_POST['order'];
		$tclass=$_POST['batch'];
		$tsem=$_POST['semester'];
		$error=0;
		$res1=mysql_query("select batch_id from batch where class='$tclass'");
		$row1=mysql_fetch_array($res1);
		$tbatch=$row1['batch_id'];
		$res1=mysql_query("select * from timetable where Batch='$tbatch' and sem='$tsem' and day='$torder'");
	    $exits=mysql_num_rows($res1);
	    if($exits==0)
		{
			$error=1;
			print '<script>alert("order not found");</script>';
			//print '<script>window.location.assign("../attendance/attendancehome.php");</script>';
		}
	/*$today=date("Y-m-d");
	$startyear=date("Y-07-01");
	//echo $today." start=".$startyear;
	$temp="";
	if($today>$startyear)
	{
	   $temp=date('y',strtotime($today));
	}
	else
	{
	   $temp=date('y',strtotime($today));
	   $temp=$temp-1;			   
	}
	if($tclass=="MCA 1st_year")
	{
		$tselectyear=$temp."322";
	}
	else if($tclass=="MCA 2nd_year")
	{
		$tselectyear=((int)$temp-1);
		$tselectyear.="322";
	}
	else if($tclass=="MCA 3rd_year")
	{
		$tselectyear=((int)$temp-2);
		$tselectyear.="322";
	}
	else if($tclass=="MSc.it 1st_year")
	{
		$tselectyear=$temp."321";
	}
	else
	{				
		$tselectyear=((int)$temp-1);
		$tselectyear.="321";
	}*/
	
	$res2=mysql_query("select * from mas_students where batch='$tbatch'");
	if(mysql_num_rows($res2)==0)
	{
		 $error=1;
         print '<script>alert("students not found");</script>';
         //print '<script>window.location.assign("../attendance/attendancehome.php");</script>';			 
	}
	$tmonth=date('M',strtotime($tdate));
	//print '<script>alert("month='.$tmonth.'");</script>';
	$res3=mysql_query("select * from stud_attend where batch='$tbatch' and sem='$tsem' and month='$tmonth';");  			 
	$test=0;
	if(mysql_num_rows($res3)>0)
	{
	    $t1=mysql_fetch_array($res3);
		$datearray=explode('|',$t1['date']);
		for($j=0;$j<count($datearray)-1;$j++)
		{
		  if($datearray[$j]==$tdate)
		  {
			$test=1; 
			break;
		  }
		}
		if($test==1)
		{
			   $error=1;
               print '<script>alert("date already inserted");</script>';
			   $test=0;
               //print '<script>window.location.assign("../attendance/attendancehome.php");</script>';			 
		}
	 }
	 if($error==0)
	 {
		 session_start();
		$date=encryptor('encrypt',$tdate);
		$class=encryptor('encrypt', $tclass);
		$sem=encryptor('encrypt', $tsem);
		$order=encryptor('encrypt', $torder);
		$batch=encryptor('encrypt',$tbatch);
		$_SESSION['date']=$date;
		$_SESSION['class']=$class;
		$_SESSION['sem']=$sem;
		$_SESSION['order']=$order;
		$_SESSION['batch']=$batch;
		print '<script>window.location.assign("../attendance/attendancetake.php");</script>';
		//print '<script>window.location.assign("../attendance/attendancetake.php?date='.$date.'&&class='.$class.'&&batch='.$batch.'&&sem='.$sem.'&&order='.$order.'");</script>';			 
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
						<li>&copy; GRI-DCSA. All rights reserved.</li>
					</ul>
				</footer>
</html>
