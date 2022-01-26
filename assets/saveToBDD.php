<?php
session_start();
require_once 'connexion.php';

function bdd(){
    $db = db_connect();
    $idUtilisateur = 1;
    $limit = $db->query('SELECT* FROM compteBancaire');
    $rowLimit = count($limit->fetchAll());
    echo $rowLimit;
    
        if(isset($_POST['Bouton'])){ 
            $nomCb = $_POST['nomCb'];
            $typeCb = $_POST['typeCb'];
            $deviseCb = $_POST['deviseCb'];
            $provisionCb = $_POST['provisionCb'];

            if ($idUtilisateur==1 && $rowLimit < 10) {
            //$AjouterCb="INSERT INTO compteBancaire (nomCb, typeCb,deviseCb) VALUES ('$nomCb', '$typeCb', '$deviseCb')";
            $req = $db->prepare( 'INSERT INTO compteBancaire (idUtilisateur, nomCb, provisionCb, typeCb,deviseCb) VALUES ( :idUtilisateur, :nomCb, :provisionCb, :typeCb, :deviseCb)' );
            $req->execute( array(
                'idUtilisateur' => $idUtilisateur,
                'nomCb' => $nomCb,
                'provisionCb' => $provisionCb,
                'typeCb' => $typeCb,
                'deviseCb' => $deviseCb
            ));
            }else{
                echo "<script>alert('You have exceed number of accounts')</script>";
                }
            echo $rowLimit;
        }
}

function inscription(){
    $db = db_connect();
    if(isset($_POST['ValiderInscription'])){
        $mailInscription = $_POST['mailInscription'];
        $mdpInscription = $_POST['mdpInscription'];

        $req = $db->prepare('INSERT INTO utilisateur (idUtilisateur,mailUtilisateur,mdpUtilisateur) VALUES (:idUtilisateur,:mailUtilisateur,:mdpUtilisateur)');
        $req->execute( array(
            'idUtilisateur' => '',
            'mailUtilisateur' => $mailInscription,
            'mdpUtilisateur' => $mdpInscription
        ));
    echo "omg";
    }
}

