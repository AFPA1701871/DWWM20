function TableMultiplication(nbr) {
    for (let i = 0; i <= 10; i++) {
        let ligne = i + " x " + nbr + " = " + (i * nbr) + "\n";
        document.write(ligne);
    }
}
function moyenne() {
    let somme = 0;
    let cpt = 0;
    do {
        var nbr = parseInt(prompt("Entrez un nombre(zéro pour arrêter le programme)"));
        if (nbr != 0) {
            somme = somme + nbr;
            cpt++;
        }
    } while (nbr != 0)
    document.write("La somme des nombres est de " + somme + "\nLa moyenne est de " + (somme / cpt))
}


var rep = parseInt(prompt("1- Multiples\n2- Somme et moyenne\n\nEntrez votre option :"));
switch (rep) {
    case 1:
        var nbr = parseInt(prompt("Entrez un nombre à multiplier"))
        
        TableMultiplication(nbr);
        break;
    case 2:
        
        moyenne();
        break;
    }
    