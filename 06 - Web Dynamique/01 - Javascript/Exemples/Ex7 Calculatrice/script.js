//on recupere tous les boutons, on ecoute les click sur ces boutons
var lesBoutons = document.getElementsByClassName("bouton");
for (let index = 0; index < lesBoutons.length; index++) {
    lesBoutons[index].addEventListener("click",clickBouton);
}
//on recupere l'afficheur
var afficheur = document.getElementById("result");
// on gere le bouton reset
var reset = document.getElementById("clear");
reset.addEventListener("click",function(){
    //on vide l'afficheur 
        afficheur.textContent="";
    // on autorise ne nouveau à cliquer sur les boutons
    for (let index = 0; index < lesBoutons.length; index++) {
        lesBoutons[index].addEventListener("click",clickBouton);
    }
});


function clickBouton(event) {
    // lorsqu'un bouton est cliqué, cette fonction est déclenchée
    //on recupere les informations du bouton
    var boutonClique = event.target;
    var valeurBouton = boutonClique.textContent;
    
    if (valeurBouton=="=")
    {   //on evalue le calcul de l'afficheur
        afficheur.textContent += "=" + eval(afficheur.textContent);
        //on empeche le click sur les boutons autres que reset
        for (let index = 0; index < lesBoutons.length; index++) {
            lesBoutons[index].removeEventListener("click",clickBouton);
        }
    }
    else{
        //on ajoute la valeur du bouton à l'afficheur
        afficheur.textContent += valeurBouton;
    }
}

// appel des attributs

// pour les attributs natifs, appel direct
var b = document.getElementsByTagName("button")[0];
var bValue = b.value;

// pour les attributs personnels, getAttribute
var valeurValue = reset.getAttribute("value");