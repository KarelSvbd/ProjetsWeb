<?php 
/*  Auteur  : Karel Vilem Svoboda
    Projet  : API_GroupesInterventions
    Date    : 16.04.2021 - 11.06.2021
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
    
    //recherche toutes les donnees dans la base
    function findAll(){
        $sql = MonPdo::getInstance()->prepare('SELECT * FROM groupes');
        $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'groupe');
        $sql->execute();
        $listeGroupes = $sql->fetchAll();
        return $listeGroupes;
    }
    $listeGroupes = findAll();

    //Si l'utlisateur demande un GET
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        //réponse par défault
        http_response_code(500);
        $response = array(
            "500" => "Erreur lors de l'execution du code",
        );
        
        //si la paramêtre groupe a une valeur dans le get
        if(isset($_GET["canton"])){
            //récupétation du GET dans l'url et remplacement du '&' par ','
            $canton = str_replace(",", "&", $_GET["canton"]);
            //si canton = all ou rien on envoie tout
            if($_GET["canton"] == "all" || $_GET["canton"] == "ALL" || empty($_GET["canton"])){
                $donneeTrouvee = true;
            }
            if(isset($donneeTrouvee)){
                //retour du code HTTP
                http_response_code(200);
                echo json_encode($listeGroupes);
                
                die();
            }
            //si le canton n'est pas une valeur numérique et qu'il a une longueur de 2
            if(!is_numeric($canton) && strlen($canton) == 2){
                
                $i = 0;
                foreach($listeGroupes as $groupes){
                    //si le code postal correspond à une donnée dans la base de données
                    if($listeGroupes[$i]["canton"] == $canton)
                    {
                        http_response_code(200);
                        $donneeTrouvee = true;
                        $response = $groupes;
                    }
                    $i++;
                }
                //si il n'y a pas de réponse, ça signifie que les aucune donnée ne correpond avec la liste des lieux
                if(!isset($donneeTrouvee))
                {
                    http_response_code(400);
                    $response = array(
                        "400" => "Parametre invalide, groupe d'intervention pour canton inexistant",
                    );
                }
                else{
                    
                }
            }
            else
            {
                http_response_code(400);
                $response = array(
                    "400" => "Parametre invalide, format invalide essayez plutôt 'GE' par exemple",
                );
            }
        }
        else
        {
            http_response_code(400);
            $response = array(
                "400" => "Parametre invalide, groupe d'intervention pour canton inexistant",
            );
        }
        echo json_encode($response);
    }
    //Si l'utilisateur demande un post
    else if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        if(!isset($_GET["acronyme"]) && !isset($_GET["nom"]) && !isset($_GET["canton"]) && !isset($_GET["informations"]) && !isset($_GET["badge"]) &&  !isset($_GET["images"])){
            http_response_code(400);
            $response = array(
                "400" => "Veuillez saisir les donnees dans le GET afin de pouvoir les transmettre à la base.",
            );
        }
        else{
            //récupération des donnees du GET
            $acronyme = $_GET["acronyme"];
            $nom = $_GET["nom"];
            $canton = $_GET["canton"];
            $informations = $_GET["informations"];
            $badge = $_GET["badge"];
            $images = $_GET["images"];

            $sql = MonPdo::getInstance()->prepare("INSERT INTO groupes(acronyme, nom, canton, informations, badge, images) VALUES ('" . $acronyme . "', '" . $nom . "', '" . $canton . "', '" . $informations . "', '" . $badge . "' , '" . $images ."')");
            $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'groupe');
            $erreur = $sql->execute();
            //vérification de l'état du serveur
            if(!$erreur){
                http_response_code(500);
                $response = array("500" => "Il y a eu une erreur lors de l'envoi des données vers le serveur");
            }
            else{
                http_response_code(200);
                $response = array("200" => "Les donneés ont été rajouté dans la base");
            }
            
        }
        echo json_encode($response);
    }
    else if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
        $idGroupe = $_GET["idGroupe"];

        $sql = MonPdo::getInstance()->prepare("DELETE FROM `groupes` WHERE idGroupe='" . $idGroupe . "'");
        $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'groupe');
        $erreur = $sql->execute();
        
        if(!$erreur){
            http_response_code(500);
            $response = array("500" => "Il y a eu une erreur lors de l'envoi des données vers le serveur");
        }
        else{
            http_response_code(200);
            $response = array("200" => "La donnée a été supprimée");
        }
        echo json_encode($response);

    }
    else if($_SERVER['REQUEST_METHOD'] == 'PUT'){
        $idGroupe = $_GET["idGroupe"];
        $acronyme = $_GET["acronyme"];
        $nom = $_GET["nom"];
        $canton = $_GET["canton"];
        $informations = $_GET["informations"];
        $badge = $_GET["badge"];
        $images = $_GET["images"];  

        $sql = MonPdo::getInstance()->prepare("UPDATE `groupes` SET acronyme='" . $acronyme . "', nom='" . $nom . "', canton='" . $canton . "', informations='" . $informations . "', badge='" . $badge . "', images='" . $images . "' WHERE idGroupe='" . $idGroupe . "'");
        $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'groupe');
        $erreur = $sql->execute();
        if(!$erreur){
            http_response_code(500);
            $response = array("500" => "Il y a eu une erreur lors de l'envoi des données vers le serveur");
        }
        else{
            http_response_code(200);
            $response = array("200" => "La donnée a été modifiée");
            
        }
        echo json_encode($response);
    }
} 

?>