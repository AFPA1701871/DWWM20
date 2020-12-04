<?php


$annonce = new Annonces($_POST);

$mode = $_GET['mode'];

switch ($mode)
{
    case "ajout":
    {
            AnnoncesManager::add($annonce);
            break;
        }
    case "modif":
            {
            AnnoncesManager::update($annonce);
            break;
        }
    case "delete":
            {
            AnnoncesManager::delete($annonce);
            break;
        }
}

header("location: index.php?page=accueil");