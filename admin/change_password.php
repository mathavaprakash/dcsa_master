<!DOCTYPE HTML>
<html>
	<head>
		<title>Change Password</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<link rel="icon" type="image/png" href="../images/logo.png" />

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
                    message: "Please enter the Old Password"
                });
                jQuery("#pwd1").validate({
                    expression:"if(VAL) return true; else return false;",
                    message:"Please enter the new password"
                });
                jQuery("#pwd2").validate({
                    expression:"if(VAL) return true; else return false;",
                    message:"Please re-enter the new password"
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
                    if($_SESSION['userid']){
                    }
                    else
                    {
                        header("location:index.php");
                    }
                    $userid=$_SESSION['userid']; 
                    
                    
                ?>
	</head>
	<body>
		<div id="page-wrapper">
			<div class="header-overlay">
			<!-- Header -->
			<header id="header" class="alt">
					
					<nav id="nav">
						<ul>
							<li><a href="admin_home.php">Back</a></li>
							
                                    
									
                                   
									
								</ul>
							</li>
                                                        <li><a href="../logout.php" class="button">Log out</a></li>
						
						</ul>
					</nav>
				</header>
			</div>
			<!-- Main -->
				<section id="main" class="container">
					<div class="row">
						<div class="12u">
							<section id="cta">
								<h2>Change Password</h2>
                                    <form method="post" action="change_password.php">
                                                    
							<div class="row uniform">
								<div class="12u 12u(mobilep)"> Your UserName
									<input type="text" name="userName" id="name" required="true" disabled="true" value="<?php print "$userid"; ?>" />
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

		<!-- Scripts -->
			<!--<script src="assets/js/jquery.min.js"></script>-->
			<script src="../users/assets/js/jquery.dropotron.min.js"></script>
			<script src="../users/assets/js/jquery.scrollgress.min.js"></script>
			<script src="../users/assets/js/skel.min.js"></script>
			<script src="../users/assets/js/util.js"></script>
			<!--[if lte IE 8]>
		<script src="../users/assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../users/assets/js/main.js"></script>
<?php
            
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {      
            
            $oldpwd=mysql_real_escape_string($_POST['oldpassword']);
            $newpwd=mysql_real_escape_string($_POST['newpassword']);
            $conpwd=mysql_real_escape_string($_POST['conpassword']);
            mysql_connect("localhost", "root", "") or die(mysql_error());
            mysql_select_db("dcsa") or die("cannot connect database");
            $query=  mysql_query("select * from member");
            $exist=  mysql_num_rows($query);
            $table_oldpwd="";
            $table_userid="";
            if($exist>0)
            {
                while($row=  mysql_fetch_assoc($query))
                {
                    $table_userid=$row['userName'];
                    $table_oldpwd=$row['passWord'];
                    if(($userid==$table_userid) and ($oldpwd==$table_oldpwd) )
                    {
                        
                        $temp=1;
                        if($newpwd==$conpwd)
                        {
                            mysql_query("Update member SET passWord='$newpwd' WHERE userName = '$userid'");
                            print '<script>alert("new password updated successfully. ")</script>';
                            print '<script>window.location.assign("admin_home.php");</script>';
                        }
                       
                        
                        break;
                    }
                }
                
                if($temp==0)
                {
                    print '<script>alert("your old Password is wrong. ")</script>';
                     header("location:change_password.php");
                }
            }       
        }
?>
	</body>
</html>