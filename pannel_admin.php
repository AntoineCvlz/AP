<?php
session_start();

if (!isset($_SESSION['role'])){
    header("Location: connexion.php");
}
else if ($_SESSION['role']=="medecin"){
    header("Location: connexion.php");
}
else if ($_SESSION['role']=="secretaire"){
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
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Alkalami&family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
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
        <div class="sidebar">
                <div class="lpfclinique">LPF Clinique</div>
                <a href="">2b rue de la Digue Cambrai</a>
                <a href="">Tel : 0768259584</a>
                <a href="">Mail : LPFClinique@mail.com</a>
        </div>
        <div class="titre_texte" style='margin-top:20px;'><h1 style='color:white;'>PANNEL ADMIN</div><br><br>
        
        <div class="panneladmin1">
                <div class="texte2">Ajouter un médecin</div>
                <div class="centrer_panneladmin">
                        <form method='POST' action='pannel_admin.php'>
                                <label style='color:black;'>Nom medecin</label>
                                <input type="text" name="nom_medecin"/>

                                
                                <label style='color:black;'>Service </label>
                                <select class="preadmission3" name="nom_servi" >
                                        <?php
                                        requete101();
                                        ?>
                                </select>


                                <label style='color:black;'>Login</label>
                                <input type="text" name="login_medecin" />


                                <label style='color:black;'>Mot de passe</label>
                                <input type="text" name="mdp_medecin" />


                                <!-- Oublie pas de mettre obligatoirement le role médecin quand il s'inscrit--> 
                                <?php
                                        requete104(); 
                                ?>
                        
                                <input type=submit style='margin-top:3vh;' name='medecin' class='resultat2' value='Ajouter'>
                        </form> 
                </div>        
        </div>
        
        <div class="panneladmin" id='gaucheAdmin'>
                
                <div class="texte2">Ajouter un service</div>
                        <div class="centrer_panneladmin">
                        <form method='POST' action='pannel_admin.php'>
                                <form action=connexion.php method=post>
                                        <label style='color:black;'>Nom service à ajouter</label>
                                        <input type="text" name="ajout_service" />
                                        <?php
                                        requete100();
                                        ?>
                                <input type=submit style='margin-top:3vh;' name='formu' class='resultat2' value='Ajouter'>
                        </form>
                </div>
        </div>
        <div class="panneladmin" style='margin-top:5%;' id='droiteAdmin'>
                
                <div class="texte2">Supprimer un médecin existant</div>
                        <div class="centrer_panneladmin">
                        <form method='POST' action='pannel_admin.php'>
                                <form action=connexion.php method=post>
                                        <label style='color:black;'>Choisissez un médecin</label>
                                        <select class="preadmission3" name="nom_perso" >
                                        <?php
                                        requete102();
                                        ?>
                                </select>
                                <input type=submit style='margin-top:3vh;' name='formu_med' class='resultat2' value='Supprimer'>
                        </form>
                </div>
        </div>

</body>
</head>