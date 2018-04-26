<?php

if(isset($_POST['submit'])){
	$fname=$_POST['txt1'];
	$lname=$_POST['txt2'];

require("fpdf/fpdf.php");
$pdf= new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial","B",16);//to set font size of the letter
$pdf->Cell(0,10,"welcome  {$fname}",1,1,'C');// aha niho bahindura size baje 
$pdf->Cell(95,10," First Name:",1,0); //1 width 0=190, 2 heigh, 3 name, 4 bold table, 5  next line
$pdf->Cell(95,10,"$fname",1,1);
$pdf->Cell(95,10," Last Name:",1,0); //1 width 0=190, 2 heigh, 3 name, 4 bold table, 5 next line
$pdf->Cell(95,10,"$lname",1,1);
$pdf->output(); 
}

?>