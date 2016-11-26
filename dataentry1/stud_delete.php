 <!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Delete Student Profile</title>
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
	</head>
	 <?php
            
                     if(isset($_GET['akey1']))
					 {
						  include_once "../assets/db/dbdcsa.php";
						  $Student_Key=encryptor('decrypt',$_GET['akey1']);	            
                    $Student_Key1=$_GET["akey1"];
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
              
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<a href="../admin/admin.php"><img src="../images/dcsa-logo.png" height="50" /></a>
					<nav id="nav">
						
					</nav>
				</header>

			<!-- Main -->
				<section id="main" class="container">
									<div class="row">
<div class="12u">
					<section id="cta">
<h3>Delete  Student Profile</h2>
                                            <form method="POST" action="#">
                                                    
							<div class="row uniform 50%">
								<div class="12u 12u(mobilep)">
								<?php $Student_Key1=encryptor('encrypt',$Student_Key);?>
									<input type="text" name="Student_Key" id="Student_Key" value="<?php echo "$Student_Key" ?>" placeholder="Student_Key" readonly="readonly"  />
								</div>
                                                       </div>
                                                   
                                                    <div class="row uniform 50%">
                                                              	<div class="12u">	
                                                                    <input type="submit" value="Delete"/>
                                                                    <!--<a href="#" class="button special fit">Delete</a>	-->
							
                                                                    <a href="report_stud.php" class="button alt">Cancel</a>				
                                                                </div>
                                                   </div>
                                                		
                                                				
                                                               
                                                    
						</form>
</section>
</div>
					</div>
				</section>
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
	
<?php
            
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {      
               
           
            
            $Student_Key=mysql_real_escape_string($_POST['Student_Key']);
            
          
            
           $query= "DELETE FROM mas_students WHERE Student_Key='".$Student_Key."'";
       
if(mysql_query($query))
{
    
           
            print '<script>alert("Your Profile was Deleted Successfully")</script>';
            print '<script>window.location.assign("report_stud.php");</script>';
         
        }


}
?>

        </body>
</html>