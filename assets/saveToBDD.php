<?php
session_start();
require_once 'connexion.php';

//------------fonction verif s'il y a presence d'une lettre dans le mot------------//
function hasString( $string ) {
    $hasString = false;
    for( $i = 0; $i < strlen( $string ); $i++ ) {       //boucle qui verif chaque caractere
        if( ctype_alpha( $string[$i] ) ) $hasString = true; // contient lettre -> return vraie
    }

    return $hasString;
}
// fonction qui verifie s'il y a la presence d'un caractere special
function hasSpecialChar( $string ) {
    $hasSpecialChar = false;
    for( $i = 0; $i < strlen( $string ); $i++ ) {
        if(ctype_punct($string[$i])) $hasSpecialChar = true;
    }
    return $hasSpecialChar;
}

//fonction qui contient formulaire + sauvegarde de ses donnees dans la BDD.
function bdd(){
    $db = db_connect();
    $idUtilisateur = 1;
    $limit = $db->query('SELECT* FROM compteBancaire WHERE idUtilisateur = 1'); // recupere tous les comptes bancaires de l'utilisateur 1
    $rowLimit = count($limit->fetchAll()); //compte les lignes 
    
    
        if(isset($_POST['Bouton'])){  //condition lorsque le bouton est selectionne.
            $nomCb = $_POST['nomCb'];
            $typeCb = $_POST['typeCb'];
            $deviseCb = $_POST['deviseCb'];
            $provisionCb = $_POST['provisionCb'];

            if(errorEmpty($nomCb,$provisionCb)){ //condition si les var sont vides
                return;
            }

            if (hasSpecialChar($nomCb)){ //condition s'il n'y a pas presence de caractere speciaux
                echo "<script>alert('Invalid value')</script>";
                return;
                }

            elseif(hasString($provisionCb) || hasSpecialChar($provisionCb)){ //condition pour verifier s'il y a pas de char speciaux ou de lettres.
                echo "<script>alert('Invalid value for provision')</script>";
                return;
            }

            elseif ($idUtilisateur==1 && $rowLimit < 10) { //verifie si c'est le bon utilisateur et s'il y a moins de 10 comptes bancaires par utilisateur.
            
            //$AjouterCb="INSERT INTO compteBancaire (nomCb, typeCb,deviseCb) VALUES ('$nomCb', '$typeCb', '$deviseCb')";
            $req = $db->prepare( 'INSERT INTO compteBancaire (idUtilisateur, nomCb, provisionCb, typeCb,deviseCb) VALUES ( :idUtilisateur, :nomCb, :provisionCb, :typeCb, :deviseCb)' );
            $req->execute( array(
                'idUtilisateur' => 1,
                'nomCb' => $nomCb,
                'provisionCb' => $provisionCb,
                'typeCb' => $typeCb,
                'deviseCb' => $deviseCb
            ));

            }elseif ($rowLimit >10){ //s'il y a plus de 10 lignes renvoie une erreur.
                echo "<script>alert('You have exceed number of accounts')</script>";
            };
        };
};
//fonction qui verifie si les variables sont vides.
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
/*
fonction qui permet l'inscription au site.
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
*/
?>