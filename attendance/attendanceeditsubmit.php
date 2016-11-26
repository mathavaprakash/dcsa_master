<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
   session_start();
   $sname=$_SESSION['sname2'];
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
		<li><a href="#" class="icon fa-angle-down"> <?php print "$sname"; ?> </a></li>
		<li><a href="logout.php" class="button">Log out</a></li>
		</ul>
		</nav>
					
</header>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Attendance</title>
<script src="lib/jquery/jquery-1.3.2.js" type="text/javascript"></script>
<script type="text/javascript" src="javascripts/attendance.js"></script>
</head>
<title>Attendance </title>
<section id="main" class="container 75%">
<header><h2>Student Attendance</h2><br/>Edit</header>
<?php 
  /*mysql_connect("localhost","root","")or die(mysql_error());
  mysql_select_db("dcsa")or die("cannot connet database");
  if(isset($_POST['submit1']))
  {
	$tdate=mysql_real_escape_string($_POST['date']);
    $tclass=mysql_real_escape_string($_POST['batch']);
	$tsem=mysql_real_escape_string($_POST['semester']);
	$tcourse=mysql_real_escape_string($_POST['subject']);
	$_SESSION['tdate1']=$tdate;
	$_SESSION['tclass1']=$tclass;
	$_SESSION['tsem1']=$tsem;
	$_SESSION['tcourse1']=$tcourse;*/
if(isset($_GET['date']))
{
    session_start();
	include_once "../assets/db/dbdcsa.php";
	$tdate=encryptor('decrypt',$_GET['date']);
    $tbatch=encryptor('decrypt',$_GET['batch']);
	$tsem=encryptor('decrypt',$_GET['sem']);
	$tmonth=date('M',strtotime($tdate));
	$res=mysql_query("select distinct(date) from stud_attend where batch='$tbatch' and sem='$tsem' and month='$tmonth'");
	$count=mysql_num_rows($res);
	if($count!=0)
	{
		
	?>
    <div class="row">
    <div class="12u">
    <section class="cta">
    <div class="table-wrapper">
    <form action="../attendance/attendanceeditsubmit1.php" method="POST"> 
	<table class="alt"  style="width:50%;">
	<tr>
     <div class="row">
				  <div class="12u">
					<div class="row uniform 50%">
						<div class="6u 12u(narrower)">
	<?php
	
		$t=mysql_fetch_array($res);
		$j=-1;
		$match=false;
		$matcharray=array();
		$datearray=explode('|',$t['date']);
		$dateval=explode('|',$t['dayval']);
		echo '<th style="width:10px">ROLLNO</th><th style="width:20px">NAME</th>';
		for($i=0;$i<count($datearray)-1;$i++)
		{
			if($datearray[$i]==$tdate)
			{
				$j++;
				$match=true;
				$matcharray[$j]=$i;
		
        	
		   echo '<th style="width:20px">';
		   //echo $temp;
		   //$temp=$temp+$i;
		   //echo "<br>".$temp;
		   //echo date("Y-M-d H:i",strtotime($temp));
		   echo date("d",strtotime($tdate));
		   echo "<br/>";
		   echo date("D",strtotime($tdate));
		   //echo '<input type="checkbox" id="hours'.$j.'" class="$j" onclick="selectall()">
		   ?>
			<div class="row uniform 50%">
			<div class="6u 12u(narrower)">
						<input type="checkbox" id="hours<?php echo $j;?>" name="hours<?php echo $j;?>" onclick="selectall()">
						<label for="hours<?php echo $j;?>"></label>
						</div></div>
		   </th>
		   <?php
			
		   }
		}
		echo '</tr>';
		if($match==false)
		{
			 print '<script>alert("DATE NOT MATCH");</script>';   
			print '<script>window.location.assign("attendanceedit.php");</script>';
		}
		$res=mysql_query("select * from stud_attend where batch='$tclass' and sem='$tsem' and subject='$tcourse'");
		while($t=mysql_fetch_array($res))
		{
			$trollno=$t['rollno'];
			$tname=$t['name'];
			$dateval=explode('|',$t['dayval']);
			//echo "rollno".$trollno;
			//echo "name".$tname;
			//if(strcmp(strtr($qid,0,  (strlen($qid)-2)),$test_id ))
				
			echo '<tr><td>'.$trollno.'</td>';
			echo '<td>'.$tname;
			//print_r ($matcharray);
			echo '</td>';
			for($i=0;$i<count($matcharray);$i++)
			{ 
				if($dateval[$matcharray[$i]]==1)
				{
				?>
				 <td>
				 <div class="row uniform 50%">
				 <div class="6u 12u(narrower)">
				<input type="hidden" name="<?php echo $trollno.'['.$i.']'; ?>" value="0">
				<input type="checkbox" id="<?php echo $trollno.'['.$i.']'; ?>" class="thours<?php echo $i;?>"  name="<?php echo $trollno.'['.$i.']'; ?>" value="1" checked="checked">
				<label for="<?php echo $trollno.'['.$i.']'; ?>"></label>
				</div></div>
				</td> 
				<?php 
				}
				else
				{
				?>
				 <td>
				 <div class="row uniform 50%">
				 <div class="6u 12u(narrower)">
				<input type="hidden" name="<?php echo $trollno.'['.$i.']'; ?>" value="0">
				<input type="checkbox" id="<?php echo $trollno.'['.$i.']'; ?>" class="thours<?php echo $i;?>"  name="<?php echo $trollno.'['.$i.']'; ?>" value="1">
				<label for="<?php echo $trollno.'['.$i.']'; ?>"></label>
				</div></div>
				</td> 
				<?php	
				}
				
			}
			echo '</tr>'; 
		}
		
?>
</div>
				 	</div>									
				  </div>
                </div>

	</table>
    <div class="row uniform 100%"><div class="6u 12u(narrower)"> <input type="submit" name="add" value="add"/></div>
     <div class="6u 12u(narrower)"><input type="submit" name="cancel" value="cancel"/></div></div>
	 </form>
    </div>
    </section>
    </div>
	</div>
<?php 

    }
    else
   {  
	  
	  print '<script>alert("DATA NOT FOUND");</script>';   
	print '<script>window.location.assign("attendanceedit.php");</script>';
   }
  }
  else if(isset($_POST['cancel']))
  {
	  print '<script>window.location.assign("attendanceedit.php");</script>';
  }
  else
  {
	print '<script>alert("INVALID DATA");</script>';
	print '<script>window.location.assign("attendanceedit.php");</script>';
  }
?>
</section>
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