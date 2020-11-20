<?php
include 'Head.php';
var_dump($_POST);
// $cl=new Clients(["nomClient"=>$_POST["nom"],"prenomClient"=>$_POST["prenom"],"adresse"=>$_POST["adresse"],"ville"=>$_POST["ville"]]);
 $cl = new Clients($_POST);
 var_dump($cl);
 ClientsManager::update($cl);

 header("location: ../../index.php");