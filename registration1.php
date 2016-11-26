<!DOCTYPE HTML>
<html>
	<head>
		<title>Conform Your Mail</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
               <?php 
                    session_start();
                    if($_SESSION['regno'])
                    {
                        
                    }
                    else
                    {
                        print '<script>alert("reg1")</script>';
                        header("location:index.html");
                    }
                    
                    
                    $encrregno=$_SESSION['encrregno'];
                    $encrpwd=$_SESSION['encrpwd'];
                    $regno=$_SESSION['regno'];
                    //$pwd=$_SESSION['encrpwd']; 
                    $_SESSION['regno']=$regno;
                    $type=$_SESSION['actype'];
                    $action="register";
                ?>
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1><a href="index.html">Home</a></h1>
					
				</header>

			<!-- Main -->
				<section id="main" class="container 75%">
					<header>
                                            <h2> E-Mail Conformation Form</h2>
                                                
                                            <h2><a href="activate.php?account=<?php print "$type"; ?>&action=<?php print "$action"; ?>&regno=<?php print "$encrregno"; ?>&pwd=<?php print "$encrpwd"; ?>">chick here for Activate your account</a> </h2>
                                                   
					</header>
					
				</section>
                        
                        <div class="row">
						<div class="12u">

							<!-- Form -->
								<!--<section class="box ">
									<h3>Enter Your Details</h3>
									<form method="post" action="#">
										<div class="row uniform 50%">
											<div class="6u 12u(mobilep)">
                                                                                            <input type="text" name="userid" id="name"  placeholder="Register Number" disabled="true" />
											</div>
                                                                               </div>
                                                                                <div class="row uniform 50%">
											<div class="6u 12u(mobilep)">
												<input type="text" name="fname" id="name"  placeholder="First Name" />
											</div>
                                                                               </div>
                                                                                <div class="row uniform 50%">
											<div class="6u 12u(mobilep)">
												<input type="text" name="lname" id="name"  placeholder="Last Name" />
											</div>
										</div>
										
										
										<div class="row uniform 50%">
											<div class="6u 12u(mobilep)">
                                                                                            <input type="text" name="mobile" id="moblie"  placeholder="Mobile Number" />
											</div>
                                                                                </div>
                                                                                <div class="row uniform 50%">
											<div class="6u 12u(mobilep)">
                                                                                            <input type="email" name="email" id="email"  placeholder="E-Mail ID" />
											</div>
										</div>
										
										<div class="row uniform">
											<div class="12u">
												<ul class="actions">
													<li><input type="submit" value="Register" /></li>
													<li><input type="reset" value="Reset" class="alt" /></li>
												</ul>
											</div>
										</div>
									</form>

									
								</section>-->

						</div>
					</div>

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
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
<?php
       /*     
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {      
            
            $fname=mysql_real_escape_string($_POST['fname']);
            $lname=mysql_real_escape_string($_POST['lname']);
            $gender=mysql_real_escape_string($_POST['gender']);
            $mobile=mysql_real_escape_string($_POST['mobile']);   
            $email=mysql_real_escape_string($_POST['email']);
            $desig=mysql_real_escape_string($_POST['designation']);
            
            if(($mobile<7000000000) or ($mobile>9999999999))
            {
                print '<script>alert("mobile number is incorrect. enter valid mobile number")</script>';
                //print '<script>window.location.assign("registration.php");</script>';
                exit;
            } 
            mysql_query("update mas_staff SET First_Name='$fname',Last_Name='$lname',Gender='$gender',Mobile=$mobile,Email='$email',Designation='$desig' WHERE Staff_Key = $user_id");

            //mysql_query("UPDATE `dcsa`.`mas_staff` SET `First_Name` = '$fname', `Last_Name` = '$lname', `Gender` = '$gender',`Mobile` = '$mobile',`Email` = '$email',`Designation` = '$desig', WHERE `mas_staff`.`Staff_Key` = $user_id;)");
            print '<script>alert("Your Profile was Edited Successfully")</script>';
            $_SESSION['user_id']=$user_id;
            print '<script>window.location.assign("staff_profile_view.php");</script>';
        }
        
        
        */
                ?>
	</body>
</html>
