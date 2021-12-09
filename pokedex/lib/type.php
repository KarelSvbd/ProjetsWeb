<?php

function GetAllType(){
    pkmDB()->prepare('SELECT * FROM Type');
    
    pkmDB()->execute();
    return $sql->fetchAll();
}
?>