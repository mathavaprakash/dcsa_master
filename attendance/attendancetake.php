<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
<header id="header">
					<h1><a href="../attendance/attendancehome.php">Back</a></h1>
					<nav id="nav">
				     <ul><li><a href="../logout.php" class="button">Log out</a></li></ul>
					</nav>
					
</header>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Attendance</title>
<script src="../javascripts/jquery.min.js" type="text/javascript"></script>
<script src="../lib/jquery/jquery-1.3.2.js" type="text/javascript"></script>
<script src="../javascripts/attendance.js" type="text/javascript"></script>
<script src="../javascripts/jquery.validate.js" type="text/javascript"> </script>
<script src="../javascripts/jquery.validation.functions.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#hide").click(function(){
        $("p").hide();
    });
    $("#show").click(function(){
        $("p").show();
    });
});
</script>
</head>
<title> Document Title </title>
<body>
<br/><br/><br/>
<form action="" method="post">
<?php
//if(isset($_POST['submit1']))
//if(isset($_GET['date']))
if(true)
{
	session_start();
	include_once '../assets/db/dbdcsa.php';
	$tdate=encryptor('decrypt',$_SESSION['date']);
	$tclass=encryptor('decrypt',$_SESSION['class']);
    $tbatch=encryptor('decrypt',$_SESSION['batch']);
	$tsem=encryptor('decrypt',$_SESSION['sem']);
	$torder=encryptor('decrypt',$_SESSION['order']);
	?>
    <table class="alt">
    <tr>
    <td><label for="batch1">batch</label><input type="text" name="batch1"  readonly="readonly"  value="<?php echo $tbatch;?>"/></td>
    <td><label for="date1">date</label><input type="text" name="date1" readonly="readonly"   value="<?php echo $tdate;?>"/></td>
    <td><label for="sem1">semester</label><input type="text" name="semester1" readonly="readonly"   value="<?php echo $tsem;?>"/></td>
	<td><label for="order1">semester</label><input type="text" name="order1" readonly="readonly"   value="<?php echo $torder;?>"/></td>
    </tr>
    </table>
	 <!--<div class="row uniform 100%"><div class="6u 12u(narrower)"> <input type="button" name="hide subjects" id="hide" value="Hide subjects"/></div>
     <div class="6u 12u(narrower)"><input type="button" name="show subjects" id="show" value="show subjects"/></div></div>-->
	 
  <div class="row">
  <div class="12u">
  <section class="cta">
  <div class="table-wrapper">
     
	<table class="alt"  style="width:100%;">
	<tr><th><br/><br/>ROLLNO</th><th><br/><br/>NAME</th>
     <div class="row">
				  <div class="12u">
					<div class="row uniform 50%">
						<div class="6u 12u(narrower)">
	<?php
	$res1=mysql_query("select * from timetable where Batch='$tbatch' and sem='$tsem' and day='$torder'");
	if(mysql_num_rows($res1)>0)
	{
		$row=mysql_fetch_array($res1);
		$sub=array(6);
		$sub[0]=mysql_real_escape_string($row['1']);
		$sub[1]=mysql_real_escape_string($row['2']);
		$sub[2]=mysql_real_escape_string($row['3']);
		$sub[3]=mysql_real_escape_string($row['4']);
		$sub[4]=mysql_real_escape_string($row['5']);
		$sub[5]=mysql_real_escape_string($row['6']);
		
	for($i=0;$i<6;$i++)
	{
		
	   echo '<th>';
	   //echo $temp;
	   //$temp=$temp+$i;
	   //echo "<br>".$temp;
	   //ech o date("Y-M-d H:i",strtotime($temp));
	   //echo date("d",strtotime($tdate));
	   //echo "<br/>";
	   //echo date("D",strtotime($tdate));
	   //echo '<input type="checkbox" id="hours'.$i.'" class="$i" onclick="selectall()">
	   echo 'hour'.(($i)+1);
	   echo '
	    <div class="row uniform 50%">
	    <div class="6u 12u(narrower)">
		             
					<input type="checkbox" id="hours'.$i.'" name="hours';echo ($i)+1; echo'">
					<label for="hours'.$i.'"></label>
					
		</div></div>
		<br/>
					
					
					<input type="text" name="subject'.$i.'" value="'.$sub[$i].'" readonly="readonly"></input>
		';
	   echo '</th>';
	   
	}
	echo '<th>overall
	  <div class="row uniform 50%">
	    <div class="6u 12u(narrower)">
					<input type="checkbox" id="hoursoverall" name="hoursoverall">
					<label for="hoursoverall"></label>
		</div></div>
	 </th>
	</tr>';
	$sql=mysql_query("select * from mas_students");
    $count=mysql_num_rows($sql);
	if($count>0)
	{
			while($t=mysql_fetch_array($sql))
		    {
			$trollno=$t['Student_Key'];
			$tname=$t['First_Name'];
			$tname.=$t['Last_Name'];
			$active=$t['IsActive'];
			//$tno=substr($trollno,0,5);
			//echo " reg=".$tno."mine=".$tselectyear;
			if((strcmp(substr($trollno,0,(strlen($trollno)-3)),$tbatch)==0)and($active==1))
			{
				echo '<tr><td>'.$trollno.'</td>';
				echo '<td>'.$tname.'</td>';
				for($i=0;$i<6;$i++)
				{ 
					?>
					<td>
					<div class="row uniform 50%">
					<div class="6u 12u(narrower)">
					<input type="hidden" name="<?php echo $trollno.'['.$i.']'; ?>" class="thours<?php echo $i;?>" value="0">
					<input type="checkbox" id="<?php echo $trollno.'['.$i.']'; ?>" class="thours<?php echo $i;?>"  name="<?php echo $trollno.'['.$i.']'; ?>" value="1"/>
					<label for="<?php echo $trollno.'['.$i.']'; ?>"></label>
					
					</div></div>
					</td> 
					<?php 		
					//<input type="hidden" name="<?php echo $tname.'['.$i.']';" value="0"/>
				}
				?>
				<td><div class="row uniform 50%">
					 <div class="6u 12u(narrower)">
					<input type="hidden" name="<?php echo $trollno."overall"; ?>" class="thoursoverall" value="0">
					<input type="checkbox" id="<?php echo $trollno."overall"; ?>" class="thoursoverall"  name="<?php echo $trollno."overall"; ?>" value="1">
					<label for="<?php echo $trollno."overall"; ?>"></label>
					</div></div>
					</td> 
			    </tr>
            <?php				
			}
		}
		
	}
	}
?>
</div>
				 	</div>									
				  </div>
                </div>

	</table>
    <!--<label name="batch2" value="<?php //echo $tselectyear;?>"><?php //echo $tselectyear;?></label>-->
    <div class="row uniform 100%"><div class="6u 12u(narrower)"> <input type="submit" name="add" value="add"/></div>
     <div class="6u 12u(narrower)"><input type="submit" name="cancel" value="cancel"/></div></div>
    </div>
    </section>
    </div>
	</div>
<?php 

}
?>
</form>
</body>

<?php 
if(isset($_POST['add']))
{
	include_once "../assets/db/dbdcsa.php";
	$tclass=mysql_real_escape_string($_POST['batch1']);
	$tdate=mysql_real_escape_string($_POST['date1']);
	$tsem=mysql_real_escape_string($_POST['semester1']);
	$torder=mysql_real_escape_string($_POST['order1']);
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
	if(mysql_num_rows($sql1)!=0)
	{
    while($t=mysql_fetch_array($sql1))
	{
		$trollno=$t['Student_Key'];
		$active=$t['IsActive'];
		if((strcmp(substr($trollno,0,(strlen($trollno)-3)),$tclass)==0) and ($active==1))
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
			 //echo $trollno."=".$toverall;
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
				if($datearray[$j]>$tdate && $reach==0)
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
					$tstrdate.=$datearray[$j]."|";
					$tstrsubject.=$subjectarray[$j]."||";
					$tstrval.=$valuearray[$j]."||";;
					$tstrall.=$overallarray[$j]."|";
				    //echo "after".$tstrdate."==".$tstrsubject."==".$tstrval."<br/>";
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
		//echo $tname."   ".$str;
      }
	   print '<script>alert("Insert successfully");</script>';
       print '<script>window.location.assign("../attendance/attendancehome.php");</script>';
   }
   
}
if(isset($_POST['cancel']))
{
	print '<script>window.location.assign("../attendance/attendancehome.php");</script>';
}
?>
<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
						<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
						<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; GRI-DCSA. All rights reserved.</li>
					</ul>
				</footer>
</html>
