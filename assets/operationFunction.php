<?php




function operation(){

    if(isset($_GET['operation'])){

        $db = db_connect();

        $req = $db->prepare( "SELECT * FROM compteBancaire WHERE idCb = :idCb");

        $req->execute(array(':idCb' => $_GET['operation']));

        $datas = $req->fetchAll();


        
    

        if("option value = debit"){
          $resultat =  $data['provisionCb'] - $data['montantOpe'];
        }





        foreach($datas as $data){


            
            echo '<form method="POST" action="">';
            echo 'Numero de compte bancaire : ' . htmlspecialchars($data['idCb']).'<br>';
            echo 'Provision du compte: ' .htmlspecialchars($data['provisionCb']).'<br>';
            echo 'Provision du compte: ' .$resultat.'<br>';


            echo '<br>';
            echo 'Nom de votre operation :';
            echo '<br>';
            echo '<select name="id">
                    
                    <option value="debit">Alimentaire</option>
                    <option value="debit">Vestimentaire</option>
                    <option value="debit">Loisir</option>
                    <option value="debit">Transport</option>
                    <option value="debit">Logement</option>
                    <option value="debit">Autres</option>
                    <option value="credit">Virement</option>
                    <option value="credit">Dépot</option>
                    <option value="credit">Salaire</option>
                    <option value="ccredit">Autres</option>


                </select>'; 
             echo '<br>';
            echo '<br>';
            echo '<br>';
            echo '<input type="text" name= "nomOpe" placeholder="Nom de votre operation"/> ';
            echo '<br>';
            echo '<br>';
            echo 'Montant de votre operation :';
            

            echo '<br>';
            echo '<br>';
            echo '<input type="number" name="montantOpe" placeholder="montant de l\'operation" />';
            echo '<br>';
            echo '<br>';
            echo 'Date de l\'operation effectue';
            echo '<br>';
            echo '<br>';
            echo '<input type="date" name="dateOpe" />';
            echo '<br>';
            echo '<br>';
            echo '<input type="submit" name="operationValider" value="Valider">';
            echo '<select name="tonNom"> '.operationList().'';
            echo '</select>';
            echo '<br>';
            echo '</form>';
            echo '<p><a href="./compte.php">Retour à mes comptes </a></p>';
        }
    }

}

function saveOpe(){
    $db = db_connect();
    $req = $db->prepare( "SELECT * FROM compteBancaire WHERE idCb = :idCb");
    $req->execute(array(':idCb' => $_GET['operation']));
    $datas = $req->fetchAll();
    
    foreach ($datas as $data){
            if(isset($_POST['operationValider'])){
                $nomOpe = $_POST['nomOpe'];
                $montantOpe = $_POST['montantOpe'];
                $dateOpe = $_POST['dateOpe'];

                $req = $db->prepare('INSERT INTO operation(idCb,id,nomOperation,montantOperation,dateOperation) VALUES (:idCb, :id, :nomOperation, :montantOperation, :dateOperation)');
                $req->execute( array(
                    ':idCb' => htmlspecialchars($data['idCb']),
                    ':id' => 2,
                    ':nomOperation' => $nomOpe,
                    ':montantOperation' => $montantOpe,
                    ':dateOperation' => $dateOpe
                ));

        }
    }
}

function operationList(){
    $db = db_connect();
    $req = $db->query("SELECT * FROM operation WHERE idCb = :idCb");
    $req->execute( array(':idCb' => $_GET['operation']));
    $result = $req->fetchAll();

    foreach($result as $row){
        echo '<option value=" '.$row['idCb'].' ">'.$row['nomOperation'].':'.$row['montantOperation'].' : '.$row['dateOperation'].' </option>';
    }
}





?>




