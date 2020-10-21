<?php
echo " **** Les nombres premiers ****\n\n";
$bMin=readline("Entrer la borne inférieure : ");
$bMax=readline("Entrer la borne supérieure : ");
echo "\n";
for ($i=$bMin;$i<$bMax;$i++)
{
    $div=2; //le 1er diviseur à tester est 2
    while (($i % $div)!=0 && $div<$i)   //on s'arrete si on trouve un diviseur ou si on est au max
    {
        $div++; //on passe au diviseur suivant
    }
    if ($div==$i)   //si on est sorti de la boucle sans trouver de diviseur
    {
        echo "$i est premier\n";
    }
}