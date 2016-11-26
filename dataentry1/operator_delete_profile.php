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
                <link rel="stylesheet" type="text/css" href="../stylesheets/jquery.validate.css" />
                <link rel="stylesheet" type="text/css" href="../stylesheets/style.css" />
                <script src="../lib/jquery/jquery-1.3.2.js" type="text/javascript">
                </script>
                <script src="../javascripts/jquery.validate.js" type="text/javascript">
                </script>
                <script src="../javascripts/jquery.validation.functions.js" type="text/javascript"></script>
                <script type="text/javascript">
				</script>
                 
               
	</head>
	 <?php
            
                    session_start();
					include_once "../assets/db/dbdcsa.php";
                    if($_SESSION['userid']){
                    }
                    else
                    {
                        header("location:de.php");
                    }
                    $userid=$_SESSION['userid']; 
                    
                   
            $query=  mysql_query("select * from operator_dcsap");
            $exist=  mysql_num_rows($query);
            $temp="0"; 
            $table_fname="";
            $table_lname="";
            $table_mobile="";
            $table_email="";
            $table_gender="";
            
           
            if($exist>0)
            {
                while($row=  mysql_fetch_assoc($query))
                {
                    
                    $table_userid=$row['userid'];
                    if($userid==$table_userid)
                    {
                        $temp=1;
                        $table_fname=$row['fname'];
                        $table_lname=$row['lname'];
                        $table_mobile=$row['mobile'];
                        $table_email=$row['email'];
                        $table_gender=$row['gender'];
                        
                        break;
                    }
                }
                if($temp==0)
                {
                     header("location:de.php");
                }
            }
                ?>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<a href="../admin/logut.php"><img src="../images/dcsa-logo.png" height="50" /></a>
					<nav id="nav">
						
	<ul>
							
	<li>
	<a href="#" class="icon fa-angle-down"><?php print "$table_fname"; ?></a>
		</li>
                  <li><a href="../admin/logout.php" class="button">Log out</a></li>
						
	</ul>
	
					</nav>
				</header>

			<!-- Main -->
				<section id="main" class="container">
				<nav id="nav">
			<h4><a  href="operator_profile.php"> <-Back </a></h4>
			</nav>
					
<div class="row">
<div class="12u">
					<section id="cta">
<h3>Delete Profile</h2>
                                            <form method="POST" action="#">
                                                    
							<div class="row uniform 50%">
								<div class="12u 12u(mobilep)">
									<input type="text" name="userid" id="userid" value="<?php print "$table_userid"; ?>" placeholder="User Id" readonly="readonly" />
								</div>
                                                       </div>
                                                   
                                                    <div class="row uniform 50%">
                                                              	<div class="12u 12uu(mobilep)">	
                                                                    <input type="submit" value="Delete"/>
                                                                    <!--<a href="#" class="button special fit">Delete</a>	-->
			
        
                                                             
                                                                				
                                                                    <a href="de.php" class="button alt">Cancel</a>				
                                                                </div>
                                               </div>
                                                		
                                                				
                                                               
                                                    
						</form>
</section>
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
            
          
            
           $query= "DELETE FROM operator_dcsap WHERE userid='".$userid."'";
            
if(mysql_query($query))
{
    
           
            print '<script>alert("Your Profile was Deleted Successfully")</script>';
              print '<script>window.location.assign("de.php");</script>';
         
        }
        }
?>
        </body>
</html>