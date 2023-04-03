<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();

if (!isset($_SESSION['role'])){
    header("Location: connexion.php");
}
else if ($_SESSION['role']=="medecin"){
    header("Location: connexion.php");
}
else if ($_SESSION['role']=="administrateur"){
    header("Location: connexion.php");
}
require("requete_sql_AP1.php");




/*echo"resultat de la requete:"."<br> ";
echo"depuis le fichier pdo_requete2.php:"."<br> ";
echo"---------------------------------"."<br> ";*/


if (isset($_POST['formulaire'])){

                        
    requete16();
    $_SESSION["getnumsecu"]=$_POST['numsecu'];

    header("Location: page2.php");
            
                        
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
        <title>LPF Clinique</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,500&display=swap" rel="stylesheet">
        <link rel="icon" href="lpf_logo_noir.png" type="image/icon type">
    </head>
    <body>
        <div class="textepolice"></div>
            <div class="sidebar2">
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
                <div class="icons">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="icons" viewBox="0 0 16 16">
                    <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z"/>
                    <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585c.055.156.085.325.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5c0-.175.03-.344.085-.5ZM10 7a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7Zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1Zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0V9a1 1 0 0 1 1-1Z"/>
                    </svg>
                </div><br>
                
                <div class="trait"></div><br>
                <div class="moncercle_celuici"><p class="cercle_texte">1</p></div>
                <div class="trait"></div><br>
                <div class="moncercle"><p class="cercle_texte">2</p></div>
                <div class="trait"></div><br>
                <div class="moncercle"><p class="cercle_texte">3</p></div>
                <div class="trait"></div><br>
                <div class="moncercle"><p class="cercle_texte">4</p></div>
            </div>
                

            <div class="sidebar" class='sous_titre' class='texte'>
            
            <div class="lpfclinique">LPF Clinique</div>

                <a href=""><p class='ptexte_sidebar' style='color:white;'>2b rue de la Digue Cambrai</a></p>
                <a href=""><p class='ptexte_sidebar' style='color:white;'>Tel : 0768259584</a></p>
                <a href=""><p class='ptexte_sidebar' style='color:white;'>Mail : LPFClinique @ mail.com</a></p>

            </div>


            <div class="titre_texte"><h1 style='color:white;'>INFORMATIONS CONCERNANT LE PATIENT</h1></div>
            <div class="contenu" style='margin-top:50px;'>



            
            <a class="bn39" href="page1.php"><span class="bn39span">Nouvelle pré-admission</span></a>
            <a class="bn39" href="pannel_secretaire.php"><span class="bn39span">Modification / Suppresion d'une pré-admission</span></a>
            <a class="bn39" href="pdfCreate.php"><span class="bn39span">Récupération des hospitalisation liés au service</span></a>
                    



            </div>
        </div>
    </body>
    </html>