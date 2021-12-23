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

function ModifEmprunt($indexAncienModele, $indexAncienPersonne, $indexNouveauModele, $indexNouveauPersonne){
    $sql = MonPdo::getInstance()->prepare('UPDATE stock.emprunt SET idPersonne=:indexNouveauPersonne, idModele=:indexNouveauModele WHERE idPersonne=:indexAncienPersonne AND idModele=:indexAncienModele');
    $sql->bindParam(':indexNouveauPersonne', $indexNouveauPersonne);
    $sql->bindParam(':indexNouveauModele', $indexNouveauModele);
    $sql->bindParam(':indexAncienModele', $indexAncienModele);
    $sql->bindParam(':indexAncienPersonne', $indexAncienPersonne);
    
    $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'emprunt');
    $sql->execute();
}
?>