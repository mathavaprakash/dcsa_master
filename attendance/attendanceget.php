<?php
if($_SESSION['tbatch'])
{
	$tbatch=$_SESSION['tbatch'];
    $tsem=$_SESSION['tsem'];
    include '../dbdcsa.php';
	$sql="select * form stud_attend1 where batch='$tbatch' and sem='$tsem'");
	$res=mysql_query($sql);
	if(mysql_num_rows($res)>0)
	{
		$t1=mysql_fetch_array($res);
		$trollno=$t1['rollno'];
		$tname=$t1['name'];
		$datearray=explode('|',$t1['date']);
		$sarray=explode("||",$t1['subjects']);
		$varray=explode("||",$t1['dayvalue']);
		$overallarray=explode('|',$t1['overall']);
		$subjects=explode('|',$sarray);
	    $dayvalue=explode('|',$varray);
    ?>
		  <div class="row">
  <div class="12u">
  <section class="cta">
  <div class="table-wrapper">
     
	<table class="alt"  style="width:100%;">
	<tr align="centre"><th style="width:10px">ROLLNO</th><th style="width:20px">NAME</th>
     <div class="row">
		<div class="12u">
		<div class="row uniform 50%">
		<div class="6u 12u(narrower)">
	
	   <th style="width:200px">';
	   <?php echo 'hour'.(($i)+1); ?>
	   
	    <div class="row uniform 50%">
	    <div class="6u 12u(narrower)">
					<input type="checkbox" id="hours'.$i.'" name="hours';echo ($i)+1; echo'">
					<label for="hours'.$i.'"></label>
		</div></div>
		<br/>
					<!--<div id="staffid"><select name="staff'.$i.'" onfocus="getstaff('.$tclass.')" ><option>select staff</option></select></div>
					<div id="subjectid"><select name="subject'.$i.'"><option>select subject</option></select></div>-->
					
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
		
			//echo "rollno".$trollno;
			//echo "name".$tname;
			//if(strcmp(strtr($qid,0,  (strlen($qid)-2)),$test_id ))
			//if(strcmp(strtr($trollno,0, (strlen($trollno)-2)),$tclass))
			/*$ty1=strtotime('Y',$tdate);
		    $ty2=strtotime('Y',$tyear-07-01);
			$tm1=strtotime('m',$tdate);
			$tm2=strtotime('m',$tyear-07-01);
			$diff=((($ty2-$ty1)*12)+($tm2-$tm1));
			echo "months=".$diff;*/
			$today=date("Y-m-d");
			$startyear=date("Y");
			$startyear=date("Y-07-01");
			//echo $today." start=".$startyear;
			$temp="";
			if($today>$startyear)
			{
			   $temp=date('y',strtotime($today));
		    }
            else
			{
               $temp=date('y',strtotime($today));
               $temp=$temp-1;			   
			}
			if($tclass=="MCA 1st_year")
			{
				$tselectyear=$temp."322";
			}
			else if($tclass=="MCA 2nd_year")
			{
				$tselectyear=((int)$temp-1);
				$tselectyear.="322";
			}
			else if($tclass=="MCA 3rd_year")
			{
				$tselectyear=((int)$temp-2);
				$tselectyear.="322";
			}
			else if($tclass=="MSc.it 1st_year")
			{
				$tselectyear=$temp."321";
			}
			else
            {				
				$tselectyear=((int)$temp-1);
			    $tselectyear.="321";
			}
			while($t=mysql_fetch_array($sql))
		    {
			$trollno=$t['Student_Key'];
			$tname=$t['First_Name'];
			$tname.=$t['Last_Name'];
			//$tno=substr($trollno,0,5);
			//echo " reg=".$tno."mine=".$tselectyear;
			if(strcmp(substr($trollno,0, (strlen($trollno)-3)),$tselectyear)==0)
			{
				echo '<tr><td>'.$trollno.'</td>';
				echo '<td>'.$tname.'</td>';
				for($i=0;$i<6;$i++)
				{ 
					?>
					 <td>
					 <div class="row uniform 50%">
					 <div class="6u 12u(narrower)">
					<input type="hidden" name="<?php echo $trollno.'['.$i.']'; ?>" value="0">
					<input type="checkbox" id="<?php echo $trollno.'['.$i.']'; ?>" class="thours<?php echo $i;?>"  name="<?php echo $trollno.'['.$i.']'; ?>" value="1">
					<label for="<?php echo $trollno.'['.$i.']'; ?>"></label>
					</div></div>
					</td> 
					<?php 		
					//<input type="hidden" name="<?php echo $tname.'['.$i.']';" value="0"/>
				}
				?>
				<td><div class="row uniform 50%">
					 <div class="6u 12u(narrower)">
					<input type="hidden" name="<?php echo $trollno."overall"; ?>" value="0">
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

	</table>';
	}
}