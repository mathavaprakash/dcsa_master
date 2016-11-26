 

<?php

if(isset($_POST['Printpdf']))
{
 $class=$_POST["classprint"];
require('fpdf/fpdf.php');
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
  $pdf->cell(0,10,'$tclass');
 mysql_connect("localhost", "root", "") or die(mysql_error());
            mysql_select_db("dcsa") or die("cannot connect database");
//Create new pdf file
$pdf=new FPDF();

//Open file
$pdf->Open();

//Disable automatic page break
$pdf->SetAutoPageBreak(false);

//Add first page
$pdf->AddPage();

//set initial y axis position per page
$y_axis_initial = 25;

//print column titles for the actual page
$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetY($y_axis_initial);
$pdf->SetX(25);
$pdf->Cell(30, 6, 'Student_key', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Firstname', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Lastname', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Class', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Gender', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Email', 1, 0, 'L', 1);
$row_height = 6;
$y_axis = $y_axis_initial + $row_height;
//Select the Products you want to show in your PDF file


$result=mysql_query("SELECT * FROM mas_students WHERE batch='$class'") or die(mysql_error());

//initialize counter
$i = 0;

//Set maximum rows per page
$max = 25;

//Set Row Height


while($row = mysql_fetch_array($result))
{
//If the current row is the last one, create new page and print column title
if ($i == $max)
{
$pdf->AddPage();

//print column titles for the current page
$pdf->SetY($y_axis_initial);
$pdf->SetX(25);


$pdf->Cell(30, 6, 'Student_Key', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Firstname', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Lastname', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Class', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Gender', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Email', 1, 0, 'L', 1);

$y_axis = $y_axis + $row_height;
$i = 0;
}

$fname = $row['First_Name'];
$lname = $row['Last_Name'];
$class = $row['batch'];
$gender = $row['Gender'];
$mail = $row['Email'];
//$staff = $row['Staff_Key'];
$stud= $row['Student_Key'];
$pdf->SetY($y_axis);
$pdf->SetX(25);
$pdf->Cell(30, 6, $stud, 1, 0, 'L', 1);
$pdf->Cell(30, 6, $fname, 1, 0, 'L', 1);
$pdf->Cell(30, 6, $lname, 1, 0, 'L', 1);
$pdf->Cell(30, 6, $class, 1, 0, 'L', 1);
$pdf->Cell(30, 6, $gender, 1, 0, 'L', 1);
$pdf->Cell(30, 6, $mail, 1, 0, 'L', 1);



$y_axis = $y_axis + $row_height;
$i = $i + 1;

}
$pdf->Output();
}
?>
<title>Report View</title>
<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<script type="text/javascript">
		</script>
<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1><a href="report_stud.php">Back</a></h1>
					<nav id="nav">
						
					</nav>
				</header>

<!-- Main -->
				<section id="main" class="container 75%">
					<header>
						<h2>Report View</h2>
					
					</header>

                                                                   
            
<a href="stud_delete.php" class="button special" >Delete Profile</a>  
<a href="student_edit.php" class="button special" >Edit Profile</a>   

	
				</section>
</div>
<?php
 if(isset($_POST['Report']))
{
         
    mysql_connect("localhost", "root", "") or die(mysql_error());
     mysql_select_db("dcsa") or die("cannot connect database");
     $class=$_POST["classprint"];
$query=mysql_query( "SELECT *FROM mas_students WHERE Batch='$class'");
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
echo"<th>Email</th>";
echo"<th>Class</th>";
echo"<th>GuruName</th>";
//echo"<th>Year of Joining</th>";

           
 if($exist>0)
{
   while($row=  mysql_fetch_assoc($query))
{
   $table_guruname=$row['Staff_Key'];               
  $table_studentkey=$row['Student_Key'];
$table_fname=$row['First_Name'];
$table_email=$row['Email'];
$table_class=$row['batch'];
//$table_join=$row['Year_Of_Joining'];
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
   
