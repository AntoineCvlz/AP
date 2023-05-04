
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require("requete_sql_AP1.php");

/*echo"resultat de la requete:"."<br> ";
echo"depuis le fichier pdo_requete2.php:"."<br> ";
echo"---------------------------------"."<br> ";*/

session_start();
$var_numsecu=$_SESSION["getnumsecu"];




$titre = "carteid_".$var_numsecu;
$titre2 = "cartevit_".$var_numsecu;
$titre3 = "cartemut_".$var_numsecu;
$titre4 = "livret_".$var_numsecu;


    //extrait les données de mon formulaire
    

    //dans la balise <form> on met bien enctype="multipart/form-data" sinon il ne prend pas en charge les fichers

    //Si dans le input fichier_patient le name du fichier n'est pas vide (un fichier n'est pas présent en gros) alors...
    if(isset($_FILES['carte_identite']) && (isset($_FILES['carte_vitale'])) && (isset($_FILES['carte_mutuelle'])) && !empty($_FILES['carte_identite']['name']) && !empty($_FILES['carte_vitale']['name']) && !empty($_FILES['carte_mutuelle']['name'])) {

        //$_FILES est une variable utilisé pour les fichiers, le ['fichier_patient'] est le name de ton input file (voir formulaire en dessous)
        //Celle-ci permet de récupérer des infos sur le fichier comme le nom, le tmp, la taille,...

        //tmp_name permet d'obtenir le tmp de ton fichier qui est lui unique à chaque fichier, car tu peut très bien avoir 2 fichiers arthur.pdf dans 2 dossiers différent
        $filename = $_FILES['carte_identite']['tmp_name'];
        $filename2 = $_FILES['carte_vitale']['tmp_name'];
        $filename3 = $_FILES['carte_mutuelle']['tmp_name'];
        $filename4 = $_FILES['livret_de_famille']['tmp_name'];
            

        //tu défini dans un tableau les extensions que tu souhaite avoir (genre png, jpg, mp3, mp4,...)
        $extensionValides = array('jpg', 'png', 'jpeg', 'pdf');

        //strtolower met tout en minuscule, 
        //Ici il défini où vérifier l'extension du fichier genre arthur.[l'extension est ici]
        $extensionUpload = strtolower(substr(strrchr($_FILES['carte_identite']['name'], '.'), 1));
        $extensionUpload2 = strtolower(substr(strrchr($_FILES['carte_vitale']['name'], '.'), 1));
        $extensionUpload3 = strtolower(substr(strrchr($_FILES['carte_mutuelle']['name'], '.'), 1));
        $extensionUpload4 = strtolower(substr(strrchr($_FILES['livret_de_famille']['name'], '.'), 1));

        //Si dans mon tableau d'extension valide mon fichier possède bien une des 4 extensions possible alors...
        if(in_array($extensionUpload, $extensionValides) && in_array($extensionUpload2, $extensionValides) && in_array($extensionUpload3, $extensionValides)) {

            //Je défini un chemin de dossier où va se trouver mon fichier plus tard
            $dossier = 'fichiers/';
        
            //le fichier prend le titre comme nom et met l'extension du fichier de base
            //exemple : je télécharge un fichier nommé dqodhqisudhq.pdf, il récupère mon nom dans la variable $titre et remplace le nom du fichier par antoine, le fichier se nomme maintenant arthur.pdf
            $fichier_patient = $titre . '.' . $extensionUpload;
            $fichier_patient2 = $titre2 . '.' . $extensionUpload2;
            $fichier_patient3 = $titre3 . '.' . $extensionUpload3;
            $fichier_patient4 = $titre4 . '.' . $extensionUpload4;
                
            //finalise le chemin du fichier donc ici il aura comme chemin final 
            $chemin = $dossier . $fichier_patient;
            $chemin2 = $dossier . $fichier_patient2;
            $chemin3 = $dossier . $fichier_patient3;
            $chemin4 = $dossier . $fichier_patient4;

            //Déplace mon ficher par rapport à mon chemin défini
            $resultat = move_uploaded_file($_FILES['carte_identite']['tmp_name'], $chemin);
            $resultat2 = move_uploaded_file($_FILES['carte_vitale']['tmp_name'], $chemin2);
            $resultat3 = move_uploaded_file($_FILES['carte_mutuelle']['tmp_name'], $chemin3);
            $resultat4 = move_uploaded_file($_FILES['livret_de_famille']['tmp_name'], $chemin4);


          

            //si le chemin est lisible alors il insert dans la bdd
            if(is_readable($chemin) && is_readable($chemin2) && is_readable($chemin3)) {

    
                $var_numsecu=$_SESSION["getnumsecu"];
                $_SESSION['carteid'] = $chemin;
                $_SESSION['cartevit'] = $chemin2;
                $_SESSION['cartemut'] = $chemin3;
                $_SESSION['livret'] = $chemin4;

        
                requete22($chemin, $chemin2, $chemin3, $chemin4);
                header("Location: page_accueil.php");
            }
        }
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
                <div class="moncercle"><p class="cercle_texte">2</p></div>
                <div class="trait"></div><br>
                <div class="moncercle"><p class="cercle_texte">3</p></div>
                <div class="trait"></div><br>
                <div class="moncercle_celuici"><p class="cercle_texte">4</p></div>
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

        <div class="titre_texte" style="margin-top:10px;"><h1>PIECES A JOINDRE</h1></div><br><br>
        <div class="contenu2">
        <form method='POST' action='page5.php' enctype="multipart/form-data">
                        <div class="contenu_double">
                            <div>
                                <p class="texte" style=>Carte d'identité</p>
                                <input type='file' style='border:none; style='margin-left:5vw' class=demilistederoulante  name='carte_identite' accept="image/png, image/gif, image/jpeg, .pdf" required>
                            </div>
                            <div>
                                <p class="texte">Carte Vitale</p>
                                <input type='file' style='border:none;' style='margin-left:5vw' class=demilistederoulante   name='carte_vitale' class="input" accept="image/png, image/gif, image/jpeg, .pdf" required>
                            </div>
                        </div>

                        <div class="contenu_double">
                            <div>
                                <p class="texte" style=>Carte mutuelle</p>
                                <input type='file' style='border:none; style='margin-left:5vw'  class=demilistederoulante   name='carte_mutuelle' accept="image/png, image/gif, image/jpeg, .pdf" required >
                            </div>
                            <div>
                                <p class="texte">Livret de famille (Si mineur)</p>
                                <input type='file' style='border:none; style='margin-left:5vw'  class=demilistederoulante   name='livret_de_famille' class="input" accept="image/png, image/gif, image/jpeg, .pdf">
                            </div>
                        </div>
                        <input type=submit style='margin-top:5vh; margin-bottom: 5vh;' name='documents' class='resultat1'>
                </div>  <!-- fin div tel-->
                
            </div> 
        </form> 
        </div>
        <br><br>
</body>
</html>