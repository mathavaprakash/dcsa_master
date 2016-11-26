<!DOCTYPE HTML>
<html>
	<head>
		<title>Student Profile</title>
		 <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		 <link rel="icon" type="image/png" href="../images/logo.png" />
		<link rel="stylesheet" href="../assets/css/main.css" />
                <link rel="stylesheet" type="text/css" href="../stylesheets/jquery.validate.css" />
                <link rel="stylesheet" type="text/css" href="../stylesheets/style.css" />
                <script src="../lib/jquery/jquery-1.3.2.js" type="text/javascript">
                </script>
                <script src="../javascripts/jquery.validate.js" type="text/javascript">
                </script>
                <script src="../javascripts/jquery.validation.functions.js" type="text/javascript"></script>
                <script type="text/javascript">
</script>
              <?php
                session_start();
                   /* if($_SESSION['regno'])
                    {
                        
                    }
                    else
                    {
                        header("location:index.html");
                    }
                    
                    
            
            $user_id=$_SESSION['regno'];       */        
			if(isset($_GET['akey']))
            {  
		     include_once "../assets/db/dbdcsa.php";
            $Student_Key=encryptor('decrypt',$_GET['akey']);		
            $Student_Key1=$_GET["akey"];		
           
            $query=  mysql_query("select * from mas_students");
            $exist=  mysql_num_rows($query);
            $temp="0"; 
            $table_fname="";
            $table_lname="";
            $table_mobile="";
            $table_email="";
            $table_gender="";
           $table_staffkey="";
            if($exist>0)
            {
                while($row= mysql_fetch_assoc($query))
                {
                    
                    $table_userid=$row['Student_Key'];
                    $table_pwd=$row['Password'];
                    if(($Student_Key==$table_userid) )
                    {
                        $temp=1;
                        $table_fname=$row['First_Name'];
                        $table_lname=$row['Last_Name'];
                        $table_mobile=$row['Mobile'];
                        $table_email=$row['Email'];
                        $table_gender=$row['Gender'];
                       $table_staffkey=$row['Staff_Key'];
                        
                        break;
                    }
                }
                if($temp==0)
                {
                    print '<script>alert("invalid profile")</script>';
                     header("location:../admin/admin.php");
                }
            }
     ?>
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<a href="../admin/admin.php"><img src="../images/dcsa-logo.png" height="50" /></a>
					<nav id="nav">
						<?php  $Student_Key2=encryptor('encrypt',$Student_Key);?>		
					<h1><a href="student_profile_view1.php?akey=<?php echo $Student_Key2;?>">Back</a></h1>
					</nav>
				</header>

			<!-- Main -->
				<section id="main" class="container 75%">
				<header>
					<h2>Student Profile </h2>
						
					</header>
					
				</section>
               			
                        <div class="row">
                            <div class="12u">
				<section class="box">
                                    <div class="table-wrapper">
                                            <table class="alt">
                                                    <thead>
                                                        <tr><td>
														<?php $Student_Key1=encryptor('encrypt',$Student_Key);?>
                                                                <a href="student_edit_profile1.php?akey=<?php echo $Student_Key1;?>" class="button special">Edit Profile</a>
<a href="report_stud.php" class="button alt">Cancel</a>																	
                                                            </td> </tr>
                                                    </thead>
                                                    <tbody>
                                                            <tr>
                                                                    <td>Student_Key</td>
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
                                                                    <td>Guru Key</td>
                                                                    <td><?php print "$table_staffkey"; ?></td>        
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
		<?php
		}
		?>
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
