<?php

require "Personne.Class.php";
require "Voiture.Class.php";

$v1 = new Voiture(["marque"=>"Audi","modele"=>"A3","immatriculation"=>"12df12f","couleur"=>"noire","kilometres"=>20000]);
$v2 = new Voiture(["marque"=>"Audi","modele"=>"Q3","truc"=>"test"]);
$p1 = new Personne("Dupond","Toto",$v2);

var_dump($v2);
var_dump($p1);
echo "la marque de la voiture de toto est ". $p1->getVoiture()->getMarque();