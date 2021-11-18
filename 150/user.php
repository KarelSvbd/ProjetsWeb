<?php
    function findAllUtilisateurs(){
        $sql = MonPdo::getInstance()->prepare('SELECT * FROM utilisateur');
        $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Course');
        $sql->execute();
        return $sql->fetchAll();
    }

    function addUtilisateur($nom, $prenom, $email, $age){
        $sql = MonPdo::getInstance()->prepare("INSERT INTO utilisateur VALUES '" . $nom . "', '" . $prenom . "', '" . $email . "', '" . $age . "'");
        $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Course');
        $sql->execute();
        return $sql->fetchAll();
    }
?>