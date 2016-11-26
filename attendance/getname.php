<!DOCTYPE>
<html>
<head>
<title>Untitled Document</title>
</head>

<body>
<?php
 $rollno=$_GET['q'];
 //echo "select value is=".$q;
include_once "../assets/db/dbdcsa.php";
$res=mysql_query("select * from mas_students where Student_Key='$rollno'");
if(mysql_num_rows($res)>0)
{
	$row=mysql_fetch_assoc($res);
	$tname=$row['First_Name'];
	$tbatch=$row['batch'];
	echo '<div class="row uniform 50%">
			<div class="12u 12u(mobilep)">
	<input type="text" name="stud_name" value="'.$tname.'" required="required" readonly/>
	</div></div>';
	$res1=mysql_query("select distinct(sem) from timetable where Batch='$tbatch'");
    if(mysql_num_rows($res1)>0)
    {
		$row1=mysql_fetch_assoc($res1);
		$tsem=$row1['sem'];
		echo '<div class="row uniform 50%">
			<div class="12u 12u(mobilep)">
			<input type="text" name="sem" value="'.$tsem.'" required="required" readonly/>
			</div></div>';
	}
	else
	{
		echo '<div class="row uniform 50%">
			<div class="12u 12u(mobilep)">
			<input type="text" name="sem" placeholder="Semester not found" required="required" readonly/>
			</div></div>';
	}
} 
else
{
	echo '<div class="row uniform 50%">
			<div class="12u 12u(mobilep)">
			<input type="text" name="sem" placeholder="Student_Key not found" required="required" readonly/>
			</div></div>';
}
?>

</body>
</html>