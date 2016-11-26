<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>

</title>
<link rel="stylesheet" href="css/main.css" />
				<link rel="stylesheet" type="text/css" href="stylesheets/jquery.validate.css" />
                <link rel="stylesheet" type="text/css" href="stylesheets/style.css" />
                <script src="lib/jquery/jquery-1.3.2.js" type="text/javascript">
                </script>
                <script src="javascripts/jquery.validate.js" type="text/javascript">
                </script>
                <script src="javascripts/jquery.validation.functions.js" type="text/javascript"></script>
                <script type="text/javascript">
            /* <![CDATA[ */
</script>
<script type="text/javascript">
            </script>
</head>
<body>
<?php
$q="";
$q = $_GET['q'];
//echo $q;
//echo "Entered Date:".$q;

?>
<form action="eventform2.php" method="POST" enctype="multipart/form-data">
<div class="row uniform 50%">
<div class="12u 12u(mobilep)">
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
</div>
</div>
<div class="row uniform 50%">
<div class="12u 12u(mobilep)">

<input type="submit" value="Delete Event"/>
</div>
</div>
</form>
</body>

</html>
