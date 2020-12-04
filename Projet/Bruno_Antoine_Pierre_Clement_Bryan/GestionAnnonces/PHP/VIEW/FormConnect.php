<article>
      <form action="Index.php?page=actionConnect&mode=connect" method="POST">
        <div><label for="emailUtilisateur">Adresse E-mail</label></div>
        <div>
          <input
            type="text"
            name="emailUtilisateur"
            placeholder="Adresse E-mail"
            required
          />
        </div>
        <div><label for="mdpUtilisateur">Mot de passe</label></div>
        <div>
          <input
            type="password"
            name="mdpUtilisateur"
            placeholder="Mot de passe"
            required
          />
        </div>

        <div class="buttonForm">
          <div></div>
          <button><a href="index.php?page=accueil">Accueil</a></button>
          <div></div>
          <button type="submit">Connection</button>
          <div></div>
        </div>
        <div >
            Nouvel utilisateur ? <a href="index.php?page=formInscript">crée vous un compte ici</a>
        </div>
      </form>
    </article>