<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>courset</title>
</head>

<body>
<?php 
    $q = $_GET['q'];
	$myArray = explode('|', $q);
	$tbatch=$myArray[0];
	$tsem=$myArray[1];
	$tsubject=$myArray[2];
	//echo "batch=".$tbatch."sem=".$tsem;
mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("dcsa") or die("Cannot connect to database");
$res=mysql_query("select * from stud_attend where batch='$tbatch' and  sem='$tsem' and subject='$tsubject'");
echo '<label for="date"></label><select name="date" class="dropotron">
<option>select date</option>';
if($row=mysql_fetch_array($res))
{
    $datearray=explode('|',$row['date']);	
	for($i=0;$i<count($datearray)-1;$i++)
	{
	   ?>
      <option><?php echo $datearray[$i];?></option>
      <?php
	}
}
echo '</select>';
?>
</body>
</html>