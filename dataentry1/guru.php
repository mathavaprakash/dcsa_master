<!DOCTYPE HTML>
<html>
	<head>
		<title>Staff_Key Updation</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
                <script type="text/javascript" src="../assets/js/script.js" ></script>
                <link rel="icon" type="image/png" href="../images/logo.png" />
		<link rel="stylesheet" href="../assets/css/main.css" />
                <link rel="stylesheet" type="text/css" href="../stylesheets/jquery.validate.css" />
                <link rel="stylesheet" type="text/css" href="../stylesheets/style.css" />
                <script src="../lib/jquery/jquery-1.3.2.js" type="text/javascript">
                </script>
                <script src="../javascripts/jquery.validate.js" type="text/javascript">
                </script>
				<script src="../javascripts/attendance.js" type="text/javascript"></script>
                <script src="../javascripts/jquery.validation.functions.js" type="text/javascript"></script>
                <script type="text/javascript">
				 jQuery(function(){
                jQuery("#userid").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Required field"
                });
                jQuery("#gname").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Required field"
                });
                jQuery("#gkname").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Required field"
                });
                jQuery("#batch").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Required field"
                });
               
                
            });
			
			////////////////////////////////////////////////////////////////////
/*function getstaffkey(str) {
			if (str == "") {
			document.getElementById("stafid").innerHTML = "";
			return;
			} else {
			if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
			} else {
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
			document.getElementById("stafid").innerHTML =
			xmlhttp.responseText;
			}
			};
            
			xmlhttp.open("GET","getstaffkey.php?q="+str,true);
			xmlhttp.send();
			}
			}
////////////////////////////////////////////////////////////
			function getstudkey(str) {
			if (str == "") {
			document.getElementById("studkeyid").innerHTML = "";
			return;
			} else {
			if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
			} else {
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
			document.getElementById("studkeyid").innerHTML =
			xmlhttp.responseText;
			}
			};

			xmlhttp.open("GET","getstudkey.php?q="+str,true);
			xmlhttp.send();
			}
			}*/
            </script>
			
			
             
  							
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<a href="../admin/admin.php"><img src="../images/dcsa-logo.png" height="50" /></a>
					
				</header>

			<!-- Main -->
				<section id="main" class="container">
                                     <div class="row">
			<div class="12u">					
                            <section id="cta">
					
						
                                                <h3>Enter Details</h3>
									<form method="POST" action="guru.php">
							                 <div class="row uniform 50%">
											<div class="12u 12u(mobilep)">
												
												<?php
																							 
												mysql_connect("localhost", "root", "") or die(mysql_error());
												mysql_select_db("dcsa") or die("cannot connect database");
												$sql1=mysql_query("select distinct(batch) from mas_students");
												$exists=mysql_num_rows($sql1);
										        echo '<select name="batch" id="batch" onchange="getstudkey(this.value)"><option> Select Batch</option>';
												if($exists>0)
												{
													while($row=mysql_fetch_array($sql1))
													{
														echo "<option>".$row['batch']."</option>";
													}
												}
												echo '</select>';
											?>
											</div>
										</div>
										    <div class="row uniform 50%">
											<div class="12u 12u(mobilep)">
                                            <div id="studkeyid"><input type="text" name="userid" id="userid"  placeholder="StudentKey" /></div>
											</div>
                                            </div>
                                            <div class="row uniform 50%">
											<div class="12u 12u(mobilep)">
											
																					
											 
										<?php	
										        mysql_connect("localhost", "root", "") or die(mysql_error());
												mysql_select_db("dcsa") or die("cannot connect database");
												$sql1=mysql_query("select * from mas_staff");
												$exists=mysql_num_rows($sql1);										
												echo '<select name="gname" id="gname" onchange="getstaffkey(this.value)"><option> Select Staff</option>';
												if($exists>0)
												{
													while($row=mysql_fetch_array($sql1))
													{
														echo "<option>".$row['First_Name']."</option>";
													}
												}
												echo '</select>';
											
											?>
											</div></div>
                                            <div class="row uniform 50%">
											   <div class="12u 12u(mobilep)">
											  <div id="stafid">
											   <input type="text" name="gkname" id="gkname"  placeholder="Select Staff_Key" />
											   </div>
											</div>
										</div>

										<div class="row uniform">
											<div class="12u 12u(mobilep)">
												<input type="submit"  name="submit" value="submit"></input>
											</div>
										</div>
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
            session_start();
            $userid=mysql_real_escape_string($_POST['userid']);
            $gname=mysql_real_escape_string($_POST['gname']);
            $gkname=mysql_real_escape_string($_POST['gkname']);
            $batch=mysql_real_escape_string($_POST['batch']);
            
            
            mysql_connect("localhost", "root", "") or die(mysql_error());
            mysql_select_db("dcsa") or die("cannot connect database");
            $query=  mysql_query("select * from mas_students where Student_Key='$userid'");
            $exist=  mysql_num_rows($query);
           
            if($exist>0)
            {
             if(mysql_query("update mas_students SET Staff_Key='$gkname' WHERE Student_Key='$userid'"))
			 {
                print '<script>alert("Key is updated");</script>';
                print '<script>window.location.assign("guru.php");</script>';
			 }
			 else
			 {
				print '<script>alert("key update error");</script>'; 
			 }
            }                
           /* else
            {
                    print '<script>alert("Userid already exist. enter new user name")</script>';
                    print '<script>window.location.assign("../admin/admin.php");</script>';
                    
            }*/
               
            }
           
                     
            
         
 ?>
  
    </body>
</html>
