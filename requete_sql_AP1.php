 
<?php
// error_reporting(E_ALL);

// ini_set("display_errors", 1);

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

function requete1()
{
$pdo=connexion_bdd();
$sql="SELECT nom FROM personnel WHERE role='medecin'";
$stmt=$pdo->query($sql);
foreach ($stmt as $row) {
    echo '<option>'.$row[0].'</option>';
 }

//$stmt = $pdo->prepare('$sql');
//$stmt->execute();
//echo"resultat de la requete2:"."<br> ";
return $stmt;
}//fin requete1


function requete15($numsecu)
{
    echo "<br>".$numsecu."<br>";
$bon_numsecu = (int)$numsecu;
$pdo=connexion_bdd();
$preadmission=$_POST['preadmission'];
$date=$_POST['datehospitalisation'];
$heure=$_POST['datehospitalisationheure'];
$nom_pers=$_POST['nom_pers'];
echo $_POST['nom_pers'];
$sql = "INSERT INTO `hospitalisation`(`id_h`, `num_secu`, `date_h`, `heure_h`, `id_p`, `libelle`) 
VALUES (NULL, '$bon_numsecu', '$date','$heure','1','$preadmission');";
echo"<br>".$sql;
$stmt15=$pdo->query($sql);

//$stmt = $pdo->prepare('$sql');
//$stmt->execute();
//echo"resultat de la requete2:"."<br> ";
return $stmt15;
}//fin requete2 


function requete10()
{
    
$pdo=connexion_bdd();
$login=$_POST['login'];
$mdp=$_POST['mdp'];

$sql2="SELECT * FROM personnel where login='$login' and mdp='$mdp'";

$stmt10 = $pdo->query($sql2);

foreach ($stmt10 as $row) {

    $_SESSION['role'] = $row['role'];

    switch($row['role']){
        case "secretaire":
            $role="secretaire";
            header('Location: page_accueil.php');
            session_start();
            break;
        case "medecin":
            $role="medecin";
            header('Location: statistique.php');
            session_start();
            break;
        case "administrateur":
            $role="administrateur";
            header('Location: pannel_admin.php');
            session_start();
            break;
    }
}

}//fin requete2


function requete16()
{
        
$pdo=connexion_bdd();
$civ=$_POST['civilite'];
$nom_naissance=$_POST['nom_naissance'];
$nom_ep=$_POST['nom_epouse'];
$prenom=$_POST['prenom'];
$datenaissance=$_POST['datenaissance'];
$numsecu=$_POST['numsecu'];
$adresse=$_POST['adresse'];
$cp=$_POST['CP'];
$ville=$_POST['Ville'];
$email=$_POST['email']; 
$tel=$_POST['telephone'];

$sql="INSERT INTO lpf_clinique.patient (civ, nom, nom_ep, prenom, datenaissance, num_secu, adresse, cp, ville, mail, tel, id_imp, id_prev) 
VALUES ('$civ','$nom_naissance', '$nom_ep', '$prenom', '$datenaissance', '$numsecu', '$adresse', $cp, '$ville', '$email', $tel, NULL, NULL);";
$stmt16=$pdo->query($sql);
//$stmt = $pdo->prepare('$sql');
//$stmt->execute();
//echo"resultat de la requete2:"."<br> ";
return $stmt16;
}//fin requete2




function requete17($numsecu)
{
    echo "<br>".$numsecu."<br>";
$bon_numsecu = (int)$numsecu;
$pdo=connexion_bdd();
$preadmission=$_POST['preadmission'];
$date=$_POST['datehospitalisation'];
$heure=$_POST['datehospitalisationheure'];
$nom_pers=$_POST['nom_pers'];
echo $_POST['nom_pers'];
$sql = "INSERT INTO `hospitalisation`(`id_h`, `num_secu`, `date_h`, `heure_h`, `id_p`, `libelle`) 
VALUES (NULL, '$bon_numsecu', '$date','$heure','1','$preadmission');";

echo"<br>".$sql;
$stmt15=$pdo->query($sql);

//$stmt = $pdo->prepare('$sql');
//$stmt->execute();
//echo"resultat de la requete2:"."<br> ";
return $stmt15;
}//fin requete2



function requete18($numsecu)
{
    echo "<br>".$numsecu."<br>";
$bon_numsecu = (int)$numsecu;
$pdo=connexion_bdd();
$orga_secu=$_POST['nom_orga'];
$assurance=$_POST['assurance'];
$ald=$_POST['ald'];
$nom_mut=$_POST['nom_mut'];
$num_ad=$_POST['num_adherent'];
$chambre_part=$_POST['chambre_particuliere'];

$sql="INSERT INTO `info_administrative` (`num_secu`, `orga_secu`, `assurance`, `acd`, `nom_mut`, `num_ad`, `chambre_part`) 
VALUES ('$bon_numsecu', '$orga_secu', '$assurance', '$ald', '$nom_mut', $num_ad, '$chambre_part');";

echo"<br>".$sql;
$stmt15=$pdo->query($sql);

//$stmt = $pdo->prepare('$sql');
//$stmt->execute();
//echo"resultat de la requete2:"."<br> ";
return $stmt15;
}//fin requete2






function requete20($numsecu){
    echo "<br>".$numsecu."<br>";
$bon_numsecu = (int)$numsecu;
$pdo=connexion_bdd();


$nom_prev=$_POST['nom_naissance_prevenir'];
$prenom_prev=$_POST['prenom_prevenir'];
$adresse_prev=$_POST['adresse_prevenir'];
$tel_prev=$_POST['telephone_prevenir'];



$nom_imp=$_POST['nom_naissance_confiance'];
$prenom_imp=$_POST['prenom_confiance'];
$adresse_imp=$_POST['adresse_confiance'];
$tel_imp=$_POST['telephone_confiance'];





$sql="INSERT INTO `personne_a_prevenir`(`id_prev`, `nom`, `prenom`, `adresse`, `tel`) VALUES (NULL,'$nom_prev','$prenom_prev','$adresse_prev','$tel_prev');
INSERT INTO `personne_importante`(`id_imp`, `nom`, `prenom`, `adresse`, `tel`) VALUES (NULL, '$nom_imp','$prenom_imp','$adresse_imp','$tel_imp');";


echo"<br>".$sql;
$stmt20=$pdo->query($sql);





//$stmt = $pdo->prepare('$sql');
//$stmt->execute();
//echo"resultat de la requete2:"."<br> ";
return $stmt20;
}






function requete21($numsecu){
    echo "<br>".$numsecu."<br>";
    echo "<br>".$stmt21."<br>";
$bon_numsecu = (int)$numsecu;
$pdo=connexion_bdd();


$nom_imp=$_POST['nom_naissance_confiance'];
$prenom_imp=$_POST['prenom_confiance'];
$adresse_imp=$_POST['adresse_confiance'];
$tel_imp=$_POST['telephone_confiance'];



$nom_prev=$_POST['nom_naissance_prevenir'];
$prenom_prev=$_POST['prenom_prevenir'];
$adresse_prev=$_POST['adresse_prevenir'];
$tel_prev=$_POST['telephone_prevenir'];





$sql="UPDATE patient SET `id_imp` = (SELECT `id_imp` FROM `personne_importante` WHERE `nom` = '$nom_imp' AND `prenom` = '$prenom_imp' AND `adresse` = '$adresse_imp') WHERE `num_secu` = '$bon_numsecu';
UPDATE patient SET `id_prev` = (SELECT `id_prev` FROM `personne_a_prevenir` WHERE `nom` = '$nom_prev' AND `prenom` = '$prenom_prev' AND `adresse` = '$adresse_prev') WHERE `num_secu` = '$bon_numsecu';";






echo"<br>".$sql;
$stmt21=$pdo->query($sql);





//$stmt = $pdo->prepare('$sql');
//$stmt->execute();
//echo"resultat de la requete2:"."<br> ";


return $stmt21;
}


function requete22($chemin, $chemin2, $chemin3, $chemin4)
{

$numsecu= $_SESSION["getnumsecu"];
$pdo=connexion_bdd();
$chemin = $_SESSION["carteid"];
$chemin2 = $_SESSION["cartevit"];
$chemin3 = $_SESSION["cartemut"];
$chemin4 = $_SESSION["livret"];



$sql="INSERT INTO fichiers_patient(`num_secu`, `carte_identite`, `carte_vit`, `carte_mut`, `livret`) VALUES ($numsecu,'$chemin','$chemin2','$chemin3','$chemin4')";


$stmt22=$pdo->query($sql);



//$stmt = $pdo->prepare('$sql');
//$stmt->execute();
//echo"resultat de la requete2:"."<br> ";
return $stmt22;

}
//fin fonction connexion_bdd

function requete100()
{
$pdo=connexion_bdd();
$ajout_service=$_POST['ajout_service'];
if(isset($ajout_service)){
    $sql="INSERT INTO `service`(`libelle`) VALUES ('{$ajout_service}') ";
    $stmt100=$pdo->query($sql);
}
//$stmt = $pdo->prepare('$sql');
//$stmt->execute();
//echo"resultat de la requete2:"."<br> ";
return $stmt100;}

function requete101()
{
$pdo=connexion_bdd();
$sql="SELECT libelle FROM service";
$stmt=$pdo->query($sql);
foreach ($stmt as $row) {
    echo '<option>'.$row[0].'</option>';
 }

//$stmt = $pdo->prepare('$sql');
//$stmt->execute();
//echo"resultat de la requete2:"."<br> ";
return $stmt;
}//fin requete1

function requete102()
{
$pdo=connexion_bdd();
$sql="SELECT nom FROM personnel WHERE role='medecin'";
$stmt=$pdo->query($sql);
foreach ($stmt as $row) {
    echo '<option>'.$row[0].'</option>';
 }

 
//$stmt = $pdo->prepare('$sql');
//$stmt->execute();
//echo"resultat de la requete2:"."<br> ";
return $stmt;
}//fin requete1


function requete103(){
    if(isset($_POST['nom_perso'])){
        $nom_personnel=$_POST['nom_perso'];
        $pdo=connexion_bdd();
        $sql="DELETE FROM `personnel` WHERE nom = '$nom_personnel'";
        $stmt=$pdo->query($sql);
    }
}

function requete104(){
    $nom_medecin = $_POST['nom_medecin'];
    $nom_service = $_POST['nom_servi'];
    $login_medecin = $_POST['login_medecin'];
    $mdp_medecin = $_POST['mdp_medecin'];
    $id_service = 0;
    $nom_servi = $_POST['nom_servi']; 

    if(isset($_POST['nom_medecin']) && isset($_POST['nom_servi']) && isset($_POST['login_medecin']) && isset($_POST['mdp_medecin'])){
        $pdo=connexion_bdd();
        $sql2="SELECT id_s FROM `service` WHERE libelle = '$nom_service'";
        $stmt=$pdo->query($sql2);
        foreach ($stmt as $row) {
            $id_service = $row['id_s'];
        }
        
        $sql="INSERT INTO `personnel`(`id_p`, `id_s`, `nom`, `login`, `mdp`, `role`) VALUES (NULL,'$id_service','$nom_medecin','$login_medecin','$mdp_medecin','medecin') ";
        $stmt=$pdo->query($sql);
    }
}




function requete502()
{

    $date_h=$_POST['date_h'];
    $id_h=$_POST['id'];
    $heure_h=$_POST['heure_h'];
    $nom_m=$_POST['nom_m'];
    
    
    $nom_m=$_POST['nom_m'];
    
    $sql="UPDATE `hospitalisation` SET `date_h`='$date_h',`heure_h`='$heure_h',`id_p`= (SELECT `id_p` FROM `personnel` WHERE `nom` = '$nom_m') WHERE `id_h`= '$id_h';";
    
    echo $sql;
    $stmt15=$pdo->query($sql);
    



//$stmt = $pdo->prepare('$sql');
//$stmt->execute();
//echo"resultat de la requete2:"."<br> ";
return $stmt15;

}






?>
