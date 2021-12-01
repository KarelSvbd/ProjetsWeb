<?php

require "./lib/constantesDB.inc.php";

//MonPdo::$unPdo = new PDO(MonPdo::$serveur.';'.MonPdo::$bdd, MonPdo::$user, MonPdo::$mdp);


function pkmDB(){
    static $pkmConnector = null;

    if($pkmConnector == null){
        try{
            $pkmConnector = new PDO('mysql:' . DBNAME .';hostname=' .HOSTNAME, USER, PASSWORD, 
            array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::ATTR_PERSISTENT => true
            ));
        }
        catch(PDOException $Exception){
            error_log($Exception->getMessage());
            error_log($Exception->getCode());
        }
    }
    return $pkmConnector;
}
