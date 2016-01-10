<!DOCTYPE HTML>
<html>
	<head>
		<title>Staff</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
               <?php
            
                    session_start();
                    if($_SESSION['user_id']){
                    }
                    else
                    {
                        header("location:index.html");
                    }
                    $user_id=$_SESSION['user_id']; 
                    
                    mysql_connect("localhost", "root", "") or die(mysql_error());
            mysql_select_db("dcsa") or die("cannot connect database");
            $query=  mysql_query("select * from mas_staff");
            $exist=  mysql_num_rows($query);
            $temp="0"; 
            $table_fname="";
            $table_lname="";
            $table_mobile="";
            $table_email="";
            $table_gender="";
            $table_desig="";
            $table_role="";
           
            if($exist>0)
            {
                while($row=  mysql_fetch_assoc($query))
                {
                    
                    $table_userid=$row['Staff_Key'];
                    if($user_id==$table_userid)
                    {
                        $temp=1;
                        $table_fname=$row['First_Name'];
                        $table_lname=$row['Last_Name'];
                        $table_mobile=$row['Mobile'];
                        $table_email=$row['Email'];
                        $table_gender=$row['Gender'];
                        $table_desig=$row['Designation'];
                        $table_role=$row['Role'];
                        break;
                    }
                }
                if($temp==0)
                {
                     header("location:index.html");
                }
            }
                ?>
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1><a href="index.html">Home</a></h1>
					<nav id="nav">
						<ul>
							
							<li>
								<a href="#" class="icon fa-angle-down"><?php print "$table_fname"; ?></a>
								<ul>
									<li><a href="#">Profile</a></li>
									<li><a href="#">Study Groups</a></li>
									<li><a href="#">My Lectures</a></li>
                                                                        <li><a href="#">Student Assignments</a></li>
									
								</ul>
							</li>
                                                        <li><a href="logout.php" class="button">Log out</a></li>
						
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<section id="main" class="container 75%">
					<header>
						<h2>Welcome Staff </h2>
						
					</header>
					
				</section>
                        
                        <div class="row">
                            <div class="12u">
				<section class="box">
                                    <div class="table-wrapper">
                                            <table class="alt">
                                                    <thead>
                                                        <tr><td>
                                                    <a href="edit_profile.php" class="button special">Edit Profile</a>   
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
                                                            <tr>
                                                                    <td>Designation</td>
                                                                    <td><?php print "$table_desig"; ?></td>        
                                                            </tr>
                                                            <tr>
                                                                    <td>Role</td>
                                                                    <td><?php print "$table_role"; ?></td>        
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