<?php
	
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{


			date_default_timezone_set('America/El_Salvador');
	$fecha_actual2=date("d-m-Y");
	$hora=date("H:i:s");

			$this->Image('images/Logo-prado.png', 5, 3, 60 );
			$this->SetFont('Arial','B',11);
			$this->Ln(3);
			$this->SetX(90);
			$this->Cell(100,5, utf8_decode('ALMACENES PRADO DE S.A DE C.V '),0,1,'C');
		
			$this->SetFont('Arial','',10);
			$this->SetX(210);
			$this->Cell(60,6,utf8_decode('Fecha:'.' '.$fecha_actual2.' '.'Hora:'.' '.$hora),0,0,'L');
			
			
			
			$this->Ln(15);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>