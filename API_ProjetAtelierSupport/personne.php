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

    function TestConnect($email, $password){
        $sql = MonPdo::getInstance()->prepare("SELECT idPersonne, nomPersonne, prenomPersonne, dateNaissance, idGrade, email, password FROM stock.personne WHERE email = '" . $email ."' AND password = '" . sha1($password)."'");
        $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'personne');
        $sql->execute();
        $response = $sql->fetchAll();
        if(isset($response[0][0]))
        {
            $str=rand();
            $key = sha1($str);
            $donnees = GetPersonneByAttribute("email", $email);

            http_response_code(200);
                $response = array(
                "200" => "l'utilisateur est connecté",
                "idPersonne" => $donnees[0]["idPersonne"],
                "nomPersonne" => $donnees[0]["nomPersonne"],
                "prenomPersonne" => $donnees[0]["prenomPersonne"],
                "dateNaissance" => $donnees[0]["dateNaissance"],
                "email" => $donnees[0]["email"],
                "idGrade" => $donnees[0]["idGrade"],
                "password" => sha1($password),
                "sessionKey" => $key
            );
        }
        else{
            http_response_code(401);
                $response = array(
                "401" => "Mauvaises données de connexion",
            );
        }
        return $response;
    }

    
?>