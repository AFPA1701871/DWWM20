<nav>
    <div class="elmNav">
        <select name="categorie" id="categorie-select">
            <option value="voiture">Voiture</option>
            <option value="vetement">Vetement</option>
        </select>
    </div>
    <div class="elmNav">
        <button>Rechercher</button>
    </div>
    <?php
    if (isset($_SESSION['utilisateur']))
    {
       echo' <div class="elmNav"><button><a href="index.php?page=accueil&view=user">Mes Annonces</a></button></div>
        <div class="elmNav"><button><a href="index.php?page=ListeMessage">Mes Messages</a></button></div>
        <div class="elmNav"><button><a href="index.php?page=FormAnnonces&mode=ajout">Ajouter une Annonce</a></button></div>';
    }
    ?>
</nav>
<body>