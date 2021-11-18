<?php

/*  Projet      : API_ProjetAtelierSupport
    Class       : emprunt.php
    Desc.       : Permet d'intéragir avec la table emprunt
    Auteur      : Karel Vilém Svoboda

    Date        : 18.11.2021
    Version     : 0.1
*/

function GetAllEmprunt(){
    $sql = MonPdo::getInstance()->prepare('SELECT * FROM emprunt');
    $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'emprunt');
    $sql->execute();
    return $sql->fetchAll();
}
?>