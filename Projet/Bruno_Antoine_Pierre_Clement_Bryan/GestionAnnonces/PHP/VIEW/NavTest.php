<nav>

    <div class="elmNav">
    <form action="<?php echo 'Index.php?page=afficheCategorie'; ?>"  method="POST">
        <select name="idCategorie" id="categorie-select">
        <?php $categorie = CategoriesManager::getList();
    foreach ($categorie as $uneCategorie) {
        echo '<option value="'.$uneCategorie->getIdCategorie().'">' . $uneCategorie->getLibelleCategorie() . '</option>';
    }
    ?>
        </select>
        
        </div>
    <div class="elmNav">
       <button>Rechercher</button>
    </div>
</form> 
    </div>
    <?php
    if (isset($_SESSION['utilisateur']))
    {
       echo' <div class="elmNav"><button><a href="index.html?page=listeAnnonce">Mes Annonces</a></button></div>
        <div class="elmNav"><button><a href="index.php?page=FormAnnonces&mode=ajout">Ajouter une Annonce</a></button></div>';
    }
    ?>
</nav>

<body>
