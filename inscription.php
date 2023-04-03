<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LPF Clinique</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="sidebar2"></div>
    <div class="sidebar">
            <div class="lpfclinique">LPF Clinique</div>
            <a href="pannel_admin.php"><h1>Pannel Admin</h1></a><br>
                 <a href="inscription.php"><h1>Inscription</h1></a><br>
                <a href="">2b rue de la Digue Cambrai</a>
                <a href="">Tel : 0768259584</a>
                <a href="">Mail : LPFClinique@mail.com</a>
            </div>
    <div class="titre_texte" style="margin-top:10px;"><h1>INSCRIPTION</h1></div><br><br>

    <div class="contenu">
        <form action=connexion.php method=post><br><br>
            <label style='color:black;'>Nom : </label><br>
            <input type="text" name="nom" />

            <br>
            
            <label style='color:black;'>Prenom : </label><br>
            <input type="text" name="prenom" />

            <br>

            <label style='color:black;'>Mail : </label><br>
            <input type="text" name="mail" />

            <br>

            <label style='color:black;'>Num sécurité sociale : </label><br>
            <input type="text" name="num_secu" />

            <br>

            <label style='color:black;'>Login : </label><br>
            <input type="text" name="login" />

            <br>

            <label style='color:black;'>Mot de passe : </label><br>
            <input type="text" name="mdp" />

            <br><br>
            
            <input class="hospitalisationimage" id="btn" type=submit name='bouton' value="S'inscrire">

        </form> 
</div>
    
</body>
</html>