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
        </div>
    </article>
    
   <article id="contact">
    <div class="formulaireContact">

        <div class="colonne">
            <div>Message au vendeur pour l\'annonce n°'.$annonce->getIdAnnonce().'</div>
            <form action="index.php?page=traitementmessage" method="POST">
               <div><input name="idAnnonce" value="'.$annonce->getIdAnnonce().'" hidden /></div>
               <div><input name="idDestinataire" value="'.$vendeur->getIdUtilisateur().'" hidden /></div> 

               <div>
                    <input name="libelleMessage" class="titreMessage" placeholder="Titre du message" required/>
                </div>
               <div><textarea name="contenueMessage" required id="contenueMessage" cols="100" rows="10"></textarea></div>

                <div> 
                    <input type="submit" class="buttonMessage">
                </div>

            </form>
            <button class="buttonMessage"><a href="index.php?page=viewannonce&id='.$annonce->getIdAnnonce().'">Retour</a></button>
    </article>
        </div>
    </div>';
