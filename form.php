<?php

require_once 'connexion.php';

$db = db_connect();

$req = $db->prepare( "SELECT * FROM utilisateur" );
$req->execute( array() );

$data = $req->fetchAll();

var_dump( $data );

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>Document</title>
</head>
<body> 



<form method="post" action="form.php">



<p>
<p>Veuillez saisir votre nom de compte : </p>
<input type="text" id="name" name="name" placeholder="Nom"> </input>

<br>
<p> Veuillez saisir votre identifiant de compte :  </p>
<input type="text" id="" name="name" placeholder="Votre identifiant de compte"/> 

<br>

<p> Qu'elle est votre type de compte ?  : </p>
<select id="typeCompte" name="typeCompte">
        <option value="">--Type de compte--</option>
        <option value="courant">Compte courant</option>
        <option value="epargne">Compte epargne</option>
        <option value="compte joint">Compte joint</option>
    </select><br>

<br>

<p>Qu'elle est la devise ? </p>
<select name="Devise">
            <option value="EUR">Euros</option>
            <option value="USD">Dollars</option>
        </select>

<br>


<p><input type="submit" name="submitForm" value="Valider"/></p>

</p>


    
</form>





    
</body>
</html>