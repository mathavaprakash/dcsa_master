<?php 
  if(isset($_POST['add']))
  {
	mysql_connect("localhost","root","")or die(mysql_error());
    mysql_select_db("dcsa")or die("cannot connet database");
	session_start();
	$tdate=$_SESSION['tdate1'];
	$tclass=$_SESSION['tclass1'];
	$tsem=$_SESSION['tsem1'];
	$tcourse=$_SESSION['tcourse1'];
    $res1=mysql_query("select * from stud_attend where batch='$tclass' and sem='$tsem' and subject='$tcourse'");  			 
    while($t1=mysql_fetch_array($res1))
    {
        $trollno=$t1['rollno'];
        $tname=$t1['name'];
	    if(!empty($_POST[$trollno]))
	    {
		   $str="";
		   $tstrdate="";
		   $today="";
		   $tstrval="";
           foreach($_POST[$trollno] as $selected)            
		   {
		       $str.=$selected."|";
			   $today.=$tdate."|";
		   }
		   echo $str;
		   echo $today;
		   $datearray=explode('|',$t1['date']);
		   $valarray=explode('|',$t1['dayval']);
		   $h=0;
		   for($j=0;$j<count($datearray)-1;$j++)
		   {
			    
		       if($datearray[$j]==$tdate)
		       {
				   if($h==0)
				   {
		            $h++;
		            $tstrdate.=$today;
                    $tstrval.=$str;
				   }
               }
			   else
			   {
               $tstrdate.=$datearray[$j]."|";
               $tstrval.=$valarray[$j]."|";
			   }
           }
      $sql2="update stud_attend set date='$tstrdate', dayval='$tstrval' where rollno='$trollno' and batch='$tclass' and sem='$tsem' and subject='$tcourse'";
      if(mysql_query($sql2))
      {
		  //print '<script>alert("$tstrdate");</script>';
		  //print '<script>alert("Update successfully");</script>'; 
	  }
      else
	  {
		 // $sql2="insert into stud_attend (rollno,name,batch,sem,subject,date,dayval) values('$trollno','$tname','$tclass','$tsem','$tcourse','$tstrdate','$str')";
		  //mysql_query(sql2);
	  }
      //echo $tname."=".$str." date=".$tstrdate."<br />";
      }
      }
    $tstrdate="";
	print '<script>alert("Update successfully");</script>';   
	print '<script>window.location.assign("attendanceedit.php");</script>';
	
   }
   else
   {
	  header("location:index.html");
   }
   if(isset($_POST['cancel']))
   {
	   print '<script>window.location.assign("attendance.php");</script>';
   }
?>