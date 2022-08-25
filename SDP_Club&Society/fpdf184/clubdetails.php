<?php 
require ("fpdf.php"); 
$db = new PDO('mysql: host=localhost; dbname=isocial_apu_database', 'root','');


class myPDF extends FPDF {
    function header(){
          $this->setFont('Arial', 'B', 14);
          $this->Cell(276,5, 'Member',0,0,'C');
           $this->Ln();
            $this->setFont('Times','', 12); 
           $this->Cell(276,10,'Event Register',0,0,'C');
            $this->Ln(20);
    }
        function footer(){
        $this->setY(-15);
        $this->setFont('Arial','',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }

        function headerTable(){
        $this->SetFont('Times', 'B', 12); 
        $this->Cell(20,10,'ID',1,0,'C'); 
        $this->Cell(100,10,' Event',1,0,'C');
         $this->Cell(30,10,'Login ID',1,0,'C');
           $this->Cell(50,10,'Name',1,0,'C'); 
             $this->Ln();
        
        }
        function viewTable($db){
            $this->SetFont('Times','',12);
             $stmt = $db->query('SELECT * from club_events_registration');
              while($data = $stmt ->fetch(PDO::FETCH_OBJ)) {
            $this->Cell(20, 10, $data->id,1,0,'C');
             $this->Cell(100, 10, $data->event_name, 1,0, 'L');
              $this->Cell(30, 10, $data->Login_ID,1,0, 'L');
                $this->Cell(50, 10, $data->Name,1,0,'L');
                   $this->Ln();
              }
    }
}

$pdf = new myPDF();
$pdf ->AliasNbPages(); 
$pdf ->AddPage('L', 'A4', 0);
$pdf ->headerTable();
$pdf ->viewTable($db);
$pdf ->Output();