<?php
/************************ Ajouter l'id Utilisateur en fonction de la Session de connexion **************/
$message=new Messages ($_POST);
$message->setIdUtilisateur(1);
MessagesManager::add($message);

echo '<h1 style="text-align: center; color: white;">Votre Message à bien été envoyé !</h1>'; 
header("refresh:3;url=index.php?page=viewannonce&id=".$_POST['idAnnonce']."");