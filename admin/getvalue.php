<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="tcal.css" />
	<script type="text/javascript" src="tcal.js"></script> 
<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<script type="text/javascript" src="assets/js/script.js" ></script>

		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" type="text/css" href="stylesheets/jquery.validate.css" />
                <link rel="stylesheet" type="text/css" href="stylesheets/style.css" />

</head>
    <script src="../Hema_demo/js/jquery.min.js"></script>
			<script src="../Hema_demo/js/jquery.dropotron.min.js"></script>
			<script src="../Hema_demo/js/jquery.scrollgress.min.js"></script>
			<script src="../Hema_demo/js/skel.min.js"></script>
			<script src="../Hema_demo/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../Hema_demo/js/main.js"></script>
<!-- start gallery header -->
<link rel="stylesheet" type="text/css" href="../Hema_demo/folio-gallery.css" />
<script type="text/javascript" src="../Hema_demo/js/jquery-1.9.1.min.js"></script>

<link rel="stylesheet" type="text/css" href="../Hema_demo/colorbox/colorbox.css" />
<!--<link rel="stylesheet" type="text/css" href="fancybox/fancybox.css" />-->
<script type="text/javascript" src="../Hema_demo/colorbox/jquery.colorbox-min.js"></script>
<!--<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.1.min.js"></script>-->
<script type="text/javascript">
            </script>
<?php
$q="";
$q = $_GET['q'];
//echo $q;
//echo "q value:".$q;

?>
<form action="getvalue.php" method="POST" enctype="multipart/form-data">
<select id="delevent" name="eventname" onchange="">
<?php
mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("dcsa") or die("Cannot connect to database");
$query="select * from eventcalendar where eventDate='$q'";
$res=mysql_query($query);
while ($row=mysql_fetch_array($res))
{
    echo "<option value='".$row['Title']."'>".$row['Title']."</option>";
}
?>
</select>
<br/>
<input type="text" name="edit1" id="finame" placeholder="Edit the name" required/><br>
<input type="submit" value="Edit Album"/>
</form>


</html>
<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
 $namez =mysql_real_escape_string($_POST['eventname']);
$edit2=mysql_real_escape_string($_POST['edit1']);
 echo "selected values:".$namez;
echo "edited  values:".$edit2;
 mysql_query("Update eventcalendar SET Title='$edit2' WHERE Title='$namez'");
        alert("updated successfully");
}
?>