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


    if($_GET["connect"]){
        //Si on veut se connecter en utilisant email password
        if($_GET["connect"] == "ep"){
            if(isset($_GET["email"]) && isset($_GET["password"])){
                
                $essaiConnexion = TestConnect($_GET["email"], $_GET["password"]);
                if(isset($essaiConnexion["200"])){
                    
                    connectWithKey(GetPersonneByAttribute("email", $_GET["email"])[0][0], $essaiConnexion["sessionKey"]);
                    $response = $essaiConnexion;
                }
                else{
                    http_response_code(401);
                    $response = array(
                        "401" => "Mauvais email / mot de passe",
                    );
                }
            }
            else{
                http_response_code(401);
                    $response = array(
                    "401" => "Mauvaise saisie des données de connection",
                );
            }
        }
        if($_GET["connect"] == "disconnect"){
            if(isset($_GET["idUser"])){
                http_response_code(200);
                $response = disconnectWithKey($_GET["idUser"]);
            }
        }
        
    }

    if(isset($_GET["key"]) && isset($_GET["idUser"]))
    {
        if(verifyIfKeyExistWithTheRightUser($_GET["key"], $_GET["idUser"]))
        {
            //Si l'utlisateur demande un GET
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                
        if(isset($_GET["test"])){
            http_response_code(200);
            $response = verifyIfKeyExistWithTheRightUser($_GET["key"], $_GET["idUser"]);
        }

        

        
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
                case "nom":
                    if(isset($_GET["idGrade"])){
                        http_response_code(200);
                        $response = GetNomGradeByIdGrade($_GET["idGrade"]);
                    }
                    else{
                        http_response_code(401);
                        $response = array(
                            "400" => "Veuillez indiquer un idGrade",
                        );
                    }
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
                case "noms":
                    http_response_code(200);
                    $response = GetNomsModele();
                break;
            }
        }
        
    }
    else if($_SERVER['REQUEST_METHOD'] == 'PUT'){
        if($_GET["emprunt"]){
            if(isset($_GET["indexAncienModele"]) && isset($_GET["indexAncienPersonne"]) && isset($_GET["indexNouveauModele"]) && isset($_GET["indexNouveauPersonne"])){
                ModifEmprunt($_GET["indexAncienModele"], $_GET["indexAncienPersonne"], $_GET["indexNouveauModele"], $_GET["indexNouveauPersonne"]);
                http_response_code(201);
                $response = array(
                    "201" => "La donnée à été modifiée",
                );
            }
        }
    }
}
}

    
    //Envoie le réponse en JSON
    echo json_encode($response);
}

?>