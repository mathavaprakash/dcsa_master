<!DOCTYPE>
<html>
<head>
<title>Untitled Document</title>
</head>

<body>
<?php
 $tbatch=$_GET['q'];
 //echo "select value is=".$q;
include_once "../assets/db/dbdcsa.php";
$res=mysql_query("select distinct(sem) from stud_attend where batch='$tbatch'");
echo '<select name="semester" ><option>select semester</option>';
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