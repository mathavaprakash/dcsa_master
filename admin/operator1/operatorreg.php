<!DOCTYPE HTML>
<html>
	<head>
		<title>Data Entry Operator</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
                <script type="text/javascript" src="assets/js/script.js" ></script>
                <link rel="icon" type="image/png" href="images/logo.png" />
		<link rel="stylesheet" href="assets/css/main.css" />
                <link rel="stylesheet" type="text/css" href="stylesheets/jquery.validate.css" />
                <link rel="stylesheet" type="text/css" href="stylesheets/style.css" />
 <script src="lib/jquery/jquery-1.3.2.js" type="text/javascript">
                </script>
                <script src="javascripts/jquery.validate.js" type="text/javascript">
                </script>
                <script src="javascripts/jquery.validation.functions.js" type="text/javascript"></script>
                <script type="text/javascript">
            /* <![CDATA[ */
            jQuery(function(){
                jQuery("#userid").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Required field"
                });
                jQuery("#fname").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Required field"
                });
                jQuery("#lname").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Required field"
                });
 jQuery("#password").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Required field"
                });
                jQuery("#moblie").validate({
                    expression:"if(!isNaN(VAL) && VAL) return true; else return false;",
                    message:"Please enter the valid mobile number"
                });
                jQuery("#email").validate({
                    expression:"if(VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
                    message:"Please enter valid email ID"
                });
                
            });
            </script>
               
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1><a href="loginp.php">Back</a></h1>
					
				</header>

			<!-- Main -->
				<section id="main" class="container">
                                     <div class="row">
			<div class="12u">					<!-- Form -->
                            <section id="cta">
					
						<h2>Data Entry Operator Registration </h2>
                                                <h3>Enter Operator Details</h3>
									<form method="post" action="#">
										<div class="row uniform 50%">
											<div class="12u 12u(mobilep)">
                                                                                            <input type="text" name="userid" id="userid"  placeholder="User Id" />
											</div>
                                                                               </div>
                                                                                <div class="row uniform 50%">
											<div class="12u 12u(mobilep)">
												<input type="text" name="fname" id="fname"  placeholder="First Name" />
											</div>
                                                                               </div>
                                                                                <div class="row uniform 50%">
											<div class="12u 12u(mobilep)">
												<input type="text" name="lname" id="lname"  placeholder="Last Name" />
											</div>
										</div>
										
										<div class="row uniform 50%">
											<div class="12u 12u(narrower)">
                                                                                                                                                                                                              <input type="radio" id="male" value="Male" name="gender" >
												<label for="male">Male</label>
											
											
												<input type="radio" id="female" value="Female" name="gender" >
												<label for="female">Female</label>
											</div>
</div>

										<div class="row uniform 50%">
											<div class="12u 12u(mobilep)">
                                                                                            <input type="password" name="password" id="password"  placeholder="Password" />
											</div>
                                                                                </div>
										
										<div class="row uniform 50%">
											<div class="12u 12u(mobilep)">
                                                                                            <input type="text" name="mobile" id="moblie"  placeholder="Mobile Number" />
											</div>
                                                                                </div>
                                                                                <div class="row uniform 50%">
											<div class="12u 12u(mobilep)">
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
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
  <?php
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            session_start();
            $userid=mysql_real_escape_string($_POST['userid']);
            $fname=mysql_real_escape_string($_POST['fname']);
            $lname=mysql_real_escape_string($_POST['lname']);
            $gender=mysql_real_escape_string($_POST['gender']);
  $pwd=mysql_real_escape_string($_POST['password']);
            $mobile=mysql_real_escape_string($_POST['mobile']);
            $email=mysql_real_escape_string($_POST['email']);
           
            
            mysql_connect("localhost", "root", "") or die(mysql_error());
            mysql_select_db("dcsa") or die("cannot connect database");
            $query=  mysql_query("select * from operator_dcsap");
            $exist=  mysql_num_rows($query);
            $table_userid="";
            $table_email="";
$table_pwd="";
            $temp="0";
            $temp1=TRUE;
            if($exist>0)
            {
                while($row=  mysql_fetch_assoc($query))
                {
                    $table_userid=$row['userid'];
                    $table_email=$row['email'];
$table_pwd=$row['password'];
                    if($userid==$table_userid)
                    {
                        $temp="1";
                    }

                    if($email==$table_email)
                    {
                        $temp1=FALSE;
                    }

                
                if($temp==1)
                {
                    print '<script>alert("Userid already exist. enter new user name")</script>';
                    print '<script>window.location.assign("operatorreg.php");</script>';
                    exit;
                }
                if($temp1==FALSE)
                {
                    print '<script>alert("Email already exist. enter new emailID")</script>';
                    print '<script>window.location.assign("operatorreg.php");</script>';
                    exit;
                }
            }
           
            if($gender==NULL)
            {
                print '<script>alert(" select gender")</script>';
                print '<script>window.location.assign("operatorreg.php");</script>';
                exit;
            }
            
            if($mobile<7000000000) 
            {
                print '<script>alert("mobile no not valid<7. enter valid mobile number")</script>';
                print '<script>window.location.assign("operatorreg.php");</script>';
                exit;
            } 
            if($mobile>9999999999)
            {
                print '<script>alert("mobile no not valid>9. enter valid mobile number")</script>';
                print '<script>window.location.assign("operatorreg.php");</script>';
                exit;
            } 
            
           
            
            mysql_query("insert into operator_dcsap(userid,fname,lname,email,gender,mobile,password) values ('$userid','$fname','$lname','$email','$gender',$mobile,'$pwd')");
            print '<script>alert("New user added successfully")</script>';
            $_SESSION['userid']=$userid;
            print '<script>window.location.assign("operatorreg.php");</script>';
            }
            
}
        ?>
  
    </body>
</html>
