<!DOCTYPE>
<html>
<head>
<title>Untitled Document</title>
</head>

<body>
<?php
 $batch=$_GET['q'];
 //echo "select value is=".$q;
mysql_connect("localhost","root","")or die(mysql_error);
mysql_select_db("dcsa")or die("cannot connect database");
$res=mysql_query("select distinct(semester) from study_group where Batch=$batch");
echo '<label for="semester"></label><select name="semester" onchange="getcourse(batch.value,semester.value)" class="dropotron"><option>select semester</option>';
while($row=mysql_fetch_array($res))
{
	$tbatch=$row['semester'];
	?>
    <option><?php echo $tbatch;?></option>
    <?php
}
echo '</select>';
?>

</body>
</html>