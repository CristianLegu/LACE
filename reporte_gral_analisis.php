<?php
    include('fpdf181/fpdf.php');
    include("includes/conexion.php");
    
foreach($_GET as $loc=>$item) $_GET[$loc] = urldecode(base64_decode($item));
class PDF extends FPDF
    {
        //******Cabecera
        function Header()
        {

/**************************************************
            include("includes/conexion.php");
            $idpr   = 0;
            $idpac  = 0;
            $idmed  = 0;
            $queryhead = "";
            $nombrePaciente = "";
            $nombreMedico   = "";
            $fecha = "";
            if(isset($_GET['idpr']) && isset($_GET['idpac']) && isset($_GET['idm'])){
                $idpr   = $_GET['idpr'];
                $idpac  = $_GET['idpac'];
                $idmed  = $_GET['idm'];
                
            }
            $conhead = mysqli_connect($host, $user, $pwd, $db);
            $sqlhead = "SELECT  m.nombre AS medico, p.nombre AS paciente, a.fecha AS fecha
                    FROM analisis AS a 
                    JOIN pacientes AS p 
                    ON a.pacientes_idpacientes = p.idpacientes
                    JOIN medicos m
                    ON a.medicos_idmedicos = m.idmedicos
                    WHERE a.idpropio = '$idpr'
                    ORDER BY a.idpropio";

            $queryhead = $conhead -> query($sqlhead);
            
            while($row = mysqli_fetch_array($queryhead, MYSQLI_ASSOC))
            {
                $nombreMedico   = $row['medico'];
                $nombrePaciente = $row['paciente'];
                $fecha          = $row['fecha'];
            }
            
/***********************************************************/

            //Logo
            $this->Image('img/logo2.png', 10, 8, 33);
            //Fuente
            $this->SetFont('Arial', 'B', 14);
            //Espacio
            $this->Cell(85);
            $this->Cell(30, 10, utf8_decode('Laboratorio Espinosa Análisis Clínico'), 0, 0 ,'C');
            //Salto de linea
            $this->Ln(5);
            $this->SetFont('Arial', '', 8);
            $this->Cell(85);
            $this->Cell(30, 10, utf8_decode('Hidalgo No. 9 Int. 1-A Tel. 469 692 2195 Pénjamo, Gto.'), 0, 0 ,'C');
            
            $this->Ln(3.5);
            $this->SetFont('Arial', '', 8);
            $this->Cell(85);
            $this->Cell(30, 10, utf8_decode('Universidad de Gto. Cédula Prof. 1888051 SSA 1931'), 0, 0 ,'C');
            
            $this->Ln(14);
            $this->SetFont('Arial', '', 10);
            $this->Cell(20);
          //  $this->Cell(30, 10, utf8_decode('Examen practicado a: '.$nombrePaciente), 0, 0 ,'C');
              
            
            $this->SetFont('Arial', '', 10);
            $this->Cell(105);
            $this->Cell(30, 10, utf8_decode('Fecha: '), 0, 0 ,'C');

            $this->Ln(5);
            $this->SetFont('Arial', '', 10);
            $this->Cell(26);
           // $this->Cell(30, 10, utf8_decode('Solicitado por el (la) Dr. (a): '.$nombreMedico), 0, 0 ,'C');
            
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


        function AcceptPAgeBreak()
        {
             $this->AddPage();
/*
             $this->SetFillColor(232, 232, 232);
             $this->SetFont('Arial', 'B', 12);
             $this->SetX(10);
             $this->Cell(70, 6, 'Prueba', 1, 0, 'C', 1);
             $this->SetX(80);
             $this->Cell(20, 6, 'Resultado', 1, 0, 'C', 1);
             $this->SetX(100);
             $this->Cell(70, 6, 'Unidades', 1, 0, 'C', 1);
*/
             $this->Ln(15);
        }

    }
    

/*
    $dia    = "";
    $mes    = "";
    $anio   = "";
    $fecha  = "";

    $dia    = date("d");
    $mes    = date("m");
    $anio   = date("Y");
    $fecha  = $anio."-".$mes."-".$dia;
*/

    $con = mysqli_connect($host, $user, $pwd, $db);

    $sql = "SELECT an.fecha, an.prueba, an.estudio, pac.nombre
	            FROM analisis AS an
                JOIN pacientes AS pac
                WHERE an.fecha between '2016-01-01' AND '2016-12-31'
                ORDER BY an.fecha;";
    
    
    $query = $con -> query($sql);

    
    
    
    $pdf = new PDF();
    $pdf->Settitle('Reporte general de '.utf8_decode('análisis').' realizados');
    $pdf->AddPage();
    $pdf->AliasNbPages();


    $pdf->Ln();
    $pdf->Ln(15);
    $pdf->SetX(20);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(175, 6, 'Reporte general de '.utf8_decode('análisis').' realizados', 0, 1, 'C');

    $pdf->SetFillColor(232, 232, 232);
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->SetFillColor(45, 76, 130);
    $pdf->SetTextColor(255, 255, 255);

    $pdf->Ln(10);   
    
    $pdf->SetX(10);
    $pdf->Cell(30, 6, 'Fecha realizado', 1, 0, 'C', 1);
    
    $pdf->SetX(40);
    $pdf->Cell(50, 6, 'Nombre '.utf8_decode('análisis').' (Prueba)', 1, 0, 'C', 1);
    
    $pdf->SetX(90);
    $pdf->Cell(50, 6, 'Estudio relacionado', 1, 0, 'C', 1);
    
    $pdf->SetX(140);
    $pdf->Cell(60, 6, 'Nombre Paciente', 1, 0, 'C', 1);

    
    $pdf->Ln();

 
    while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
    {
        $pdf->SetFont('Arial', '', 9);
        $pdf->SetTextColor(0, 0, 0);
        
        $pdf->SetX(10);
        $pdf->Cell(30, 6, $row['fecha'], 1, 0, 'C');
        
        $pdf->SetX(40);
        $pdf->Cell(50, 6, $row['prueba'], 1, 0, 'C');
        
        $pdf->SetX(90);
        $pdf->Cell(50, 6, $row['estudio'], 1, 0, 'C'); 
        
        $pdf->SetX(140);
        $pdf->Cell(60, 6, $row['nombre'], 1, 1, 'C');
        
    }
   

        $pdf->Output();
?>