var inputVille = document.getElementById("ville");
var afficheVille = document.getElementById("nomVille");
var ico = document.getElementById("ico");
var temperature = document.getElementById("temp");
var meteo = document.getElementById("meteo");
var tempMax = document.getElementById("tempMax");
var tempMin = document.getElementById("tempMin");
var vitesseVent = document.getElementById("ventVitesse");
const req = new XMLHttpRequest();



/**************************  Listener ****************/
inputVille.addEventListener("blur", recupVille);
document.addEventListener("keypress", function (e) {
    if (e.key == "Enter") recupVille();
});


// Utilisation de l'Ajax pour appeler l'API et récuperer les enregistrements

//on vérifie les changements d'états de la requête
req.onreadystatechange = function (event) {
    if (this.readyState === XMLHttpRequest.DONE) {
        if (this.status === 200) {
            // la requete a abouti et a fournit une reponse
            //on décode la réponse, pour obtenir un objet
            reponse = JSON.parse(this.responseText);
            console.log(this.responseText);
            ico.setAttribute("src", "./Images/" + reponse.weather[0].icon + ".png");
            temperature.innerHTML = "Température actuelle : " + reponse.main.temp + " °";
            meteo.innerHTML = "Meteo actuelle : " + reponse.weather[0].description;
            tempMax.innerHTML = "Temperature Maximale " + reponse.main.temp_max + " °";
            tempMin.innerHTML = "Temperature Minimale " + reponse.main.temp_min + " °";
            vitesseVent.innerHTML = "Vitesse du vent  " + reponse.wind.speed + " m/s";

            console.log("Réponse reçue: %s", this.responseText);
        } else {
            console.log("Status de la réponse: %d (%s)", this.status, this.statusText);
            ico.setAttribute("src", "");
            temperature.innerHTML = "Pas de météo pour cette ville";
            meteo.innerHTML = "";
            tempMax.innerHTML = "";
            tempMin.innerHTML = "";
            vitesseVent.innerHTML = "";
        }
    }
};

/**************************  Fonctions ****************/

function recupVille() {
    console.log(inputVille.value);
    afficheVille.innerHTML = inputVille.value;
    //on envoi la requête
    req.open('GET', 'http://api.openweathermap.org/data/2.5/weather?q= ' + inputVille.value + '&appid=4f00f8b80c9b221ffd12e64353e31667&units=metric&lang=fr', true);
    req.send(null);
}