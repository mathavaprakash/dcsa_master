<!DOCTYPE HTML>
<html>
	<head>
		<title>Department of Computer Science & Applications</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" type="image/png" href="images/logo.png" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<?php            
                    session_start();
					include_once "../assets/db/dbdcsa.php";
					$mode=$_SESSION['mode'];
					//$enc_id=$_SESSION['enc_id'];
		?>
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header"  >
					<h1><a href="../logout.php">Home</a></h1>
					
				</header>

			
			
				<section id="main" class="container">
                        <section id="cta" class="align-left">
							<?PHP 
								if($mode=="time_up")
								{
									?><h3> Time-up. Your test Auto-submitted Successfully. </h3><?PHP
								}
								else if($mode=="finish")
								{
									?><h3> Your test submitted Successfully.</h3> <?PHP
								}
								else
								{
									?><h3> Error Occured </h3><?PHP
								}
									
                            ?>
							<!--<a href="test_answer.php?id=<?php //print "$enc_id"; ?>" > check your result</a>-->
							<a href="../users/student_home.php" > goto Home</a>
							
                        </section>
						
                                              
												
					
						
                                                
					</section>
                                    
               

			
				<footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						
						<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; GRI-DCSA. All rights reserved.</li>
					<li>
					<!-- BEGIN: Powered by Supercounters.com -->
							<center>
								<script type="text/javascript" src="http://widget.supercounters.com/hit.js">
								</script>
								<script type="text/javascript">sc_hit(1214356,147,5);
								</script>
								<br>
								<noscript><a href="http://www.supercounters.com">Tumblr Hit Counter</a></noscript>
							</center>
<!-- END: Powered by Supercounters.com -->


					</li>
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

	</body>
</html>