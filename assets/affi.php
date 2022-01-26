<?php


require_once 'connexion.php';


function getAcount() {

$db = db_connect();

    $req = $db->prepare( "SELECT idCb, nomCb, typeCb, provisionCb,deviseCb FROM compteBancaire WHERE idUtilisateur = 1" );
    $req->execute( array() );
    $datas = $req->fetchAll();

    return $datas;

}

 ?>   