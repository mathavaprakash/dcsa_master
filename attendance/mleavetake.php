<?php
if($_SERVER['REQUEST_METHOD']=="POST")
{
   if(isset($_POST['ADD']))
   {
	   //echo "enter into post method";
	   include "../assets/db/dbdcsa.php";
	   $tdate=mysql_real_escape_string($_POST['date']);
	   $trollno=mysql_real_escape_string($_POST['rollno']);
	   $tname=mysql_real_escape_string($_POST['stud_name']);
	   $tsem=mysql_real_escape_string($_POST['sem']);
	   //echo $tdate."  ".$trollno."   ".$tsem;
	   $res=mysql_query("select * from stud_attend where rollno='$trollno' && sem='$tsem'");
	   if(mysql_num_rows($res)>0)
	   {
		   $datearr=$toverall="";
		   while($t=mysql_fetch_array($res))
		   {
			   $datearr.=$t['date'];
			   $toverall.=$t['overall'];
		   }
		   $datearray=explode('|',$datearr);
		   $overallarray=explode('|',$toverall);
		   //print_r ($datearray);
		   $reach=0;
		   for($i=0;$i<count($datearray)-1;$i++)
		   {
			   //echo $datearray[$i]."==".$tdate;
			   if($datearray[$i]==$tdate)
			   {
				   
				   
				   $reach=1;
				   if($overallarray[$i]==0)
				   {
					   $reach1=0;
					   $res1=mysql_query("select * from mleave where Student_Key='$trollno' && sem='$tsem'");
					   if(mysql_num_rows($res1)>0)
					   {
						   $t=mysql_fetch_assoc($res);
						   $datearray=explode('|',$t['date']);
						   for($i=0;$i<count($datearray)-1;$i++)
						   {
							   
							   if($tdate==$datearray[$i])
							   {
								   $reach1=1;
								   break;
							   }
						   }
							if($reach1==1)
							{
								echo '<script>alert("date alredy inserted");</script>';
								//echo '<script>window.location.assign("../attendance/mleave.php");</script>';
							}
							else
							{
								$datereach=0;
								$tabledate="";
								for($j=0;$j<count($datearray)-1;$j++)
								{
									if($datearray[$j]>$tdate && $datereach==0)
									{
										$tabledate.=$tdate;
									    $datereach=1;
									}
									$tabledate.=$datearray[$j]."|";
								}
								if($datereach==0)
								{
									$tabledate.=$tdate."|";
								}
								echo $tabledate;
								$query1="update mleave set date='$tabledate' where Student_Key='$trollno' && sem='$tsem'";
								if(mysql_query($query1))
								{
									echo '<script>alert("Leave date Inserted");</script>';
									//echo '<script>window.location.assign("../attendance/mleave.php");</script>';
								}
								else
								{
									echo '<script>alert("Leave date not Inserted");</script>';
									//echo '<script>window.location.assign("../attendance/mleave.php");</script>';
								}
							}
					   }
					   else
					   {
						   $ttdate=$tdate."|";
						   echo $ttdate;
						    $query1="insert into mleave (Student_Key,sem,date) values($trollno,$tsem,$tdate)";
						    if(mysql_query($query1))
						    {
							     echo '<script>alert("Leave date Inserted");</script>';
								 //echo '<script>window.location.assign("../attendance/mleave.php");</script>';
							}
							else
							{
									echo '<script>alert("Leave date not Inserted");</script>';
									//echo '<script>window.location.assign("../attendance/mleave.php");</script>';
							}
					   }
					   
				   }
				   else
				   {
					   echo '<script>alert("present on the date");</script>';
					   //echo '<script>window.location.assign("../attendance/mleave.php");</script>';
					   break;
				   }
				   
			   }
		   }
		   if($reach==0)
		   {
				echo '<script>alert("No Attendance data on the date");</script>';
				//echo '<script>window.location.assign("../attendance/mleave.php");</script>';
		   }
		   
	   }
	   else
		{
			echo '<script>alert("No Student Data");</script>';
			//echo '<script>window.location.assign("../attendance/mleave.php");</script>';
		}	   
   } 
 }
?>