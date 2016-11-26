
<?php

include_once "../assets/db/dbdcsa.php";
$res=mysql_query("select * from batch");
echo '<select name="class" onchange="getsems2(this.value)"><option value="0">select Class</option>';
while($row=mysql_fetch_array($res))
{
	$temp_class=$row['class'];
	$temp_id=$row['batch_id'];
	?>
		<option value="<?php echo "$temp_id";?>"><?php echo "$temp_class";?></option>
    <?php
}
echo '</select>';
   ?>

