 <!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
	<title> My Students </title>
				<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		 <link rel="icon" type="image/png" href="../images/logo.png" />
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
				 jQuery("#classprint1").validate({
                    expression: "if (VAL != '0') return true; else return false;",
                    message: "Please make a selection"
                });
                
            });
            </script>
	</head>
	<?php            
                    session_start();
					include_once "../assets/db/dbdcsa.php";
             
                    if($_SESSION['encregno']){
                    }
                    else
                    {
                        header("location:../index.html");
                    }
					
                    $user_id=  encryptor('decrypt', $_SESSION['encregno']);   
                    $_SESSION['regno']=$user_id;
                    
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
				<section id="main" class="container 100%">
					
					<div class="row">
<div class="12u">
<section id="cta">
<h2>Report</h2>
					
                                            <form method="POST" action="pdf2.php">
                                                  <div class="row uniform 50%">
					<div class="12u 12u(mobilep)">
                                                                                           
									<input type="hidden" name="classprint" id="classprint"value="<?php print "$table_userid"; ?>" placeholder="Guru_Key" readonly="readonly" />
								</div>
                                </div>
					  <div class="row uniform 50%">
					<div class="12u 12u(mobilep)">
						 
										<?php	
															$sql1=mysql_query("select distinct(batch) from mas_students");
															$exists=mysql_num_rows($sql1);
   				
												if($exists>0)
												echo '<select name="classprint1" id="classprint1"><option> Select Batch</option>';
											    while($row=mysql_fetch_array($sql1))
												{
													echo '<option>'.$row['batch'].'</option>';
												
												}
												echo '</select>';
											?>
                                                                                           
																	</div>
                                                       </div>
                                                                          <div class="row uniform 50%">
                                                              	<div class="12u">	
                                                                    <input type="submit" value="Report" name="Report"/>
                                                                    <!--<a href="#" class="button special fit">Report</a>	-->
				
   
            <input type="submit"  name="Printpdf" value="Printpdf"/>
			<!--<a href="#" class="button special fit">Report</a>-->	
			
              
                                                           
                                                                  			
                                                                </div>
                                                   </div>
 <!-- </br>
  <a href="staff_home.php" class="button alt">Cancel</a>-->	
                                                		
                                                				
                                                               
                                                    
						</form>
</section>
</div>
					</div>
				</section>
			
	
<?php
   if(isset($_POST['Report']))
   {
           $class=$_POST['classprint'];
			$class1=$_POST["classprint1"];


$query=mysql_query( "SELECT *FROM mas_students WHERE Staff_Key='".$class."' AND batch='".$class1."'");
  
$exist=  mysql_num_rows($query);

            $temp="0"; 
            $table_fname="";
             $table_mobile="";
              $table_guruname="";
$table_email="";
$table_class="";
$table_studentkey="";
 
echo "<table border='1' style='border-collapse:collapse'>";
echo"<th>Student Key</th>";
              
echo"<th>StudentName</th>";
echo"<th>Email_ID</th>";
echo"<th>Mobile Number</th>";
echo"<th>Batch</th>";
echo"<th>Guru_Key</th>";
        
 if($exist>0)
{
   while($row=  mysql_fetch_assoc($query))
{
 $table_guruname=$row['Staff_Key'];               
 $table_studentkey=$row['Student_Key'];
$table_fname=$row['First_Name'];
$table_email=$row['Email'];
$table_mobile=$row['Mobile'];
$table_class=$row['batch'];
//$table_join=$row['Year_Of_Joining'];
echo"<tr><td>$table_studentkey</td>";
echo"<td>$table_fname</td>";
echo"<td>$table_email</td>";
echo"<th>$table_mobile</td>";
echo"<td>$table_class</td>";
echo"<td>$table_guruname</td>";
//echo"<td>$table_join</td></tr>";
}
echo "</table>";    
}
}

       
if(isset($_POST['Printpdf']))
{
	 $tclass=$_SESSION['$table_userid'];
	 $tclass1=$_POST["classprint1"];
	 echo "class".$tclass;
	 echo "class1".$tclass1;
	 $_SESSION['class']=$tclass;
	 $_SESSION['class1']=$tclass1;
	 header("location:pdf2.php");
}
?>

<!-- Footer -->
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

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/jquery.scrollgress.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>
   
</body>
</html>
