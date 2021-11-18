<?php
/*  Auteur  : Karel Vilem Svoboda
    Projet  : CoureursCourses
    Date    : 09.11.2021
*/
returnResponse();
function returnResponse() {
    //autorisation des sources externes
    header('Access-Control-Allow-Origin: *');
    //définition du type d'application
    header('Content-Type: application/json');
    //renvoie de la réponse en json

    //require la liste des lieux
    require("MonPdo.php");

    require("user.php");

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(isset($_GET["course"])){
            $listeCoureur;
            foreach(findAllCoureurs() as $coureur){
                array_push($listeCoureur, $coureur);
            }

            foreach($listeCoureur as $coureur)
            {
                echo $coureur[0][0];
            }
        }
    }

    
}


?>