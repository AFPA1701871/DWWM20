<?php
echo "\n Racine de l'equation du 2nd degré\n";
echo "          Y= aX² + bX +c \n\n";

//on boucle pour plusieurs execution
do
{
//Demande d'information
    $a = readline("Quelle est la valeur de a : "); //variables correspondant au valeur de l'equation
    $b = readline("Quelle est la valeur de b : ");
    $c = readline("Quelle est la valeur de c : ");
    echo "\n";
//Calcul

    if ($a == 0 && $b == 0) //pas une equation
    {
        echo " L'équation n'en est plus une !!!\n";
    }
    else if ($a == 0) //equation du 1er degré
    {
        $x = -$c / $b;
        echo " L'équation est du 1er degré !\n\n L'équation s'annule pour x=-(c/b) : " . $x . "\n";
    }
    else
    {
        $delta = $b * $b - (4 * $a * $c); //on calcule delta
        if ($delta < 0)
        {
            echo " L'équation ne possède pas de racine réelle : \n d = " . $delta . "\n";
        }
        else if ($delta == 0)
        {
            $x1 = -($b / (2 * $a));
            echo " L'équation possède une racine double : \n d= " . $delta . "\n x1=x2= " . $x1 . "\n";
        }
        else if ($delta > 0)
        {
            $x1 = ((-$b + sqrt($delta)) / (2 * $a));
            $x2 = ((-$b - sqrt($delta)) / (2 * $a));
            echo " L'équation possède 2 racines distinctes : \n d= " . $delta . "\n L'équation s'annule pour :\n x1= " . $x1 . "\n x2= " . $x2 . "\n";
        }
    }
    echo "\n";
} while (strtoupper(readline("Voulez vous continuer ? ")) == "O"); //on boucle
//On conclu
echo "Au revoir et à bientôt!\n";
