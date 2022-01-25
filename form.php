
<?php 
require_once 'connexion.php';

$db = db_connect();

//$req = $db->prepare( "SELECT * FROM utilisateur" );
//$req->execute( array() );

//$data = $req->fetchAll();

//var_dump( $data );

 ?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>Document</title>
</head>
<body> 


<?php

require_once 'connexion.php';

$db = db_connect();


if(isset($_POST['Bouton'])){ 
    $nomCb = $_POST['nomCb'];
    $typeCb = $_POST['typeCb'];
    $deviseCb = $_POST['deviseCb'];
    $provisionCb = $_POST['provisionCb'];


    //$AjouterCb="INSERT INTO compteBancaire (nomCb, typeCb,deviseCb) VALUES ('$nomCb', '$typeCb', '$deviseCb')";

    $req = $db->prepare( 'INSERT INTO compteBancaire (idUtilisateur, nomCb, provisionCb, typeCb,deviseCb) VALUES ( :idUtilisateur, :nomCb, :provisionCb, :typeCb, :deviseCb)' );
    $req->execute( array(
        'idUtilisateur' => 1,
        'nomCb' => $nomCb,
        'provisionCb' => $provisionCb,
        'typeCb' => $typeCb,
        'deviseCb' => $deviseCb
    ));

}




//slide 46 ligne 12
?>


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