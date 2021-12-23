<?php

/*  Projet      : API_ProjetAtelierSupport
    Class       : modele.php
    Desc.       : Permet d'intéragir avec la table modele
    Auteur      : Karel Vilém Svoboda

    Date        : 18.11.2021
    Version     : 0.1
*/

//Récupération de tous les grades
function GetAllModele(){
    $sql = MonPdo::getInstance()->prepare('SELECT * FROM modele');
    $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'modele');
    $sql->execute();
    return $sql->fetchAll();
}

function GetNomsModele(){
    $sql = MonPdo::getInstance()->prepare('SELECT nomModele FROM modele');
    $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'modele');
    $sql->execute();
    return $sql->fetchAll();
}
?>