<?php
    function findAllCoureurs(){
        $sql = MonPdo::getInstance()->prepare('SELECT * FROM Course');
        $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Course');
        $sql->execute();
        return $sql->fetchAll();
    }

    function findAllCourses(){
        $sql = MonPdo::getInstance()->prepare('SELECT * FROM Coureur');
        $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Coureur');
        $sql->execute();
        return $sql->fetchAll();
    }
?>