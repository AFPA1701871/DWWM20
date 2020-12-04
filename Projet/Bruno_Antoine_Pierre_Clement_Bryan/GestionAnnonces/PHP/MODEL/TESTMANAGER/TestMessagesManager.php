<?php

//Test MessagesManager

echo "recherche id = 1" . "<br>";
$obj =MessagesManager::findById(1);
var_dump($obj);
echo $obj->toString();

echo "ajout de l'objet". "<br>";
$newObj = new Messages(["libelleMessage" => "([value 1])", "contenueMessage" => "([value 2])", "idDestinataire" => "([value 3])", "idUtilisateur" => "([value 4])"]);
var_dump(MessagesManager::add($newObj));

echo "Liste des objets" . "<br>";
$array = MessagesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on met à jour l'id 1" . "<br>";
$obj->setlibelleMessage("[(Value)]");
MessagesManager::update($obj);
$objUpdated = MessagesManager::findById(1);
echo "Liste des objets" . "<br>";
$array = MessagesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on supprime un objet". "<br>";
$obj = MessagesManager::findById(1);
MessagesManager::delete($obj);
echo "Liste des objets" . "<br>";
$array = MessagesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

?>