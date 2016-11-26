 <!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
	<?php 
	session_start();
	?>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" type="image/png" href="../images/logo.png" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<!--[if lte IE 8]>
		<link rel="stylesheet" href="../operator1/assets/css/ie8.css" /><![endif]-->
		<link rel="stylesheet" type="text/css" href="../stylesheets/jquery.validate.css" />
        <link rel="stylesheet" type="text/css" href="../stylesheets/style.css" />
                
                <!-- here start the validation codes-->
                
           <script type="text/javascript" src="../assets/js/script.js" ></script>
           <script src="../lib/jquery/jquery-1.3.2.js" type="text/javascript"></script>
           <script src="../javascripts/jquery.validate.js" type="text/javascript"></script>
           <script src="../javascripts/jquery.validation.functions.js" type="text/javascript"></script>
           <script type="text/javascript">

              jQuery(function(){
                jQuery("#userid").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter UserName"
                });
				jQuery("#password").validate({
					expression:"if(VAL) return true; else return false;",
					message: "please enter PassWord"
				});
				
			});
</script>
    
</head>
	<body>
		<div id="page-wrapper">
<header id="header">
					<h1><a href="index.php">Home</a></h1>
					<nav id="nav">
						
					</nav>
				</header>
  
	
	

			<!-- Header -->
				

			<!-- Main -->
				<section id="main" class="container">
					<div class="row">
						<div class="12u">					<!-- Form -->
                            <section id="cta">
                                    <h2> Login </h2>
                                            <form method="post" >
                                                    
							<div class="row uniform 50%">
								<div class="12u 12u(mobilep)">
									<input type="text" name="userid" id="userid" value="" placeholder="User Name" />
								</div>
</div>
                                <div class="row uniform 50%">
								<div class="12u 12u(mobilep)">
									<input type="password" name="password" id="password" value="" placeholder="Password" />
								</div>
                                                       </div>
                                                   
                                                    <div class="row uniform 50%">
                                                              	<div class="12u 12u(mobilep)">	
                                                                    <input type="submit" value="Login"/>
                                                                    <!--<a href="#" class="button special fit">View/Edit/Delete</a>	-->
			

              
                                                                				
                                                                    			
                                                                </div>
                                                  </div>
                                                		
                                                			
                                                               
                                                    
						</form>
					
				</section>
                                                </div>
                                        </div>
                                </section>
			                      </section>
			<footer id="footer"> 
					<ul class="icons">
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>						
					</ul>
					<ul class="copyright">
						<li>&copy; GRI-DCSA. All rights reserved.</li>
						<li>
							<script type="text/javascript" src="http://widget.supercounters.com/hit.js"></script>
							<script type="text/javascript">sc_hit(1214356,147,5);	</script>
							<br>
							<noscript><a href="http://www.supercounters.com">Page visits counter</a></noscript>
						</li>
					</ul>
				</footer>
		</div>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/jquery.scrollgress.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]>
		<script src="../users/assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>


		

		<!-- Scripts -->
			<!--<script src="assets/js/jquery.min.js"></script>-->
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/jquery.scrollgress.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]>
		<script src="../assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>
   
    <?php
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
           

       
            $userid=mysql_real_escape_string($_POST['userid']);
            $password=mysql_real_escape_string($_POST['password']);
            
            mysql_connect("localhost", "root", "") or die(mysql_error());
            mysql_select_db("dcsa") or die("cannot connect database");
            $query=  mysql_query("select * from operator_dcsap");
            $exist=  mysql_num_rows($query);
            $table_userid="";
           
            $table_password="";
            
            //$table_isactive="";
            $tem="0";
            if($exist>0)
            {
                while($row=  mysql_fetch_assoc($query))
                {
                    $table_userid=$row['userid'];
                    $table_password=$row['password'];
                   
                    //$table_isactive=$row['IsActive'];
                    if($userid==$table_userid) 
                    {
                        $tem=3;
                        
                                                   
                      if($password==$table_password)
                        {
                            $_SESSION['userid']=$table_userid;
                           print '<script>window.location.assign("dataentry.php");</script>';
                           $tem=2;
                        }
                        else
                        {
print'<script>alert("User is not in the database")</script>';
print '<script>window.location.assign("index.php");</script>';
                        }
                    }
                   
                   /* else if($uname==$table_mail)
                    {
                            
                    }*/
                   // }
                }
                if($tem==0)
                {
                    print '<script>alert("Username not exist in the database.")</script>';
                    print '<script>window.location.assign("index.php");</script>';
                }
                if($tem==3)
                {
                    print'<script>alert("User is not in the database")</script>';
print '<script>window.location.assign("index.php");</script>';
                }
               
                
                }
            
        }    
        ?>
	</body>
</html>