<?php
$listeClients = ClientsManager::getList();
echo '<div class="btn"><a href="PHP/VIEW/FormAjout.php"><button>Ajout</button></a></div>';
echo '<div class="liste colonne">';
foreach($listeClients as $unClient)
{
   echo '<div> <div class = "client">'.$unClient->getNomClient().' '. $unClient->getPrenomClient() .'</div>';
   echo '<div class="btn">
   <a href="PHP/VIEW/Detail.php?id='.$unClient->getIdClient().'"> <button>Détail</button></a>
   <a href="PHP/VIEW/FormModif.php?id='.$unClient->getIdClient().'"> <button>Modifier</button></a>
   <a href="PHP/VIEW/FormSuppression.php?id='.$unClient->getIdClient().'"> <button>Supprimer</button></a>
   </div></div>';
}

echo '</div>';