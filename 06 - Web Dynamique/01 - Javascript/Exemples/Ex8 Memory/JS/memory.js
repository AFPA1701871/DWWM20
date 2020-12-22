var nbImageSelectionne = 0; //contient 0 si aucune image selectionnée, 1 sinon
var img; //image en cours
var imgp; //image precedente
var nbPairTrouvee = 0; //nombre de pair trouvée
var nbClick = 0; //nombre de clic
var zoneMessage = document.getElementById("message");
var zoneNbClick = document.getElementById("nbClick");
var zoneNbPairTrouvee = document.getElementById("nbPair");

function affiche(image, vrai) {
    if (vrai) {
        image.style.visibility = 'visible';
        image.style.width = '100%';
    } else {
        image.style.visibility = 'hidden';
        image.style.width = '0%';
    }
}

function verifPair(img, imgp) {
    if (imgp.src == img.src) {
        //gagné
        nbPairTrouvee++;
        //on ne les affiche pas
    } else {
        //on cahce les images cliquées
        setTimeout(function () {
            affiche(img, false);
            affiche(img.parentNode.getElementsByClassName("plage")[0], true);
            affiche(imgp, false);
            affiche(imgp.parentNode.getElementsByClassName("plage")[0], true);

        }, 800);
    }
}

function gestionClick(e) {
    nbImageSelectionne++;
    if (nbImageSelectionne <= 2) {
        imageClickee = e.target; //recupere la plage cliquée
        // on cherche l'image qui correspond à la plage cliquée
        img = imageClickee.parentNode.getElementsByClassName("dessin")[0];
        affiche(imageClickee, false); //on cache la plage
        affiche(img, true); //on affiche l'image
        //test si 1er cliquée
        if (nbImageSelectionne == 1) {
            //on met à jour image precedente et on met a jour attente
            imgp = img;
        } else {
            //on compare l'image cliquée avec la precedente
            verifPair(img, imgp);
            nbImageSelectionne -= 2;
            if (nbPairTrouvee == 8) {
                zoneMessage.innerHTML = "Vous avez gagnez";
            }
        }
        nbClick++;
        zoneNbClick.innerHTML = nbClick;
        zoneNbPairTrouvee.innerHTML = nbPairTrouvee;
    }
}

function initgame() {
    // on reinitialise les variables
    nbClick = 0;
    nbPairTrouvee = 0;
    nbImageSelectionne = 0;
    img = null;
    impg = null;
    zoneNbClick.innerHTML = nbClick;
    zoneNbPairTrouvee.innerHTML = nbPairTrouvee;
    zoneMessage.innerHTML = "";
    var images = [];
    //on prepare un tableau avec les numéros des 16 images
    index = 0;
    for (let i = 1; i <= 8; i++) {
        //la clé est un nombre aleatoire pour permettre le tri aleatoire
        images[index++] = i //numero de l'image
        images[index++] = i;
    }
    //on affecte les images aux cases
    var mesImg = document.getElementsByClassName("dessin");
    var mesPlages = document.getElementsByClassName("plage");
    for (let index = 0; index < 16; index++) {
        //nombre aleatoire
        console.log(images);
        console.log(images.length);
        alea = Math.ceil(Math.random() * images.length - 1);
        //on affecte une image au hasard
        mesImg[index].src = "../Images/" + images[alea] + ".jpg";
        console.log(alea + "  " + images[alea]);
        //on retire l'image du tableau
        images.splice(alea, 1);
        //on ajoute le listener
        mesPlages[index].addEventListener("click",gestionClick);
        // on masque les images (utile pour le reinit)
        affiche(mesPlages[index], true);
        affiche(mesImg[index], false)
    }
}

function solution() {
    var mesPlages = document.getElementsByClassName("plage");
    for (let i = 0; i < mesPlages.length; i++) {
        affiche(mesPlages[i], false);
        affiche(mesPlages[i].parentNode.getElementsByClassName("dessin")[0], true);

    }
}
initgame();
document.getElementById("Reinitialiser").addEventListener("click", initgame);
document.getElementById("Solution").addEventListener("click", solution);