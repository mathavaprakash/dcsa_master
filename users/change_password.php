<!DOCTYPE HTML>
<html>
	<head>
		<title>Change Password</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<link rel="icon" type="image/png" href="images/logo.png" />
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
                jQuery("#name").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Required field"
                });
                jQuery("#pwd1").validate({
                    expression:"if(VAL) return true; else return false;",
                    message:"Please enter the Required field"
                });
                jQuery("#pwd2").validate({
                    expression:"if(VAL) return true; else return false;",
                    message:"Please enter the Required field"
                });
                jQuery("#pwd3").validate({
                    expression:"if((VAL == jQuery('#pwd2').val()) &&VAL) return true; else return false;",
                    message:"Confirm password field doesn't match the password field"
                });
            });
            </script>
                <?php            
                    session_start();
					include_once "../assets/db/dbdcsa.php";
                    if($_SESSION['regno']){
                    }
                    else
                    {
                        header("location:../index.html");
                    }
                    $regno=$_SESSION['regno'];   
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
                            if($regno==$table_userid)
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
	</head>
	<body  class="landing">
		<div id="page-wrapper">
			<div class="header-overlay">
			<!-- Header -->
				<header id="header" class="alt">
					<a href="../logout.php"><img src="../images/dcsa-logo.png" height="50" /></a>
					<nav id="nav">
						<ul>
							<li><a href="student_home.php">Home</a></li>
							
							<li><a href="../quiz/quiz_home.php">Quiz</a></li>
					
							<li>
								<a href="#" class="icon fa-angle-down"><?php  print "$table_fname"; ?></a>
								<ul>
                                    <li><a href="student_profile_view.php">View Profile</a></li>
									<li><a href="student_edit_profile.php">Edit Profile</a></li>
									<li><a href="std_change_password.php">Change Password</a></li>
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
								<h2>Change Password</h2>
                                    <form method="post" action="change_password.php">
                                                    
							<div class="row uniform">
								<div class="12u 12u(mobilep)"> Your Register Number 
									<input type="text" name="username" id="name" required="true" disabled="true" value="<?php print "$regno"; ?>" />
								</div>
                                                       </div>
                                                    <div class="row uniform">
								<div class="12u 12u(mobilep)"> Enter Old Password
                                    <input type="password" name="oldpassword" id="pwd1" required="true" value="" placeholder="Enter Old Password" />
								</div>
                                                    </div>
                                                    <div class="row uniform">
								<div class="12u 12u(mobilep)"> Enter New Password
                                                                    <input type="password" name="newpassword" id="pwd2" required="true" value="" placeholder="Enter New Password" />
								</div>
                                                    </div>
                                                    <div class="row uniform">
								<div class="12u 12u(mobilep)"> Conform Password
                                                                    <input type="password" name="conpassword" id="pwd3" required="true" value="" placeholder="Conform Password" />
								</div>
                                                    </div>
                                                    <div class="row uniform">
                                                                <div class="12u">	
                                                                    
                                                                    <ul class="actions">
																		<li><input type="submit" value="Change Password" /></li>
																		
																	</ul>			
                                                                </div>
                                                                
                                                     </div>
						</form>
						</section>
						</div>
					</div>
				</section>
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

		</div>

		<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/jquery.scrollgress.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>
<?php
            
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {      
            
            $oldpwd=mysql_real_escape_string($_POST['oldpassword']);
            $newpwd=mysql_real_escape_string($_POST['newpassword']);
            $conpwd=mysql_real_escape_string($_POST['conpassword']);
            
            $query=  mysql_query("select * from mas_staff");
            $exist=  mysql_num_rows($query);
            $table_oldpwd="";
            $table_userid="";
            if($exist>0)
            {
                while($row=  mysql_fetch_assoc($query))
                {
                    $table_userid=$row['Staff_Key'];
                    $table_oldpwd=$row['Password'];
                    if($regno==$table_userid )
                    {
						if($oldpwd==$table_oldpwd)
						{
							if($newpwd==$conpwd)
							{
								mysql_query("update mas_staff SET Password='$newpwd' WHERE Staff_Key = $regno");
								print '<script>alert("new password updated successfully. ")</script>';
								print '<script>window.location.assign("staff_home.php");</script>';
							}
							else
							{
								print '<script>alert("new password and conform password mismatch. try again. ")</script>';
								print '<script>window.location.assign("change_password.php");</script>';
							}
						}
						else
						{
							print '<script>alert("Please enter your current password. ")</script>';
							print '<script>window.location.assign("change_password.php");</script>';
						}
                        
                        break;
                    }
                }
               
            }       
        }
?>
	</body>
</html>