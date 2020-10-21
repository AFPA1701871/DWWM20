<?php
//Introduction
echo "\n  ****    Table de multiplication ****\n\n";
do
{   //boucle principale pour faire une table de multiplication
    /* Saisie par l'utilisateur du nombre*/
    do
    {   //boucle pour vérifier la saisie
        do
        {
            $nombre = readline("Entrer le nombre pour lequel vous voulez la table de multiplication : ");
        } while (!is_numeric($nombre));
    } while (!is_int($nombre * 1));

    /* Afficher la table de multiplication */
    for ($i = 1; $i <= 10; $i++)
    {
        echo $nombre . "\t x " . $i . "\t = " . ($nombre * $i) . "\n";
    }
} while (strtoupper(readline("Voulez vous continuer ? ")) == "O"); //on boucle
