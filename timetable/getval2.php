<html>
	<head>
		<title>Department of Computer Science & Applications</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" type="image/png" href="images/logo.png" />
		<link rel="stylesheet" href="../assets/css/main.css" />
        </head>

<?php

$q = $_GET['q'];
//echo "Q value is:".$q;
include_once "../assets/db/dbdcsa.php";
//$res=mysql_query("select * from study_group where Batch=$q");

for($i=1;$i<7;$i++)
{

    $res=mysql_query("select * from study_group where Batch='$q'");
    $temp="box".$i;
	//echo '<select name="'.$temp.'" ><option>Select Subjects</option>';
    ?>
        <div class="row uniform 50%">
       <div class="12u 12u(mobilep)" >
	<select name="<?php echo "$temp";?>">
	<option value="">Select Subjects for Hour <?php echo "$i";?></option>
	<?PHP
	while($row=mysql_fetch_array($res))
	{
		$temp_subject=$row['short_sub'];
		?>
			<option value="<?php echo "$temp_subject";?>"><?php echo "$temp_subject";?></option>
		<?php
	}
	//echo '</select>';
	?>
	</select>
	</div>
	</div>
	<?php
}
//mysql_query("INSERT INTO `timetable`(`Batch`, `sem`, `day`, `1`, `2`, `3`, `4`, `5`, `6`) VALUES ('14322','II','Monday','WD','IP','WD','IP','WD','IP')");

 


?>
                        </select>
                        <script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
</html>






                                     
                                            