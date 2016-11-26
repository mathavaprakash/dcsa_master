 <!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Data Entry Operator</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" type="image/png" href="../images/logo.png" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
                
                <!-- here start the validation codes-->
                
           
                <link rel="stylesheet" type="text/css" href="../stylesheets/jquery.validate.css" />
                <link rel="stylesheet" type="text/css" href="../stylesheets/style.css" />
               
                
	</head>
	<?php
	include_once "../assets/db/dbdcsa.php";
	?>
	<body>
		<div id="page-wrapper">
<header id="header">
					<a href="../admin/admin_home.php"><img src="../images/dcsa-logo.png" height="50" /></a>
					<nav id="nav">
						
					</nav>
				</header>

			<!-- Header -->
				

			<!-- Main -->
				<section id="main" class="container">
					<div class="row">
						<div class="12u">					<!-- Form -->
                            <section id="cta">
                                    <h2> Managing DataEntry Operator Profile </h2>
                                            <form method="post" action="de.php">
                                                    
							                 <div class="row uniform 50%">
											<div class="12u 12u(mobilep)">
												
												<?php
																							 
												$sql1=mysql_query("select distinct(userid) from operator_dcsap");
												$exists=mysql_num_rows($sql1);
										        echo '<select name="userid" id="userid"><option> Select Userid</option>';
												if($exists>0)
												{
													while($row=mysql_fetch_array($sql1))
													{
														echo "<option>".$row['userid']."</option>";
													}
												}
												echo '</select>';
											?>
											</div>
										</div>                                                                                                                                            <div class="row uniform 50%">
								                </div>
                                                   
                                                    <div class="row uniform 50%">
                                                              	<div class="12u 12u(mobilep)">	
                                                                    <input type="submit" value="Sumbit"/>
                                                                    <!--<a href="#" class="button special fit">View/Edit/Delete</a>	-->
			

              
                                                                				
                                                                    <a href="../admin/admin.php" class="button alt">Cancel</a>				
                                                                </div>
                                                  </div>
                                                		
                                                <h4> <a href="operatorreg.php" >New  DataEntry Operator Registration</a></h4>				
                                                               
                                                    
						</form>
					
				</section>
                                                </div>
                                        </div>
                                </section>
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
    <?php
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $userid=mysql_real_escape_string($_POST['userid']);
            //$password=mysql_real_escape_string($_POST['password']);
            
             $query=mysql_query("select * from operator_dcsap where userid='$userid'");
            $exist=  mysql_num_rows($query);
            $table_userid="";
           
          
            
            if($exist>0)
            {
                if($row=  mysql_fetch_assoc($query))
                {
				
					$table_userid=$row['userid'];
                   
                    if($userid==$table_userid) 
                    {
                                                   
                      
                        
							session_start();
                            $_SESSION['userid']=$table_userid;
                            print '<script>window.location.assign("operator_profile.php");</script>';
						
						
				
                       
						
                    }
					else
					{
					 print '<script>alert("Userid not exist in the database.")</script>';
                    print '<script>window.location.assign("de.php");</script>';	
					}
	  
                 }
              
               
                
                }
            
        }    
        ?>
	</body>
</html>