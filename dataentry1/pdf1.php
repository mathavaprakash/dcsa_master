 

<?php

if(isset($_POST['Printpdf']))
{
 $class=$_POST["classprint"];
require('fpdf/fpdf.php');
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

$pdf->cell(0,10,'$tclass');
 include_once "../assets/db/dbdcsa.php";
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
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetY($y_axis_initial);
$pdf->SetX(5);
$pdf->Cell(11, 6, 'S.No', 1, 0, 'L', 1);
$pdf->Cell(27, 6, 'Student_key', 1, 0, 'L', 1);
$pdf->Cell(50, 6, 'Student_Name', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Mobile_No', 1, 0, 'L', 1);
$pdf->Cell(83, 6, 'Email_ID', 1, 0, 'L', 1);
$row_height = 6;
$y_axis = $y_axis_initial + $row_height;
//Select the Products you want to show in your PDF file


$result=mysql_query("SELECT * FROM mas_students WHERE batch='$class'") or die(mysql_error());

//initialize counter
$i = 0;

//Set maximum rows per page
$max = 25;

//Set Row Height
$sno=0;

while($row = mysql_fetch_array($result))
{
//If the current row is the last one, create new page and print column title
if ($i == $max)
{
$pdf->AddPage();

//print column titles for the current page
$pdf->SetY($y_axis_initial);
$pdf->SetX(5);

$pdf->Cell(11, 6, 'S.No', 1, 0, 'L', 1);
$pdf->Cell(27, 6, 'Student_Key', 1, 0, 'L', 1);
$pdf->Cell(50, 6, 'Student_Name', 1, 0, 'L', 1);
//$pdf->Cell(15, 6, 'Guru_Key', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Mobile_No', 1, 0, 'L', 1);
$pdf->Cell(83, 6, 'Email_ID', 1, 0, 'L', 1);


$y_axis = $y_axis + $row_height;
$i = 0;
}
$sno=$sno+1;
$fname = $row['First_Name'];
$lname = $row['Last_Name'];
//$skey = $row['Staff_Key'];
$mobile = $row['Mobile'];
$mail = $row['Email'];
//$staff = $row['Staff_Key'];
$stud= $row['Student_Key'];
$pdf->SetY($y_axis);
$pdf->SetX(5);
$pdf->Cell(11, 6, $sno, 1, 0, 'L', 1);
$pdf->Cell(27, 6, $stud, 1, 0, 'L', 1);
$pdf->Cell(50, 6, $fname, 1, 0, 'L', 1);
//$pdf->Cell(15, 6, $skey, 1, 0, 'L', 1);
$pdf->Cell(30, 6, $mobile, 1, 0, 'L', 1);
$pdf->Cell(83, 6, $mail, 1, 0, 'L', 1);



$y_axis = $y_axis + $row_height;
$i = $i + 1;

}
$pdf->Output();
}
?>
<html>
<title>Student Details</title>
< <meta charset="utf-8" />
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
<body  class="landing">
		<div id="page-wrapper">
			<div class="header-overlay">

			<!-- Header -->
				<header id="header">
					<a href="../admin/admin.php"><img src="../images/dcsa-logo.png" height="50" /></a>
					<nav id="nav">
					</nav>
				</header>
				
				</div>
				
				<section id="banner-empty">
					
				</section>
				
					

<!-- Main -->
			

<?php
 if(isset($_POST['Report']))
{
         
    include_once "../assets/db/dbdcsa.php";
     $class=$_POST["classprint"];
$query=mysql_query( "SELECT *FROM mas_students WHERE batch='$class'");
  $exist=  mysql_num_rows($query);
$sno=0;
            $temp="0"; 
            $table_fname="";
             $table_join="";
              $table_guruname="";
             $table_email="";
             $table_studentkey="";
			?>
			<section id="main" class="container">
				<nav id="nav">
				<h4><a href="report_stud.php" > <-Back </a></h4>
				</nav>
					<header>
				
						<h3 align="center">Students Details</h3>
						
					</header>
					
				  </section>
					<div class="row">
                <div class="12u">	
												<div class="table-wrapper">
							<table class="alt">
								<thead>
								<tr>

<th>S.No</th> 							
<th>Student Key</th> 
<th>StudentName</th>
<th>Email</th>
<th>Mobile</th>
<th>GuruKey</th>
<th>Edit Student Details</th>
<th>Delete Student Details</th>

</tr>
</thead>
<tbody>

<?php
           
 if($exist>0)
{
   while($row=  mysql_fetch_assoc($query))
{
	
   $table_guruname=$row['Staff_Key'];               
  $table_studentkey=$row['Student_Key'];
$table_fname=$row['First_Name'];
$table_email=$row['Email'];
$table_mobile=$row['Mobile'];

$sno=$sno+1;
echo"<tr><td>$sno</td>";
echo"<td>$table_studentkey</td>";
echo"<td>$table_fname</td>";
echo"<td>$table_email</td>";
echo"<td>$table_mobile</td>";
echo"<td>$table_guruname</td>";
$studkey=encryptor('encrypt',$table_studentkey);
echo'<td> <a href="student_profile_view1.php?akey='.$studkey.'">Edit Profile</a> </td>';  
 echo'<td> <a href="stud_delete.php?akey1='.$studkey.'">Delete Profile</a> </td></tr> ';
}
?>
</tbody>
</table> 
</div>
</div>
</div>

<?php
}
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