<?php
/*  Projet  : API_ProjetAtelierSupport
    Desc.   : Créer une Api de gestion de stock
    Date    : 11.11.2021 / 18.11.2021
    Version : 1.0
*/

returnResponse();
function returnResponse() {
    //autorisation des sources externes
    header('Access-Control-Allow-Origin: *');
    //définition du type d'application
    header('Content-Type: application/json');

    //Connexion PDO
    require("monPDO.php");


    require("personne.php");
    require("grade.php");
    require("typeObjet.php");
    require("emprunt.php");
    require("modele.php");
    require("connect.php");



    //Si l'utlisateur demande un GET
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        //réponse par défault
        /*http_response_code(400);
        $response = array(
            "400" => "Veuillez saisir une donnée à envoyer",
        );*/

        

        //Intération avec la table personne
        if(isset($_GET["personnes"])){
            http_response_code(200);
            switch($_GET["personnes"]){
                case "all":
                    $response = GetAllPersonne();

                    if(isset($_GET["idPersonne"])){
                        http_response_code(200);
                        $response = GetPersonneByAttribute( "idPersonne", $_GET["idPersonne"]);
                    }
                    else if(isset($_GET["nomPersonne"])){
                        http_response_code(200);
                        $response = GetPersonneByAttribute( "nomPersonne", $_GET["nomPersonne"]);
                    }
                    else if(isset($_GET["prenomPersonne"])){
                        http_response_code(200);
                        $response = GetPersonneByAttribute( "prenomPersonne", $_GET["prenomPersonne"]);
                    }
                    else if(isset($_GET["dateNaissance"])){
                        http_response_code(200);
                        $response = GetPersonneByAttribute( "dateNaissance", $_GET["dateNaissance"]);
                    }
                    else if(isset($_GET["idGrade"])){
                        http_response_code(200);
                        $response = GetPersonneByAttribute( "idGrade", $_GET["idGrade"]);
                    }

                    break;
                case "noms":
                    //Récupération de tous les noms
                    $response = GetAllPersonneByAttribute("nomPersonne");
                    break;
                case "prenoms":
                    //Récupération de tous les prenoms
                    $response = GetAllPersonneByAttribute("prenomPersonne");
                    break;
                case "naissances":
                    //Récupération de toutes les dates de naissances
                    $response = GetAllPersonneByAttribute("dateNaissace");
                    break;
                default:
                    $response = GetAllPersonne();
                    break;
            }
        }
        else if($_GET["grades"]){
            switch($_GET["grades"]){
                case "all":
                    http_response_code(200);
                    $response = GetAllGrade();
                break;
            }
        }
        else if($_GET["typeObjet"]){
            switch($_GET["typeObjet"]){
                case "all":
                    http_response_code(200);
                    $response = GetAllTypeObjet();
                break;
            }
        }
        else if($_GET["emprunt"]){
            switch($_GET["emprunt"]){
                case "all":
                    http_response_code(200);
                    $response = GetAllEmprunt();
                break;
            }
        }
        else if($_GET["modele"]){
            switch($_GET["modele"]){
                case "all":
                    http_response_code(200);
                    $response = GetAllModele();
                break;
            }
        }
        else if($_GET["connect"]){
            //Si on veut se connecter en utilisant email password
            if($_GET["connect"] == "ep"){
                if(isset($_GET["email"]) && isset($_GET["password"])){
                
                    $response = TestConnect($_GET["email"], $_GET["password"]);
                }
                else{
                    http_response_code(400);
                        $response = array(
                        "400" => "Mauvaise saisie des données de connection",
                    );
                }
            }
            
        }
        echo json_encode($response);
    }
}

?>