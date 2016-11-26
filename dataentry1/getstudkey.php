<?php
if(isset($_GET['q']))
{
   $batch=$_GET['q'];
   //echo "batch=".$batch;
   mysql_connect("localhost", "root", "") or die(mysql_error());
   mysql_select_db("dcsa") or die("cannot connect database");
   $sql="select * from mas_students";
   $res=mysql_query($sql);
   $exists=mysql_num_rows($res);
   if($exists>0)
   {
	   echo '<select name="userid"><option>select student key</option>';
	   while($row=mysql_fetch_array($res))
	   {
		  $trollno=$row['Student_Key'];
		  if(strcmp(substr($trollno,0,(strlen($trollno)-3)),$batch)==0)
		  {  
	   
	         echo "<option>".$row['Student_Key']."</option>";
		
          }	   
       }
	   echo '</select>';
   }
}
?>
