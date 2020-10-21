<?php

//déclaration de variables pour éviter de resaisir

$phrase = "Ma mere dit : la paix niche dans ce mari niais.";
//$phrase = "Ce soir au bar de la gare, Igor Hagard est noir, il n'arrete guere de boire car sa Katia l'a quitte!, sa tactique etait toque, ta Katie t'a quitte, qu'attends-tu, cuittes-toi, t'es cocu.";
//$phrase = "Voici mes coordonnees : martine.poix@afpa.fr  06 81 30 69 04";
// presentation
echo "\n **** Analyse des chaines de caractères ****\n\n";
echo " Taper une chaine de caractères : (inférieure à 255, terminée par un point) : ";
echo $phrase;

//declaration des constantes
$voyelle=['a','e','i','o','u','y','A','E','I','O','U','Y'];
$chiffre=['0','1','2','3','4','5','6','7','8','9'];
$consonne = ['b','c','d','f','g','h','j','k','l','m','n','p','q','r','s','t','v','w','x','y','z','B','C','D','F','G','H','J','K','L','M','N','P','Q','R','S','T','V','W','X','Y','Z'];

$nbVoyelle=0;
$nbConsonne =0;
$nbChiffre=0;

//calcul
for ($i=0;$i<strlen($phrase);$i++)
{
    if (in_array($phrase[$i],$voyelle))
    {
        $nbVoyelle++;
    }
    else if (in_array($phrase[$i],$consonne))
    {
        $nbConsonne++;
    }
    else if (in_array($phrase[$i],$chiffre))
    {
        $nbChiffre++;
    }
}

//affichage

echo "\n La chaine comprend : \n";
echo "\t ". strlen($phrase). " caractères\n";
echo "\t\t ". $nbChiffre. " chiffres\n";
echo "\t\t ". ($nbVoyelle + $nbConsonne). " caractères alphanumérique\n";
echo "\t\t\t ". $nbVoyelle. " voyelles\n";
echo "\t\t\t ". $nbConsonne. " consonnes\n";
echo "\t\t ".(strlen($phrase)-$nbChiffre-$nbVoyelle- $nbConsonne). " caractères spéciaux\n";