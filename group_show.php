<html>
	<head>
		<title>Staff</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
         <?php          
                    session_start();
                
                    if($_SESSION['regno']){
                    }
                    else
                    {
                        header("location:index.html");
                    }
                    $user_id=  $_SESSION['regno'];   
                    $_SESSION['regno']=$user_id;
                    //$encrp=$_SESSION['encr'];  
                    mysql_connect("localhost", "root", "") or die(mysql_error());
                    mysql_select_db("dcsa") or die("cannot connect database");
                    $query=  mysql_query("select * from mas_staff");
                    $exist=  mysql_num_rows($query);
                    $temp="0";
                    $table_fname="";
                    if($exist>0)
                    {
                        while($row=  mysql_fetch_assoc($query))
                        {
                            $table_userid=$row['Staff_Key'];
                            if($user_id==$table_userid)
                            {
                                $temp=1;
                                $table_fname=$row['First_Name'];
								 //$table_batch=$row['Year_Of_Joining'].$row['Course'];
                               
                                break;
                            }
                        }
                        if($temp==0)
                        {
                             header("location:index.html");
                        }
                    }
                ?>
                </head>
        <body>
		<div id="page-wrapper" >

			<!-- Header -->
				<header id="header">
					<h1><a href="index.html">Home</a></h1>
			  <nav id="nav">
						<ul>
							
							<li>
								<a href="#" class="icon fa-angle-down"> <?php print "$table_fname"; ?> </a>
								<ul>
									<li><a href="#">Profile</a></li>
									<li><a href="#">Study Groups</a></li>
									<li><a href="#">My Lectures</a></li>
								</ul>
							</li>
                                                        <li><a href="logout.php" class="button">Log out</a></li>
						</ul>
					</nav>
				</header>
                </div>
                </body>
<?php
session_start();
//	$user_id=1000;
$bool=true;
mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("dcsa") or die("Cannot connect to database"); 
$gid=mysql_query("select Group_ID,Batch from Study_group where Staff_Key=$user_id");
   $exists=  mysql_num_rows($gid);
   if($exists>0){
		while($id=mysql_fetch_assoc($gid)){
	$gid1= $id['Group_ID'];
	$batch=$id['Batch'];
	
	/*$query1="select Group_ID from Study_group where batch='$batch'";
$gid=mysql_query($query1);
$id=mysql_fetch_array($gid);
$gid1= $id['Group_ID'];*/

	
	$query = "SELECT * FROM stf_assignments where Staff_Key=$user_id and Group_ID=$gid1"; 
	$query1 = "SELECT * FROM stf_lectures where Lecture_Key=$user_id and Group_ID=$gid1";
	$result = mysql_query($query);
	$ex1=mysql_num_rows($result);
	$result1 = mysql_query($query1);
	$ex2=mysql_num_rows($result1);
	$bool=true;
	echo '<form method="get"><ul type="circle">'.$batch.'<br><br>'; 
				if($ex1>0)   {echo "Assignments";
				while($row1 = mysql_fetch_assoc($result)){ 
											$akey=$row1['Assignment_Key'];
											echo '<li><a href="assignment_submit.php?akey='.$akey.'">'.$row1['Assignment_Name'] .'</a></li> ';
				}}
				if($ex2>0){ echo '<br>'."Lectures".'<br>';
				while($row2 = mysql_fetch_assoc($result1)){ 
											$path=$row2['Lecture_Path'];
											echo ' <a href="' .$path.'" >view file </a>';   
											}
				}
			echo '</ul>';
			}
}
?>
<?php 
include('bottom.php');
?>
