
<article>
<form action="Index.php?page=actionConnect&mode=new" method="POST">
    <div><label for="nomUtilisateur">Nom</label></div>
<div>
    
    <input type="text"  name="nomUtilisateur" required />
</div>
<div>    <label for="prenomUtilisateur">Prénom</label>
</div>
<div>
    <input type="text" name="prenomUtilisateur" required />
</div>
<div>    <label for="pseudoUtilisateur">Pseudo</label>
</div>
<div>
    <input type="text" name="pseudoUtilisateur" required />
</div>
<div>    <label for="mdpUtilisateur">Mot de passe</label>
</div>
<div>
    <input type="password" name="mdpUtilisateur" required />
</div>
<div>    <label for="confirmation">Confirmation du mot de passe</label>
</div>
<div>
    <input type="password" name="confirmation" required />
</div>
<div>    <label for="emailUtilisateur">Adresse e-mail</label>
</div>
<div>
    <input type="text" name="emailUtilisateur" required />
</div>
<div>    <label for="telUtilisateur">telephone</label>
</div>
<div>
    <input type="text" name="telUtilisateur" required />
</div>
<input name="idRole" value="1" type="hidden">

<div class="buttonForm">
    <div></div>
    <button><a href="index.php">Accueil</a></button>
    <div></div>
    <button type="submit">Inscription</button>
    <div></div>
  </div>
  <div >
      Vous avez deja un compte ? <a href="index.php?page=formConnect">Connecter vous ici</a>
  </div>
</form>
</article>


