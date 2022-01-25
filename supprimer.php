


        

<?php

require_once 'connexion.php';

$db = db_connect();









if(isset($_POST['BoutonSupp'])){ 

    $db = db_connect();



    $req = $db->prepare("DELETE FROM compteBancaire WHERE idCb");
    $req-›execute (array ($_POST ['idCb']));

}














?>










 