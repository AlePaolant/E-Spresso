const parallax_el = document.querySelectorAll(".parallax");
const main = document.querySelector(".main");

let xValue = 0, 
    yValue = 0; //di quanti pixel si muoverà il crotols al passaggio del mouse

//funzione per muovere gli elementi in base alla posizione del mouse
function update(cursorPosition){
    parallax_el.forEach((el) => {
        //riprendo l'attributo custom che ho creato tramite dataset ( perchè restituisce dati )
        let speedx = el.dataset.speedx;
        let speedy = el.dataset.speedy;
        el.style.transform = `translateX(calc(-50% + ${-xValue * speedx}px)) 
            translateY(calc(-50% + ${yValue * speedy}px))` //backtick non apici !!!!!!!!!!
    });
};

update(0); //chiamata della funzione per il funzionamento al reload

window.addEventListener("mousemove", (e) => {  //e = argomento della funzione che contiene info sul movimento del mouse
    // i valori di xValue e yValue sono presi a partire da in alto a sx, a noi serve la distanza dal centro
    // quindi dividiamo la dimensione della finestra per 2 e lo settiamo come punto di partenza (quindi le coordinate restituite saranno a partire dal centro)
    xValue = e.clientX - window.innerWidth / 2;
    yValue = e.clientY - window.innerHeight / 2;

    //console.log(xValue,yValue); //test per capire quali coordinate restituisce la funzione
    update(e.clientX); //chiamata alla funzione
});




if (window.innerWidth >= 725) {
    main.style.maxHeight = `${window.innerWidth * 0.85}px`;
} else {
    main.style.maxHeight = `${window.innerWidth * 1.85}px`;
}