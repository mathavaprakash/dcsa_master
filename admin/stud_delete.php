 <!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Delete Staff Profile</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" type="image/png" href="../images/logo.png" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="../assets/css/ie8.css" /><![endif]-->
                
                <!-- here start the validation codes-->
                
           
                <link rel="stylesheet" type="text/css" href="../stylesheets/jquery.validate.css" />
                <link rel="stylesheet" type="text/css" href="../stylesheets/style.css" />
         

                 
               
	</head>
	 <?php
	                include_once "../assets/db/dbdcsa.php";
                    $user_id=encryptor('decrypt',$_GET['akey1']);	            
                    $user_id=$_GET["akey1"];
                     if(isset($_GET['akey1'])){
                            

                    $Staff_Key=$_GET['akey1'];
} 
            ?>        
              
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1><a href="staff_view.php">Back</a></h1>
					<nav id="nav">
						
					</nav>
				</header>

			<!-- Main -->
				<section id="main" class="container 75%">
					<div class="row">
<div class="12u">
					<section id="cta">
<h3>Delete  Student Profile</h2>
                                            <form method="POST" action="#">
                                                    
							<div class="row uniform 50%">
								<div class="12u 12u(mobilep)">
									<input type="text" name="Staff_Key" id="Staff_Key" value="<?php print "$Staff_Key" ;?>" placeholder="Staff_Key" readonly="readonly"  />
								</div>
                                                       </div>
                                                   
                                                    <div class="row uniform 50%">
                                                              	<div class="12u">	
                                                                    <input type="submit" value="Delete"/>
                                                                    <!--<a href="#" class="button special fit">Delete</a>	-->
							
                                                                    <a href="report_stud.php" class="button alt">Cancel</a>				
                                                                </div>
                                                   </div>
                                                		
                                                				
                                                               
                                                    
						</form>
</section>
</div>
					</div>
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

<?php
            
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {      
                include_once "../assets/db/dbdcsa.php";
/*
             mysql_connect("localhost", "root", "") or die(mysql_error());
            mysql_select_db("dcsa") or die("cannot connect database");*/
            
            $Staff_Key=mysql_real_escape_string($_POST['Staff_Key']);
            
          
            
           $query= "DELETE FROM mas_staff WHERE Staff_Key='".$Staff_Key."'";
       
if(mysql_query($query))
{
    
           
            print '<script>alert("Staff Profile was Deleted Successfully")</script>';
            print '<script>window.location.assign("edit2.php");</script>';
         
        }


}

?>
        </body>
</html>