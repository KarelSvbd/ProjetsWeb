<?php

/*  Projet      : API_ProjetAtelierSupport
    Class       : typeObjet.php
    Desc.       : Permet d'intéragir avec la table typeObjet
    Auteur      : Karel Vilém Svoboda

    Date        : 18.11.2021
    Version     : 0.1
*/

function GetAllTypeObjet(){
    $sql = MonPdo::getInstance()->prepare('SELECT * FROM typeObjet');
    $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'typeObjet');
    $sql->execute();
    return $sql->fetchAll();
}
?>