<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
</head>
    <script type="text/javascript">

    </script>
    <script src="js/jquery.min.js"></script>
			<script src="js/jquery.dropotron.min.js"></script>
			<script src="js/jquery.scrollgress.min.js"></script>
			<script src="js/skel.min.js"></script>
			<script src="js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="js/main.js"></script>
<!-- start gallery header -->
<link rel="stylesheet" type="text/css" href="folio-gallery.css" />
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>

<link rel="stylesheet" type="text/css" href="colorbox/colorbox.css" />
<!--<link rel="stylesheet" type="text/css" href="fancybox/fancybox.css" />-->
<script type="text/javascript" src="colorbox/jquery.colorbox-min.js"></script>
<!--<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.1.min.js"></script>-->
<script type="text/javascript">
            </script>
<?php
$q="";
$q = $_GET['q'];
//echo $q;
//echo "q value:".$q;

mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("dcsa") or die("Cannot connect to database");
$res=mysql_query("select * from folder where folder='$q'");
?>
<select name=img id="deleteimg" onchange="delvalue(this.value,deleteCombo.value)">
    <?php
while($row=mysql_fetch_array($res))
{
    $mystr=$row['img'];
	$myArray = explode(',', $mystr);
	for($j=0;$j<count($myArray);$j++)
	{
        echo "<option value='".$myArray[$j]."'>".$myArray[$j]."</option>";

	}
}
    //echo "<option value='".$row[id]."'>".$row['img']."</option>";
?>
</select>

<form action="getimg_val.php" method="POST" enctype="multipart/form-data">
    
<!--<input type="submit" value="Delete Image" name="del" id="del"/>-->
</form>
    
</html>
