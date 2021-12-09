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

    //TO DO : function disconnectWithKey
    
?>