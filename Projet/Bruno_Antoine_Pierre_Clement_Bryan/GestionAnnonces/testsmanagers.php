<?php
include "PHP/VIEW/Head.php";
include "PHP/VIEW/Header.php";

/* Autoload permet de charger toutes les classes necessaires */
function ChargerClasse($classe)
{
    if (file_exists("PHP/CONTROLLER/" . $classe . ".Class.php")) {
        require "PHP/CONTROLLER/" . $classe . ".Class.php";
    }
    if (file_exists("PHP/MODEL/" . $classe . ".Class.php")) {
        require "PHP/MODEL/" . $classe . ".Class.php";
    }
}
spl_autoload_register("ChargerClasse");

//on recupere les paramètres de l'application
Parametres::init();
//on active la connexion à la base de données
DbConnect::init();
session_start(); // initialise la variable de Session

/**tester manager**/
// on teste la recherche par ID
echo 'recherche id = 1' . '<br>';
$p = RolesManager  ::findById(1);
var_dump($p);

// on teste l'ajout
echo "ajout d'un produit" . '<br>';
$pNew = new Roles (["libelleRole" => "toto","codeRole"=>1]);
RolesManager  ::add($pNew);


//on affiche la liste des produits
echo "Liste des articles" . '<br>';
$tableau = RolesManager  ::getList();
foreach ($tableau as $unProduit)
{
    echo $unProduit->toString() . '<br>';
}


// on teste la mise à jour
echo "on met à jour l'id 1" . '<br>';
$p->setLibelleRole($p->getLibelleRole() . 'sss');
RolesManager ::update($p);
$pRecharge = RolesManager ::findById(1);
var_dump($pRecharge);



// on teste la suppression
// echo "on supprime un article" . '<br>';
$pSuppr = RolesManager ::findById(3);
RolesManager ::delete($pSuppr);



//on affiche la liste des produits
echo "liste des articles" . '<br>';
$tableau = RolesManager ::getList();
foreach ($tableau as $unProduit)
{
    echo $unProduit->toString() . '<br>';
}


include "PHP/VIEW/Footer.php";