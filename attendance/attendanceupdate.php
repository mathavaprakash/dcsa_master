<?php
if(isset($_POST['update']))
{
	include '../assets/db/dbdcsa.php';
	$tclass=mysql_real_escape_string($_POST['batch1']);
	$tdate=mysql_real_escape_string($_POST['date1']);
	$tsem=mysql_real_escape_string($_POST['semester1']);
	$tsub0=mysql_real_escape_string($_POST['subject0']);
	$sql=mysql_query("select * from study_group where short_sub='$tsub0'");
	$res=mysql_fetch_assoc($sql);
	$ssub0=$res['Group_ID'];
	$tsub1=mysql_real_escape_string($_POST['subject1']);
	$sql=mysql_query("select * from study_group where short_sub='$tsub1'");
	$res=mysql_fetch_assoc($sql);
	$ssub1=$res['Group_ID'];
	$tsub2=mysql_real_escape_string($_POST['subject2']);
	$sql=mysql_query("select Group_ID from study_group where short_sub='$tsub2'");
	$res=mysql_fetch_assoc($sql);
	$ssub2=$res['Group_ID'];
	$tsub3=mysql_real_escape_string($_POST['subject3']);
	$sql=mysql_query("select Group_ID from study_group where short_sub='$tsub3'");
	$res=mysql_fetch_assoc($sql);
	$ssub3=$res['Group_ID'];
	$tsub4=mysql_real_escape_string($_POST['subject4']);
	$sql=mysql_query("select Group_ID from study_group where short_sub='$tsub4'");
	$res=mysql_fetch_assoc($sql);
	$ssub4=$res['Group_ID'];
	$tsub5=mysql_real_escape_string($_POST['subject5']);
	$sql=mysql_query("select Group_ID from study_group where short_sub='$tsub5'");
	$res=mysql_fetch_assoc($sql);
	$ssub5=$res['Group_ID'];
	
	$tcourse="";
	//$tcourse="|".$sub1."|";
	$tcourse=$ssub0."|".$ssub1."|".$ssub2."|".$ssub3."|".$ssub4."|".$ssub5."||";
	
	$tmonth=date('M',strtotime($tdate));
	$sql1=mysql_query("select * from mas_students");
	if(mysql_num_rows($sql1)>0)
	{
    while($t=mysql_fetch_array($sql1))
	{
		$trollno=$t['Student_Key'];
		$active=$t['IsActive'];
		if((strcmp(substr($trollno,0,(strlen($trollno)-3)),$tclass)==0)and($active==1))
		{
			$tname="";
			$tname=$t['First_Name'];  			 
		    $tname.=$t['Last_Name'];
		     $str="";
             foreach($_POST[$trollno] as $selected)            
		 	    $str.=$selected."|";
			$str.="|";
			$overall=$trollno."overall";
			$toverall="";
		    $toverall=mysql_real_escape_string($_POST[$overall]);
			$toverall.="|";
			$tdate1=$tdate."|";
	 $res1=mysql_query("select * from stud_attend where rollno='$trollno' and batch='$tclass' and sem='$tsem' and month='$tmonth'");  			 
	 if(mysql_num_rows($res1)==0)
	 {
	  $sql2="insert into stud_attend (rollno,name,batch,sem,month,date,subjects,dayvalue,overall) values('$trollno','$tname','$tclass','$tsem','$tmonth','$tdate1','$tcourse','$str','$toverall')";
	  if(mysql_query($sql2))
	  {
		 //print '<script>alert("'.$trollno.'Insert successfully");</script>';				  
	  }
	  else
	  {
		  print '<script>alert("Insert error");</script>';
	  }
	 }
	else
	{
	 $t1=mysql_fetch_array($res1);
	 $datearray=explode('|',$t1['date']);
	 $subjectarray=explode("||",$t1['subjects']);
	 $valuearray=explode("||",$t1['dayvalue']);
	 $overallarray=explode('|',$t1['overall']);
	 /*echo $t1['date'];
	 echo $t1['subjects'];
	 echo $t1['dayvalue'];
	 echo $datearray[0];
	 echo $subjectarray[0];
	 echo $valuearray[0];*/
	 $reach=0;
	 $tstrdate="";
	 $tstrsubject="";
	 $tstrval="";
	 $tstrall="";
	 //echo "count=".count($datearray)."  ";
	 for($j=0;$j<count($datearray)-1;$j++)
	 {
		 //echo "inside for";
		 //echo $datearray[$j]."   ".$tdate;
		if($datearray[$j]==$tdate && $reach==0)
		{
			//echo "inside if";
			//echo $tdate."==".$tcourse."==".$str;
			$tstrdate.=$tdate."|";
			$tstrsubject.=$tcourse;
			$tstrval.=$str;
			$tstrall.=$toverall;
			//echo "before".$tstrdate."==".$tstrsubject."==".$tstrval."<br/>";
			$reach=1;
		
		}
        else
		{			
		    $tstrdate.=$datearray[$j]."|";
			$tstrsubject.=$subjectarray[$j]."||";
			$tstrval.=$valuearray[$j]."||";;
			$tstrall.=$overallarray[$j]."|";
			//echo "after".$tstrdate."==".$tstrsubject."==".$tstrval."<br/>";
		}
	 }
	 if($reach==0)
	{
		$tstrdate.=$tdate."|";
		$tstrsubject.=$tcourse;
		$tstrval.=$str;
		$tstrall.=$toverall;
	}
	//echo $tdate." 2=".$tcourse." 3=".$str;
	//echo $tstrdate."  ".$tstrsubject."  ".$tstrval;
	$sql3="update stud_attend set date='$tstrdate',dayvalue='$tstrval',subjects='$tstrsubject',overall='$tstrall' where rollno='$trollno' and batch='$tclass' and sem='$tsem' and month='$tmonth'";
	
	if(mysql_query($sql3))
	{
		//print '<script>alert("'.$trollno.'update successfully");</script>';
	}
	else
	{
		
		print '<script>alert("update error")</script>';
	}
	}
		}
	}
    print '<script>alert("update successfully");</script>';
    //print '<script>window.location.assign("../attendance/attendanceview.php");</script>';	
 }
}
if(isset($_POST['delete']))
{
	$tclass=mysql_real_escape_string($_POST['batch1']);
	$tdate=mysql_real_escape_string($_POST['date1']);
	$tsem=mysql_real_escape_string($_POST['semester1']);
	$tmonth=date('M',strtotime($tdate));
	include '../assets/db/dbdcsa.php';
	$sql1=mysql_query("select * from mas_students");
	if(mysql_num_rows($sql1)>0)
	{
    while($t=mysql_fetch_array($sql1))
	{
		$trollno=$t['Student_Key'];
		$active=$t['IsActive'];
		if((strcmp(substr($trollno,0,(strlen($trollno)-3)),$tclass)==0)and($active==1))
		{
			
	    $res1=mysql_query("select * from stud_attend where rollno='$trollno' and batch='$tclass' and sem='$tsem' and month='$tmonth'");  			 
	    if(mysql_num_rows($res1)>0)
	    {
			 $t1=mysql_fetch_array($res1);
			 $datearray=explode('|',$t1['date']);
			 $subjectarray=explode("||",$t1['subjects']);
			 $valuearray=explode("||",$t1['dayvalue']);
			 $overallarray=explode('|',$t1['overall']);
			 /*echo $t1['date'];
			 echo $t1['subjects'];
			 echo $t1['dayvalue'];
			 echo $datearray[0];
			 echo $subjectarray[0];
			 echo $valuearray[0];*/
			 $reach=0;
			 $tstrdate="";
			 $tstrsubject="";
			 $tstrval="";
			 $tstrall="";
			 //echo "count=".count($datearray)."  ";
			 for($j=0;$j<count($datearray)-1;$j++)
			 {
		       if($datearray[$j]!=$tdate)
		       {	
				$tstrdate.=$datearray[$j]."|";
				$tstrsubject.=$subjectarray[$j]."||";
				$tstrval.=$valuearray[$j]."||";;
				$tstrall.=$overallarray[$j]."|";
		       }
	         }
			$sql3="update stud_attend set date='$tstrdate',dayvalue='$tstrval',subjects='$tstrsubject',overall='$tstrall' where rollno='$trollno' and batch='$tclass' and sem='$tsem' and month='$tmonth'";
			if(mysql_query($sql3))
			{
				//print '<script>alert("'.$trollno.'update successfully");</script>';
			}
			else
			{
				
				print '<script>alert("update error")</script>';
			}
        }
		}
	}
	print '<script>alert("deleted successfully");</script>';
	 print '<script>window.location.assign("../attendance/attendanceview.php");</script>';
	}
}
?>