<?php
	$q = $_GET['q'];
	$myArray = explode('|', $q);
	$batch=$myArray[0];
	$user_id=$myArray[1];
	//$batch=$_GET['q'];
	//$user_id=$_GET['uid'];
 //echo "select value is=".$q;

include_once "../assets/db/dbdcsa.php";
$res=mysql_query("select * from study_group where Batch=$batch and Staff_Key=$user_id");
echo '<select name="subject" ><option value="0">select Subjects</option>';
while($row=mysql_fetch_array($res))
{
	$temp_subject=$row['Subject'];
	$group_id=$row['Group_ID'];
	?>
		<option value="<?php echo "$group_id";?>"><?php echo "$temp_subject";?></option>
    <?php
}
echo '</select>';
?>
