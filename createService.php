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

function requete100()
{
$pdo=connexion_bdd();
$ajout_service=$_POST['ajout_service'];
$sql="INSERT INTO `service`(`libelle`) VALUES ('{$ajout_service}') ";
$stmt100=$pdo->query($sql);

//$stmt = $pdo->prepare('$sql');
//$stmt->execute();
//echo"resultat de la requete2:"."<br> ";
return $stmt100;
}//fin requete2

?>