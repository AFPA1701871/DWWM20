<section class = "colonne">
<?php

$mode = $_GET['mode'];
$idSession = $_GET['id'];

echo '<div class = "case centre noborder">
<h2>Ajouter une Periode</h2>
    </div>
    <div class="colonne info" >';

echo '<form  action="index.php?page=ActionSession&mode=ajoutPer" method="POST">';
          

echo '            <div>
<input type="hidden" name="idSessionFormation" value="' . $idSession . '"/>
<div class = "relatif colonne">
    <label for="dateDebutPAE">Date de début de stage: </label>
    <input class="dateDebutPAE" type="date" name="dateDebutPAE" />
    <div class="cache erreur"></div>
</div>
    <div class="relatif colonne" >
        <label for="dateFinPAE">Date de fin de stage: </label>
        <input class="dateFinPAE" type="date" name="dateFinPAE" />
        <div class="cache erreur"></div>
    </div>
</div>
<div class="relatif colonne" >
    <label for="dateRapportSuivi">Date Rapport de suivi: </label>
    <input class="dateRapportSuivi" type="date" name="dateRapportSuivi" />
    <div class="cache erreur"></div>
</div>
    <div class="relatif colonne" >
    <label for="objectifPAE">Objectif de stage: </label>
    <input class="objectifPAE" type="textarea" name="objectifPAE" />
    </div>';

    echo '<div>
    <button class="bouton" type="submit">Valider</button>
    </div>

    <button id="ajout1p" class="bouton" type="submit"><i class="fas fa-edit"></i> Ajout Periode</button>
    </form>';
    ?>
</div>
<div class="mini"></div>
<div class="info"><a href="Index.php?page=ListeSessions"><button class="bouton">Retour</button></a></div>
<div class="mini"></div>
</section>


