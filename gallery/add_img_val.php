<?php
$q="";
$q = $_GET['q'];
//echo $q;
//echo "q value:".$q;
?>
 <?php
 mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("dcsa") or die("Cannot connect to database");
$query="select * from folder";
     
    
    //echo "<option value='".$row[id]."'>".$row['img']."</option>";
?>