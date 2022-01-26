<?php

/*  Projet      : Pokemon
    Class       : modele.php
    Desc.       : Permet d'inetagir avec la db pkm
    Auteur      : Karel Vilém Svoboda

    Date        : 23.11.2021
    Version     : 1
*/

    //Permet de récupérer tout les pokemons
    function GetAllPokemon(){
        $sql = MonPdo::getInstance()->prepare('SELECT * FROM Pokemon');
        $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Pokemon');
        $sql->execute();
        return $sql->fetchAll();
    }

    //Permet de récupérer tout les types
    function GetAllType(){
        $sql = MonPdo::getInstance()->prepare('SELECT * FROM Type');
        
        $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Type');
        $sql->execute();
        return $sql->fetchAll();
    }

    //Permet d'insérer un pokemon dans la base
    function InsertPokemon($nomPokemon, $idType){
        $sql = MonPdo::getInstance()->prepare("INSERT INTO Pokemon(nomPokemon, idType) VALUES(:nPkm, :id)");
        $sql->bindParam(':nPkm', $nomPokemon, PDO::PARAM_STR);
        $sql->bindParam(':id', $idType, PDO::PARAM_INT);
        $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Type');
        $sql->execute();
    }

    
?>