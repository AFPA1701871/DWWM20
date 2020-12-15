var lesBoutons = document.querySelectorAll("button");
lesBoutons.forEach(elt =>{

    elt.addEventListener("click",clickButton);
});

function clickButton(e){
    alert(e.target.textContent);
}