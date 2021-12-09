<?php

require "./lib/pdo_pkm.inc.php";

$newType = filter_input(INPUT_POST, 'typePkm', FILTER_SANITIZE_STRING);

if($newType != null){
    insertType($newType);
}

if(isset($_GET["action"])){
    switch($_GET["action"]){
        case "delete";
        deleteType($_GET["index"]);
        break;
        case "update";
        break;
    }
}

echo "<table><tr>";
foreach(getAllType() as $element){
    echo "<tr>";
    echo "<td>". $element["idType"] ."</td>";
    echo "<td>". $element["nomType"] ."</td>";
    echo "<td><a href='./?action=update&index=".$element["idType"]."'>modifier</a></td>";
    echo "<td><a href='./?action=delete&index=".$element["idType"]."'>supprimer</a></td>";
    echo "</tr>";
}
echo "</tr></table>";
?>

<form method='POST'>
    <label for='typePkm'>Nouveau type pokemon</label>
    <input type='text' name='typePkm'/>   
    <input type="submit">  
</form>
