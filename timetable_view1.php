<!DOCTYPE HTML>
<html>
	<head>
		<title>Department of Computer Science & Applications</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" type="image/png" href="images/logo.png" />
		<link rel="stylesheet" href="assets/css/main.css" />
		
	</head>

	<body class="landing special">
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
									<!--<li><a href="generic.html">Staff</a></li>-->
									<li>
										<a href="#" class="icon fa-angle-right">Programmes</a>
										<ul>
											<li><a href="#">MCA</a></li>
											<li><a href="#">M.Sc (IT)</a></li>
											<li><a href="#">M.Phil</a></li>
										</ul>
									</li>
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
									<li><a href="timetable_view.php">Time Table</a></li>	
									<li><a href="calender.php">Calender</a></li>									
								</ul>
							</li>
							<li><a href="gallery/gallery.php">Gallery</a></li>
							<li><a href="#">E-Content</a></li>
							<li><a href="contact.php">Contact Us</a></li>
							<li><a href="login.php" class="button">Sign In</a></li>
						</ul>
					</nav>
				</header>
			</div>
			<!-- Banner -->
				<section id="banner-empty">
				
				</section>
			<!-- Banner -->


			<!-- Main -->
                    <!--<section id="main" class="container">

                    <div class="row">
						<div class="12u">
							<section id="cta">
							<!-- Form 

									<h2>View TimeTable</h2>
                            <form method="POST" action="table_view.php" >


                                                    	<div class="row uniform 50%">
                                                            <div class="12u 12u(mobilep)">
                                                            <select id="class" name="class">
                                                                <option>Mca</option>
                                                                <option>Msc(IT)</option>
                                                            </select>
                                                            </div>
                                                            <div class="12u 12u(mobilep)">
                                                            <select id="sem" name="sem">
                                                                <option>I</option>
                                                                <option>II</option>
                                                                <option>III</option>
                                                                <option>IV</option>
                                                                <option>V</option>
                                                                <option>VI</option>
                                                            </select>
                                                            </div>
                                                             
                                                            <ul class="actions">
                                                                <li><input type="submit" value="View" id="view" name="view"/></li>
                                                                

                                                            </ul>
                                                             </div>
                                

                            </form>
       
                                                            
							</section>
							</div>
							</div>
							</section>-->
		<section id="main" class="container 100%">
			<div class="row">
                <div class="12u">
					<section class="box special">
						<div class="table-wrapper">
							<table class="alt">
						
							
		<?php

        include_once "assets/db/dbdcsa.php";
        if($_SERVER['REQUEST_METHOD']=="POST")
        {

        $class = $_POST['class'];
        $Tclass = mysql_real_escape_string($class);
        $sem = $_POST['sem'];
        $Tsem = mysql_real_escape_string($sem);
        

                                 //session_start();
            

            $query=  mysql_query("SELECT * FROM `timetable` WHERE class='$Tclass' and sem='$Tsem'");
	    $exist=  mysql_num_rows($query);
            $temp="0";
            $tableClass="";
            $tableSem="";
            $tableDay="";
            $table1="";
            $table2="";
            $table3="";
            $table4="";
            $table5="";
            $table6="";


            if($exist>0)
            {
                echo '<div class="row"><div class="12u">
                    <div class="table-wrapper">
                        <table class="alt" >
						
                            <thead>
                                
                                <td width="80px">Days</td>
                                <td width="80px">Hour-1</td>
                                <td width="80px">Hour-2</td>
                                <td width="80px">Hour-3</td>
                                <td width="80px">Hour-4</td>
                                <td width="80px">Hour-5</td>
                                <td width="80px">Hour-6</td>

                            </thead><tbody>';
                while($row=  mysql_fetch_assoc($query))
                {


                        $temp=1;
                        $tableClass=$row['class'];
                        $tableSem=$row['sem'];
                        $tableDay=$row['day'];
                        $table1=$row['1'];
                        $table2=$row['2'];
                        $table3=$row['3'];
                        $table4=$row['4'];
                        $table5=$row['5'];
                        $table6=$row['6'];


                

                if(isset ($_POST['view']))
                {
                     
                    echo '
                            
                            <tr>
                            
                                <td width="50px">'.$tableDay.'</td>
                                <td width="50px">'.$table1.'</td>
                                <td width="50px">'.$table2.'</td>
                                <td width="50px">'.$table3.'</td>
                                <td width="50px">'.$table4.'</td>
                                <td width="50px">'.$table5.'</td>
                                <td width="50px">'.$table6.'</td>
                            </tr>
                            ';
                }

                }
				echo '
				</tbody>
				 </table>
						</div>
					</section>
                            </div></div></section>';
                
            }
        }
                   ?>
						</div>
					</div>
					</section>


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
                </section>
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
/*if(isset($_POST['update']))
                        {


        //$Tday = mysql_real_escape_string($day);
	$box11 = mysql_real_escape_string($_POST['box1']);
        $box12=mysql_real_escape_string($_POST['box2']);
	$box13 = mysql_real_escape_string($_POST['box3']);
       	$box14=mysql_real_escape_string($_POST['box4']);
        $box15=mysql_real_escape_string($_POST['box5']);
        $box16=mysql_real_escape_string($_POST['box6']);
        echo "values:".$box11;

}
?>
                        <?php
                        if(isset($_POST['Delete']))
                        {
                           mysql_query("DELETE FROM `timetable` WHERE class='$Tclass' and sem='$Tsem' and day='$Tday'" );
                            print '<script>alert("Timetable Deleted successfully");</script>';

                        }*/
                        ?>
	</body>
</html>