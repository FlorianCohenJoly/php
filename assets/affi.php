<?php


require_once 'connexion.php';


function getAcount() {

$db = db_connect();

    $req = $db->prepare( "SELECT idCb, nomCb, typeCb, provisionCb,deviseCb FROM compteBancaire WHERE idUtilisateur = 1" );
    $req->execute( array() );
    $datas = $req->fetchAll();

    return $datas;

}

//Requete pour les modifications de compteBancaire














function accesCb(){

    if(isset($_GET['idCompte'])){

        $db = db_connect();

        $req = $db->prepare( "SELECT idCb, nomCb, typeCb, provisionCb,deviseCb FROM compteBancaire WHERE idCb = :idCb");

        $req->execute(array(':idCb' => $_GET['idCompte']));

        $datas = $req->fetchAll();

        foreach($datas as $data){

            echo '<form method="POST" action="">';
            echo 'Numero de compte bancaire : ' . $data['idCb'].'<br>';
            echo '<input type="hidden"  name="idCb" value="' . $data['idCb'] . '"/>';
            echo '<br>';
           

            echo '<br>';

            echo 'Nom du compte : ' . $data['nomCb'].'<br>';
            echo '<br>';
            echo '<input type="text"  name="nomCb" placeholder="Nom"> </input>';
            echo '<br>';


            echo 'Type du compte bancaire : ' . $data['typeCb'].'<br>';
            echo '<br>';
            echo '<input type="text"  name="typeCb" placeholder="Nom"> </input>';
            echo '<br>';

            echo 'Provision du compte: ' . $data['provisionCb'].'<br>';
            echo '<br>';
            
            echo '<br>';

            echo 'Devise du compte : ' . $data['deviseCb'].'<br>';
            echo '<br>';
            echo '<input type="text"  name="deviseCb" placeholder="Nom"> </input>';
            echo '<br>';
            echo '<p><input type="submit" name="Bouton" value="Valider"/></p>';

            echo '</form>';

            echo 'couc';
            echo "<br/>";

            echo '<p><a href="../compte.php">Retour à mes comptes </a></p>';
        };

    }
 }



//Requete pour les modifications d'un compte pour




function update(){
    $db = db_connect();

    if(isset($_POST['nomCb'])){

    $req = $db->prepare('UPDATE compteBancaire SET nomCb = :nomCb WHERE idCb = :idCb; ');
    $req->execute( array("nomCb" => $_POST['nomCb'], "idCb" => $_POST['idCb']));
    $req->closeCursor();
    }

    elseif(isset($_POST['typeCb'])){

    $req = $db->prepare('UPDATE compteBancaire SET typeCb = :typeCb WHERE idCb = :idCb; ');
    $req->execute( array("typeCb" => $_POST['typeCb'], "idCb" => $_POST['idCb']));
    $req->closeCursor();
    }

    elseif(isset($_POST['deviseCb'])){

    $req = $db->prepare('UPDATE compteBancaire SET deviseCb = :deviseCb WHERE idCb = :idCb; ');
    $req->execute( array("deviseCb" => $_POST['deviseCb'], "idCb" => $_POST['idCb']));
    $req->closeCursor();
    }
}


 ?>   