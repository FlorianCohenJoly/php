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
    require_once 'connexion.php';


    
    $db = db_connect();

    $req = $db->prepare( "SELECT idCb, nomCb, typeCb, provisionCb,deviseCb FROM compteBancaire WHERE idUtilisateur = 1" );
    $req->execute( array() );

    $datas = $req->fetchAll();

    if(isset($_POST['BoutonSupp'])){ 

        $db = db_connect();
    
    
    
        $req = $db->prepare("DELETE FROM compteBancaire WHERE idCb");
        $req-›execute (array ($_POST ['idCb']));
    
    }
    

    

    foreach($datas as $data){
        echo 'Numero de compte bancaire : ' . $data['idCb'].'<br>';
        echo 'Nom du compte : ' . $data['nomCb'].'<br>';
        echo 'Type du compte bancaire : ' . $data['typeCb'].'<br>';
        echo 'Provision du compte: ' . $data['provisionCb'].'<br>';
        echo 'Devise du compte : ' . $data['deviseCb'].'<br>';
        echo '<br>';
        echo '<input type="submit" name="BoutonSupp" value="Supprimer se compte"/>';
        echo '<br>';
    };
?>    











    
</body>
</html>