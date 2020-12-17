function deplace(dleft, dtop) {
    // permet de deplacer le carre selon 2 directions left et top
    //on recupere son style (tout le CSS)
    var styleCarre = window.getComputedStyle(carre, null);
    //on recupere les positions left et top actuelles
    var topActuel = styleCarre.top;
    var leftActuel = styleCarre.left;
    //on modifie les positions left et top actuelles
    carre.style.top = parseInt(topActuel) + dtop + 'px';
    carre.style.left = parseInt(leftActuel) + dleft + 'px';
}
//on recupere le carré 
var carre = document.getElementById('carre');
var left = document.getElementById("left");
var right = document.getElementById("right");
var up = document.getElementById("up");
var down = document.getElementById("down");

left.addEventListener("click", function () {
    deplace(-5, 0);
});
right.addEventListener("click", function () {
    deplace(5, 0);
});
up.addEventListener("click", function () {
    deplace(0, -5);
});
down.addEventListener("click", function () {
    deplace(0, 5);
});