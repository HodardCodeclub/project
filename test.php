<?php
require ('fpdf/fpdf.php');
class PDF extends FPDF {
	function Header(){
	global $title;
     // Calculate width of title and position
    $w = $this->GetStringWidth($title)+6;
    $this->SetX((210-$w)/2);

     $this->Image('babu.png',10,6,20);
     $this->SetFont('Times','B',15);

    // Thickness of frame (1 mm)
    $this->SetLineWidth(1);
     $this->Cell($w,10,$title,0,0,'C');
     $this->ln(20);
	}

     function LoadData($file)
       {
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
}

	function  Chapter($num, $label){
	    $this->SetFont('Arial','',12);
        $this->SetFillColor(200,255,255);
        $this->Cell(0,6,"Chapter $num : $label",0,1,'L',true);
        $this->Ln(4);
	}
	function Mybody($file,$type,$datas){
		if($type='file'){
      $txt = file_get_contents($file);        // Read text file
      $this->SetFont('Times','',12);     // Times 12
       $this->MultiCell(0,5,$txt);    // Output justified text
       $this->Ln();          // Line break
		}
		elseif($type='csv'){

			// Column widths
		    $w = array(40, 35, 40, 45);
		    // Header
		    for($i=0;$i<count($datas);$i++)
		        $this->Cell($w[$i],7,$datas[$i],1,0,'C');
		    $this->Ln();
		    // Data
		    foreach($file as $row)
		    {
		        $this->Cell($w[0],6,$row[0],'LR');
		        $this->Cell($w[1],6,$row[1],'LR');
		        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
		        $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
		        $this->Ln();
		    }
		    // Closing line
		    $this->Cell(array_sum($w),0,'','T');

			}
		else{
		for($i=1;$i<=15;$i++)
    $pdf->Cell(0,10,'Pr '.$i,0,1);	
		}
	}
	function Layout($num, $label,$file,$type,$datas){
		 $this->AddPage();
		 $this->Chapter($num, $label);
		 $this->Mybody($file,$type,$datas);
	}
	function Footer(){
		
	$this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,$this->PageNo(),0,0,'R');
	}
}


$pdf = new PDF();
$title = 'Document Report Office';
$pdf->SetTitle($title);
$pdf->SetAuthor('@2017');
$pdf->Layout(1,'amakara','install.txt','file','');
$pdf->Layout(2,'IBISHYIMBO','install.txt','file','');

// Column headings
$header = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)');
// Data loading
$data = $pdf->LoadData('countries.xlsx');

$pdf->Layout(3,'AMARANGI',$data,'csv',$header);
/*for($i=1;$i<=25;$i++){
    $pdf->Cell(0,10,'Pr '.$i,0,1);
}
*/
$pdf->output();




?>