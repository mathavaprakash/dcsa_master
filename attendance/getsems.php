<!DOCTYPE>
<html>
<head>
<title>Untitled Document</title>
</head>

<body>
<?php
 $tclass=$_GET['q'];
 //echo "select value is=".$q;
include '../assets/db/dbdcsa.php';
$res1=mysql_query("select batch_id from batch where class='$tclass'");
$row1=mysql_fetch_array($res1);
$tbatch=$row1['batch_id'];
$res=mysql_query("select distinct(sem) from timetable where Batch='$tbatch'");
echo '<select name="semester"  ><option>select semester</option>';
while($row=mysql_fetch_array($res))
{
	$tsem=$row['sem'];
	?>
    <option><?php echo $tsem;?></option>
    <?php
}
echo '</select>';
?>

</body>
</html>