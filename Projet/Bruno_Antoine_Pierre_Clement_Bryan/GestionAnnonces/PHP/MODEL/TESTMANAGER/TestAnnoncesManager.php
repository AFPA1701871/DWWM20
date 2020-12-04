<?php

//Test AnnoncesManager

echo "recherche id = 1" . "<br>";
$obj =AnnoncesManager::findById(1);
var_dump($obj);
echo $obj->toString();

echo "ajout de l'objet". "<br>";
$newObj = new Annonces(["titreAnnonce" => "([value 1])", "lienImg" => "([value 2])", "libelleAnnonce" => "([value 3])", "prixAnnonce" => "([value 4])", "datePublication" => "([value 5])", "statutAnnonce" => "([value 6])", "idUtilisateur" => "([value 7])", "idCategorie" => "([value 8])"]);
var_dump(AnnoncesManager::add($newObj));

echo "Liste des objets" . "<br>";
$array = AnnoncesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on met à jour l'id 1" . "<br>";
$obj->settitreAnnonce("[(Value)]");
AnnoncesManager::update($obj);
$objUpdated = AnnoncesManager::findById(1);
echo "Liste des objets" . "<br>";
$array = AnnoncesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on supprime un objet". "<br>";
$obj = AnnoncesManager::findById(1);
AnnoncesManager::delete($obj);
echo "Liste des objets" . "<br>";
$array = AnnoncesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

?>