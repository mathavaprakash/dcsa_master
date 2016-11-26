<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>DCS&A Albums</title>
    <meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../images/logo.png" />
	<link rel="stylesheet" href="../assets/css/main.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="../css/normalize.css">
	


	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

	
	
	<script src="js/vendor/modernizr-2.6.2.min.js"></script>
	<style type="text/css">
	.back-link a {
		color: white;
		text-decoration: none; 
		border-bottom: 1px #4ca340 solid;
	}
	.back-link a:hover,
	.back-link a:focus {
		color: #408536; 
		text-decoration: none;
		border-bottom: 1px #408536 solid;
	}
	h1 {
		height: 100%;
		/* The html and body elements cannot have any padding or margin. */
		margin: 0;
		font-size: 16px;
		font-family:  "Source Sans Pro", sans-serif;
		
		margin-bottom: 3px;
	}
	
	.entry-header {
		text-align: left;
		margin: 0 auto 50px auto;
		width: 80%;
        max-width: 978px;
		position: relative;
		z-index: 10001;
	}
	#demo-content {
		padding-top: 100px;
	}
	</style>
</head>
<body class="landing">
		<div id="page-wrapper">
			<!-- Header -->
				<div class="header-overlay">
			<!-- Header -->
				<header id="header" class="alt">
					<a href="index.html"><img src="../images/dcsa-logo.png" height="50" /></a>
					<nav id="nav">
						<ul>
							<li><a href="../index.html">Home</a></li>
							<li>
								<a href="#" class="icon fa-angle-down">Department</a>
								<ul>								
									<li><a href="../assets/docs/Courses.pdf" target="_blank">Courses</a></li>
									<li>
										
										<a href="#" class="icon fa-angle-right">Syllabus</a>
										<ul>
											<li><a href="../assets/docs/mca.pdf" target="_blank">MCA (2011 Onwards)</a></li>
											<li><a href="../assets/docs/mca-15.pdf" target="_blank">MCA (2015 Onwards)</a></li>
											<li><a href="../assets/docs/msc-it.pdf" target="_blank">M.Sc (IT)</a></li>
											<li><a href="../assets/docs/m.phil(cs).pdf" target="_blank">M.Phil</a></li>
										</ul>
									</li>
									<li><a href="../faculty.php">Faculty</a></li>	
									<li><a href="../assets/docs/library.pdf" target="_blank">Library</a></li>	
									<li><a href="../assets/docs/lab.pdf" target="_blank">Computer Lab</a></li>									
								</ul>
							</li>
							<li><a href="gallery.php">Gallery</a></li>
							<li><a href="#" class="icon fa-angle-down">E-Learning</a>
								<ul>
									<li><a href="#">E - Materials</a>
										<ul>
											<li><a href="../note_mca.php">MCA</a></li>
											<li><a href="../note_msc.php">M.Sc(IT)</a></li>
											
											
										</ul>
									</li>
									</li>
									<li><a href="../model_papers.php">Model Questions</a></li>
									<li><a href="../net_preparation.php">UGC-NET Materials</a></li>
									
								</ul>
							</li>
							<li><a href="../feedback.php">Feedback</a></li>
							<li><a href="../contact.php">Contact Us</a></li>
							<li><a href="../login.php" class="button">Sign In</a></li>
						</ul>
					</nav>
				</header>
			</div>
</div>
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->

	<!-- Demo content -->			
	<div id="demo-content">

		
		<div id="loader-wrapper">
			<div id="loader"></div>

			<div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
		</div>
    <?php
   // if (isset($_GET['album'])) {
	//  echo $_GET['album'];
	//} else {
	//  echo '';
	//}
  ?>
<!-- Scripts -->
			
<!-- start gallery header -->
<link rel="stylesheet" type="text/css" href="folio-gallery.css" />
<script type="text/javascript" src="js1/jquery-1.9.1.min.js"></script>

<link rel="stylesheet" type="text/css" href="colorbox/colorbox.css" />
<!--<link rel="stylesheet" type="text/css" href="fancybox/fancybox.css" />-->
<script type="text/javascript" src="colorbox/jquery.colorbox-min.js"></script>
<!--<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.1.min.js"></script>-->
<script type="text/javascript">
$(document).ready(function() {

	// colorbox settings
	$(".albumpix").colorbox({rel:'albumpix'});

	// fancy box settings
	/*
	$("a.albumpix").fancybox({
		'autoScale	'		: true,
		'hideOnOverlayClick': true,
		'hideOnContentClick': true
	});
	*/
});
</script>
<!-- end gallery header -->

<body>
<div align="center" style="font-size:13px;font-weight:bold;">
    <b><h1 style="font-size:30px; margin-top:3%;">DCS&A PHOTO ALBUMS</h1></b>
</div>
<p>&nbsp;</p>
<div class="gallery">
  <?php include "folio-gallery.php"; ?>
</div> 
<!-- Footer -->

</div>
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
	<!-- /Demo content -->

	<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
	<script src="js/main.js"></script>-->
			<!--<script src="../assets/js/jquery.min.js"></script>-->
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/jquery.scrollgress.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>


</body>
</html>
