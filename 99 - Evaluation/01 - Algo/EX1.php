<?php
echo "\n             CALCUL D'UN CERCLE\n\n";
$reponse = "O";     // on initialise pour entrer dans la boucle
while ( $reponse == "O")
{   
    //Demande d'information
    $rayon = readline("Quel est le rayon du cercle : ");
    //Calcul
    $circonference = 2*pi()*$rayon;
    $surface = pi()*$rayon*$rayon;
    //Affichage
    echo "Sa circonférence est de \t : ".$circonference."\n";
    echo "Sa surface est de \t\t : ".$surface."\n\n";

    //Question pour boucler
    $reponse = readline("Voulez-vous faire un autre calcul (O/N) : ");
    echo "\n";
}
//On conclu
echo "Au revoir et à bientôt!\n";