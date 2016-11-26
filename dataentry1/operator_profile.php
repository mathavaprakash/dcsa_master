<!DOCTYPE HTML>
<html>
	<head>
		<title>Data Entry Operator</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
                <script type="text/javascript" src="../assets/js/script.js" ></script>
                <link rel="icon" type="image/png" href="../images/logo.png" />
		<link rel="stylesheet" href="../assets/css/main.css" />
                <link rel="stylesheet" type="text/css" href="../stylesheets/jquery.validate.css" />
                <link rel="stylesheet" type="text/css" href="../stylesheets/style.css" />
               <?php
                        
                    session_start();
					include_once "../assets/db/dbdcsa.php";
                    if($_SESSION['userid'])
                   {
                         $userid=$_SESSION['userid']; 
                    }
                    else
                    {
                        
                        header("location:index.html");
                    }
                 
                    
            $query= mysql_query("select * from operator_dcsap where userid='$userid'");
            $exist=  mysql_num_rows($query);
            $temp="0"; 
            $table_fname="";
            $table_lname="";
            $table_mobile="";
            $table_email="";
            $table_gender="";
            if($exist>0)
            {
                if($row= mysql_fetch_assoc($query))
                {  
                    $table_userid=$row['userid'];
                        $temp=1;
                        $table_fname=$row['fname'];
                        $table_lname=$row['lname'];
                        $table_mobile=$row['mobile'];
                        $table_email=$row['email'];
                        $table_gender=$row['gender'];
                    }
                }
                else
                {
                    print '<script>alert(" user id not found");</script>';
                }
            
                ?>
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<a href="../admin/logout.php"><img src="../images/dcsa-logo.png" height="50" /></a>
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
			<h4><a  href="de.php"> <-Back </a></h4>
			</nav>
					<header>
						<h2>Welcome DataEntry Operator </h2>
						
					</header>
					
				</section>
                        
                         <div class="row uniform 50%">
                                        <div class="12u 12u(mobilep)">	
				<section class="box">
                                    <div class="table-wrapper">
                                            <table class="alt">
                                                    <thead>
                                                        <tr><td>
                                                    <a href="operator_edit_profile.php" class="button special">Edit Profile</a>   
<a href="operator_delete_profile.php"   class="button special">Delete Profile</a>   
                                                   
                                                            </td> </tr>
                                                    </thead>
                                                    <tbody>
                                                            <tr>
                                                                    <td>User ID</td>
                                                                    <td><?php print "$table_userid"; ?></td>        
                                                            </tr>
                                                            <tr>
                                                                    <td>First Name</td>
                                                                    <td><?php print "$table_fname"; ?></td>        
                                                            </tr>
                                                            <tr>
                                                                    <td>Last Name</td>
                                                                    <td><?php print "$table_lname"; ?></td>        
                                                            </tr>
                                                            <tr>
                                                                    <td>Gender</td>
                                                                    <td><?php print "$table_gender"; ?></td>        
                                                            </tr>
                                                            <tr>
                                                                    <td>Mobile Number</td>
                                                                    <td><?php print "$table_mobile"; ?></td>        
                                                            </tr>
                                                            <tr>
                                                                    <td>Email ID</td>
                                                                    <td><?php print "$table_email"; ?></td>        
                                                            </tr>
                                                           
                                                    </tbody>
                                                    
                                            </table>
					</div>
				</section>

			</div>
		</div>
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

	</body>
</html>