<?php
require_once '../assets/saveToBDD.php';
require_once '../assets/connexion.php';
$db = db_connect();
inscription();



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>Comptability</title>
</head>
<body> 



<form method="post" action="inscription.php">

<p>Veuillez saisir votre email : </p>
<input type="email"  name="mailInscription" placeholder="Votre email"> </input>

<br>

<p>Quelle est votre mot de passe ? </p>
<input type="password" name="mdpInscription" placeholder="votre mot de passe"> </input>

<br>
<br>

<input type="password" name="confirmMDP" placeholder="confirmer votre mot de passe"> </input>

<p><input type="submit" name="ValiderInscription" value="Valider"/></p>


</form>




    
</body>
</html>

