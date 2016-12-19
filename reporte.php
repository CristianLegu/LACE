<?php
    include('fpdf181/fpdf.php');
    include("includes/conexion.php");
    

class PDF extends FPDF
    {
        //******Cabecera
        function Header()
        {
            //Logo
            $this->Image('img/conf.png', 10, 8, 33);
            //Fuente
            $this->SetFont('Arial', 'B', 15);
            //Espacio
            $this->Cell(80);
            //Titulo
            $this->Cell(30, 10, 'Ejemplo', 1, 0 ,'C');
            //Salto de linea
            $this->Ln(30);
        }

//******Pie de pagina
        function Footer()
        {
            //Posicion: a 1.5 cm del final
            $this->SetY(-15);
            //Arial Italic 8
            $this->SetFont('Arial', 'I', 8);
            //Numero de pagina
            $this->Cell(0, 10, 'Page '.$this->PageNo().'/{nb}', 0, 0, 'C');

        }


        function AcceptPAgeBreak()
        {
             $this->AddPage();
             $this->SetFillColor(232, 232, 232);
             $this->SetFont('Arial', 'B', 12);
             $this->SetX(10);
             $this->Cell(70, 6, 'Nombre', 1, 0, 'C', 1);
             $this->SetX(80);
             $this->Cell(20, 6, 'ID', 1, 0, 'C', 1);
             $this->SetX(100);
             $this->Cell(70, 6, 'Usuario', 1, 0, 'C', 1);
             $this->Ln();
        }
    }
    



    $con = mysqli_connect($host, $user, $pwd, $db);

    $sql = "SELECT  idusuarios, 
		            nombre,
                    n_user 
            FROM usuarios";
    $query = $con -> query($sql);
    
    
    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->AliasNbPages();
    $pdf->SetFillColor(232, 232, 232);
    $pdf->SetFont('Arial', 'B', 12);

    $pdf->SetX(20);
    $pdf->Cell(70, 6, 'Nombre', 1, 0, 'C', 1);
    
    $pdf->SetX(90);
    $pdf->Cell(20, 6, 'ID', 1, 0, 'C', 1);
    
    $pdf->SetX(110);
    $pdf->Cell(70, 6, 'Usuario', 1, 0, 'C', 1);
    
    $pdf->Ln();

    while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
    {
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetFillColor(232, 232, 232);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetX(20);
        $pdf->Cell(70, 6, $row['nombre'], 1, 0, 'C');
    
        $pdf->SetX(90);
        $pdf->Cell(20, 6, $row['idusuarios'], 1, 0, 'C');
    
        $pdf->SetX(110);
        $pdf->Cell(70, 6, $row['n_user'], 1, 1, 'C');
        
    }
    
    $pdf->Output();
    


?>