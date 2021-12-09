<?php

require "./lib/constantesdb.inc.php";



function pkmDB(){
    static $pkmConnector = null;

    if($pkmConnector == null){
        try{
            $pkmConnector = new PDO('mysql:' . DBNAME .';hostname=' .HOSTNAME, USER, PASSWORD, 
            array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::ATTR_PERSISTENT => true
            ));
        }
        catch(PDOException $Exception){
            error_log($Exception->getMessage());
            error_log($Exception->getCode());
        }
    }
    return $pkmConnector;
}


function getAllType()
{
  static $ps = null;
  $sql = 'SELECT idType, nomType FROM pkm.PokemonType;';

  $answer = false;
  try {
    if ($ps == null) {
      $ps = pkmDB()->prepare($sql);
    }
      if ($ps->execute())
      $answer = $ps->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    echo $e->getMessage();
  }

  return $answer;
}

function insertType($newType)
{
  static $ps = null;
  $sql = "INSERT INTO pkm.PokemonType (nomType) VALUES(:newType);";
  
  $answer = false;
  try {
    if ($ps == null) {
      $ps = pkmDB()->prepare($sql);
      $ps->bindParam(":newType", $newType, PDO::PARAM_STR);
    }
    if ($ps->execute())
    {
      $answer = $ps->fetchAll(PDO::FETCH_ASSOC);
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
  }

  return $answer;
}

function deleteType($index)
{
  static $ps = null;
  $sql = "DELETE FROM pkm.PokemonType WHERE idType=:idType;";
  
  $answer = false;
  try {
    if ($ps == null) {
      $ps = pkmDB()->prepare($sql);
      $ps->bindParam(":idType", $index, PDO::PARAM_INT);
    }
    if ($ps->execute())
    {
      $answer = $ps->fetchAll(PDO::FETCH_ASSOC);
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
  }

  return $answer;
}
