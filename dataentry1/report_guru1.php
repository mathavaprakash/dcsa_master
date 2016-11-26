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

                 
               
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1><a href="index.html">Home</a></h1>
					<nav id="nav">
						
					</nav>
				</header>

			<!-- Main -->
				<section id="main" class="container 75%">
					<header>
						<h2>Report</h2>
					
					</header>
					<div class="box">
                                            <form method="POST" action="#">
                                                    
							<div class="row uniform">
								<div class="6u 12u(mobilep)">
									<input type="text" name="Staff_Key" id="Staff_Key" value="" placeholder="GuruKey" />
								</div>
                                                       </div>
                                                   
                                                    <div class="row uniform">
                                                              	<div class="3u 6u(narrower) 12u(mobilep)">	
                                                                    <input type="submit" value="Report"/>
                                                                    <!--<a href="#" class="button special fit">Report</a>	-->
			</div>
        
                                                             
                                                                <div class="3u 6u(narrower) 12u(mobilep)">				
                                                                    <a href="index.html" class="button alt">Cancel</a>				
                                                                </div>
                                                   </div>
                                                		
                                                				
                                                               
                                                    
						</form>
					</div>
				</section>
			
	
<?php
     if($_SERVER["REQUEST_METHOD"]=="POST")
       {      

             mysql_connect("localhost", "root", "") or die(mysql_error());
            mysql_select_db("dcsa") or die("cannot connect database");
 
            $Staff_Key=mysql_real_escape_string($_POST['Staff_Key']);
$query=mysql_query( "SELECT Student_Key, First_Name,Last_Name,Last_Name,Staff_Key,Year_Of_Joining FROM mas_students WHERE Staff_Key='".$Staff_Key."'");
    
$exist=  mysql_num_rows($query);

            $temp="0"; 
            $table_fname="";
$table_lname="";
             $table_join="";
              $table_Staff_Key="";
           
            $table_studentkey="";
 
            echo "<table border='1' style='border-collapse:collapse'>";
            echo"<th>Student Key</th>";
              
echo"<th>FirstName</th>";

echo"<th>LastName</th>";
echo"<th>Staff_Key</th>";
//echo"<th>Year of Joining</th>";

           
 if($exist>0)
{
   while($row=  mysql_fetch_assoc($query))
{
   $table_Staff_Key=$row['Staff_Key'];               
  $table_studentkey=$row['Student_Key'];
$table_fname=$row['First_Name'];
$table_lname=$row['Last_Name'];
//$table_join=$row['Year_Of_Joining'];
 echo"<tr><td>$table_studentkey</td>";
echo"<td>$table_fname</td>";
echo"<td>$table_lname</td>";
echo"<td>$table_Staff_Key</td>";
//echo"<td>$table_join</td></tr>";


                     
        
                      
}
echo "</table>";    
}
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
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
   
</body>
</html>
