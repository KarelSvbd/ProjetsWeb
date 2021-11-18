<?php 
/*  Auteur  : Karel Vilem Svoboda
    Projet  : API_GroupesInterventions
    Date    : 14.05.2021 - 11.06.2021
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
        $sql = MonPdo::getInstance()->prepare('SELECT * FROM users');
        $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'user');
        $sql->execute();
        $listeUsers = $sql->fetchAll();
        return $listeUsers;
    }
    $listeUsers = findAll();

    //Si l'utlisateur demande un GET
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        //réponse par défault
        http_response_code(500);
        $response = array(
            "500" => "Erreur lors de l'execution du code",
        );
        
        //si les deux parametres ont une valeur dans le get
        if(isset($_GET["email"]) && isset($_GET["password"])){
                $email = $_GET["email"];
                $password = $_GET["password"];
                $i = 0;
                foreach($listeUsers as $user){
                    //si l'email se trouve dans la base
                    if($listeUsers[$i]["email"] == $email)
                    {
                        //si le mot de passe correspond à l'email
                        if($listeUsers[$i]["password"] == $password){
                            http_response_code(200);
                            $donneeTrouvee = true;
                            $response = $user;
                        }
                    }
                    $i++;
                }
                //si il n'y a pas de réponse, ça signifie que les aucune donnée ne correpond avec la liste des lieux
                if(!isset($donneeTrouvee))
                {
                    http_response_code(400);
                    $response = array(
                        "400" => "Parametre invalide, les donnes de connexion sont incorrects",
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
        //si l'utlisateur ne transmet ni l'email o
        if(!isset($_GET["email"]) || !isset($_GET["password"])){
            http_response_code(400);
            $response = array(
                "400" => "Veuillez saisir les donnees dans le GET afin de pouvoir les transmettre à la base (email + password).",
            );
        }
        else{
            //récupération des donnees du GET
            $email = $_GET["email"];
            $password = $_GET["password"];

            $sql = MonPdo::getInstance()->prepare("INSERT INTO users(email, password) VALUES ('" . $email . "', '" . $password . "')");
            $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'user');
            $erreur = $sql->execute();
            //vérification de l'état du serveur
            if(!$erreur){
                http_response_code(500);
                $response = array("500" => "Il y a eu une erreur lors de l'envoi des données vers le serveur");
            }
            else{
                http_response_code(200);
                $response = array("200" => "Les donneés ont été rajoutés dans la base");
            }
            
        }
        echo json_encode($response);
    }
    
} 

?>