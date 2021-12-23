<?php

/*  Projet      : API_ProjetAtelierSupport
    Class       : connect.php
    Desc.       : permet de manipuler la table connexion
    Auteur      : Karel Vilém Svoboda

    Date        : 25.11.2021
    Version     : 0.1
*/


    function connectWithKey($idUser, $sessionKey){
        $sql = MonPdo::getInstance()->prepare("INSERT INTO stock.connexion(idPersonne, CleDeConnexion) VALUES('" . $idUser . "', '" .$sessionKey . "')");
        $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'connexion');
        $sql->execute();
    }

    
    function disconnectWithKey($idUser){
        $sql = MonPdo::getInstance()->prepare("DELETE FROM stock.connexion WHERE idPersonne=" . $idUser ."");
        $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'connexion');
        $sql->execute();
    }

    //Return bool
    function verifyIfKeyExistWithTheRightUser($key, $idUser){
        $sql = MonPdo::getInstance()->prepare('SELECT idConnexion, idPersonne, CleDeConnexion FROM stock.connexion WHERE CleDeConnexion="' . $key . '" AND idPersonne="' . $idUser .'"');
        $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'emprunt');
        $sql->execute();

        $reponse = $sql->fetchAll();
        $reponse["idConnexion"];
        //Si l'id de connexion existe
        if(isset($reponse[0]["idConnexion"])){
            return true;
        }
        else{
            return false;
        }
    }
    
?>