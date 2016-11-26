<!DOCTYPE HTML>
<html>
	<head>
		<title>Department of Computer Science & Applications</title>
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
		<?php            
                    session_start();
					include_once "assets/db/dbdcsa.php";
					?>
            /* <![CDATA[ */
            jQuery(function(){
                jQuery("#box1").validate({
                    expression: "if (VAL.match(/^[a-zA-Z ]*$/)) return true; else return false;",
                    message: "Please enter character name only"
                });
                jQuery("#box2").validate({
                    expression:"if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
                    message:"Please enter your valid email-id"
                });
                jQuery("#feed").validate({
                    expression:"if (VAL) return true; else return false;",
                    message:"Please enter some feedback"
                });

            });
                </script>
		
	</head>
	<body>
		<div id="page-wrapper">
			<div class="header-overlay">
			<!-- Header -->
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


			<!-- Main -->
                    <section id="main" class="container">
					
                    <div class="row">
						<div class="12u">
							<section id="cta">
								<h3>Give your Valuable feedback to improve best quality of service</h3>
									<form method="post" action="#" >
										<div class="row uniform 50%">
											<div class="12u 12u(mobilep)">
												<input type="text" name="box1" value="" id="box1" required="true"  placeholder="Name" />
											</div>
											<div class="12u 12u(mobilep)">
												<input type="text" name="box2" value="" id="box2" required="true"  placeholder="Email-ID" />
											</div>
											<div class="12u 12u(mobilep)">
												<input type="text" name="box3" value="" id="box3" required="true"  placeholder="Place" />
											</div>
											<div class="12u 12u(mobilep)">
												 <textarea placeholder="Give Your comments" name="feed" required="true" id="feed"></textarea>
											</div>
										</div>


                                        <div class="row uniform 50%">
											<div class="12u">
												<ul class="actions fit">
													<li><input type="submit" class="button fit" value="Submit"/></li>
													<li><input type="reset" class="button fit"value="Reset"/></li>
												</ul>
											</div>
										</div>
									</form>

							</section>
						</div>
					</div>
						<div class="row">
							<div class="12u"> 
								<section class="box"> <h3 align="center">Our Visitors FeedBacks</h3><table height="200px">
								<?PHP
									$query=  mysql_query("SELECT * FROM `feedback`  ORDER BY `feedback`.`cdate` DESC");
									$exist=  mysql_num_rows($query);
										$temp="0";
										$tableid="";
										$tablename="";
										$tableemail="";
										$tableplace="";
										$tablefeed="";
										$tabledate="";
										
										if($exist>0)
										{
											while($row=  mysql_fetch_assoc($query))
											{
												$tableid=$row['id'];
												$tablename=$row['name'];
												$tableplace=$row['place'];
												$tablefeed=$row['feedback'];
												$tabledate=$row['cdate'];
												?>
												
									<div class="row">
										<div class="12u">
											<section class="box">
												<div class="row">
													<div class="6u 12u(mobilep)">
														<h4 align="left"><?php print "$tablename"; ?></h4> 
														<h5 align="left"><?php print "$tableplace"; ?></h5> 
													</div>
													<div class="6u 12u(mobilep)">
														<h4 align="right"><?php print date("d F, Y  h:i a",strtotime($tabledate));  ?></h4>
													</div>
												</div>
												<blockquote><?php print "$tablefeed"; ?></blockquote>
											</section>
										</div>
									</div>
									</hr>
												<?PHP
											}
										}
										?>
										</table>
								</section>
							</div>
						</div>
								
                 </section>              
                        <!--footer -->
				<footer id="footer"> 
					<ul class="icons">
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>						
					</ul>
					<ul class="copyright">
						<li>&copy; GRI-DCSA. All rights reserved.</li>
					<li>
					<!-- BEGIN: Powered by Supercounters.com -->
					
						<script type="text/javascript" src="http://widget.supercounters.com/hit.js">
						</script>
						<script type="text/javascript">sc_hit(1214356,147,5);
						</script>
						<br>
						<noscript><a href="http://www.supercounters.com">Page visits counter</a></noscript>
					
					<!-- END: Powered by Supercounters.com -->
					</li>
				</ul>
				</footer>

		</div>

		<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

<?php

	if($_SERVER['REQUEST_METHOD']=="POST")
	{
        $box11 = mysql_real_escape_string($_POST['box1']);
        $box12=mysql_real_escape_string($_POST['box2']);
        $box13=mysql_real_escape_string($_POST['box3']);
		$box14 = mysql_real_escape_string($_POST['feed']);
		$query = mysql_query("select * from feedback");
		$exist=  mysql_num_rows($query);
		$temp=0;
		if(preg_match("/^[a-zA-Z -]+$/", $_POST['box1']) == 0)
		{
			print '<script>alert("Please check the all fields and full the subjects")</script>';
			print '<script>window.location.assign("feedback.php");</script>';
		}
		else 
		{
			mysql_query("INSERT INTO `feedback`(`name`, `email`, `feedback`,`place`) VALUES ('$box11','$box12','$box14','$box13')");
			print '<script>alert("Your FeedBack submitted successfully");</script>';
			print '<script>window.location.assign("feedback.php");</script>';
		}
	}
?>
	</body>
</html>