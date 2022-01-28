
<!-- -----------Formulaire pour la connexion--------------- -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>Comptability</title>
</head>
<body> 

<?php 
$check1 = 0;

?>

<form method="post" action="formulaireConnexion.php">

<p>Veuillez saisir votre email : </p>
<input type="text"  name="email" placeholder="Votre email"> </input>


<br>

<p>Quelle est votre mot de passe ? </p>
<input type="password" name="mdp" placeholder="votre mot de passe"> </input>


<p><input type="submit" name="Bouton" value="Valider"/></p>


    
</form>


    
</body>
</html>