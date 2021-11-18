<?php
/*  Auteur  : Karel Vilem Svoboda
    Projet  : CoureursCourses
    Date    : 09.11.2021
*/

require("MonPdo.php");
require("user.php");

findAllUtilisateurs();

foreach(findAllUtilisateurs() as $user){
    echo $user[0];
}

for($i = 0; $i < 100000; $i++){
    $time_start1 = microtime(true);
    //echo $i * 345 * 5 % 6 * $i * 8 . "</br>";
    $time_end1 = microtime(true);
    
    
}



for($i = 0; $i < 100000; $i++){
    $time_start2 = microtime(true);
    foreach(findAllUtilisateurs() as $user){
        //echo $user[0] . $user[1] . $user[2] . $user[3] . $user[4] . "<br>";
    }
    
    $time_end2 = microtime(true);
    
}
$time1 = $time_end1 - $time_start1;

echo $time_end1 . " " . $time_start1;


$time2 = $time_end2 - $time_start2;

//echo $time1 . " <br>" . $time2;

?>