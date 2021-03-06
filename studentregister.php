<!DOCTYPE HTML>
<html>
	<head>
		<title>DCSA - Staff Registration</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
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
                jQuery("#regno").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Required field"
                });
                jQuery("#fname").validate({
                    expression:"if(VAL) return true; else return false;",
                    message: "Please enter the Required field"
                });
                jQuery("#lname").validate({
                    expression:"if(VAL) return true; else return false;",
                    message: "Please enter the Required field"
                });
                jQuery("#mob").validate({
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
                        <h1><a href="index.html">Home</a></h1>
                </header>
                <section id="main" class="container">
                    <div class="row">
			<div class="12u">					<!-- Form -->
                            <section id="cta">
                                <h2> New Student Registration Form </h2>
                                <h3>Enter Your Details for Verification</h3>
                                <form method="post" action="#">
                                        <div class="row uniform 50%">
                                                <div class="12u 12u(mobilep)">
                                                    <input type="text" name="regno"  id="regno" required="true" placeholder="Register Number"/>
                                                </div>
                                       </div>
                                        <div class="row uniform 50%">
                                                <div class="12u 12u(mobilep)">
                                                        <input type="text" name="fname" id="fname" required="true" placeholder="First Name" />
                                                </div>
                                       </div>
                                        <div class="row uniform 50%">
                                                <div class="12u 12u(mobilep)">
                                                        <input type="text" name="lname" id="lname" required="true" placeholder="Last Name" />
                                                </div>
                                        </div>


                                        <div class="row uniform 50%">
                                                <div class="12u 12u(mobilep)">
                                                    <input type="text" name="yearofjoin" id="mob" required="true" placeholder="Batch" />
                                                </div>
                                        </div>
                                        <div class="row uniform 50%">
                                                <div class="12u 12u(mobilep)">
                                                    <input type="email" name="email" id="email" required="true" placeholder="E-Mail ID" />
                                                </div>
                                        </div>

                                        <div class="row uniform">
                                                <div class="12u">
                                                        <ul class="actions">
                                                                <li><input type="submit" value="Check" /></li>
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
            include_once "assets/db/dbdcsa.php";
            
            
            function genPassword($length = 10, $add_dashes = false, $available_sets = 'lud')
            {
                $sets = array();
                if(strpos($available_sets, 'l') !== false)
                        $sets[] = 'abcdefghjkmnpqrstuvwxyz';
                if(strpos($available_sets, 'u') !== false)
                        $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
                if(strpos($available_sets, 'd') !== false)
                        $sets[] = '0123456789';
                if(strpos($available_sets, 's') !== false)
                        $sets[] = '!@#$%&*?';
                $all = '';
                $password = '';
                foreach($sets as $set)
                {
                        $password .= $set[array_rand(str_split($set))];
                        $all .= $set;
                }
                $all = str_split($all);
                for($i = 0; $i < $length - count($sets); $i++)
                        $password .= $all[array_rand($all)];
                $password = str_shuffle($password);
                if(!$add_dashes)
                        return $password;
                $dash_len = floor(sqrt($length));
                $dash_str = '';
                while(strlen($password) > $dash_len)
                {
                        $dash_str .= substr($password, 0, $dash_len) . '-';
                        $password = substr($password, $dash_len);
                }
                $dash_str .= $password;
                return $dash_str;
            }  
            
            session_start();
            $fname=mysql_real_escape_string($_POST['fname']);
            $lname=mysql_real_escape_string($_POST['lname']);
            $regno=mysql_real_escape_string($_POST['regno']);
            $yearofjoin=mysql_real_escape_string($_POST['yearofjoin']);   
            $email=mysql_real_escape_string($_POST['email']);
            
            
            $query=  mysql_query("select * from mas_students");
            $exist=  mysql_num_rows($query);
            $table_regno="";
            $table_year="";
            $table_fname="";
            $table_lname="";
            $temp1=0;
            if($exist>0)
            {
                while($row=  mysql_fetch_assoc($query))
                {
                    $table_regno=$row['Student_Key'];
                    $table_fname=$row['First_Name'];
                    $table_lname=$row['Last_Name'];
                    $table_year=$row['batch'];
                    $table_active=$row['IsActive'];
                    if(($regno==$table_regno) and ($fname==$table_fname) and ($lname==$table_lname) and ($yearofjoin==$table_year))
                    {
                        
                        if(!$table_active)
                        {
                        $pass=  genPassword();
                        
                        $_SESSION['regno']= $regno;
                        $_SESSION['actype']= "student";
                        $_SESSION['encrregno']= encryptor('encrypt',$regno );
                        $_SESSION['encrpwd']= encryptor('encrypt',$pass );
                        mysql_query("update mas_students SET Email='$email',Password='$pass' WHERE Student_Key = $regno");
                        $temp1=1;
                        
                        print '<script>window.location.assign("registration1.php");</script>';
                        }
                        else
                        {
                            print '<script>alert("Verification Failed. Account already Activated.")</script>';
                            print '<script>window.location.assign("login.php");</script>';
                        }
                    }
                    
                    
                }
               if($temp1==0)
               {
                   print '<script>alert("Verification Failed. Please enter Valid Detail. or contact Admin")</script>';
                   print '<script>window.location.assign("login.php");</script>';
               }
            }
           
            
        }
        
        
        
  ?>
	</body>
</html>
