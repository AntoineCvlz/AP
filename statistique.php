<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 1);

/*echo"resultat de la requete:"."<br> ";
echo"depuis le fichier pdo_requete2.php:"."<br> ";
echo"---------------------------------"."<br> ";*/
session_start();

if (!isset($_SESSION['role'])){
    header("Location: connexion.php");
}
else if ($_SESSION['role']=="secretaire"){
    header("Location: connexion.php");
}
else if ($_SESSION['role']=="administrateur"){
    header("Location: connexion.php");
}
require("requete_sql_AP1.php");

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
        <div class="sidebar2">
                <a href='deco.php'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="grey" class="bi bi-door-closed-fill" viewBox="0 0 16 16">
                        <path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1h8zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                    </svg><br><br>
                </a>
                <p class='texte'>
                    <?php
                    echo "Connecté en tant que ".$_SESSION['role'];
                    ?>
                </p>
        </div>

            <div class="sidebar" class='sous_titre' class='texte'>
            
            <div class="lpfclinique">LPF Clinique</div>

            <a href=""><p class='ptexte_sidebar' style='color:white;'>2b rue de la Digue Cambrai</a></p>
            <a href=""><p class='ptexte_sidebar' style='color:white;'>Tel : 0768259584</a></p>
            <a href=""><p class='ptexte_sidebar' style='color:white;'>Mail : LPFClinique @ mail.com</a></p>
        </div>

        <div class="titre_texte" style="margin-top:10px;"><h1>STATISTIQUES</h1></div><br><br>
        <div class="contenu2">
        </div>  <!-- fin div tel-->
                
            </div> 
        </div>
        <br><br>
</body>
</html>