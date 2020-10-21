<?php
//Déclaration des tableaux
$avion = ["BOING747", "AIRBUS380", "LEARJET45", "DC10", "CONCORDE", "ANTONOV32"];
$codeAvion = ["BO", "AB", "LJ", "DC", "CO", "AN"];
$vitesse = [800, 950, 700, 900, 1400, 560];
$rayonAction = [10000, 12000, 4500, 8000, 16000, 2500];

//Affichage
echo "\n **** STATISTIQUES AVIONS  ****\n\n";
$testCodeAvion = false;
$recherche = "O";
while ($recherche == "O")
{
    while (!$testCodeAvion) // on boucle tant que le code avion n'existe pas
    {
        echo "\n";
        $code = readline("Entrez le code de l'avion : ");
        //recherche de l'avion sélectionné
        for ($i = 0; $i < count($codeAvion); $i++)  
        {
            if ($code == $codeAvion[$i])
            {
                //affichage de l'avion
                $testCodeAvion = true;
                echo "Avion : " . $avion[$i] . " Vitesse : " . $vitesse[$i] . " Rayon d'action : " . $rayonAction[$i] . "\n";
            }
        }
        // conclusion si l'on 'a pas trouvé l'avion
        if (!$testCodeAvion)
        {
            echo " Cet avion n'existe pas \n";
        }
    }
    echo "\n";
    //Question pour l'affichage des stats
    $stat = strtoupper(readline("Voulez vous éditer les statistiques (O/N) "));
    if ($stat == "O")
    {
        //recherche du plus rapide
        $plusRapide = 0;
        for ($i = 1; $i < count($vitesse); $i++)
        {
            if ($vitesse[$i] > $vitesse[$plusRapide])
            {
                $plusRapide = $i;
            }
        }
        //affichage du plus rapide
        echo " L'avion qui vole le plus vite est le " . $avion[$plusRapide] . " à " . $vitesse[$plusRapide] . " km/h\n";
        //recherche de la moyenne des rayons d'actions
        $moyenne = array_sum($rayonAction)/count($rayonAction);
        //affichage des rayons d'action
        echo " La moyenne des rayons d'action est de : ". $moyenne ." \n";
    }
    echo "\n";
    $recherche = strtoupper(readline("Voulez vous faire une autre recherche (O/N) "));
    $testCodeAvion = false;
}
//On conclu
echo "Au revoir et à bientôt!\n";
