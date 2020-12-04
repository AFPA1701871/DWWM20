<?php
   $annonce=AnnoncesManager::findById($_GET['id']);
   $vendeur=UtilisateursManager::findById($annonce->getIdUtilisateur());

   echo' <div class="elmNav">
        Annonce n°'.$annonce->getIdAnnonce().' | '.$annonce->getTitreAnnonce().'
    </div>

    <article>
        <div>
        <div class="titre">'.$annonce->getTitreAnnonce().'</div>
        <div class="imgView">
            <img src="IMG/imgAnnonce/'.$annonce->getLienImg().'" alt="Immage Annonce">
        </div>
        <div class="contenueAnnonce">'.$annonce->getLibelleAnnonce().'</div>
        <div class="infoAnnnonce">
            <div>Prix :'.' '.$annonce->getPrixAnnonce().' €</div>
            <div>Mis en ligne le :'.' '.$annonce->getDatePublication().'</div>
            <div>Par :'.' '.$vendeur->getNomUtilisateur().'</div>
            <div>Statut :'.' '.($annonce->getStatutAnnonce()==1?"disponible":"vendu").'</div>
        </div>
        <button><a href="index.php?page=contactvendeur&id='.$annonce->getIdAnnonce().'&#contact">Contacter le vendeur</a></button>
        <button><a href="index.php?page=accueil">Retour</a></button>

    </div>
    </article>';
?>