 

<?php

if(isset($_POST['Printpdf']))
{
 $class=$_POST['classprint'];
 $class1=$_POST["classprint1"];
require('fpdf/fpdf.php');
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
  $pdf->cell(0,10,'$tclass');
 
$pdf=new FPDF();

//Open file
$pdf->Open();

//Disable automatic page break
$pdf->SetAutoPageBreak(false);

//Add first page
$pdf->AddPage();

//set initial y axis position per page
$y_axis_initial = 15;

//print column titles for the actual page
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetY($y_axis_initial);
$pdf->SetX(10);
$pdf->Cell(11, 8, 'S.No', 1, 0, 'L', 1);
$pdf->Cell(30, 8, 'Student_key', 1, 0, 'L', 1);
$pdf->Cell(90, 8, 'Student_Name', 1, 0, 'L', 1);
$pdf->Cell(30, 8, 'Mobile', 1, 0, 'L', 1);
$pdf->Cell(30, 8, 'Precentage', 1, 0, 'L', 1);
$row_height = 6;
$y_axis = $y_axis_initial + $row_height;
//Select the Products you want to show in your PDF file

include_once "../assets/db/dbdcsa.php";
$result=mysql_query("SELECT * FROM mas_students WHERE Staff_Key='$class' AND batch='$class1'") or die(mysql_error());

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
$pdf->SetX(10);

$pdf->Cell(11, 8, 'S.No', 1, 0, 'L', 1);
$pdf->Cell(30, 8, 'Student_Key', 1, 0, 'L', 1);
$pdf->Cell(90, 8, 'Student_Name', 1, 0, 'L', 1);
$pdf->Cell(30, 8, 'Mobile', 1, 0, 'L', 1);
$pdf->Cell(30, 8, 'Precentage', 1, 0, 'L', 1);
$y_axis = $y_axis + $row_height;
$i = 0;
}
$sno=$sno+1;
$fname = $row['First_Name'];
$mobile = $row['Mobile'];
$class = $row['batch'];
$mail = $row['Email'];
$stud= $row['Student_Key'];
$tyear=substr($class,0,2);
	$tdate=date("$tyear-07-01");
	$today=date("y-m-d");
	$ty1=date('y',strtotime($tdate));
	$ty2=date('y',strtotime($today));
	$tm1=date('m',strtotime($tdate));
	$tm2=date('m',strtotime($today));
	$diff=((($ty2-$ty1)*12)+($tm2-$tm1));
	if($diff<6)
	{
		$tsem=1;
	}
	else if($diff<12)
	{
		$tsem=2;
	}
	else if($diff<18)
	{
		$tsem=3;
	}
	else if($diff<24)
	{
		$tsem=4;
	}
	else if($diff<30)
	{
		$tsem=5;
	}
	else if($diff<36)
	{
		$tsem=6;
	}
	else
	{
		$tsem=0;
	}
$precent="";
$len=0;
$res1=mysql_query("select * from stud_attend where rollno='$stud' and batch='$class' and sem='$tsem'");
if(mysql_num_rows($res1)>0)
{
	$count=0;
	while($row=mysql_fetch_array($res1))
	{
		$valarray=explode('|',$row['overall']);
		$len=count($valarray)-1;
		for($i=0;$i<$len;$i++)
		{
			if($valarray[$i]==1)
				$count+=1;
		}
	}
	$temp=($count/$len)*100;
	$precent=substr($temp,0,5)."%";
}
else
{
	$precent="-:-";
}
$pdf->SetY($y_axis);
$pdf->SetX(10);
$pdf->Cell(11, 8, $sno, 1, 0, 'L', 1);
$pdf->Cell(30, 8, $stud, 1, 0, 'L', 1);
$pdf->Cell(90, 8, $fname, 1, 0, 'L', 1);
//$pdf->Cell(15, 8, $class, 1, 0, 'L', 1);
$pdf->Cell(30, 8, $mobile, 1, 0, 'L', 1);
$pdf->Cell(30, 8, $precent, 1, 0, 'L', 1);



$y_axis = $y_axis + $row_height;
$i = $i + 1;

}
$pdf->Output();
}
?>
<title>My Students</title>
      
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
					include_once "../assets/db/dbdcsa.php";
             
                    if($_SESSION['encregno']){
                    }
                    else
                    {
                        header("location:../index.html");
                    }
					
                    $user_id=  encryptor('decrypt', $_SESSION['encregno']);   
                    $_SESSION['regno']=$user_id;
                    
                    //$encrp=$_SESSION['encr'];  
                    
                    $query=  mysql_query("select * from mas_staff");
                    $exist=  mysql_num_rows($query);
                    $temp="0";
                    $table_fname="";
                    if($exist>0)
                    {
                        while($row=  mysql_fetch_assoc($query))
                        {
                            $table_userid=$row['Staff_Key'];
							
                            if($user_id==$table_userid)
                            {
                                $temp=1;
                                $table_fname=$row['First_Name'];
                                break;
                            }
                        }
                        if($temp==0)
                        {
                             header("location:../index.html");
                        }
                    }
					?>

					
			<body  class="landing">
		<div id="page-wrapper">
			<div class="header-overlay">
			<!-- Header -->
				<header id="header" class="alt">
					<a href="../logout.php"><img src="../images/dcsa-logo.png" height="50" /></a>
					<nav id="nav">
						<ul>
							<li><a href="staff_home.php">Home</a></li>
							<li>
								<a href="#" class="icon fa-angle-down">E-Learning</a>
								<ul>
									<li><a href="group_home_staff.php">Group Home</a></li>
									<li><a href="mad_create_assign.php">Give Assignment</a></li>
									<li><a href="notes_create.php">Give Notes</a></li>
								</ul>
							</li>
							<li>
								<a href="#" class="icon fa-angle-down">Quiz</a>
								<ul>
									<li><a href="../quiz/quiz_home_staff.php">Quiz Home</a></li>
									<li><a href="../quiz/create_test.php">Create Quiz</a></li>
								</ul>
							</li>
							<li>
								<a href="#" class="icon fa-angle-down"><?php  print "$table_fname"; ?></a>
								<ul>
                                    <li><a href="staff_profile_view.php">View Profile</a></li>
									<li><a href="edit_profile.php">Edit Profile</a></li>
									<li><a href="change_password.php">Change Password</a></li>
									<li><a href="report_guru.php">My Students</a><li>
								</ul>
							</li>
                            <li><a href="../logout.php" class="button">Log out</a></li>
						</ul>
					</nav>
				</header>
			</div>
			<section id="banner-empty">
					
				</section>
<!-- Main -->
				
				
</div>
<?php
 if(isset($_POST['Report']))
{
         
     $class=$_POST["classprint"];
	 $class1=$_POST["classprint1"];
$query=mysql_query( "SELECT *FROM mas_students WHERE Staff_Key='$class' AND batch='$class1'");
  $exist=  mysql_num_rows($query);
$sno=0;
            $temp="0"; 
            $table_fname="";
             $table_mobile="";
              $table_guruname="";
             $table_email="";
             $table_class="";
            $table_studentkey="";
			?>
			<section id="main" class="container">
			<nav id="nav">
			<!--<h4><a  href="report_guru.php"> Back </a></h4>-->
			</nav>
					<header>
						<h3 align="center">My Students Details</h3>
						
					</header>
					
				</section>
		
			<div class="row ">
                                        <div class="12u">	
										
						<div class="table-wrapper">
							<table class="alt">
								<thead>
									<tr>
 
            <!--<table border='1' style='border-collapse:collapse'>-->
			 <th>S.No</th>
              
            <th>Student Key</th>
              
<th>StudentName</th>
<th>Email_ID</th>
<th>Mobile Number</th>
<th>Batch</th>
<th>Guru_Key</th>
<th>Precentage</th>

</tr>
</thead>
<tbody>
<?php
           
 if($exist>0)
{
   while($row=  mysql_fetch_assoc($query))
{
	$sno=$sno+1;
    $table_guruname=$row['Staff_Key'];               
    $table_studentkey=$row['Student_Key'];
	$table_fname=$row['First_Name'];
	$table_email=$row['Email'];
	$table_mobile=$row['Mobile'];
	$table_class=$row['batch'];
	$tyear=substr($table_class,0,2);
	$tdate=date("$tyear-07-01");
	$today=date("y-m-d");
	$ty1=date('y',strtotime($tdate));
	$ty2=date('y',strtotime($today));
	$tm1=date('m',strtotime($tdate));
	$tm2=date('m',strtotime($today));
	$diff=((($ty2-$ty1)*12)+($tm2-$tm1));
	if($diff<6)
	{
		$tsem=1;
	}
	else if($diff<12)
	{
		$tsem=2;
	}
	else if($diff<18)
	{
		$tsem=3;
	}
	else if($diff<24)
	{
		$tsem=4;
	}
	else if($diff<30)
	{
		$tsem=5;
	}
	else if($diff<36)
	{
		$tsem=6;
	}
	else
	{
		$tsem=0;
	}
$precent="";
$len=0;
$res1=mysql_query("select * from stud_attend where rollno='$table_studentkey' and batch='$table_class' and sem='$tsem'");
if(mysql_num_rows($res1)>0)
{
	$count=0;
	while($row=mysql_fetch_array($res1))
	{
		$valarray=explode('|',$row['overall']);
		$len=count($valarray)-1;
		for($i=0;$i<$len;$i++)
		{
			if($valarray[$i]==1)
				$count+=1;
		}
	}
	$temp=($count/$len)*100;
	$precent=substr($temp,0,5)."%";
}
else
{
	$precent="-:-";
}
?>
<tr>
<td><?php print "$sno"; ?></td>
<td><?php print "$table_studentkey"; ?></td>
<td><?php print"$table_fname"; ?></td>
<td><?php print"$table_email"; ?></td>
<td><?php print"$table_mobile"; ?></td>
<td><?php print"$table_class"; ?></td>
<td><?php print"$table_guruname"; ?></td>
<td><?php print"$precent"; ?></td>
</tr>
</tbody>
<?php
}
}
}
?> 


</table>
</div>
</div>
</div>
</section>
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