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



$db = db_connect();

suppCb();
    
    
$datas = getAcount();
   

    

    

    foreach($datas as $data){
        echo 'Numero de compte bancaire : ' . $data['idCb'].'<br>';
        echo 'Nom du compte : ' . $data['nomCb'].'<br>';
        echo 'Type du compte bancaire : ' . $data['typeCb'].'<br>';
        echo 'Provision du compte: ' . $data['provisionCb'].'<br>';
        echo 'Devise du compte : ' . $data['deviseCb'].'<br>';
        echo '<br>';
        echo '<form method="POST" action="">';
        echo '<button type="submit" name="BoutonSupp" value="' . $data['idCb'] . '">Supprimer ce compte</button>';
        echo '</form>';
        echo '<br>';
    };
    
?>    




    
</body>
</html>