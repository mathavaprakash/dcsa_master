<!DOCTYPE HTML>
<html>
	<head>
		<title>Department of Computer Science & Applications</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" type="image/png" href="images/logo.png" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		
		<link rel="stylesheet" type="text/css" href="../stylesheets/jquery.validate.css" />
                <link rel="stylesheet" type="text/css" href="../stylesheets/style.css" />
                <script src="../lib/jquery/jquery-1.3.2.js" type="text/javascript">
                </script>
                <script src="../javascripts/jquery.validate.js" type="text/javascript">
                </script>
                <script src="../javascripts/jquery.validation.functions.js" type="text/javascript"></script>
                <script type="text/javascript">
            /* <![CDATA[ */
            jQuery(function(){
                jQuery("#class").validate({
                    expression: "if (VAL != '0') return true; else return false;",
                    message: "Please enter the Required field"
                });
                jQuery("#subject").validate({
                    expression:"if(VAL != '0') return true; else return false;",
                    message:"Please enter the Required field"
                });
                jQuery("#title").validate({
                    expression:"if(VAL) return true; else return false;",
                    message:"Please enter the Required field"
                });
                jQuery("#files").validate({
                    expression:"if((VAL) &&VAL) return true; else return false;",
                    message:"Please enter the Required field"
                });
				
            });
            </script>
		<?php            
                   session_start();
                include_once "../assets/db/dbdcsa.php";
                    if($_SESSION['encregno']){
                    }
                    else
                    {
                        header("location:../index.html");
                    }
                    //$user_id=  encryptor('decrypt',$_SESSION['encregno']);
                    //$test_id=$_GET['id'];
                    $user_id=  $_SESSION['regno'];
                    $_SESSION['user_id']=$user_id;
					//$group_id=$_SESSION['group_id'];
                    //$encrp=$_SESSION['encr'];  
                   
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
                             header("location:../index.html");
                        }
                    }
                    
                    
                    
                ?>
				
	<script>
	function getbatch2(str) {	
	if (str == "") {
	document.getElementById("list1").innerHTML = "";
	return;
	} else {
	if (window.XMLHttpRequest) {
	// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp = new XMLHttpRequest();
	} 
	else {
	// code for IE6, IE5
	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function()
	{
	   if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
	   {
			 document.getElementById("list1").innerHTML =
			 xmlhttp.responseText;
	   }
	};
	xmlhttp.open("GET","getbatch2.php?",true);
	xmlhttp.send();
	}
	}
	
	
	function getsems2(str,id) {
	if (str == "") {
	document.getElementById("list2").innerHTML = "";
	return;
	} else {
	if (window.XMLHttpRequest) {
	// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp = new XMLHttpRequest();
	} else {
	// code for IE6, IE5
	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
	if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
	{
	document.getElementById("list2").innerHTML =
	xmlhttp.responseText;
	}
	};
	
	xmlhttp.open("GET","getsems2.php?q="+str+'|'+"<?PHP echo $user_id; ?>",true);
	xmlhttp.send();
	}
	}
	</script>
	<script>
	      getbatch2()
	</script>
	</head>
	<body  class="landing">
		<div id="page-wrapper">
			<div class="header-overlay">
			<!-- Header -->
				<header id="header" class="alt">
					<a href="../logout.php"><img src="../images/dcsa-logo.png" height="50" /></a>
					<nav id="nav">
						<ul>
							<li><a href="staff_home.php">Home</a></li>
							<li>
								<a href="#" class="icon fa-angle-down">E-Learning</a>
								<ul>
									<li><a href="group_home_staff.php">Group Home</a></li>
									<li><a href="mad_create_assign.php">Give Assignment</a></li>
									<li><a href="notes_create.php">Give Notes</a></li>
								</ul>
							</li>
							<li>
								<a href="#" class="icon fa-angle-down">Quiz</a>
								<ul>
									<li><a href="../quiz/quiz_home_staff.php">Quiz Home</a></li>
									<li><a href="../quiz/create_test.php">Create Quiz</a></li>
								</ul>
							</li>
							<li>
								<a href="#" class="icon fa-angle-down"><?php  print "$table_fname"; ?></a>
								<ul>
                                    <li><a href="staff_profile_view.php">View Profile</a></li>
									<li><a href="edit_profile.php">Edit Profile</a></li>
									<li><a href="change_password.php">Change Password</a></li>
									<li><a href="report_guru.php">My Students</a><li>
								</ul>
							</li>
                            <li><a href="../logout.php" class="button">Log out</a></li>
						</ul>
					</nav>
				</header>
			</div>
			<section id="banner-empty">
					
				</section>
			<!-- Main -->
                    <section id="main" class="container">
                        
                    <div class="row">
						<div class="12u">
							<section id="cta">
							<!-- Form -->
								
									<h2>Enter Test Details</h2>
                            <form method="post" enctype="multipart/form-data">
								<div class="row uniform 50%">
									<div class="12u 12u(mobilep)">
									<h4>Select Class</h4>
										<div id="list1">
											<select  name="class" id="class">
												<option value="0">select Class</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row uniform 50%">
									<div class="12u 12u(mobilep)">
									<h4>Select Subject</h4>
										<div id="list2">
											<select name="subject" onfocus="getsems2(batch.value)" id="subject">
												<option value="0">select subject</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row uniform 50%">
									<div class="12u 12u(mobilep)">
									<h4>Notes Title</h4>
                                       <input type="text" name="title" id="title" required="true" placeholder="Notes Title" />
									</div>
								</div>
								<div class="row uniform 50%">
									<div class="12u 12u(mobilep)">
									<h4>Description</h4>
										<input type="file" name="notes"  required="true" accept=".pdf,.docx,.doc,.ppt,.pptx,.zip" id="files" />
									</div>
								</div>
								<div class="row uniform">
											<div class="12u">
												<ul class="actions align-center">
													<li><input type="submit" value="Upload" /></li>
													<li><input type="reset" value="Reset" class="alt" /></li>
												</ul>
											</div>
										</div>
								
                                    
                                                    
							</form>   
                        
                            
                        </section>
					</section>
                            
                           
                        
				<footer id="footer"> 
					<ul class="icons">
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>						
					</ul>
					<ul class="copyright">
						<li>&copy; GRI-DCSA. All rights reserved.</li>
						
					</ul>
				</footer>
		</div>
                </section>
		</div>

		<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/jquery.scrollgress.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>
				

	<?php
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
			$lec_name=mysql_real_escape_string($_POST['title']);
			$batch =mysql_real_escape_string( $_POST['class']);
			
			$group_id =mysql_real_escape_string( $_POST['subject']);
			if($batch==0 or $batch=="")
			{
				print '<script>alert("Select Correct Class");</script>';
				print '<script>window.location.assign("mad_create_assign.php");</script>';
				exit;
			}
			if($group_id==0 or $group_id=="")
			{
				print '<script>alert("Select Correct Subject");</script>';
				print '<script>window.location.assign("mad_create_assign.php");</script>';
				exit;
			}
			$bat="";

			$file=$_FILES['notes'];
			//$filename=$file['name'];
			$filename=$file['name'];
			$upload_directory='lectures/';
			$max_file_size = 104857600;
			$ext_str = "docx,doc,ppt,pptx,pdf,zip";
			$allowed_extensions=explode(',',$ext_str);
			if(strlen($filename)>30)
			{
				Print '<script>alert(" File Name Should be lesser than 30 characters. please modify and then try again"); </script>';
				
				exit;
			}
			
			$ext = substr($filename, strrpos($filename, '.') + 1); //get file extension from last sub string from last . character
			if (!in_array($ext, $allowed_extensions) ) 
			{
				Print '<script>alert(" file format mismatch. please upload only docx,doc,ppt,pptx,pdf,zip file formats"); </script>';
				
				exit;
			} 
			/*if($file['size']>=$max_file_size){
			echo "only the file less than ".$max_file_size."mb  allowed to upload"; // exit the script by warning
			}*/

			/*$res=mysql_query("select Group_ID from Study_group where Staff_Key=$user_id and Batch='$bat'");
			$ex=mysql_num_rows($res);
			$id=mysql_fetch_array($res);
			$gid= $id['Group_ID'];
			//$gid="201601";
			//echo $gid;*/
			if (in_array($ext, $allowed_extensions) )
			{
				if(move_uploaded_file($file['tmp_name'],$upload_directory.$filename))
				{

					$path=$upload_directory.$filename;
					$post_date=time();
					if(mysql_query("INSERT INTO `notes` (`group_id`, `batch`,`staff_id`, `title`, `post_date`, `doc_path`) VALUES ('$group_id', '$batch','$user_id', '$lec_name', '$post_date', '$path')"))
						Print '<script>alert("notes Successfully Uploaded."); </script>';
					else Print '<script>alert(" Uploading failed."); </script>';
				}
				else
				{
					Print '<script>alert("The file cant moved to target directory."); </script>';
					//file can't moved with unknown reasons likr cleaning of server temperory files cleaning
				}
			}

			
			print '<script>window.location.assign("staff_home.php");</script>';
		}
	?>


