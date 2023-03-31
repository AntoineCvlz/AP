<?php
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
$id_h=$_GET['id_h'];
$sql="DELETE FROM `hospitalisation` WHERE `id_h`='$id_h';";
echo $sql;
$stmt15=$pdo->query($sql);
header("Location: pannel_secretaire.php");
?>