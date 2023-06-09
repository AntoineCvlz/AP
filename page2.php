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

$var_numsecu=$_SESSION["getnumsecu"];
if (isset($_POST['hospitalisation'])){                  
    requete15($var_numsecu);
    header("Location: page3.php");
    //echo $_POST['preadmission'];
    //echo $_POST['datehospitalisation'];
    //echo $_POST['datehospitalisationheure'];
    //echo $_POST['nom_pers'];
    }

    
?>


<!DOCTYPE html>
<html>
<title>LPF Clinique</title>
<link rel="stylesheet" href="style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Tilt+Neon&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,500&display=swap" rel="stylesheet">
<link rel="icon" href="lpf_logo_noir.png" type="image/icon type">

    <body>

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
            <div class="moncercle"><p class="cercle_texte">1</p></div>
            <div class="trait"></div><br>
            <div class="moncercle_celuici"><p class="cercle_texte">2</p></div>
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
            <a href="page_accueil.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="grey" viewBox="0 0 448 512" style="margin-top: 100px;">
                <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
            </svg>
            </a>
        </div>

    <div class="titre_texte" style="margin-top:20px;" ><h1>HOSPITALISATION</h1></div><br>
        <div class="contenu3">
            <div class="main">

                    <p class="texte">Pré-admission pour :</p>
                </div>
                <form method='POST'  action='page2.php'>
                <input="bleu" type="list" name="bleu">
                <select class="preadmission2" name="preadmission" required>
                    <option value="null">Choix</option>
                    <option value="Ambulance ambulatoire">Ambulance ambulatoire</option>
                    <option value="Hospitalisation (Au moins une nuit)">Hospitalisation (Au moins une nuit)</oprion>
                </select>

                    
                <div class="hospitalisation">
                <p class="texte">Date d'hospitalisation </p>
            </div>
                <input type='date' min="2023-04-07" max="2023-05-07" class='preadmission2' name='datehospitalisation' required>
                <p class="texte">Heure de l'hospitalisation</p> 
                    <input type='time' class='preadmission2' name='datehospitalisationheure' required>
                
                    <p class="texte">Nom du médecin :</p><br>
                    <select class="preadmission2" name="nom_pers" required >  
                    <br><br>
                        <?php
                        requete1();
                        ?>
                    </select>
                    <input type=submit name='hospitalisation' style='margin-top:70px; 'class='resultat1'>  
                    </div>
                    <br></br>
 
    </form>
 


        

        </div>
        </div>
    </body>
</html>