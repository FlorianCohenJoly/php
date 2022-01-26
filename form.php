
<?php 

require_once 'connexion.php';
require_once 'saveToBDD.php';
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





<form method="post" action="form.php">

<p>Veuillez saisir votre nom de compte : </p>
<input type="text"  name="nomCb" placeholder="Nom"> </input>

<br>


<br>




<p> Qu'elle est votre type de compte ?  : </p>
<select  name="typeCb">
        <option value="">--Type de compte--</option>
        <option value="courant">Compte courant</option>
        <option value="epargne">Compte épargne</option>
        <option value="compte joint">Compte joint</option>
    </select><br>

<br>

<p>Qu'elle est la devise ? </p>
<select name="deviseCb" >
            <option value="EUR">Euros</option>
            <option value="USD">Dollars</option>
        </select>

<br>

<input type="number" step="0.01" name="provisionCb"/>


<p><input type="submit" name="Bouton" value="Valider"/></p>





</p>


    
</form>





    
</body>
</html>