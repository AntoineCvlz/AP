<?php
session_start();
require("requete_sql_AP1.php");

if (!isset($_SESSION['role'])){
    header("Location: connexion.php");
}
else if ($_SESSION['role']=="medecin"){
    header("Location: connexion.php");
}
else if ($_SESSION['role']=="administrateur"){
    header("Location: connexion.php");
}


if (isset($_POST['formu_med'])){                  
    requete103();
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>        <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Tilt+Neon&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alkalami&family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LPF Clinique</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="lpf_logo_noir.png" type="image/icon type">
</head>
<body>
    <div class="sidebar2" >
        <p class='texte'>
            <?php
                echo "Connecté en tant que ".$_SESSION['role'];
            ?>
        </p>
        <a href='deco.php'>
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="grey" class="bi bi-door-closed-fill" viewBox="0 0 16 16">
            <path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1h8zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
            </svg><br><br>
        </a>
        </div>
        <div class="sidebar" class='sous_titre' class='texte'>
            
            <div class="lpfclinique">LPF Clinique</div>

            <a href=""><p class='ptexte_sidebar' style='color:white;'>2b rue de la Digue Cambrai</a></p>
            <a href=""><p class='ptexte_sidebar' style='color:white;'>Tel : 0768259584</a></p>
            <a href=""><p class='ptexte_sidebar' style='color:white;'>Mail : LPFClinique @ mail.com</a></p>
            <a href="page_accueil.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="grey" viewBox="0 0 448 512" style="margin-top: 100px;">
                <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
            </svg>
            </a>
        </div>
    <div class="titre_texte" style='margin-top:20px;'><h1 style='color:white;'>PANNEL SECRETAIRE</div>
<div class="contenuSecretaire" style='margin-top:50px;'>
    <div class="grilleSecretaire">
        <?php
        $pdo=connexion_bdd();
        $sql="SELECT * FROM hospitalisation";
       
        $stmt=$pdo->query($sql);
        foreach ($stmt as $row) {

            $pdo=connexion_bdd();

            $libelle = $row['libelle'];
            $date = $row['date_h'];
            $heure = $row['heure_h'];
            $id = $row['id_h'];
            $id_m = $row['id_p'];

            $sql2 = "select nom from personnel inner join hospitalisation on personnel.id_p = hospitalisation.id_p where hospitalisation.id_p = '$id_m' LIMIT 1;";
            $stmt2=$pdo->query($sql2);


                foreach ($stmt2 as $row) {
                
                    echo "<form method='post' action='modif.php'>";
                    echo "<div class='modifAdmission'>".$libelle."<br>";
                    echo "Date : <input type='date' name='date_h' value=".$date."></input><br>";
                    echo "Heure :<input type='time' name='heure_h' value=".$heure."></input><br>";
                    ?>
                    Nom m :
                    <select class="nomMed" name="nom_perso" >
                        <?php
                                echo '<option>'.$row[0].'</option>';
                            
                            requete102();
                        ?>
                    </select><br>
                    <?php
                    echo "Id : <input name='id' readonly='readonly' value=".$id."></input><br>";
                    echo "<button class='bouttonModif'>Modifier</button>";
                    echo "<a href='suppHospi.php?id_h=".$id."'>
                            <p class='bouttonSupprim' style='text-decoration: none;'>Supprimer</p>
                          </a>";
                    echo "</div>";
                    echo "</form>";
    
                }




        }
        ?>
    </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
</div>
</body>