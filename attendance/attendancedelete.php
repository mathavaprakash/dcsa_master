<!DOCTYPE HTML>
<html>
<head>
 <?php
    /*session_start();
	$table_fname=$_SESSION['sname2'];
	$stafid=$_SESSION['stafid'];
    $batch=$_SESSION['batch'];
	
	if($_SESSION['sname2'])
	{}
	else
	{
	    header("location:index.html");
    }*/
	
 ?>
<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
<header id="header">
		<h1><a href="index.html">Home</a></h1>
		<nav id="nav">
		<ul>	
		<li><a href="attendanceedit.php">Edit</a></li>
		<li><a href="attendancedelete.php">Delete</a></li>
		<li><a href="attendancehome.php">Add</a></li>
		<li><a href="#" class="icon fa-angle-down"> <?php print "$table_fname"; ?> </a></li>
		<li><a href="logout.php" class="button">Log out</a></li>
		</ul>
		</nav>
					
</header>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Attendance</title>
<script src="../lib/jquery/jquery-1.3.2.js" type="text/javascript"></script>
<script type="text/javascript" src="../javascripts/attendance.js"></script>
<script>getbatch()</script>
</head>	
			<!-- Main -->
<section id="main" class="container 75%">
<header><h2>Student Attendance </h2><br/>delete</header>
  <div class="row">
		<div class="12u">
			<section id="cta">
<div align="center" class="big">
<form action="attendancedelete.php" method="post">
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
<div id="list4"><label for="date"></label><select name="date" onfocus="getdate(batch.value,semester.value,subject.value)" class="dropotron">
<option>select date</option></select></div>
</div></div>
<div class="row uniform 50%">
<div class="12u 12u(mobilep)">
<input type="submit" value="delete" name="delete"/>
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
<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  if(isset($_POST['delete']))
  {
	mysql_connect("localhost","root","")or die(mysql_error());
    mysql_select_db("dcsa")or die("cannot connet database");
    $tclass=mysql_real_escape_string($_POST['batch']);
	$tsem=mysql_real_escape_string($_POST['semester']);
	$tcourse=mysql_real_escape_string($_POST['subject']);
	$tdate=mysql_real_escape_string($_POST['date']);
    $res1=mysql_query("select * from stud_attend where batch='$tclass' and sem='$tsem' and subject='$tcourse'");  			 
    while($t1=mysql_fetch_array($res1))
    {
        $trollno=$t1['rollno'];
        $tname=$t1['name'];
	  
		   $tstrdate="";
		   $tstrval="";
		   $datearray=explode('|',$t1['date']);
		   $valarray=explode('|',$t1['dayval']);
		   for($j=0;$j<count($datearray)-1;$j++)
		   {
		       if($datearray[$j]!=$tdate)
		       {        
			   $tstrdate.=$datearray[$j]."|";
               $tstrval.=$valarray[$j]."|";
			   }
		   }
			  $sql2="update stud_attend set date='$tstrdate', dayval='$tstrval' where rollno='$trollno' and batch='$tclass' and sem='$tsem' and subject='$tcourse'";
			  if(mysql_query($sql2))
			  {
				  //print '<script>alert("$tstrdate");</script>';
				  print '<script>alert("Delete successfully");</script>'; 
			  }
			  else
			  {
				 // $sql2="insert into stud_attend (rollno,name,batch,sem,subject,date,dayval) values('$trollno','$tname','$tclass','$tsem','$tcourse','$tstrdate','$str')";
				  //mysql_query(sql2);
			  }
			  //echo $tname."=".$str." date=".$tstrdate."<br />";
      }
    $tstrdate="";
	print '<script>alert("Delete successfully");</script>';   
	print '<script>window.location.assign("attendancedelete.php");</script>';
	
   }
   
   else
   {
	   print '<script>alert("Invalid Data");</script>';   
	   print '<script>window.location.assign("attendancehome.php");</script>';
   }
}
?>