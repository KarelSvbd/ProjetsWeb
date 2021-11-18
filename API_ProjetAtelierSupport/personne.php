<?php

/*  Projet      : API_ProjetAtelierSupport
    Class       : personne.php
    Desc.       : Permet d'intéragir avec la table personne
    Auteur      : Karel Vilém Svoboda

    Date        : 18.11.2021
    Version     : 0.1
*/

    function GetAllPersonne(){
        $sql = MonPdo::getInstance()->prepare('SELECT * FROM personne');
        $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'personne');
        $sql->execute();
        return $sql->fetchAll();
    }

    function GetAllPersonneByAttribute($attribute){
        $sql = MonPdo::getInstance()->prepare("SELECT " . $attribute . " FROM personne");
        $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'personne');
        $sql->execute();
        return $sql->fetchAll();
    }

    function GetPersonneByAttribute( $attribute, $requete){
        
        $sql = MonPdo::getInstance()->prepare("SELECT * FROM personne WHERE ". $attribute ." = '" . $requete ."'");
        $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'personne');
        $sql->execute();
        return $sql->fetchAll();
    }
?>