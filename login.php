 <!DOCTYPE HTML>
<html>
	<head>
	<?php
	            
                  session_start();
                include_once "assets/db/dbdcsa.php";
                   
				   
		?>
		<title>Login</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
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
                jQuery("#user").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter username"
                });
                jQuery("#pwd").validate({
                    expression:"if (VAL>=4) return true; else return false;",
                    message:"Please enter valid password"
                });
                
            });
                </script>
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				
			<!-- Main -->
				
                <section id="main" class="container">
                    <div class="row">
						<div class="12u">					<!-- Form -->
                            <section id="cta">
							
                                <h2> Sign In </h2>
                                <form method="post" action="#">
                                    <div class="row uniform 50%">
                                        <div class="6u 12u(mobilep)">
                                                <input type="radio" value="student" id="male"  name="login_type" checked  >
                                                <label for="male">Student</label>
                                        </div>
                                        <div class="6u 12u(mobilep)">
                                                <input type="radio" value="staff" id="female"  name="login_type" >
                                                <label for="female">Staff</label>
                                        </div>

                                    </div>
                                    <div class="row uniform 50%">
                                            <div class="12u 12u(mobilep)">
                                                    <input type="text" name="username" id="user" value="" placeholder="UserName" />
                                            </div>
                                    </div>
                                    <div class="row uniform 50%">
                                                <div class="12u 12u(mobilep)">
                                                    <input type="password" name="password" id="pwd" value="" placeholder="Password" />
                                                </div>
                                    </div>
									
                                    <div class="row uniform 50%">
                                        <div class="12u 12u(mobilep)">	
                                            <input type="submit" value="Log In"/>
                                            <input type="reset" class="button alt"value="Reset"/>
											
                                            <!--<a href="#" class="button special fit">Log In</a>	-->			
                                        </div>                         
                                    </div><br/>
                                    <h4><a  href="studentregister.php" >New Student Registration</a>&nbsp; &nbsp;&nbsp;			
                                    <a href="staffregister.php" >New Staff Registration</a>	</h4>			
                                                               
                                                    
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
            
           /* function encryptor($action,$string)
            {
                
                $output=false;
                $encrypt_method="AES-256-CBC";
                $secret_key='madhava';
                $secret_iv='maddy94';
                $key=hash('sha512',$secret_key);
                $iv=substr(hash('sha512',$secret_iv),0,16);
                if($action=='encrypt')
                {
                        $output=openssl_encrypt($string,$encrypt_method,$key,0,$iv);
                        $output=base64_encode($output);
                       
                }
                else if($action=='decrypt')
                {
                        $output=openssl_decrypt(base64_decode($string),$encrypt_method,$key,0,$iv);
                }
            
                return $output;
             
            } */
            
            //session_start();  
			
			
			//echo $page;
			//$conserver=$_SESSION['conserver'];
			//$condb=$_SESSION['condb'];
            $uname=mysql_real_escape_string($_POST['username']);
            $pwd=mysql_real_escape_string($_POST['password']);
            $logintype=  mysql_real_escape_string($_POST['login_type']);
            //$con=mysql_connect("localhost", "root", "") or die(mysql_error());
			//$con=mysql_connect("mysql.1freehosting.com", "u479378639_maddy", "maddy123") or die(mysql_error());
			if (!$conserver) echo "connection  cannot connect";
			//if (!mysql_select_db("u479378639_dcsa", $con)) echo "cannot connect db ";
			
            if(!$condb) echo "cannot connect db ";
            
            if($logintype=='staff')
            {
				
                $query=  mysql_query("select * from mas_staff",$conserver);
				
            }
            elseif($logintype=='student')
            {
                $query= mysql_query("select * from mas_students",$conserver);
            }
			//$result=mysql_query($query);
			//$result=mysql_query($query,$con);
            $exist=  mysql_num_rows($query);
            $table_username="";
           
            $table_pwd="";
            
            $tem="0";
            if($exist>0)
            {
                while($row=  mysql_fetch_assoc($query))
                {
                    if($logintype=='staff')
                    {
                        $table_username=$row['Staff_Key'];
                    }
                    elseif($logintype=='student')
                    {
                        $table_username=$row['Student_Key'];
                    }
                    $table_Isactive=$row['IsActive'];
                    $table_pwd=$row['Password'];
                    
                    if($uname==$table_username) 
                    {
                        $tem=2;
                        
                        if($pwd==$table_pwd)
                        {
                            if($table_Isactive==1)
                            {
                                $_SESSION['regno']=$uname;
                                $_SESSION['encregno']=  encryptor('encrypt', $uname);
								
                                if($logintype=='staff')
                                {
									$_SESSION['dcsa_user_type']="staff";
                                    print '<script>window.location.assign("users/staff_home.php");</script>';
                                }
                                elseif($logintype=='student')
                                {
									$_SESSION['dcsa_user_type']="student";
                                    print '<script>window.location.assign("users/student_home.php");</script>';
                                }

                                $tem=1;
                            }
                            $tem=3;
                            
                        }
                        else
                        {
                            print '<script>alert("incorrect password.")</script>';
                            print '<script>window.location.assign("login.php");</script>';
                        }
                    }
                   /* else if($uname==$table_mail)
                    {
                            
                    }*/
                    
                }
                if($tem==0)
                {
                    print '<script>alert("Username not exist in the database.")</script>';
                    print '<script>window.location.assign("login.php");</script>';
                }
                if($tem==2)
                {
                    print '<script>alert("incorrect password.")</script>';
                    print '<script>window.location.assign("login.php");</script>';
                }
                if($tem==3)
                {
                    print '<script>alert("Account not activated.")</script>';
                    print '<script>window.location.assign("login.php");</script>';
                }
            }
            
        }    
        ?>
	</body>
</html>