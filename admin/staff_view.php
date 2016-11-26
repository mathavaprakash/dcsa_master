<!DOCTYPE HTML>
<html>
	<head>
		<title>Student Profile</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" type="image/png" href="../images/logo.png" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<!--[if lte IE 8]>
		<link rel="stylesheet" href="../assets/css/ie8.css" /><![endif]-->
                
                <!-- here start the validation codes-->
                
           
                <link rel="stylesheet" type="text/css" href="../stylesheets/jquery.validate.css" />
                <link rel="stylesheet" type="text/css" href="../stylesheets/style.css" />
               

		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<?php
                session_start();
                    if($_SESSION['userid'])
                    {
                        
                    }
                    else
                    {
                        header("location:index.php");
                    }        
                    
                    
            
                             $user_id=$_SESSION['userid']; 
  include_once "../assets/db/dbdcsa.php";
            /*mysql_connect("localhost", "root", "") or die(mysql_error());
            mysql_select_db("dcsa") or die("cannot connect database");*/
            $query=  mysql_query("select * from mas_staff");
            $exist=  mysql_num_rows($query);
            $temp="1"; 
            $table_fname="";
            $table_lname="";
            $table_mobile="";
            $table_email="";
            $table_gender="";
            $table_designation="";
            $table_role="";
            $table_pwd="";
            if($exist>0)
            {
                while($row=  mysql_fetch_assoc($query))
                {
                    
                    $table_userid=$row['Staff_Key'];
                    $table_pwd=$row['Password'];
                    if(($user_id==$table_userid) )
                    {
                        $temp=1;
                        $table_fname=$row['First_Name'];
                        $table_lname=$row['Last_Name'];
                        $table_mobile=$row['Mobile'];
                        $table_email=$row['Email'];
                        $table_gender=$row['Gender'];
                        $table_designation=$row['Designation'];
                        $table_role=$row['Role'];
                        
                        break;
                    }
                }
                if($temp==0)
                {
                    print '<script>alert("invalid profile")</script>';
                    
                }
            }
                ?>
	</head>
	<body>
	<div id="page-wrapper">
			<!-- Header -->
                <header id="header">
                        <h1><a href="edit2.php">Back</a></h1>
                </header>

			<!-- Main -->
		<section id="main" class="container">
         <div class="row">
		 <div class="12u">					<!-- Form -->
         <section id="cta">

		
						<h2>Welcome Staff</h2>
						
					
				</section>
                        
                       
				
                                    <div class="table-wrapper">
                                            <table class="alt">
                                                    <thead>
                                                        <tr><td>
                                                                <a href="staff_edit_pf.php" class="button special">Edit Profile</a>
																<?php $user_id=encryptor('encrypt',$user_id); ?>
															    <a href="stud_delete.php?akey1=<?php print "$user_id" ;?>" class="button special">Delete Profile</a>   																
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
                                                                    <td>Mobile Number</td>
                                                                    <td><?php print "$table_mobile"; ?></td>        
                                                            </tr>
                                                            <tr>
                                                                    <td>Email ID</td>
                                                                    <td><?php print "$table_email"; ?></td>        
                                                            </tr>
                                                            <tr>
                                                                    <td>Designation</td>
                                                                    <td><?php print "$table_designation"; ?></td>        
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
			<footer id="footer"> 
					<ul class="icons">
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>						
					</ul>
					<ul class="copyright">
						<li>&copy; GRI-DCSA. All rights reserved.</li>
						<li>
							<script type="text/javascript" src="http://widget.supercounters.com/hit.js"></script>
							<script type="text/javascript">sc_hit(1214356,147,5);	</script>
							<br>
							<noscript><a href="http://www.supercounters.com">Page visits counter</a></noscript>
						</li>
					</ul>
				</footer>
		</div>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/jquery.scrollgress.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]>
		<script src="../users/assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>


	</body>
</html>