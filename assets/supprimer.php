<?php
require_once 'connexion.php';

function suppCb() {

if(isset($_POST['BoutonSupp'])){ 
    $db = db_connect();

    $req = $db->prepare("DELETE FROM compteBancaire WHERE idCb = :idCb");

    $req->execute( array(
        ':idCb' => $_POST['BoutonSupp']
    ) );

}

}
echo "<h3><a href='./index.php'>Back to menu</a></h3>";