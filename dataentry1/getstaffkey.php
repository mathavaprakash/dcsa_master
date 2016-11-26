<?php
if(isset($_GET['q']))
{
   $name=$_GET['q'];
   mysql_connect("localhost", "root", "") or die(mysql_error());
   mysql_select_db("dcsa") or die("cannot connect database");
   $sql="select * from mas_staff where First_Name='$name'";
   $res=mysql_query($sql);
   $exists=mysql_num_rows($res);
   if($exists>0)
   {
	   $row=mysql_fetch_array($res);
	   echo '<input type="text" name="gkname" value="'.$row['Staff_Key'].'" readonly="readonly"/>';
   }	   
}
?>