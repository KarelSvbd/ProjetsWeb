<?php

/*  Projet      : API_ProjetAtelierSupport
    Class       : grade.php
    Desc.       : Permet d'intéragir avec la table grade
    Auteur      : Karel Vilém Svoboda

    Date        : 18.11.2021
    Version     : 0.1
*/

function GetAllGrade(){
    $sql = MonPdo::getInstance()->prepare('SELECT * FROM grade');
    $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'grade');
    $sql->execute();
    return $sql->fetchAll();
}

function GetNomGradeByIdGrade($idGrade){
    $sql = MonPdo::getInstance()->prepare('SELECT nomGrade FROM grade WHERE idGrade = :idGrade');
    $sql->bindParam(':idGrade', $idGrade);
    $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'grade');
    $sql->execute();
    return $sql->fetchAll()[0]["nomGrade"];
}
?>