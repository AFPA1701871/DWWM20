<?php
include "personne.Class.php";
try {   // execute les instructions et rpère les erreurs
    $db = new PDO('mysql:host=localhost;dbname=testConnect;charset=utf8', 'root', '');
}
catch (Exception $e) // si une erreur est levée, on agit en conséquence
{
    if ($e->getCode()==1049)
    {
        echo "Base de données indisponible";
        die();  // permet d'arrêter l'execution
    }
    else if ($e->getCode()==1045)   // erreur identification
    {
        echo "La connexion a échouée";
        die();
    }
    else{
        die('Erreur : ' . $e->getMessage());
    }
}

echo "on est connecté à la base de données";

$requete=$db->query("SELECT idPersonne, nom, prenom, age FROM personnes where idPersonne=1");  // $requete est un objet de type PDO_Statement
$reponse = $requete->fetch(PDO::FETCH_ASSOC);
var_dump($reponse);
$pers = new Personne($reponse);
var_dump($pers);
$pers->affichage();