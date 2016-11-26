<html>
	<head>
		<title>Department of Computer Science and Applications</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<link rel="icon" type="image/png" href="../images/logo.png" />
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
								<a href="#" class="icon fa-angle-down"><?php print "$table_fname"; ?></a>
								<ul>
									<li><a href="#">Profile</a></li>
									<li><a href="#">Study Groups</a></li>
									<li><a href="#">My Lectures</a></li>
                                                                        <li><a href="#">Student Assignments</a></li>
									
								</ul>
							</li>
                                                        <li><a href="logout.php" class="button">Log out</a></li>
						
						</ul>
					</nav>
				</header>
                </div>
            <?php
	
$bool=true;
mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("dcsa") or die("Cannot connect to database"); 
$query1="select Group_ID,Subject from Study_group where batch='2015MCA' and Staff_Key=$user_id";
$gid=mysql_query($query1);
$id=mysql_fetch_array($gid);
$gid1= $id['Group_ID'];
//$sub=$id['Subject'];
$sid=201601;
$query = "SELECT * FROM stf_assignments where Staff_Key='$user_id' and Group_ID='$sid'"; 
$result = mysql_query($query);
$bool=true;
while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results //action="uploadFile.php? sid='.$sid. ' & gid1='.$gid1.' "
echo '<div style="margin-top:4%;"> 	<form method="post"  enctype="multipart/form-data" >
                    <div class="row">
						<div class="12u">

							<!-- Table -->
								<section class="box"> <div class="table-wrapper">
										<table class="alt">
											<tbody>
												<tr>
													<td>'.$row['Assignment_Name'] .'</td> 
													<td>'.$row['Assignment_Desc'] .'</td> 
													<td> <input id="filefield" type="file" name="filefield" > </td> 
                                                    <td> <input type="submit" value="Upload" name="submit"> 
                                                                                                </tr>
											</tbody>
										</table>
								</section>

						</div>
					</div>
                                      </form><div>';
				
									$bool=true;
}
?>
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


		</div>
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>


</body>
</html>

              
<?php
	
$bool=true;
mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("dcsa") or die("Cannot connect to database"); 
$query1="select Group_ID,Subject from Study_group where batch='2015MCA' and Staff_Key=$user_id";
$gid=mysql_query($query1);
$id=mysql_fetch_array($gid);
$gid1= $id['Group_ID'];
//$sub=$id['Subject'];
$sid=201601;
$query = "SELECT * FROM stf_assignments where Staff_Key='$user_id' and Group_ID='$sid'"; 
$result = mysql_query($query);
$bool=true;
while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results //action="uploadFile.php? sid='.$sid. ' & gid1='.$gid1.' "
echo '<div style="margin-top:4%;"> 	<form method="post"  enctype="multipart/form-data" >
                    <div class="row">
						<div class="12u">

							<!-- Table -->
								<section class="box"> <div class="table-wrapper">
										<table class="alt">
											<tbody>
												<tr>
													<td>'.$row['Assignment_Name'] .'</td> 
													<td>'.$row['Assignment_Desc'] .'</td> 
													<td> <input id="filefield" type="file" name="filefield" > </td> 
                                                    <td> <input type="submit" value="Upload" name="submit"> 
                                                                                                </tr>
											</tbody>
										</table>
								</section>

						</div>
					</div>
                                      </form><div>';
				
									$bool=true;
}
?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
$file=$_FILES['filefield'];
$filename=$file['name'];
$upload_directory='uploads/';
$max_file_size = 104857600;
$ext_str = "docx,doc,ppt,pptx,pdf,zip";
$allowed_extensions=explode(',',$ext_str);
$ext = substr($filename, strrpos($filename, '.') + 1); //get file extension from last sub string from last . character
if (!in_array($ext, $allowed_extensions) ) {
echo "Only ".$ext_str." files allowed to upload"; // exit the script by warning
} 
if($file['size']>=$max_file_size){
echo "only the file less than ".$max_file_size."mb  allowed to upload"; // exit the script by warning
}
//$sid="15322006";
//$sid=$_GET['sid'];
//$gid=$_GET['gid1'];
$akey="302";

if(move_uploaded_file($file['tmp_name'],$upload_directory.$filename)){
mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("dcsa") or die("Cannot connect to database"); 
$path=$upload_directory.$filename;
mysql_query("INSERT INTO std_assignments(Assignment_key,Student_key,Std_Assignment_Path,Group_ID) VALUES ('$akey','$sid','$path','$gid1')");
echo"Your File Successfully Uploaded";
}
else{
echo "The file cant moved to target directory."; //file can't moved with unknown reasons likr cleaning of server temperory files cleaning
	}
}

?>

<?php 
//include('bottom.php');
?>