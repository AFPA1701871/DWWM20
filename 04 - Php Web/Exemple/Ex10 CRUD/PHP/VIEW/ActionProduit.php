<?php
switch ($_GET['mode']) {
    case "ajoutProduit":
        {
            $p = new Produits(["libelleProduit" => $_POST["libelleProduit"], "prix" => $_POST["prix"], "dateDePeremption" => $_POST["dateDePeremption"]]);
            /* on peut simplifier l'écriture car $_POST est un tableau associatif. Les clés sont les name du formulaire. */
            // $p = new Produits($_POST);
            ProduitsManager::add($p);
            break;
        }
    case "modifProduit":
        {
            $p = new Produits($_POST);
            ProduitsManager::update($p);
            break;
        }
    case "delProduit":
        {
            $p = new Produits($_POST);
            ProduitsManager::delete($p);
            break;
        }
}

header("location:index.php?action=listeProduit");