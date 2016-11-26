<!DOCTYPE HTML>
<html>
    <head>
        <title>Mail Validation</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <?php            
            //session_start();
			include_once "assets/db/dbdcsa.php";
        
        $id=  encryptor('decrypt', $_GET['regno']);
        $password=  encryptor('decrypt', $_GET['pwd']);
        $action=$_GET['action'];
        $type=$_GET['account'];
        $message="Invalid Action";
               // $user_id=$_SESSION['regno'];   
                //$encrp=$_SESSION['encr'];  
       
        if($type=="staff")
        {
            $query=  mysql_query("select * from mas_staff");
            $exist=  mysql_num_rows($query);
            $temp="0";
            $table_fname="";
            if($exist>0)
            {
                while($row=  mysql_fetch_assoc($query))
                {
                    $table_userid=$row['Staff_Key'];
                    $table_pwd=$row['Password'];
                    $table_active=$row['IsActive'];
                    $activate=0;
                    if($action=="register")
                    {
                        if(($id==$table_userid) and ($password==$table_pwd)and ($table_active==0))
                        {
                            $activate=1;
                            mysql_query("update mas_staff SET IsActive=TRUE WHERE Staff_Key = $id");
                            $message="Your New Account Registered Successfully";
                            break;
                        }
                    }
                    else if($action=="resetpassword")
                    {
                        if(($user_id==$table_userid) and ($table_active==1))
                        {
                            mysql_query("update mas_staff SET Password='$password' WHERE Staff_Key = $id");
                            $message="Your New Password Updated Successfully";
                            break;
                        }
                    }
                }
            }
        }
        else if($type=="student")
        {
            $query=  mysql_query("select * from mas_students");
            $exist=  mysql_num_rows($query);
            $temp="0";
            $table_fname="";
            if($exist>0)
            {
                while($row=  mysql_fetch_assoc($query))
                {
                    $table_userid=$row['Student_Key'];
                    $table_pwd=$row['Password'];
                    $table_active=$row['IsActive'];
                    if($action=="register")
                    {
                        if(($id==$table_userid) and ($password==$table_pwd)and ($table_active==0))
                        {
                            mysql_query("update mas_students SET IsActive=TRUE WHERE Student_Key = $id");
                            $message="Your New Account Registered Successfully";
                            break;
                        }
                    }
                    else if($action=="resetpassword")
                    {
                        if(($user_id==$table_userid) and ($table_active==1))
                        {
                            mysql_query("update mas_staff SET Password='$password' WHERE Student_Key = $id");
                            $message="Your New Password Updated Successfully";
                            break;
                        }
                    }
                }
            }
        }
    ?>
    </head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1><a href="index.html">Home</a></h1>
					
				</header>

			<!-- Main -->
			<section id="main" class="container">
                
				<section id="cta">
                        <div class="row">
                            <div class="12u">
								<h3>
									<?PHP print "$message"; ?> </h3>
                                                       
									<?php if($message!="Invalid Action")
									{ ?>
										
										<h4>
											   
												your Login ID  : <?PHP print "$id"; ?> </br>
									   
												Your Password   : <?PHP print "$password"; ?></br></br>
									  
												<p>Note   :  Please use your Login ID & Password mensioned above </br>
												you can change your password in your home page </p>
												login -> Home -> menu -> profile -> change password 
												</h4></br></br>
									  
									   <?php
									}
								   
										
									?>
									<ul class="actions align-center">
										<li><a href="login.php" ><input type="button" value="Goto Login "/></a></li>
										<li><a href="index.html" ><input type="button"  value="DCSA Home"/></a></li>
										</ul>
                                                   <!-- <a href="index.html" >DCSA Home</a><br/>			
                                                    <a href="login.php" >Goto Login</a>	-->
								
							</div>
							
							</div>
							</section>
						
                                
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