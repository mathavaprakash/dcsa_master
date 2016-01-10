<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Staff</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1><a href="index.html">Home</a></h1>
					<nav id="nav">
						
					</nav>
				</header>

			<!-- Main -->
				<section id="main" class="container 75%">
					<header>
						<h2>Log In</h2>
					
					</header>
					<div class="box">
                                            <form method="post" action="login.php">
                                                    
							<div class="row uniform">
								<div class="6u 12u(mobilep)">
									<input type="text" name="username" id="name" value="" placeholder="UserName" />
								</div>
                                                       </div>
                                                    <div class="row uniform">
								<div class="6u 12u(mobilep)">
                                                                    <input type="password" name="password" id="pwd" value="" placeholder="Password" />
								</div>
                                                    </div>
                                                    <div class="row uniform">
                                                                <div class="3u 6u(narrower) 12u(mobilep)">	
                                                                    <input type="submit" value="Log In"/>
                                                                    <!--<a href="#" class="button special fit">Log In</a>	-->			
                                                                </div>
                                                                <div class="3u 6u(narrower) 12u(mobilep)">				
                                                                    <a href="index.html" class="button alt">Cancel</a>				
                                                                </div>
                                                     </div>
						</form>
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
			<script src="assets/js/jquery.min.js"></script>
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
  
            $uname=mysql_real_escape_string($_POST['username']);
            $pwd=mysql_real_escape_string($_POST['password']);
            
            mysql_connect("localhost", "root", "") or die(mysql_error());
            mysql_select_db("dcsa") or die("cannot connect database");
            $query=  mysql_query("select * from mas_staff");
            $exist=  mysql_num_rows($query);
            $table_username="";
           
            $table_pwd="";
            $table_mail="";
            $tem="0";
            if($exist>0)
            {
                while($row=  mysql_fetch_assoc($query))
                {
                    $table_username=$row['Staff_Key'];
                    $table_pwd=$row['Password'];
                    $table_mail=$row['Email'];
                    if(($uname==$table_username) or ($uname==$table_mail))
                    {
                        $tem=2;
                        
                        if($pwd==$table_pwd)
                        {
                            $_SESSION['user_id']=$uname;
                            header("location:staff_home.php");
                           // print '<script>window.location.assign("staff_home.html");</script>';
                            $tem=1;
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
            }
            
        }    
        ?>
	</body>
</html>