<?php

$x="";
$x = $_GET['x'];
//echo $q;
//echo "x value:".$x;
$myArray=explode('|',$x);
$dirpath="";
$dirthum="";
$folder=$myArray[1];
$image=$myArray[0].'.jpg';
//echo "folder value:".$myArray[1];
//echo "image value:".$myArray[0];
$dirpath='albums/'.$folder.'/'.$image;
$dirthum='albums/'.$folder.'/'.'/thumbs/'.$image;
$return = unlink($dirpath);
$ret=unlink($dirthum);
            if($return)
                {
                    if($ret)
                    {
                    echo "Deleted successfully";
                    }
                
mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("dcsa") or die("Cannot connect to database");
$res=mysql_query("select * from folder where folder='$myArray[1]'");
$temp[]=array (100);
while($row=mysql_fetch_array($res))
{
    $mystr=$row['img'];
    //echo "mystr value:".$mystr;
	$myArray1 = explode(',', $mystr);
	for($j=0;$j<count($myArray1);$j++)
	{
       // echo "<option value='".$myArray[$j]."'>".$myArray[$j]."</option>";
        if($myArray1[$j]!=$myArray[0])
        {
            $temp[$j]=$myArray1[$j];
            //echo "temp value:".$temp[$j];
            $test= implode(',',$temp);
        }

	}
        
}
//echo "test value:".$test;
mysql_query("UPDATE `folder` SET `img`='$test' WHERE folder='$myArray[1]'");
print '<script>alert("Deleted successfully");</script>';
}
 else{
     print '<script>alert("Please try again!");</script>';
          //echo "Deleted Failed";
     }
?>
