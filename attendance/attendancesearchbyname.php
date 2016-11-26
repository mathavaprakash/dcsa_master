<!DOCTYPE HTML>
<html>
<head>
 <?php
    session_start();
	$table_fname=$_SESSION['sname2'];
	$stafid=$_SESSION['stafid'];
    $batch=$_SESSION['batch'];
	
	if($_SESSION['sname2'])
	{}
	else
	{
	    header("location:index.html");
    }
	
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
<script src="lib/jquery/jquery-1.3.2.js" type="text/javascript"></script>
<script type="text/javascript" src="javascripts/attendance.js"></script>
<script></script>
</head>	
			<!-- Main -->
<section id="main" class="container 75%">
<header><h2>Student Attendance </h2><br/>Search</header>
<div class="row">
<div class="12u">
<section id="cta">
<div align="center" class="big">
<form action="attendancesearchbyname.php" method="post">
<!--<div class="row uniform 50%">
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
-->
<div class="row uniform 50%">
<div class="12u 12u(mobilep)">
<label for="name"></label><input type="text" name="name" placeholder="Enter Student Name" required="required"/>  
</div></div>


<div class="row uniform 50%">
<div class="12u 12u(mobilep)">
<input type="submit" value="submit" name="submit2"/>
</div></div>
</form>
</div>
</section>
</div></div>
</section>
</body>
</div>
<!-- Footer -->
<?php 
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  if(isset($_POST['submit2']))
  {

	mysql_connect("localhost","root","")or die(mysql_error());
	mysql_select_db("dcsa")or die("cannot connet database");
	$tname=mysql_real_escape_string($_POST['name']);
	$sql2=mysql_query("select * from stud_attend where name like '%$tname%'");
  echo '	 
  <div class="row">
  <div class="12u">
  <section class="box">
  <div class="table-wrapper">
     
	<table class="alt"  style="width:50%;">
	<tr><th>ROLLNO</th><th>NAME</th><th>Subject</th>
     <div class="row">
				  <div class="12u">
				  
					<div class="row uniform 50%">
						<div class="6u 12u(narrower)">';
    if(mysql_num_rows($sql2)!=0)
    {		
	if($t=mysql_fetch_array($sql2))
	{
	    $datearray=explode('|',$t['date']);
		$tmonth="";
	    for($i=0;$i<count($datearray)-1;$i++)
	    {	
	       $trdate=$datearray[$i];
	       if($tmonth==date("M",strtotime($trdate)))
		   {
			   
		   }
		   else
		   {
			   $tmonth=date("M",strtotime($trdate));
			   echo '<th>';
			   echo date("M",strtotime($trdate));
			   echo "_";
			   echo date("y",strtotime($trdate));
			   echo '</th>';
		   }
		}
		echo '<th>';
		echo "<u>Present</u><br/>Totaldays";
		echo '</th>';
		echo '<th>percentage</th>';
		echo '</tr>';
		do{
			    
			$trollno=$t['rollno'];
			$tname=$t['name'];
			$tsubject=$t['subject'];
			echo '<tr><td><a href="attendancestud_pdf.php?rollno='.$trollno.'">'.$trollno.'</a></td>';
			echo '<td>'.$tname.'</td>';
			echo '<td>'.$tsubject.'</td>';
			$datearray1=explode('|',$t['date']);
			$valarray=explode('|',$t['dayval']);
			$count=0;
			$pcount=0;
			$tcount=-1;
			$i=0;
			$tdmonth=date("M",strtotime($datearray1[0]));
			for($i=0;$i<count($valarray)-1;$i++)
			{ 
		     $trdate1=$datearray1[$i];
			 $tcount++;
			 if($valarray[$i]==1)
			 {
				 $count++;
				 $pcount++; 
			 }
			 if($tdmonth==date("M",strtotime($trdate1)))
		     {
			   if($i==count($valarray)-2)
			   {
				 $tcount++;
				 $tdmonth=date("M",strtotime($trdate1));
			     echo '<td>';
				 echo $pcount."/".$tcount;
			     echo '</td>';
				 $pcount=$tcount=0;
			   }
		     }
		     else
		     {
				 $tdmonth=date("M",strtotime($trdate1));
			     echo '<td>';
				 echo $pcount."/".$tcount;
			     echo '</td>';
				 $pcount=$tcount=0;
			 }
			 }
			echo '<td>'.$count.'/'.$i.'</td>';
			$precent=$count/$i*100;
			$strprecent=$precent."%";
			echo '<td>'.$strprecent.'</td>';
			echo '</tr>'; 
			}while($t=mysql_fetch_array($sql2));
     echo '</div></div></div></div></table></div></section></div></div></form></div>';
    }
    }
   }
   else{ 
        print '<script>alert("Invalid Data");</script>';   
	    print '<script>window.location.assign("attendancehome.php");</script>';
	}
}
?>
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
<html>