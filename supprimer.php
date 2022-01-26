<?php




function suppCb() {


if(isset($_POST['BoutonSupp'])){ 
    $db = db_connect();

    $req = $db->prepare("DELETE FROM compteBancaire WHERE idCb = :idCb");
    //$req-›execute(array ($_POST ['typeCb'] ));

    $req->execute( array(
        ':idCb' => $_POST['BoutonSupp']
    ) );

}

}