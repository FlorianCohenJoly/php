<?php


require_once 'connexion.php';


function getAcount() {

$db = db_connect();

    $req = $db->prepare( "SELECT idCb, nomCb, typeCb, provisionCb,deviseCb FROM compteBancaire WHERE idUtilisateur = 1" );
    $req->execute( array() );
    $datas = $req->fetchAll();

    return $datas;

}

function accesCb(){

    if(isset($_GET['idCompte'])){

        $db = db_connect();

        $req = $db->prepare( "SELECT idCb, nomCb, typeCb, provisionCb,deviseCb FROM compteBancaire WHERE idCb = :idCb");

        $req->execute(array(':idCb' => $_GET['idCompte']));

        $datas = $req->fetchAll();

        foreach($datas as $data){
            echo 'Numero de compte bancaire : ' . $data['idCb'].'<br>';
            echo '<br>';
            echo '<button type="submit" name="" value="' . $data['idCb'] . '">Modifier</button>'.'<br>';
            echo '<br>';

            echo 'Nom du compte : ' . $data['nomCb'].'<br>';
            echo '<br>';
            echo '<button type="submit" name="" value="' . $data['idCb'] . '">Modifier</button>'.'<br>';
            echo '<br>';


            echo 'Type du compte bancaire : ' . $data['typeCb'].'<br>';
            echo '<br>';
            echo '<button type="submit" name="" value="' . $data['idCb'] . '">Modifier</button>'.'<br>';
            echo '<br>';

            echo 'Provision du compte: ' . $data['provisionCb'].'<br>';
            echo '<br>';
            echo '<button type="submit" name="" value="' . $data['idCb'] . '">Modifier</button>'.'<br>';
            echo '<br>';

            echo 'Devise du compte : ' . $data['deviseCb'].'<br>';
            echo '<br>';
            echo '<button type="submit" name="" value="' . $data['idCb'] . '">Modifier</button>'.'<br>';
            echo '<br>';

            echo 'couc';
            echo "<br/>";

            echo '<p><a href="compte.php">Retour à mes comptes </a></p>';
        };
    }
 }

 ?>   