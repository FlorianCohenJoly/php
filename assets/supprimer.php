<?php
require_once 'connexion.php';

//fonction supprimer.
function suppCb() {

if(isset($_POST['BoutonSupp'])){ 
    $db = db_connect();

    $req = $db->prepare("DELETE FROM compteBancaire WHERE idCb = :idCb"); //requete qui supprime la ligne de la compte selectionne.

    $req->execute( array(
        ':idCb' => $_POST['BoutonSupp']
    ) );

}

}
echo "<h3><a href='./index.php'>Back to menu</a></h3>";