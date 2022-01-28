<?php


require_once 'connexion.php';
require_once 'saveToBDD.php';

//fonction qui permet de recuperer les comptes bancaires selon l'utilisateur.
function getAcount() {

$db = db_connect();

    $req = $db->prepare( "SELECT * FROM compteBancaire WHERE idUtilisateur = 1" ); //recupere les comptes selon l'id
    $req->execute( array() ); //les met dans un tableau
    $datas = $req->fetchAll(); //les recuperes tous dans une variable

    return $datas;

}

//Requete pour les modifications de compteBancaire













//fonction permettant d'afficher un formulaire preremplie.
function accesCb(){

    if(isset($_GET['idCompte'])){
        //requete permettant de recuperer les informations des comptes banquaires.
        $db = db_connect();
        $req = $db->prepare( "SELECT * FROM compteBancaire WHERE idCb = :idCb");
        $req->execute(array(':idCb' => $_GET['idCompte']));
        $datas = $req->fetchAll();

        foreach($datas as $data){

            echo '<form method="POST" action="">';
            echo 'Numero de compte bancaire : ' . htmlspecialchars($data['idCb']).'<br>'; //recupere et preremplie avec la valeur de idCB
            echo '<input type="hidden"  name="idCb" value="' . htmlspecialchars($data['idCb']) . '"/>';
            echo '<br>';
           

            echo '<br>';

            echo 'Nom du compte : ' . htmlspecialchars($data['nomCb']).' <br>'; //recupere et preremplie la valeur de nomCb
            echo '<br>';
            echo '<input type="text"  name="nomCb" placeholder="Nom" value="'.htmlspecialchars($data['nomCb']).'"> </input>';
            echo '<br>';


            echo 'Type du compte bancaire : ' .htmlspecialchars($data['typeCb']). '<br>'; //recupere et preremplie la valeur de typeCb
            echo '<br>';
            echo '<select name="typeCb">
                    <option value="'.htmlspecialchars($data['typeCb']) .'">'. htmlspecialchars($data['typeCb']) .'</option>
                    <option value="courant">Compte courant</option>
                    <option value="epargne">Compte épargne</option>
                    <option value="compte joint">Compte joint</option>
                    </select>'; 
            echo '<br>';
            
            echo '<br>';
            echo 'Provision du compte: ' .htmlspecialchars($data['provisionCb']).'<br>'; //recupere et preremplie la valeur de provisionCb
            echo '<input type="text"  name="provisionCb" placeholder="Provision du compte" value="'.htmlspecialchars($data['provisionCb']).'"> </input>';            echo '<br>';
            
            echo '<br>';

            echo 'Devise du compte : ' .htmlspecialchars($data['deviseCb']).'<br>'; //recupere et preremplie la valeur de devise
            echo '<br>';
            echo '<select name="deviseCb" value="'.htmlspecialchars($data['deviseCb']).'">
                    <option value="'.htmlspecialchars($data['deviseCb']).'">'.htmlspecialchars($data['deviseCb']).'</option>
                    <option value="EUR">EUR</option>
                    <option value="USD">USD($)</option>
                </select>';
            echo '<br>';

            echo '<br>';
            echo '<p><input type="submit" name="Bouton" value="Valider"/></p>';

            echo '</form>';

            echo 'couc';
            echo "<br/>";

            echo '<p><a href="./compte.php">Retour à mes comptes </a></p>';
        };

    }
 }







//fonction permettant la mise a jour des infos dans la BDD.
function update(){
    $db = db_connect();

    //Condition qui verifie si les cases sont vides , return si oui.
    if(isset($_POST['nomCb'])){
        $req = $db->prepare('UPDATE compteBancaire SET nomCb = :nomCb WHERE idCb = :idCb; ');
        if (empty($_POST['nomCb'])){
            echo "<script>alert('Name is required')</script>";
            return;
        }
        //condition qui verifie si ca contient des caracteres speciaux , si oui return.
        elseif (hasSpecialChar(htmlspecialchars($_POST['nomCb']))){
            echo "<script>alert('Invalid value')</script>";
            return;
        }
        $req->execute( array("nomCb" => htmlspecialchars($_POST['nomCb']), "idCb" => htmlspecialchars($_POST['idCb'])));
        $req->closeCursor();
    }

    if(isset($_POST['typeCb'])){

        $req = $db->prepare('UPDATE compteBancaire SET typeCb = :typeCb WHERE idCb = :idCb; ');
        $req->execute( array("typeCb" => htmlspecialchars($_POST['typeCb']), "idCb" => htmlspecialchars($_POST['idCb'])));
        $req->closeCursor();
        }

    if(isset($_POST['deviseCb'])){

        $req = $db->prepare('UPDATE compteBancaire SET deviseCb = :deviseCb WHERE idCb = :idCb; ');
        $req->execute( array("deviseCb" => htmlspecialchars($_POST['deviseCb']), "idCb" => htmlspecialchars($_POST['idCb'])));
        $req->closeCursor();
        }

    if(isset($_POST['provisionCb'])){

        $req = $db->prepare('UPDATE compteBancaire SET provisionCb = :provisionCb WHERE :idCb; = :idCb');
        //condition qui verifie si ce n'est pas vide.
        if (empty($_POST['provisionCb'])){
            echo "<script>alert('provision is required')</script>";
            return;
        }
        //condition qui verifie si ca contient pas des lettres.
        elseif(hasString(htmlspecialchars($_POST['provisionCb'])) || hasSpecialChar(htmlspecialchars($_POST['provisionCb']))){
            echo "<script>alert('Invalid value for provision')</script>";
            return;
        }
        $req->execute ( array("provisionCb" => htmlspecialchars($_POST['provisionCb']),"idCb" => htmlspecialchars($_POST['idCb'])));
        $req->closeCursor();
    }
}


 ?>   