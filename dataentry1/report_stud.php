 <!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Report</title>
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
                                                   <h2>Report</h2>
                                            <form method="POST" action="pdf1.php">
                                                  <div class="row uniform 50%">
					<div class="12u 12u(mobilep)">
																																   
                       	<?php	
										 
															mysql_connect("localhost", "root", "") or die(mysql_error());
															mysql_select_db("dcsa") or die("cannot connect database");
															$sql1=mysql_query("select distinct(batch) from mas_students");
															$exists=mysql_num_rows($sql1);
   				
												if($exists>0)
												echo '<select name="classprint" id="class"><option> Select Batch</option>';
											    while($row=mysql_fetch_array($sql1))
												{
													echo '<option>'.$row['batch'].'</option>';
												}
												echo '</select>';
											?>
                                                                                                                          
																						
</div>
                                                                                        
                                                       </div>	                            
                                                                          <div class="row uniform 50%">
                                                              	<div class="12u">	
                                                                    <input type="submit" value="Report" name="Report"/>
                                                                    <!--<a href="#" class="button special fit">Report</a>	-->
				
   
            <input type="submit"  name="Printpdf" value="Printpdf"/>
			<!--<a href="#" class="button special fit">Report</a>-->	
			
                      </div>
                                                   </div>
                                                		
                                                             </br>
                                                               				
                                                            <a href="../admin/admin.php" class="button alt">Cancel</a>				
                                                        
                                                				
                                                               
                                                    
						</form>
</section>
					</div>
</div>
				</section>
			
	
<?php
   if(isset($_POST['Report']))
   {
             mysql_connect("localhost", "root", "") or die(mysql_error());
            mysql_select_db("dcsa") or die("cannot connect database");
 
            $class=$_POST["classprint"];


$query=mysql_query( "SELECT *FROM mas_students WHERE batch='".$class."'");
  
$exist=  mysql_num_rows($query);
$sno=0;
            $temp="0"; 
            $table_fname="";
             $table_join="";
              $table_guruname="";
$table_email="";
$table_class="";
           
            $table_studentkey="";
 
            echo "<table border='1' style='border-collapse:collapse'>";
			 echo"<th>S.No</th>";
            echo"<th>Student Key</th>";
              
echo"<th>StudentName</th>";
echo"<th>Email</th>";
echo"<th>Mobile</th>";
echo"<th>Batch</th>";
echo"<th>GuruKey</th>";
//echo"<th>Year of Joining</th>";

           
 if($exist>0)
{
   while($row=  mysql_fetch_assoc($query))
{
	$sno=$sno+1;
 $table_guruname=$row['Staff_Key'];               
 $table_studentkey=$row['Student_Key'];
$table_fname=$row['First_Name'];
$table_email=$row['Email'];
$table_class=$row['batch'];
$table_mobile=$row['Mobile'];
//$table_join=$row['Year_Of_Joining'];
echo"<tr><td>$sno</td>";
echo"<tr><td>$table_studentkey</td>";
echo"<td>$table_fname</td>";
echo"<td>$table_email</td>";
echo"<td>$table_mobile</td>";
echo"<td>$table_class</td>";
echo"<td>$table_guruname</td>";
//echo"<td>$table_join</td></tr>";
}
echo "</table>";    
}

}

       
if(isset($_POST['Printpdf']))
{
	 $tclass=$_POST["classprint"];
	 echo "class".$tclass;
	 $_SESSION['class']=$tclass;
	 header("location:pdf1.php");
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
