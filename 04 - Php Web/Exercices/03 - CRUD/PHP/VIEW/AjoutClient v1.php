<?php
include 'Head.php';
var_dump($_POST);
$cl=new Clients(["nomClient"=>$_POST["nom"],"prenomClient"=>$_POST["prenom"],"adresse"=>$_POST["adresse"],"ville"=>$_POST["ville"]]);
var_dump($cl);
ClientsManager::add($cl);