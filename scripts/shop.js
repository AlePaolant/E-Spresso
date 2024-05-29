function addToCart(productId) {
    fetch('../php/add_to_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ productId: productId })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // alert('Product added to cart!');
            showPopup("Prodotto aggiunto al carrello!", false);
        } else {
            // alert('Failed to add product to cart.');
            showPopup("Impossibile aggiungere il prodotto al carrello.", true);
        }
    });
}

// POPUP
function showPopup(message, loginBool) {
    var popup = document.getElementById("custom-popup");
    var popupMessage = document.getElementById("popup-message");
    popupMessage.textContent = message;
    if (loginBool==false){
        var loginBtn = document.getElementById("login-btn");
        loginBtn.style.display = "none";
    }
    popup.style.display = "block";
}

function closePopup() {
    var popup = document.getElementById("custom-popup");
    popup.style.display = "none";
}

window.onclick = function(event) {
    var popup = document.getElementById("custom-popup");
    if (event.target == popup) {
        popup.style.display = "none";
    }
}






// AGGIUNTA 24/05 - AGGIORNATA 26/05

// SETUP
// Crea una lista di containers (slider container = slider + container di puntini)
const containers = document.querySelectorAll(".slider-container");
// Setta le proprietà di ogni slider
for (var i=0; i<containers.length; i++){
    let s = containers[i].querySelector(".card-slider");
    setSlider(s,i,containers[i]);
}
// Se c'è il nome di una card alla fine dell'url, questa funzione porta la finestra su quella card
findCard();

// Setta le proprietà degli slider
function setSlider(s,i,c){
    s.idNum = i;
    s.container = c;

    // Il pointer è padre di tutte le cards, in realtà è il pointer ad essere traslato ad ogni cambio di card corrente
    s.pointer = s.querySelector(".pointer");
    s.cards = s.querySelectorAll(".card");
    s.sliderLength = s.cards.length;
    s.currentCard = 0;
    // showDesc è il numero corrispondente alla card con descrizione attualmente visibile
    s.showDesc = null;
    s.dots = [];

    // Buttons e container dei dots
    s.leftButton = s.querySelector(".left-btn");
    s.rightButton = s.querySelector(".right-btn");
    s.dotContainer = s.container.querySelector(".dot-container");

    // Assegnazione delle funzioni ai buttons
    s.leftButton.addEventListener("click", (e) => {moveLeft(e.currentTarget.parentNode)} );
    s.rightButton.addEventListener("click", (e) => {moveRight(e.currentTarget.parentNode)} );

    // Setta le proprietà di ogni card e crea un dot per ognuna
    for (var i=0; i<s.sliderLength; i++){
        setCard(s.cards[i],i,s);
    }

    // Update grafico
    updatePos(s);
}

// Setta le proprietà di ogni card e crea un dot per ognuna
function setCard(c,i,s){
    c.idNum = i;
    c.slider = s;

    // La funzione assegnata a questo button mostra la descrizione
    c.desc = c.querySelector(".card-desc-container");
    c.descButton = c.querySelector(".card-btn-desc");
    c.descButton.addEventListener("click", (e) => {descFunc(e.currentTarget.parentNode)});
    // Questa funzione rende una card toccata la card attuale
    c.addEventListener("click", (e) => {setPos(e.currentTarget)});

    // Creazione del dot corrispondente alla card
    let dot = document.createElement("button");
    dot.idNum = i;
    dot.slider = s;

    // Aggiunta del dot al container e assegnazione della funzione, la stessa assegnata alla card
    dot.setAttribute("class", "dot");
    dot.addEventListener("click", (e) => {setPos(e.target)} );
    s.dotContainer.appendChild(dot);
    s.dots[i] = dot;
}

// Se c'è il nome di una card alla fine dell'url, questa funzione porta la finestra su quella card
function findCard(){
    let id = window.location.hash;
    var check = false;

    if (id) {
        var checkId = decodeURIComponent( id.replace(/[\s-_]/g, "") );

        for (var i=0; i<containers.length && check==false; i++){
            var cardList = containers[i].querySelectorAll(".card");

            for (var j=0; j<cardList.length && check==false; j++){
                var title = cardList[j].querySelector(".card-title").textContent;
                var checkTitle = title.replace(/[\s-_]/g, "");
                
                if (checkId == "#"+checkTitle){
                    cardList[j].slider.scrollIntoView({block: "center"});
                    cardList[j].slider.currentCard = cardList[j].idNum;
                    updatePos(cardList[j].slider);
                    
                    check = true;
                }
            }
        }
    }
}


//


// Questa funzione esegue lo spostamento delle cards, aggiorna i dots e la carta con descrizione attiva
function updatePos(s){
    // spostamento
    s.pointer.style.transform = "translateX( calc(var(--sizevar) * -324 * " + s.currentCard + ") )";

    if (s.showDesc != s.currentCard){
        s.showDesc = null;
    }

    for (var i=0; i<s.sliderLength; i++){
        if (i != s.currentCard){
            s.dots[i].style.backgroundColor = "rgba(33, 34, 34, 0.5)";
            s.dots[i].style.transform = "scale(100%)";

            s.cards[i].desc.style.transform = "translateY(0)";
        }
        else {
            s.dots[i].style.backgroundColor = "#212222";
            s.dots[i].style.transform = "scale(120%)";

            if (s.showDesc == null){
                s.cards[i].desc.style.transform = "translateY(0)";
            }
            else {
                s.cards[i].desc.style.transform = "translateY(-100%)";
            }
        }
    }
}

//

// Queste funzioni cambiano la card corrente in base al button sx/dx premuto
function moveLeft(s){
    if (s.currentCard > 0){
        s.currentCard = Number(s.currentCard) - 1;
        updatePos(s);
    }
    else {
        s.currentCard = s.sliderLength - 1;
        updatePos(s);
    }
}
function moveRight(s){
    if (s.currentCard < s.sliderLength-1){
        s.currentCard = Number(s.currentCard) + 1;
        updatePos(s);
    }
    else {
        s.currentCard = 0;
        updatePos(s);
    }
}

// Questa funzione cambia la card corrente in base alla card o al button pallino premuti
function setPos(d){
    d.slider.currentCard = d.idNum;
    updatePos(d.slider);
}

// Questa funzione mostra o nasconde la descrizione della card corrente
function descFunc(c){
    if (c.slider.showDesc == c.idNum){
        c.slider.showDesc = null;
    }
    else {
        c.slider.currentCard = c.idNum;
        c.slider.showDesc = c.idNum;
    }
    updatePos(c.slider);
}