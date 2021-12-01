<?php
/**
*	Classe d'acces aux donnees Utilise les services de la classe PDO
*	Les attributs sont tous statiques, les 4 premiers pour la connexion
*	$monPdo qui contiendra l'unique instance de la classe
*/
class MonPdo
{
//private static $serveur = 'mysql:host=x22f6.ftp.infomaniak.com';
//private static $bdd = 'dbname=x22f6_gestionpre';
//private static $user = 'x22f6_gestionpre';
//private static $mdp = 'gestion-pret1234';

private static $serveur = 'mysql:host=localhost';
private static $bdd = 'dbname=pkm';
private static $user = 'root';
private static $mdp = '0aui-cigk';

private static $monPdo;
private static $unPdo = null;

//	Constructeur privé, crée l'instance de PDO qui sera sollicitée
//	pour toutes les méthodes de la classe
private function __construct()
{
    MonPdo::$unPdo = new PDO(MonPdo::$serveur.';'.MonPdo::$bdd, MonPdo::$user, MonPdo::$mdp);
    MonPdo::$unPdo->query("SET CHARACTER SET utf8");
    MonPdo::$unPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
public function __destruct()
{ 
    MonPdo::$unPdo = null;
}
/**
*	Fonction statique qui cree l'unique instance de la classe
*   Appel : $instanceMonPdo = MonPdo::getMonPdo();
*	@return l'unique objet de la classe MonPdo
*/
    public static function getInstance()
    {
        if(self::$unPdo == null)
    {
        self::$monPdo= new MonPdo();
    }
        return self::$unPdo;
    }

}
