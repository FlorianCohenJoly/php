<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de mon compte</title>
</head>
<body>

<?php 
    require_once 'assets/connexion.php';
    require_once 'assets/supprimer.php';
    require_once 'assets/affi.php';
    require_once 'assets/operationFunction.php';


$db = db_connect(); //fonction pour se connecter a la BDD.

suppCb(); // fonction supprimer dans la BDD.
    
    
$datas = getAcount(); // fonction recuperation des comptes.
   

accesCb(); //fonction qui recuperes les infos des comptes bancaires.


    //Historique des comptes bancaires d'un compte utilisateur.
    foreach($datas as $data){
        echo '<hr width="100%" color="black"  />';
        echo '<br>';
        echo 'Numero de compte bancaire : ' . $data['idCb'].'<br>';
        echo 'Nom du compte : ' . $data['nomCb'].'<br>';
        echo 'Type du compte bancaire : ' . $data['typeCb'].'<br>';
        echo 'Provision du compte: ' . $data['provisionCb'].'<br>';
        echo 'Devise du compte : ' . $data['deviseCb'].'<br>';
        echo '<br>';
        echo '<form method="POST" action="">';
        echo '<button type="submit" name="BoutonSupp" value="' . $data['idCb'] . '">Supprimer ce compte</button>';
        echo '</form>';
        echo '<form method="GET" action="update.php">';
        echo '<button type="submit" name="idCompte" value="' . $data['idCb'] . '">Modifier ce compte </button>';
        echo '</form>';
        echo '<form method="GET" action="operation.php">';
        echo '<button type="submit" name="operation" value="' . $data['idCb'] . '">Ajouter des operations </button>';
        echo '</form>';
        echo '<br>';
        echo '<hr width="100%" color="black" />';
    };
    
?>    


<p><a href="index.php">Retour au menu </a></p>

    
</body>
</html>