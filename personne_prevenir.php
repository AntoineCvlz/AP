<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Tilt+Neon&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alkalami&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="lpf_logo_noir.png" type="image/icon type">
    <title>LPF Clinique</title>
</head>
    <body>
    
    <div class="sidebar2"><br><br><br><br><br><br>
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
        <div class="sidebar">
        <div class="lpfclinique">LPF Clinique</div>
        
        <a href="inscription.php"><h1>Inscription</h1></a><br>
                <a href="">2b rue de la Digue Cambrai</a>
                <a href="">Tel : 0768259584</a>
                <a href="">Mail : LPFClinique@mail.com</a>
        </div>
        <div class="TEXTE">
        <div class="titre_texte" style='margin-top:20px;'><h1 style='color:white;'>COORDONNÉES PERSONNE A PREVENIR</h1></div><br><br>
        <div class="contenu3">
            <form method='POST' class="document_image" action='personne_prevenir.php'>
            <div class="colonne"><!--div colonne-->
                        <div class="contenu_colonne"><!--div contenu_colonne nom epouse-->
                            <p class="texte">Nom de naissance </p>
                                <input class=preadmission type='text'  name='civ' required>
                            </div>  <!-- fin div nom epouse-->
                            <div class="contenu_colonne"><!--div contenu_colonne nom naissance-->
                                <p class="texte">Prenom </p>
                                    <input class=preadmission type='text'  name='nom_naissance' required>
                            </div>  <!-- fin div nom naissance-->
                            <div class="contenu_colonne"><!--div contenu_colonne nom epouse-->
                            <p class="texte">Telephone </p>
                                <input class=preadmission type='text'  name='nom_epouse' required>
                            </div>  <!-- fin div nom epouse-->
                            <div class="contenu_colonne"><!--div contenu_colonne prenom-->
                                <p class="texte">Adresse</p>
                                    <input class=preadmission type='text'  name='prenom' required>
                            </div>  <!-- fin div prenom-->
                            <div class="contenu_colonne"><!--div contenu_colonne num secu-->
                                <p class="texte"><h1>Personne de confiance à prevenir</h1></p>  
                            </div>  <!-- fin div num secu-->
                            <div class="contenu_colonne"><!--div contenu_colonne date naissance-->
                                <p class="texte">Nom de naissance </p>
                                    <input class=preadmission type='date'  name='datenaissance' required>
                            </div>  <!-- fin div date naissance-->
                            <div class="contenu_colonne"><!--div contenu_colonne adresse-->
                                <p class="texte">Prenom</p>
                                    <input class=preadmission type='text'  name='adresse' required>
                            </div>  <!-- fin div adresse-->
                            <div class="contenu_colonne">
                                <p class="texte">Telephone</p><!--div contenu_colonne cp-->
                                    <input class=preadmission type='text'  name='CP' required>
                            </div>  <!-- fin div cp-->
                            <div class="contenu_colonne"><!--div contenu_colonne ville-->
                                <p class="texte">Adresse </p>
                                    <input class=preadmission type='text'  name='Ville' required>
                            </div>  <!-- fin div ville-->
                                    <br><br>
                            </div>  <!-- fin div tel-->
                            
                            <input type=submit value='Suivant' name='formulaire' class='resultat1' required>
                        </div><!-- fin div colonne -->
            </form>
        </div>    
    </body>
</html>