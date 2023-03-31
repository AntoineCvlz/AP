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
$date_h=$_POST['date_h'];
$id_h=$_POST['id'];
$heure_h=$_POST['heure_h'];
$nom_m=$_POST['nom_perso'];



$sql="UPDATE `hospitalisation` SET `date_h`='$date_h',`heure_h`='$heure_h',`id_p`= (SELECT `id_p` FROM `personnel` WHERE `nom` = '$nom_m') WHERE `id_h`= '$id_h';";


echo $sql;
$stmt15=$pdo->query($sql);

header("Location: pannel_secretaire.php")


?>


