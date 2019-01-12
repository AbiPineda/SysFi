<?php
	
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('images/Logo-prado.png', 5, 3, 50 );
			$this->Image('images/Fondo4.png',40, 45, 130 );
			$this->SetFont('Arial','B',11);
			$this->SetX(65);
			$this->Cell(100,5, utf8_decode('ALMACENES PRADO DE S.A DE C.V '),0,1,'C');
			$this->SetX(65);
			$this->Cell(100,5, utf8_decode('FACTURA CONSUMIDOR FINAL | ABONO A CUENTA'),0,1,'C');
			$this->Cell(1);
			
			
			
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