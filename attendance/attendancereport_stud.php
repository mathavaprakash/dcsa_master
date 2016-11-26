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
		<script type="text/javascript" src="javascripts/attendance.js"></script>
		<script type="text/javascript">
		</script>
         
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
				</section>
		</div>
    </body>
			
	
<?php
   if(isset($_GET['rollno']))
   {
	   
		mysql_connect("localhost", "root", "") or die(mysql_error());
		mysql_select_db("dcsa") or die("cannot connect database");
		$trollno=$_GET['rollno'];
		$query=mysql_query("SELECT * FROM stud_attend WHERE rollno='".$trollno."'");
		$exist=  mysql_num_rows($query);
		$temp="0"; 
		$table_fname="";
		$table_join="";
		$table_guruname="";
		$table_email="";
		$table_class="";
		$table_studentkey="";
		echo "<table border='1' style='border-collapse:collapse'>";
		echo"<th>Student Key</th>";
		echo"<th>StudentName</th>";
		echo"<th>Total</th>";
		echo"<th>Presentage</th>";
 if($exist>0)
{
   while($row=  mysql_fetch_assoc($query))
{
 $table_guruname=$row['guruname'];               
 $table_studentkey=$row['Student_Key'];
$table_fname=$row['First_Name'];
$table_email=$row['Email'];
$table_class=$row['Batch'];
$table_join=$row['Year_Of_Joining'];
echo"<tr><td>$table_studentkey</td>";
echo"<td>$table_fname</td>";
echo"<td>$table_email</td>";
echo"<td>$table_class</td>";
echo"<td>$table_guruname</td>";
echo"<td>$table_join</td></tr>";
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
