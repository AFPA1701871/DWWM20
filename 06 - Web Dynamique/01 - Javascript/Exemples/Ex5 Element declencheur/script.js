var lesBoutons = document.querySelectorAll("button");
lesBoutons.forEach(elt =>{

    elt.addEventListener("click",clickButton);
});

function clickButton(e){
    alert(e.target.textContent +" " + e.target.classList);
}


// var monUl =document.getElementsByTagName("ul")[0];
// var mon1erLi =document.getElementsByTagName("li")[0];
// monUl.innerHTML += "<li>toto</li>";