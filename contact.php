<!DOCTYPE HTML>
<html>
	<head>
		<title>Department of Computer Science & Applications</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" type="image/png" href="images/logo.png" />
		<link rel="stylesheet" href="assets/css/main.css" />
		
	</head>
        <script>
        function enter() {
        $("#topp").css("left", "0px");
        $("#leftt").css("top", "0px");
        $("#bott").css("left", "0px");
        $("#rightt").css("top", "0px");
        $("#inquivesta").css("top", "-45px");
        $("#iiser").css("top", "85vh");

        $(".menu-buttons").css("opacity", "1");
        $(".menu-footers").css("opacity", "1");
        $("#menu-events").css("left", "9.15vw");
        $("#menu-gallery").css("left", "14.64vw");
        $("#menu-schedule").css("left", "20.49vw");
        $("#menu-updates").css("left", "28.55vw");
        $("#menu-feedback").css("left", "75.03vw");
        $("#menu-signup").css("left", "84.18vw");
        $("#menu-login").css("left", "91.5vw");
        $("#menu-sponsors").css("left", "76.86vw");
        $("#menu-reachus").css("left", "87.84vw");
    }

function enterb() {
        
        $("#inquivesta").css("top", "-20px");
        $("#iiser").css("top", "82vh");
    }

function leaveb() {
        
        $("#inquivesta").css("top", "-45px");
        $("#iiser").css("top", "85vh");
    }

    function leave() {
        $("#topp").css("left", "");
        $("#leftt").css("top", "");
        $("#bott").css("left", "");
        $("#rightt").css("top", "");
        $("#events").css("left", "");
        $(".logo-box").css("top", "");


        $(".menu-buttons").css("opacity", "");
        $(".menu-footers").css("opacity", "");
        $("#menu-events").css("left", "");
        $("#menu-gallery").css("left", "");
        $("#menu-schedule").css("left", "");
        $("#menu-updates").css("left", "");
        $("#menu-feedback").css("left", "");
        $("#menu-signup").css("left", "");
        $("#menu-login").css("left", "");
        $("#menu-sponsors").css("left", "");
        $("#menu-reachus").css("left", "");

    }
    $(document).ready(function() {

        $(".menu-icon").click(function() {
            enter();
        })

        $(".linkss").click(function() {

            enter();
        })
	
	$('html').click(function() {
		leave();
	});

	$('.menubar').click(function(event){
 		event.stopPropagation();
	});

        /*$(".menu-icon").mouseleave(function() {
            leave()
        })

        $(".linkss").mouseleave(function() {
            leave()
        })*/

        $(".logo-box").mouseenter(function() {

            enterb();
        })

        $(".logo-box").mouseleave(function() {
            leaveb()
        })


    })
</script>
	<body class="landing">
		<div id="page-wrapper">
			<div class="header-overlay">
			<header id="header" class="alt">
					<a href="index.html"><img src="images/dcsa-logo.png" height="50" /></a>
					<nav id="nav">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li>
								<a href="#" class="icon fa-angle-down">Department</a>
								<ul>								
									<li><a href="assets/docs/Courses.pdf" target="_blank">Courses</a></li>
									<li>
										
										<a href="#" class="icon fa-angle-right">Syllabus</a>
										<ul>
											<li><a href="assets/docs/mca.pdf" target="_blank">MCA (2011 Onwards)</a></li>
											<li><a href="assets/docs/mca-15.pdf" target="_blank">MCA (2015 Onwards)</a></li>
											<li><a href="assets/docs/msc-it.pdf" target="_blank">M.Sc (IT)</a></li>
											<li><a href="assets/docs/m.phil(cs).pdf" target="_blank">M.Phil</a></li>
										</ul>
									</li>
									<li><a href="faculty.php">Faculty</a></li>	
									<li><a href="assets/docs/library.pdf" target="_blank">Library</a></li>	
									<li><a href="assets/docs/lab.pdf" target="_blank">Computer Lab</a></li>									
								</ul>
							</li>
							<li><a href="gallery/gallery.php">Gallery</a></li>
							<li><a href="#" class="icon fa-angle-down">E-Learning</a>
								<ul>
									<li><a href="#">E - Materials</a>
										<ul>
											<li><a href="note_mca.php">MCA</a></li>
											<li><a href="note_msc.php">M.Sc(IT)</a></li>
											
											
										</ul>
									</li>
									</li>
									<li><a href="model_papers.php">Model Questions</a></li>
									<li><a href="net_preparation.php">UGC-NET Materials</a></li>
									
								</ul>
							</li>
							<li><a href="feedback.php">Feedback</a></li>
							<li><a href="contact.php">Contact Us</a></li>
							<li><a href="login.php" class="button">Sign In</a></li>
						</ul>
					</nav>
				</header>
			</div>
			<!-- Header -->
				

			<!-- Banner -->
			<section id="banner-empty">
			
			</section>

			<!-- Main -->
                        <section id="main" class="container">
                            <div class="row">
                                <div class="12u">
                                    <section class="box special">
                                        <h3>Contact Us</h3>
                                            <div class="row uniform">
												<div class="6u 12u(narrower)  ">
                                                            <h3>Postal Address</h3>
                                                            <h4>Department of Computer Science & Applications</h4>
                                                            <h4>The Gandhigram Rural Institute - Deemed University</h4>
                                                            <h4>Gandhigram - 624 302 , Dindigul District, </h4>
															
                                                            <h4>Tamilnadu , India.</h4>
												</div>
												<div class="6u 12u(narrower)">
                                                                <h3>More Details</h3>
                                                            <h4>Phone : 0451-2452371-75; Extn.2150 </h4>
                                                            
                                                            <h4>email :  <a href="mailto:dcsa@ruraluniv.ac.in">dcsa@ruraluniv.ac.in</a></h4>
                                                            <h4>website : <a href="ruraluniv.ac.in/dcsa"> ruraluniv.ac.in/dcsa</a></h4>
												</div>
                                            </div>
                                    </section>
                                </div>
                            </div>
                        
                <section id="cta">

					<h2>Get Direction from Google Map</h2>
					<p></p>

					<form action="http://maps.google.com/maps" method="get" target="blank" align="center">
						<div class="row uniform 50%">
							<div class="9u 12u(mobilep)">
								<input type="text" name="saddr" value="" placeholder="Enter your Place to get Direction" />
							</div>
							<div class="3u 12u(mobilep)">
                                                                <input type="hidden" name="daddr" value="The gandhigram rural institute gandhigram" />
								<input type="submit" class="btn" value="Get Directions" />
							</div>
						</div>
					</form>
                                        
				</section>	
                <div class="row">
                    <div class="12u">
						<section class="box special">
                            <div class="row">
                                <div class="12u">
                                    <section class="box">
                                        
                                        <p><iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d125624.95467436916!2d77.86455813183034!3d10.279315683268251!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x3b00acc98a58e879%3A0x3184dc0d7b179c0d!2sThe+Gandhigram+Rural+Institute+-+Demeed+University%2C+Gandhigram%2C+Dindigul+District%2C+Chinnalapatti%2C+Tamil+Nadu+624302%2C+India!3m2!1d10.2793232!2d77.9345987!5e0!3m2!1sen!2s!4v1455123372083" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe> </p>
                      
                                    </section>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
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