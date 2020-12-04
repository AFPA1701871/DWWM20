<?php

$mode = $_GET['mode'];
if (isset($_GET['id'])) // si l'id est renseigné
{
    $idRecu = $_GET['id'];
    if ($idRecu != false) {
        $annonceChoisi = AnnoncesManager::findById($idRecu);
    }
    $categorie = CategoriesManager::findById($annonceChoisi->getIdCategorie());
    $affCategorie = '<option value="' . $categorie->getIdCategorie() . '">' . $categorie->getLibelleCategorie() . '</option>';

    $statutAnnonce = AnnoncesManager::findById($annonceChoisi->getIdAnnonce());
    $affAnnonce = '<option value="' . $statutAnnonce->getIdAnnonce() . '">' . $annonceChoisi->getStatutAnnonce() . '</option>';
}
switch ($mode) {
    case "ajout":{
            echo '
            <form action="index.php?page=actionAnnonces&mode=ajout" method="POST">';
            break;
        }
    case "update":{
            echo '
            <form action="index.php?page=actionAnnonces&mode=modif" method="POST">
        <input name="idAnnonce"  value="' . $annonceChoisi->getIdAnnonce() . '" type="hidden" />';
            break;
        }
    case "delete":{
            echo '
            <form action="index.php?page=actionAnnonces&mode=delete" method="POST">
        <input name="idAnnonce"  value="' . $annonceChoisi->getIdAnnonce() . '" type="hidden" />';
            break;
        }
    case "detail":{ //il n'y a pas d'action sur le formulaire, juste le bouton retour
            echo ' <form >
    <input name="idAnnonce"  value="' . $annonceChoisi->getIdAnnonce() . '" type="hidden" />';
            break;
        }
}

?>
<article class="formAnnonce">
<div>
        <label for="titreAnnonce">titre</label>
    </div>
    <div>
        <input name="titreAnnonce" <?php if ($mode != "ajout") {echo 'value="' . $annonceChoisi->getTitreAnnonce() . '"';}if ($mode == "delete" || $mode == "edit") {
    echo 'disabled';
}
?>/>
    </div>
    <div class="espace"></div>
    <div>
        <label for="lienImg">Image</label>
    </div>
     <div>
     <input name="lienImg"  <?php if ($mode != "ajout") {echo 'value="' . $annonceChoisi->getLienImg() . '"';}if ($mode == "delete" || $mode == "edit") {
    echo 'disabled';
}
?> />
     </div>
     <div class="espace"></div>
     <div>
         <label for="libelleAnnonce">libelle</label>
    </div>
     <div>
         <input name="libelleAnnonce" <?php if ($mode != "ajout") {echo 'value="' . $annonceChoisi->getLibelleAnnonce() . '"';}if ($mode == "delete" || $mode == "edit") {
    echo 'disabled';
}
?> />
     </div>
     <div class="espace"></div>
     <div>
         <label for="prixAnnonce">Prix</label>
    </div>
     <div>
         <input name="prixAnnonce" <?php if ($mode != "ajout") {echo 'value="' . $annonceChoisi->getPrixAnnonce() . '"';}if ($mode == "delete" || $mode == "edit") {
    echo 'disabled';
}
?>  />
     </div>
     <div class="espace"></div>
     <div>
         <label for="datePublication">date de publication</label>
    </div>
     <div>
         <input name="datePublication" <?php if ($mode != "ajout") {echo 'value="' . $annonceChoisi->getDatePublication() . '"';}if ($mode == "delete" || $mode == "edit") {
    echo 'disabled';
}
?>  />
     </div>
     <div class="espace"></div>
     <div>
         <label for="statutAnnonce">Statut de l'annonce : </label>
    </div>
    <div>
        <select name="statutAnnonce" <?php if ($mode == "edit" || $mode == "delete") {
    echo 'disabled';
}
?>>


<option value="1">Disponible</option>
<option value="2">Vendu</option>
        </select>

        
        <?php echo' <input type="hidden" name="idUtilisateur" value="'. $_SESSION['utilisateur']->getIdUtilisateur().'">'; ?>

    </div>

     </div>

     <div>
         <label for="idCategorie">Categorie : </label>
    </div>

    <div>
        <select name="idCategorie" <?php if ($mode == "edit" || $mode == "delete") {
    echo 'disabled';
}
?> >
<?php
if ($mode == "ajout" || $mode == "modif") {

    $categorie = CategoriesManager::getList();
    foreach ($categorie as $uneCategorie) {
        echo '<option value="'.$uneCategorie->getIdCategorie().'"'.if ($uneCategorie->getIdCategorie()==$annonceChoisi->getIdAnnonce())? echo "selected";'>' . $uneCategorie->getLibelleCategorie() . '</option>';
    }
} else {
    echo $affCategorie;
}?>
        </select>
    </div>



<?php
switch ($mode) {
    case "ajout":
        {
            echo '    <button type="submit">Ajouter une annonce </button>';
            break;
        }
    case "update":
        {
            echo '    <button type="submit">Modifier une annonce </button>';
            break;
        }
    case "delete":
        {
            echo '    <button type="submit">Supprimer une annonce </button>';
            break;
        }
}
echo '<button><a href="index.php?codePage=listeHotel">Retour</a></button>
</form>
</article>';
