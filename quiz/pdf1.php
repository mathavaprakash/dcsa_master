<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
 //$class=$_POST["classprint"];
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
$pdf->SetX(25);
$pdf->Cell(20, 6, 'SNo', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Reg.No', 1, 0, 'L', 1);
$pdf->Cell(60, 6, 'Name', 1, 0, 'L', 1);
//$pdf->Cell(30, 6, 'Start Time', 1, 0, 'L', 1);
//$pdf->Cell(30, 6, 'Finish Time', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Time Taken', 1, 0, 'L', 1);
$pdf->Cell(15, 6, 'Marks', 1, 0, 'L', 1);
$row_height = 6;
$y_axis = $y_axis_initial + $row_height;
//Select the Products you want to show in your PDF file


$result=mysql_query("SELECT * FROM temp_report_quiz") or die(mysql_error());

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

$pdf->Cell(20, 6, 'SNo', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Reg.No', 1, 0, 'L', 1);
$pdf->Cell(50, 6, 'Name', 1, 0, 'L', 1);
//$pdf->Cell(30, 6, 'Start Time', 1, 0, 'L', 1);
//$pdf->Cell(30, 6, 'Finish Time', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Time Taken', 1, 0, 'L', 1);
$pdf->Cell(15, 6, 'Marks', 1, 0, 'L', 1);



$y_axis = $y_axis + $row_height;
$i = 0;
}

$regno = $row['reg_no'];
$name = $row['name'];
$stime = $row['st_time'];
$ftime = $row['end_time'];
$dur = $row['time_taken'];
$marks = $row['marks'];
//$staff = $row['Staff_Key'];
$sno= $row['sno'];
$pdf->SetY($y_axis);
$pdf->SetX(25);
$pdf->Cell(20, 6, $sno, 1, 0, 'L', 1);
$pdf->Cell(30, 6, $regno, 1, 0, 'L', 1);
$pdf->Cell(60, 6, $name, 1, 0, 'L', 1);
//$pdf->Cell(30, 6, $stime, 1, 0, 'L', 1);
//$pdf->Cell(30, 6, $ftime, 1, 0, 'L', 1);
$pdf->Cell(30, 6, $dur, 1, 0, 'L', 1);
$pdf->Cell(15, 6, $marks, 1, 0, 'L', 1);


$y_axis = $y_axis + $row_height;
$i = $i + 1;

}
$pdf->Output();
}
?>
