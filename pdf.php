<?php
require('fpdf/fpdf.php');

function connexion_bdd()
{
/*************************CONNEXION A LA BDD*************************************** */
$host = '127.0.0.1:3306';
$db   = 'lpf_clinique';
$user = 'cuvilliez';
$dsn = "mysql:host=$host;dbname=$db";
$pass = 'lpfG8*2022';

try {
    $pdo = new PDO($dsn, $user, $pass);
    return $pdo;
} 
catch (\PDOException $e) {
    print"ERREUR:".$e;
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

}//fin fonction connexion_bdd


$pdo=connexion_bdd();
$nom_service=$_POST['nom_service'];
$debut=$_POST['debut_semaine'];
$fin=$_POST['fin_semaine'];

$sql="
    select hospitalisation.id_h,hospitalisation.num_secu,hospitalisation.date_h,hospitalisation.heure_h,hospitalisation.id_p,hospitalisation.libelle from hospitalisation 
    INNER JOIN personnel on hospitalisation.id_p = personnel.id_p 
    INNER JOIN service on personnel.id_s = service.id_s 
    WHERE hospitalisation.date_h BETWEEN '$debut' AND '$fin' and service.libelle = '$nom_service' ";


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,10,'Id_h',1);
$pdf->Cell(40,10,'NumSecurite',1);
$pdf->Cell(20,10,'Date hosp',1);
$pdf->Cell(20,10,'Heure hosp',1);
$pdf->Cell(10,10,'Id P',1);
$pdf->Cell(80,10,'Libelle',1,1,'C');

$stmt=$pdo->query($sql);
foreach ($stmt as $row) {
    $id_hos = $row['id_h'];
    $num_securite = $row['num_secu'];
    $date_hos = $row['date_h'];
    $here_hos = $row['heure_h'];
    $id_pers = $row['id_p'];
    $libelleS = $row['libelle'];
    $pdf->Cell(20,10,$id_hos,1,'','C');
    $pdf->Cell(40,10,$num_securite,1,'','C');
    $pdf->Cell(20,10,$date_hos,1,'','C');
    $pdf->Cell(20,10,$here_hos,1,'','C');
    $pdf->Cell(10,10,$id_pers,1,'','C');
    $pdf->Cell(80,10,$libelleS,1,1,'C');
 }

$pdf->Output();
?>