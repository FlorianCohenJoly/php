<?php
session_start();
require_once 'connexion.php';

function hasString( $string ) {
    $hasString = false;
    for( $i = 0; $i < strlen( $string ); $i++ ) {
        if( ctype_alpha( $string[$i] ) ) $hasString = true;
    }

    return $hasString;
}

function hasSpecialChar( $string ) {
    $hasSpecialChar = false;
    for( $i = 0; $i < strlen( $string ); $i++ ) {
        if(ctype_punct($string[$i])) $hasSpecialChar = true;
    }
    return $hasSpecialChar;
}

function bdd(){
    $db = db_connect();
    $idUtilisateur = 1;
    $limit = $db->query('SELECT* FROM compteBancaire');
    $rowLimit = count($limit->fetchAll());
    
    
        if(isset($_POST['Bouton'])){ 
            $nomCb = $_POST['nomCb'];
            $typeCb = $_POST['typeCb'];
            $deviseCb = $_POST['deviseCb'];
            $provisionCb = $_POST['provisionCb'];

            if(errorEmpty($nomCb,$provisionCb)){
                return;
            }

            if (hasSpecialChar($nomCb)){
                echo "<script>alert('Invalid value')</script>";
                return;
                }

            elseif(hasString($provisionCb) || hasSpecialChar($provisionCb)){
                echo "<script>alert('Invalid value for provision')</script>";
                return;
            }

            elseif ($idUtilisateur==1 && $rowLimit < 10) {
            
            //$AjouterCb="INSERT INTO compteBancaire (nomCb, typeCb,deviseCb) VALUES ('$nomCb', '$typeCb', '$deviseCb')";
            $req = $db->prepare( 'INSERT INTO compteBancaire (idUtilisateur, nomCb, provisionCb, typeCb,deviseCb) VALUES ( :idUtilisateur, :nomCb, :provisionCb, :typeCb, :deviseCb)' );
            $req->execute( array(
                'idUtilisateur' => 1,
                'nomCb' => $nomCb,
                'provisionCb' => $provisionCb,
                'typeCb' => $typeCb,
                'deviseCb' => $deviseCb
            ));

            }elseif ($rowLimit >10){
                echo "<script>alert('You have exceed number of accounts')</script>";
            };
        };
};

function errorEmpty($nomCb,$provisionCb){
    $error = false;
    if(empty($nomCb)){
        echo "<script>alert('Name is required')</script>";
        $error = true;
        return $error;
    }
    elseif(empty($provisionCb)){
        echo "<script>alert('Provision is required')</script>";
        $error = true;
        return $error;
    }
    return $error;
}

function inscription(){
    $db = db_connect();
    if(isset($_POST['ValiderInscription'])){
        $mailInscription = $_POST['mailInscription'];
        $mdpInscription = $_POST['mdpInscription'];
        $validMDP = $_POST['confirmMDP'];
        
        if ($validMDP == $mdpInscription){
        $req = $db->prepare('INSERT INTO utilisateur (mailUtilisateur,mdpUtilisateur) VALUES (:mailUtilisateur,:mdpUtilisateur)');
        $req->execute( array(
            'mailUtilisateur' => $mailInscription,
            'mdpUtilisateur' => $mdpInscription
        ));
        echo "<script>alert('Welcome ! You have created an account')</script>";
        } elseif($validMDP != $mdpInscription){
            echo "<script>alert('You have to valid your password!')";
        }
    }
}
echo "<h3><a href='./index.php'>Back to menu</a></h3>";
?>