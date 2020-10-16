<?php

/*
Description : Affiche les éléments du tableau séparés par une tabulation // Utilisation du foreach
$tab : tableau à afficher
*/
function afficheTableau($tab)
{
    echo "\n";
    foreach ( $tab as $elt)  // le tableau est parcouru de la 1ere à la dernière case, les cases sont mises tour à tous dans $elt
    {
        echo $elt."\t";
    }
    echo "\n";
}


$score=[7,19,7,18,12,16,19,2,13,8,13,5,3,14,11,15,19,20,4,15];
$somme=0;
$sup10=0;
$maxscore=$score[0];
$posMax=0;
for($i=0;$i<count($score);$i++)
{
    $somme += $score[$i];
    if ($score[$i]>10) 
    {
        $sup10++;
    }
    if ($score[$i]>$maxscore)
    {
        $maxscore=$score[$i];
        $posMax=$i;
    }
}

afficheTableau($score);
echo "\n\nLa somme des scores est de ".$somme.". La moyenne est de ".$somme/count($score)."\n";
echo "Il y a $sup10 scores au dessus de 10.\n";
echo "Le plus haut score est de ".$maxscore. ", il a été réalisé par la personne n°".($posMax+1)."\n";
