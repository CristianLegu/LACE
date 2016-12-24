<?php
    include('fpdf181/fpdf.php');
    include("includes/conexion.php");
    
    /*
     if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    $idpropio  = $_SESSION['idpropio'];
    */
    
    $idpr   = 0;
    $idpac  = 0;
    $idmed  = 0;
    if(isset($_GET['idpr']) && isset($_GET['idpac']) && isset($_GET['idm'])){
        $idpr   = $_GET['idpr'];
        $idpac  = $_GET['idpac'];
        $idmed  = $_GET['idm'];
        //echo $idpr;
    }
    
class PDF extends FPDF
    {
        //******Cabecera
        function Header()
        {
            //Logo
            $this->Image('img/logo2.png', 10, 8, 33);
            //Fuente
            $this->SetFont('Arial', 'B', 14);
            //Espacio
            $this->Cell(155);
            //Titulo
            $this->Cell(30, 10, 'LACE', 0, 0 ,'C');
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
            $this->Cell(0, 10, 'Pagina '.$this->PageNo().'/{nb}', 0, 0, 'C');

        }

/*
        function AcceptPAgeBreak()
        {
             $this->AddPage();
             $this->SetFillColor(232, 232, 232);
             $this->SetFont('Arial', 'B', 12);
             $this->SetX(10);
             $this->Cell(70, 6, 'Prueba', 1, 0, 'C', 1);
             $this->SetX(80);
             $this->Cell(20, 6, 'Resultado', 1, 0, 'C', 1);
             $this->SetX(100);
             $this->Cell(70, 6, 'Unidades', 1, 0, 'C', 1);
             $this->Ln();
        }
*/
    }
    



    $con = mysqli_connect($host, $user, $pwd, $db);

    $sql = "SELECT a.prueba, a.resultado, a.unidades, a.valorreferencia, a.comentario, a.observaciones
            FROM analisis AS a 
            JOIN pacientes AS p 
            ON a.pacientes_idpacientes = p.idpacientes
            JOIN medicos m
            ON a.medicos_idmedicos = m.idmedicos
            WHERE a.idpropio = '$idpr'
            ORDER BY a.idpropio";

    
    $query = $con -> query($sql);
    
    
    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->AliasNbPages();
    $pdf->SetFillColor(232, 232, 232);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetFillColor(45, 76, 130);
    $pdf->SetTextColor(255, 255, 255);

    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetX(15);
    $pdf->Cell(30, 6, 'Prueba', 1, 0, 'C', 1);
    
    $pdf->SetX(45);
    $pdf->Cell(60, 6, 'Resultado', 1, 0, 'C', 1);
    
    $pdf->SetX(105);
    $pdf->Cell(25, 6, 'Unidades', 1, 0, 'C', 1);
    
    $pdf->SetX(130);
    $pdf->Cell(25, 6, 'Vl. Referencia', 1, 0, 'C', 1);

    $pdf->SetX(155);
    $pdf->Cell(40, 6, 'Comentarios', 1, 0, 'C', 1);

    
    $pdf->Ln();


    while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
    {
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetTextColor(0, 0, 0);
                
        $pdf->SetX(15);
        $pdf->Cell(30, 6, $row['prueba'], 1, 0, 'C');
    
        $pdf->SetX(45);
        $pdf->Cell(60, 6, $row['resultado'], 1, 0, 'C');
    
        $pdf->SetX(105);
        $pdf->Cell(25, 6, $row['unidades'], 1, 0, 'C');

        $pdf->SetX(130);
        $pdf->Cell(25, 6, $row['valorreferencia'], 1, 0, 'C');

        $pdf->SetX(155);
        $pdf->Cell(40, 6, $row['comentario'], 1, 1, 'C');


        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetXY(20, 100);
        $pdf->MultiCell(170, 6, 'Observaciones', 1, 'C', true);
        $pdf->Ln();
        $pdf->Cell(40, 6, $row['observaciones'], 1, 1, 'C');
        
    }
   

  

    $pdf->Output();
    


?>