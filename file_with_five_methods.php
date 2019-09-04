<?php
 use setasign\Fpdi\Fpdi;
require_once ('fpdf/fpdf.php');

require_once ('fpdi/src/autoload.php');

class PDF extends FPDF

{
	function Certificate($name, $id, $email)
	{
		$this->AddPage();

		// Logo

		$this->Image('Images/certificate_template.png', 5, 50, 200);

		// Arial bold 15

		$this->SetFont('Arial', 'B', 15);

		// Move to the right

		$this->Cell(80);

		// Line break

		$this->Ln(94);
		$this->Cell(40, 10);
		$this->Cell(100, 10, $name, 0, 0, 'L');
		$this->Ln(18);
		$this->Cell(33, 10);
		$this->Cell(80, 10, $id, 0, 0, 'L');
		$this->Ln(14);
		$this->Cell(91, 10);
		$this->Cell(80, 10, $email, 0, 0, 'L');
		$this->AliasNbPages();
		$this->Output();
	}

	function id_card_pdf($id, $name)
	{
		for ($i = 1; $i <= 100; $i++)
		{
			$this->AddPage();

			// Logo

			$this->Image('Images/id_card.png', 5, 50, 200);

			// Arial bold 15

			$this->SetFont('Arial', 'B', 15);

			// Move to the right

			$this->Cell(80);

			// Line break

			$this->Ln(82);
			$this->Cell(92, 10);
			$this->Cell(50, 10, $name, 0, 0, 'L');
			$this->Ln(15);
			$this->Cell(92, 10);
			$this->Cell(50, 10, $id, 0, 0, 'L');
		}

		$this->AliasNbPages();
		$this->Output();
	}

	function coupon_pdf($date, $breakfast, $lunch, $dinner)
	{
		$this->AddPage();
		$this->SetFont('Arial', 'B', 26);
		$this->Ln(8);
		$this->Cell(60, 10);
		$this->Cell(50, 10, 'Date : ' . $date, 0, 0, 'C');
		$this->Image('Images/under_line.png', 70, 28, 70);
		$this->Ln(15);
		if ($breakfast != '')
		{
			$this->Cell(68, 10);
			$this->SetFont('Arial', 'B', 22);
			$this->Cell(50, 10, 'Breakfast', 0, 0, 'C');
			$this->Image('Images/under_line.png', 70, 42, 70);
			$this->Ln(15);
			$this->Cell(68, 10);
			$this->Cell(50, 10, 'Id : 151-15-469', 0, 1, 'C');
			$this->Cell(68, 10);
			$this->Cell(50, 10, 'Name : Mokbul Hossain', 0, 0, 'C');
		}

		if ($lunch != '')
		{
			if ($breakfast != '')
			{
				$this->Ln(15);
				$this->Image('Images/under_line.png', 70, 83, 70);
			}
			else
			{
				$this->Image('Images/under_line.png', 70, 42, 70);
			}

			$this->Cell(68, 10);
			$this->SetFont('Arial', 'B', 22);
			$this->Cell(50, 10, 'Lunch', 0, 0, 'C');
			$this->Ln(15);
			$this->Cell(68, 10);
			$this->Cell(50, 10, 'Id : 151-15-469', 0, 1, 'C');
			$this->Cell(68, 10);
			$this->Cell(50, 10, 'Name : Mokbul Hossain', 0, 0, 'C');
		}

		if ($dinner != '')
		{
			if ($breakfast != '' && $lunch != '')
			{

				// $this->Ln(15);

				$this->Image('Images/under_line.png', 70, 123, 70);
			}

			if ($breakfast != '' || $lunch != '')
			{
				$this->Ln(15);
				$this->Image('Images/under_line.png', 70, 83, 70);
			}
			else
			{
				$this->Image('Images/under_line.png', 70, 42, 70);
			}

			$this->Cell(68, 10);
			$this->SetFont('Arial', 'B', 22);
			$this->Cell(50, 10, 'Dinner', 0, 0, 'C');
			$this->Ln(15);
			$this->Cell(68, 10);
			$this->Cell(50, 10, 'Id : 151-15-469', 0, 1, 'C');
			$this->Cell(68, 10);
			$this->Cell(50, 10, 'Name : Mokbul Hossain', 0, 0, 'C');
		}
		else
		{
		}

		$this->AliasNbPages();
		$this->Output();
	}

	function pdf_write_when_upload($filename, $header_content, $footer_content)
	{
		$filename = 'Files/' . $filename;
		$pdf = new Fpdi();

		// set the source file

		$pagecount = $pdf->setSourceFile($filename);
		$header_lines = preg_split('/\n|\r/', $header_content);
		$Total_hlines = count($header_lines);
		$footer_lines = preg_split('/\n|\r/', $footer_content);
		$Total_flines = count($footer_lines);

		// import all page

		for ($i = 1; $i <= $pagecount; $i++)
		{
			$tplIdx = $pdf->importPage($i);

			// add a page

			$pdf->AddPage();

			// use the imported page and place it at position 10,10 with a width of 100 mm

			$pdf->useTemplate($tplIdx, 10, 10, 200);

			// $pdf->AliasNbPages();
			// now write some text above the imported page

			$pdf->SetFont('Helvetica', '', 16);
			$pdf->SetTextColor(0, 0, 0);
			$pdf->SetXY(50, 10); /*
			$pdf->Cell(0,6,'',0,1,'L');*/
			for ($j = 0; $j < $Total_hlines; $j++)
			{
				$pdf->Cell(20, 3, $header_lines[$j], 0, 1, 'L');
			}

			$pdf->SetFont('Helvetica', '', 14);
			$pdf->SetXY(30, 265);
			for ($j = 0; $j < $Total_flines; $j++)
			{
				$pdf->Cell(20, 3, $footer_lines[$j], 0, 1, 'L');
				$pdf->Cell(40, 0, '', 0, 0, 'L');
			}
		}

		$pdf->Output();
	}

	// Page footer

	function Footer()
	{

		// Position at 1.5 cm from bottom

		$this->SetY(-15);

		// Arial italic 8

		$this->SetFont('Arial', 'I', 8);

		// Page number

		$this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
	}
    function visa_letter_pdf($ref,$date,$to,$committee,$paper_id,$paper_title,
                          $meeting_place,$director_info)
	{
		
		// $object_of_pdf = new FPDF('P','mm',array(100,250));

		$object_of_pdf = new FPDF('P', 'mm', 'A3');
		$object_of_pdf->AddPage();
       $object_of_pdf->SetMargins(20,0,20);

		$object_of_pdf->Ln(4);
		$object_of_pdf->SetFont('Arial', 'B', 11);
		$object_of_pdf->Cell(110);
        $object_of_pdf->Image('Images/IEEE.png', 0, 0, 298);
		$object_of_pdf->Ln(85);
        $object_of_pdf->SetX(20);
		// Reffarence..........
		$object_of_pdf->Cell(10,8,'Ref : ');
		$object_of_pdf->SetX(30);
		$object_of_pdf->MultiCell(0, 8,$ref);
		//split reffarence when got / .....
		$ref = explode('/',$ref);
		//Date............
		$object_of_pdf->Ln(1);  
		$object_of_pdf->Cell(3,8,'Date : '.$date,0,1);
		//to..............
		 $object_of_pdf->Ln(5);
		$object_of_pdf->SetX(20);
		$object_of_pdf->Cell(10,8,'To ',0,1);
		$object_of_pdf->SetX(20);
		$object_of_pdf->MultiCell(0,5,$to); 
        // .............
        $object_of_pdf->Ln(5);  
		$object_of_pdf->MultiCell(0,8,'Dear SUNIL KARAMCHANDANI,'); 
		$object_of_pdf->MultiCell(0,6,'On behalf of the organizing committee of '.$committee.' , it is my pleasure to invite you to present your research paper in this conference. As per our record your technical paper details are as follows: '); 
		$object_of_pdf->Ln(5);
		$object_of_pdf->MultiCell(0,6,'Paper ID : '.$paper_id);
		$object_of_pdf->MultiCell(0,6,'Paper Title : '.$paper_title);
		$object_of_pdf->Ln(5);
		$object_of_pdf->MultiCell(0,6,'Your paper has been reviewed by experts in the relevant field. Based on review comments, comment from the track co-chair, technical program committee has accepted your paper for presentation in this conference.');
		$object_of_pdf->Ln(5);
		$object_of_pdf->MultiCell(0,6,'The '.$ref[0].' will feature world-class keynote talks, invited talks, oral and poster sessions, and special sessions, which will be offered by researchers and professionals working in academia, industry and research organizations. It will be held during 19-20 Dec. 2015 at Information Access Center, Bangladesh University of Engineering and Technology (BUET), Dhaka, Bangladesh . Look forward to meeting you at '.$meeting_place.' in '.$ref[0].' .');
		$object_of_pdf->MultiCell(0,6,'Please do not hesitate to contact with me for additional information.');
		$object_of_pdf->MultiCell(0,6,'Sincerely , ');
		$object_of_pdf->Ln(2);
		$object_of_pdf->Image('Images/sign.png', 20, 270,20);
		$object_of_pdf->Ln(35);
		$object_of_pdf->MultiCell(0,6,$director_info);

		$object_of_pdf->AliasNbPages();
		$object_of_pdf->Output();
	}
}

?>
































