<?php
// -------------------------fonction connexion a la BDD---------------------------------------//
function db_connect() {

try{


    $host = "mysql-codingfactorylouis.alwaysdata.net";
    $dbname = "codingfactorylouis_semainephp";
    $user = "255776_florian";
    $password = "codingfactory";

    $db = new PDO( "mysql:host=$host; dbname=$dbname",
                    $user,
                    $password,
                    array (PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", PDO::MYSQL_ATTR_DIRECT_QUERY =>true));
    return $db;
    }
//renvoie une erreur si la connexion a la BDD est impossible.
catch(PDOException $e){
    die('erreur : '.$e ->getMessage());
}    

}
?>