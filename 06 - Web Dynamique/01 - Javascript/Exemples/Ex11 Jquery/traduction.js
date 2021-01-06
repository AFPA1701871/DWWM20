$(document).ready(function () {
    $("#bouton").click(function () {
        alert("Vous avez cliqué sur le bouton");
    });
});

document.addEventListener("ready", function () {
    document.getElementById("bouton").addEventListener("click", (function () {
        alert("Vous avez cliqué sur le bouton");
    }));
});