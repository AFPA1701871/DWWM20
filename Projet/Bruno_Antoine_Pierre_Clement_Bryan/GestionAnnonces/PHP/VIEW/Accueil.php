
<?php
if(isset($_GET['view']))
{
    $view=$_GET['view'];
    if(isset($_SESSION['utilisateur']))
    {
        $annonces=AnnoncesManager::getByUser($_SESSION['utilisateur']);
    }
}
else{
    $annonces=AnnoncesManager::getList();
}
foreach ($annonces as $uneannonce)
{
    $vendeur=UtilisateursManager::findById($uneannonce->getIdUtilisateur());
    echo'<article>
    <div class="imgAnnonce"><img src="IMG/imgAnnonce/'.$uneannonce->getLienImg().'" alt="photo annonce"></div>
    <div class="divXl">
        <div class="infoAnnnonce">
            <div>'.$uneannonce->getTitreAnnonce().'</div>
            <div><a href="index.php?page=viewannonce&id='.$uneannonce->getIdAnnonce().'">Detail</a></div>
        </div>
        <div class=" infoAnnnonce">
            <div>Prix :'.' '.$uneannonce->getPrixAnnonce().' € </div>
            <div>Mis en ligne le :'.$uneannonce->getDatePublication().'</div>
            <div>Par :'.' '.$vendeur->getNomUtilisateur().'</div>
            <div>Statut :'.' '.($uneannonce->getStatutAnnonce()==1?"disponible":"vendu").'</div>
        </div>
    </div>';
    if(isset($_GET['view']))
    {   
         echo'<div class="crud">
          <div><a href="index.php?page=FormAnnonces&mode=update&id='.$uneannonce->getIdAnnonce().'">Modifier</a></div>
          <div>
            <a href="index.php?page=FormAnnonces&mode=delete&id='.$uneannonce->getIdAnnonce().'">Supprimer</a
            >
          </div>
          <div><a href="index.php?page=FormAnnonces&mode=detail&id='.$uneannonce->getIdAnnonce().'">Detail</a></div>
        </div>';
    }
    echo'</article>';
}
if(isset($_GET['view']))
{
    echo'<button><a href="index.php?page=accueil">Retour</a></button>';
}

