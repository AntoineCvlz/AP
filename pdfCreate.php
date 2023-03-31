<?php
session_start();

if (!isset($_SESSION['role'])){
    header("Location: connexion.php");
}
else if ($_SESSION['role']=="medecin"){
    header("Location: connexion.php");
}
require("requete_sql_AP1.php");

if (isset($_POST['formu_med'])){                  
    requete103();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Tilt+Neon&display=swap" rel="stylesheet">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,500&display=swap" rel="stylesheet">
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
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="grey" viewBox="0 0 448 512" style="margin-top: 420px;">
                <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
            </svg>
        </div>

        <div class="titre_texte" style="margin-top:10px;"><h1>Récupération des hospitalisations des services</h1></div><br><br>
            
                <div class="panneladmin1">
                    <div class="texte2">Générer le pdf</div>
                            <div class="centrer_panneladmin">
                                <form method='POST' action='pdf.php'>
                                    <label style='color:black;'>Choisissez un service</label>
                                    <select class="preadmission3" name="nom_service" >
                                        <?php
                                            requete101();
                                        ?>
                                    </select>
                                    <label style='color:black;'>Date de début </label>
                                    <input type='date' name='debut_semaine'></input>
                                    <label style='color:black;'>Date de fin</label>
                                    <input type='date' name='fin_semaine'></input>
                                    <input type=submit style='margin-top:3vh;' class='resultat2' value='Afficher en pdf'>
                            </form>
                    </div>
                </div>
            
        <br><br>
</body>
</html>
