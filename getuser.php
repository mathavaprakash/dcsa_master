<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">

</script>
<style>
table {
width: 100%;
border‐collapse: collapse;
}
table, td, th {
border: 1px solid black;
padding: 5px;
}
th {text‐align: left;}
</style>
</head>
<body>
<?php
$q = $_GET['q'];
//echo $q;
if($q=="MCA I-year" || $q=="MSc-IT I-year")
{
   $s=0;
   $e=1;
}
else if($q=="MCA II-year" || $q=="MSc-IT II-year")
{
	$s=2;
	$e=3;
}
else
{
	$s=4;
	$e=5;
}
$sem=array("I","II","III","IV","V","VI");
echo 'semester:<select name="semester" onchange="showcourse(group.value)">';

for($i=$s;$i<=$e;$i++)
{
	echo '<option>';
	echo $sem[$i].'</option>';
}
echo "</select>";
/*mysqli_connect("localhost","root","") or die(mysql_error());
mysqli_select_db("mydb1") or die("cannot connet to database");
$sql="SELECT * FROM stud WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);
echo "<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
echo "<tr>";
echo "<td>" . $row['FirstName'] . "</td>";
echo "<td>" . $row['LastName'] . "</td>";
echo "<td>" . $row['Age'] . "</td>";
echo "<td>" . $row['Hometown'] . "</td>";
echo "<td>" . $row['Job'] . "</td>";
echo "</tr>";
}
echo "</table>";
mysqli_close($con);*/
?>
</body>
</html>