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
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<script type="text/javascript">
		</script>
         
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h2><a href="">Back</a></h2>
					<nav id="nav">
						
					</nav>
				</header>

			<!-- Main -->
				<section id="main" class="container 75%">
					
					<div class="row">
<div class="12u">
<section id="cta">
<h2>Report</h2>
					
                                            <form method="POST" action="pdf2.php">
                                                  <div class="row uniform 50%">
					<div class="12u 12u(mobilep)">
                                                                                           
									<input type="text" name="classprint" id="class" value="" placeholder="Guru_Key" />
								</div>
                                </div>
					  <div class="row uniform 50%">
					<div class="12u 12u(mobilep)">
						 
										<?php	
										 
															mysql_connect("localhost", "root", "") or die(mysql_error());
															mysql_select_db("dcsa") or die("cannot connect database");
															$sql1=mysql_query("select * from mas_students");
															$exists=mysql_num_rows($sql1);
   				
												if($exists>0)
												echo '<select name="classprint1" ><option> Select Batch</option>';
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
  <a href="index.html" class="button alt">Cancel</a>	
                                                		
                                                				
                                                               
                                                    
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
			$class1=$_POST["classprint1"];


$query=mysql_query( "SELECT *FROM mas_students WHERE Staff_Key='".$class."' AND batch='".$class1."'");
  
$exist=  mysql_num_rows($query);

            $temp="0"; 
            $table_fname="";
             $table_mobile="";
              $table_guruname="";
$table_email="";
$table_class="";
           
            $table_studentkey="";
 
            echo "<table border='1' style='border-collapse:collapse'>";
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
 $table_guruname=$row['Staff_Key'];               
 $table_studentkey=$row['Student_Key'];
$table_fname=$row['First_Name'];
$table_email=$row['Email'];
$table_mobile=$row['Mobile'];
$table_class=$row['batch'];
//$table_join=$row['Year_Of_Joining'];
echo"<tr><td>$table_studentkey</td>";
echo"<td>$table_fname</td>";
echo"<td>$table_email</td>";
echo"<th>$table_mobile</td>";
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
	 $tclass1=$_POST["classprint1"];
	 echo "class".$tclass;
	 echo "class1".$tclass1;
	 $_SESSION['class']=$tclass;
	 $_SESSION['class1']=$tclass1;
	 header("location:pdf2.php");
}
?>

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
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/jquery.scrollgress.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>
   
</body>
</html>
