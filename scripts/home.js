const parallax_el = document.querySelectorAll(".parallax");

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

//responsive parallax
const main = document.querySelector(".main");

if (window.innerWidth >= 725) {
    main.style.maxHeight = `${window.innerWidth * 0.85}px`;
} else {
    main.style.maxHeight = `${window.innerWidth * 1.85}px`;
};

//rotazione tazzina about
window.addEventListener('scroll', function() {
    var scrollPosition = window.scrollY;
    var rotationValue = scrollPosition / 10; // Regola la velocità di rotazione modificando il divisore

    var rotatingImage = document.getElementById('tazza-about');
    rotatingImage.style.transform = 'translate(-50%, -50%) rotate(' + rotationValue + 'deg)';
});

//Movimento immagini in hover  -  sezione caffe
$(document).ready(function(){
    $('.img-caffe-container').hover(function(){
        $('.img-c-01').addClass('hover-img-c-1'); // Aggiunge la classe 'hover-img-c-1' all'elemento con la classe 'img-c-01' quando si passa sopra il contenitore
        $('.img-c-02').addClass('hover-img-c-2'); 
        $('.img-c-03').addClass('hover-img-c-3');
        $('.img-c-04').addClass('hover-img-c-4');  
    }, function(){
        $('.img-c-01').removeClass('hover-img-c-1');  // Rimuove la classe 'hover-img-c-1' all'elemento con la classe 'img-c-01' quando il mouse esce dal contenitore
        $('.img-c-02').removeClass('hover-img-c-2');
        $('.img-c-03').removeClass('hover-img-c-3');
        $('.img-c-04').removeClass('hover-img-c-4');
    });
});

//FAQ - espansione sezione 
const items = document.querySelectorAll('.sezione-faq button');
function toggleSezione() {
  const itemToggle = this.getAttribute('aria-expanded');
  for (i = 0; i < items.length; i++) {
    items[i].setAttribute('aria-expanded', 'false');
  }
  if (itemToggle == 'false') {
    this.setAttribute('aria-expanded', 'true');
  }
}
items.forEach((item) => item.addEventListener('click', toggleSezione));
