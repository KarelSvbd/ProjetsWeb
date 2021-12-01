<?php
/*  Projet      : Pokemon
    Desc.       : Programme qui permet de gérer des pokemons dans une bd
    Auteur      : Karel Vilém Svoboda

    Date        : 23.11.2021
    Version     : 1.0
*/

//Affiche toutes les erreurs
error_reporting(E_ALL);
require './boitaoutils.php';
$pdo = pkmDB();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./lib/pokemon.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenue sur le pokedex</h1>
    <p>Ad <i>eiusmod veniam voluptate aute mollit </i> ex enim dolor aute consectetur enim fugiat. <b>Proident ad qui nisi ea. Nulla Lorem nostrud excepteur </b> voluptate nisi minim. <i><b>Sunt irure enim voluptate proident dolore </i></b>incididunt ut non deserunt ea. Mollit est sunt nisi commodo elit sunt. Ad labore tempor deserunt enim cillum fugiat excepteur anim excepteur nulla nostrud. In consequat quis ullamco minim laborum consectetur aliquip sunt.</p>
</body>
</html>