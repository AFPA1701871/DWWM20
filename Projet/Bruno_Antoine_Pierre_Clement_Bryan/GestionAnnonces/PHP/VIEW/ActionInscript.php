<?php

if ($_POST['mdpUtilisateur'] == $_POST['confirmation']) {
    // recherche si le pseudo existe
    $uti = UtilisateursManager::findByEmail($_POST['emailUtilisateur']);
    if ($uti == false) {
        $u = new Utilisateurs ($_POST);
        //encodage du mot de passe
        $u->setMdpUtilisateur($u->getMdpUtilisateur());
        UtilisateursManager::add($u);
        header("location:Index.php?page=Accueil");
    } else {
        echo "l'e-mail existe deja";
        header("refresh:3;url=Index.php?page=formInscript");
    }
} else {
    echo "la confirmation ne correspond pas au mot de passe";
    header("refresh:3;url=Index.php?page=formInscript");
}