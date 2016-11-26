<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DCSA Photo Gallery</title>
<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="css1/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
</head>
<body>
<div id="page-wrapper">
			<!-- Header -->
				<header id="header">
					<h1><a href="../index.html">Back</a> To Insert the Photos</h1>
					<nav id="nav">
						<ul>
                                                         
							<li><a href="index.html">Home</a></li>
                                                       
							<li>
								<a href="#" class="icon fa-angle-down">Layouts</a>
								<ul>
									<li><a href="generic.html">Generic</a></li>
									<li><a href="contact.html">Contact</a></li>
									<li><a href="elements.html">Elements</a></li>
									<li>
										<a href="#">Submenu</a>
										<ul>
											<li><a href="#">Option One</a></li>
											<li><a href="#">Option Two</a></li>
											<li><a href="#">Option Three</a></li>
											<li><a href="#">Option Four</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li><a href="#" class="button">Sign Up</a></li>
						</ul>
					</nav>
				</header>
</div>
<?php
    if (isset($_GET['album'])) {
	  echo $_GET['album'];
	} else {
	  echo '';
	}
  ?>
<!-- Scripts -->
			<script src="js/jquery.min.js"></script>
			<script src="js/jquery.dropotron.min.js"></script>
			<script src="js/jquery.scrollgress.min.js"></script>
			<script src="js/skel.min.js"></script>
			<script src="js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="js/main.js"></script>
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
    <b><h1 style="font-size:30px; margin-top:3%;">DCSA PHOTO ALBUMS</h1></b>
</div>
<p>&nbsp;</p>
<div class="gallery">
  <?php include "folio-gallery.php"; ?>
</div> 
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
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</footer>  
</body>
</html>