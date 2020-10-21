<?php

function demandeEntier($invite) // Demande un entier à l'utilisateur
{
    do
    {
        do
        {
            $nombre = readline($invite);
        } while (!is_numeric($nombre)); // on verifie que la chaine de caracterer ne contient que des chiffres
    } while (!is_int($nombre * 1)); // on vérifie que le nombre est entier (pas réel)
    return $nombre; //renvoi le nombre saisi
}
//on demande la température
$nb = demandeEntier("Entrer la température de l'eau");
if ($nb < 0)
{
    echo "l'eau est à l'état de glace";
}
else if ($nb > 100)
{
    echo "l'eau est à l'état de vapeur";
}
else
{
    echo "l'eau est à l'état liquide";
}
