<!DOCTYPE HTML>
<html>
<head>
<title>Attendance</title>
        <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
        <script src="../lib/jquery/jquery-1.3.2.js" type="text/javascript"></script>
        <script src="../javascripts/attendance.js"></script>
        <script></script>        
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
				<section id="main" class="container 75%">
				
					<header><h2>Student Attendance view </h2></header>
<div class="row uniform 100%">
<div class="12u">
<section>
<!--<div align="center" class="big">
<div class="row uniform 100%"><div class="6u 12u(narrower)"> <input type="submit" onclick="getattendance(p)" name="previous" value="previous"/></div>
 <div class="6u 12u(narrower)"><input type="submit" name="next" onclick="getattendance(n)" value="next"/></div></div>


</div>--> 	
</section>
</div></div>
</div>
<?php
 if(isset($_GET['date']))
 {
	 session_start();
	include_once "../assets/db/dbdcsa.php";
	$tdate=encryptor('decrypt',$_GET['date']);
    $tbatch=encryptor('decrypt',$_GET['batch']);
	$tsem=encryptor('decrypt',$_GET['sem']);
    echo '
	<form action="../attendance/attendanceupdate.php" method="post">
	<table>
    <tr>
    <td><label for="batch1">batch</label><input type="text" name="batch1"  readonly="readonly"  value="'.$tbatch.'"/></td>
    <td><label for="date1">date</label><input type="text" name="date1" readonly="readonly"   value="'.$tdate.'"/></td>
    <td><label for="sem1">semester</label><input type="text" name="semester1" readonly="readonly"   value="'.$tsem.'"/></td>
    </tr>
    </table>';
	    $tmonth=date('M',strtotime($tdate));
	    $sql=mysql_query("select * from stud_attend where batch='$tbatch' && sem='$tsem' && month='$tmonth'");
		$t1=mysql_fetch_array($sql);
		$trollno=$t1['rollno'];
		$tname=$t1['name'];
		$datearray=explode('|',$t1['date']);
		$loc=-1;
		for($i=0;$i<count($datearray)-1;$i++)
		{
			if($datearray[$i]==$tdate)
			{
				$loc=$i;
				break;
			}
		}
		if($loc!=-1)
		{
		$sarray=explode("||",$t1['subjects']);
		$sarray1=$sarray[$loc]."|";
	    $subjects=explode('|',$sarray1);	 
		echo '<div class="row">
		  <div class="12u">
		  <section class="cta">
		  <div class="table-wrapper">
     
			<table class="alt">
		<tr>
		<div class="row">
				  <div class="12u">
					<div class="row uniform 50%">
						<div class="6u 12u(narrower)">
		<th>ROLLNO</th><th>NAME</th>';
		for($i=0;$i<count($subjects)-1;$i++)
	    {
		
	    echo '<th style="width:200px">';
		$sql2=mysql_query("select short_sub from study_group where Group_ID='$subjects[$i]'");
		$res=mysql_fetch_assoc($sql2);
		$sub=$res['short_sub'];
	   //echo $temp;
	   //$temp=$temp+$i;
	   //echo "<br>".$temp;
	   //ech o date("Y-M-d H:i",strtotime($temp));
	   //echo date("d",strtotime($tdate));
	   //echo "<br/>";
	   //echo date("D",strtotime($tdate));
	   //echo '<input type="checkbox" id="hours'.$i.'" class="$i" onclick="selectall()">
	   echo 'hour'.(($i)+1);
	   echo '
	    <div class="row uniform 50%">
	    <div class="6u 12u(narrower)">
					<input type="checkbox" id="hours'.$i.'" name="hours';echo ($i)+1; echo'">
					<label for="hours'.$i.'"></label>
		</div></div>
		<br/>
					
					
					<input type="text" name="subject'.$i.'" value="'.$sub.'" readonly="readonly"></input>
		';
	   echo '</th>';
	   
	    }
		echo '<th>overall
	  <div class="row uniform 50%">
	    <div class="6u 12u(narrower)">
					<input type="checkbox" id="hoursoverall" name="hoursoverall">
					<label for="hoursoverall"></label>
		</div></div>
	    </th>
	    </tr>';
		do
		{
			$trollno=$t1['rollno'];
			$tname=$t1['name'];
			$varray=explode("||",$t1['dayvalue']);
			$varray1=$varray[$loc]."|";
			$dayvalue=explode('|',$varray1);
			$overall=explode('|',$t1['overall']);
			$overallvalue=$overall[$loc];
		    echo '<tr><td>'.$trollno.'</td>';
				echo '<td>'.$tname.'</td>';
				for($j=0;$j<count($dayvalue)-1;$j++)
				{ 
			        if($dayvalue[$j]==1)
					{
					?>
					
					 <td>
					 <div class="row uniform 50%">
					 <div class="6u 12u(narrower)">
					<input type="hidden" name="<?php echo $trollno.'['.$j.']'; ?>" value="0">
					<input type="checkbox" id="<?php echo $trollno.'['.$j.']'; ?>" class="thours<?php echo $j;?>"  name="<?php echo $trollno.'['.$j.']'; ?>" value="1" checked="checked"/>
					<label for="<?php echo $trollno.'['.$j.']'; ?>"></label>
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
					<input type="hidden" name="<?php echo $trollno.'['.$j.']'; ?>" value="0">
					<input type="checkbox" id="<?php echo $trollno.'['.$j.']'; ?>" class="thours<?php echo $j;?>"  name="<?php echo $trollno.'['.$j.']'; ?>" value="1"/>
					<label for="<?php echo $trollno.'['.$j.']'; ?>"></label>
					</div></div>
					</td> 
					<?php 
					}						
					//<input type="hidden" name="<?php echo $tname.'['.$i.']';" value="0"/>
				}
				if($overallvalue==1)
				{
				?>
				<td><div class="row uniform 50%">
					 <div class="6u 12u(narrower)">
					<input type="hidden" name="<?php echo $trollno."overall"; ?>" value="0">
					<input type="checkbox" id="<?php echo $trollno."overall"; ?>" class="thoursoverall"  name="<?php echo $trollno."overall"; ?>" value="1" checked="checked">
					<label for="<?php echo $trollno."overall"; ?>"></label>
					</div></div>
					</td> 
			    </tr>
				<?php
				}
				else
				{
					?>
				<td><div class="row uniform 50%">
					 <div class="6u 12u(narrower)">
					<input type="hidden" name="<?php echo $trollno."overall"; ?>" value="0">
					<input type="checkbox" id="<?php echo $trollno."overall"; ?>" class="thoursoverall"  name="<?php echo $trollno."overall"; ?>" value="1">
					<label for="<?php echo $trollno."overall"; ?>"></label>
					</div></div>
					</td> 
			    </tr>
				<?php
				}
		}while($t1=mysql_fetch_array($sql));
		echo '
		</div>
				 	</div>									
				  </div>
                </div>

	</table>
	
    
	<div class="row uniform 50%">
	    <div class="6u 12u(narrower)">
					<input type="submit" name="update" value="Update"></input>
		</div>
		<div class="6u 12u(narrower)">
					<input type="submit" name="delete" value="Delete"></input>
		</div>
	</div>
		</form>
	</div>
    </section>
    </div>
	</div>';
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