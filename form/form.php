<?php
require_once '../assets/saveToBDD.php';
require_once '../assets/connexion.php';
$db = db_connect();
bdd();



 ?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>Formulaire</title>
</head>
<body> 





<form method="post" action="../form/form.php">
<!-- nom du compte -->
<p>Veuillez saisir votre nom de compte : </p>
<input type="text"  name="nomCb" placeholder="Nom" required> </input> 

<br>


<br>


<!-- permet un choix du type de compte -->
<p> Qu'elle est votre type de compte ?  : </p>
<select  name="typeCb" required>
        <option value="">--Type de compte--</option>
        <option value="courant">Compte courant</option>
        <option value="epargne">Compte épargne</option>
        <option value="compte joint">Compte joint</option>
    </select><br>

<br>
<!-- choix de la devise -->
<p>Qu'elle est la devise ? </p>
<select name="deviseCb" required>
            <option value="EUR">Euros</option>
            <option value="USD">Dollars</option>
        </select>

<br>
<!-- choix de la quantite de la provision -->
<input type="number" step="0.01" name="provisionCb" required/>


<p><input type="submit" name="Bouton" value="Valider" /></p>


<p><a href="../index.php">Retour au menu </a></p>



</p>


    
</form>





    
</body>
</html>