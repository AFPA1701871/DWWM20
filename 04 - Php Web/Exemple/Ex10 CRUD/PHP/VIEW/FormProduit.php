<?php
$mode = $_GET['mode'];

echo '<div id="DivSousTitre">';

//en fonction du mode, on modifie l'entet du form
switch ($mode) {
    case "ajout":
        {
            echo '<h5>Ajouter un nouveau produit</h5></div>
	<form id="formulaire" method="post" action="index.php?codePage=actionProduit&mode=ajoutProduit">';
            // Quand le formulaire sera soumit par clic sur le bouton, les informations qu il contient seront stockées dans la variable $_POST, parce que la methode post a été sélectionnée
            break;
        }
    case "edit":
        {
            echo '<h5>Editer un produit</h5></div>
	<form id="formulaire" method="post" >';
            // Quand le formulaire sera soumit par clic sur le bouton, les informations qu il contient seront stockées dans la variable $_POST, parce que la methode post a été sélectionnée
            break;
        }
    case "modif":
        {
            echo '<h5>Modifier un  produit</h5></div>
	<form id="formulaire" method="post" action="index.php?codePage=actionProduit&mode=modifProduit">';
            // Quand le formulaire sera soumit par clic sur le bouton, les informations qu il contient seront stockées dans la variable $_POST, parce que la methode post a été sélectionnée
            break;
        }
    case "delete":
        {
            echo '<h5>Supprimer un  produit</h5></div>
	<form id="formulaire" method="post" action="index.php?codePage=actionProduit&mode=delProduit">';
            // Quand le formulaire sera soumit par clic sur le bouton, les informations qu il contient seront stockées dans la variable $_POST, parce que la methode post a été sélectionnée
            break;
        }
}
if (isset($_GET['id'])) {
    $prod = ProduitsManager::findById($_GET['id']);
}


// on crée les inputs du formulaire
// il faut que les name des input correspondent aux attributs de la class
// si on a les informations (cas edit, modif, supp) on les mets à jour
?>
<input type="hidden" name="idProduit" value="<?php if (isset($prod)) echo $prod->getIdProduit(); ?>">
<div class="ligneDetail">
    <div class="libelleInput"> Libelle :</div>
    <div class="input"> <input type="text" name="libelleProduit"
            value="<?php if (isset($prod)) echo $prod->getLibelleProduit(); ?>"></div>
</div>
<div class="ligneDetail">
    <div class="libelleInput">
        Prix :</div>
    <div class="input"> <input type="text" name="prix" value="<?php if (isset($prod)) echo $prod->getPrix(); ?>">
    </div>
</div>
<div class="ligneDetail">
    <div class="libelleInput">
        Date de peremption :</div>
    <div class="input">
        <input type="text" name="dateDePeremption"
            value="<?php if (isset($prod)) echo $prod->getDateDePeremption(); ?>">
    </div>
</div>

<?php 
// en fonction du mode, on affiche les boutons utils
	switch ($mode) {
		case "ajout":
			{
				echo '<div class="ligneDetail"><input type="submit" value="Ajouter" class=" crudBtn crudBtnEdit"/>'; break;
			}
		case "modif":
			{
				echo '<div class="ligneDetail"><input type="submit" value="Modifier" class=" crudBtn crudBtnModif"/>'; break;
			}
		case "delete":
			{
				echo '<div class="ligneDetail"><input type="submit" value="Supprimer" class=" crudBtn crudBtnSuppr" />'; break;
			}
        
        default:
        {
            echo '<div class="ligneDetail">';
        }
    }
// dans tous les cas, on met le bouton annuler
    ?>
    <a href="index.php" class=" crudBtn crudBtnRetour">Annuler</a>
</div>

</form>