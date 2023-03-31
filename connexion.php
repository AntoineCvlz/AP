<?php
require("requete_sql_AP1.php");


session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,500&display=swap" rel="stylesheet">
</head>
<body>
<div class="sidebar2" >
</div>
<div class="sidebar" class='sous_titre' class='texte'>
            
            <div class="lpfclinique">LPF Clinique</div> 
            <a href=""><p class='ptexte_sidebar' style='color:white;'>2b rue de la Digue Cambrai</a></p>
            <a href=""><p class='ptexte_sidebar' style='color:white;'>Tel : 0768259584</a></p>
            <a href=""><p class='ptexte_sidebar' style='color:white;'>Mail : LPFClinique @ mail.com</a></p>
        </div>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <div class="titre_texte2" style="margin-top:20%;" ><h1>PAGE DE CONNEXION</h1></div><br><br>

    <div class="contenu_connexion ">
        <form class='texte' action=connexion.php method=post>
            <label><div class="connexion_texte" style='color:black;'>Nom d'utilisateur : </Div>
            <input type="text" name="login" /></label>
            <label><div class="connexion_texte" style='color:black;'>Mot de passe :  </Div>
            <input type="password" name="mdp" /></label>
            <label><div class="connexion_texte" style='color:black;'>Captcha : </Div>
            <input type="CaptchaValid" readonly="readonly" id="CaptchaValid" name="CaptchaValid"></input>
            <script type="text/javascript" src="script.js"></script>
            <input type="text" name="Captcha" /></input></label>
            <input class="resultat2" style='margin-top:7%;'type=submit name='bouton' value="Se connecter"></input>
        </form>
        <br>
    </div>
    </div>
    



 <?php
$Captcha = $_POST['CaptchaValid'];
if (isset($_POST['Captcha'])){
    if($_POST['Captcha']){
        echo 'La saisie du captcha est obligatoire !';
    }
    if($_POST['login']==NULL){
    echo 'La saisie du user est obligatoire !';
    }
    elseif ($_POST['mdp']==NULL){
       echo 'La saisie du mdp est obligatoire !';
       }
    elseif($_POST['Captcha'] == $Captcha){
        requete10();
        
    }

}
?>

</div>
    
</body>
</html>


