<header>

    <div>
        <a href="index.php"><img src="./IMG/logo.png" alt=""></a>
    </div>
    <div class="elmHeader divXl titre">La Bonne Annonce<span> .fr</span></div>

    <!-- Si pas connecter -->
    <!-- <div class="elmHeader">
        <a href="index.php?codePage=login">Connection</a>
    </div> -->
    <div class="elmHeader colonne ">
    <?php
    if(isset($_SESSION['utilisateur']))
    { 
        echo'<div>'.$_SESSION['utilisateur']->getNomUtilisateur().' '.$_SESSION['utilisateur']->getPrenomUtilisateur().'</div>
        <div>
            <button><a href="index.php?page=actionConnect&mode=disconnect">deconnexion</a></button>
        </div>';
    }
    else{
        echo'<div class="elmHeader">
        <button><a href="index.php?page=formConnect">Connection</a></button>
        </div>';
    }
    ?>
    </div>

</header>