function Cambio_area(sectionID) {
    //nascondi le sezioni
    const sections = document.querySelectorAll('.sezione-contenuto');
    sections.forEach(section => section.style.display = 'none');

    //mostra la sezione selezionata
    const sezioneSelezionata = document.getElementById(sectionID);
    if (sezioneSelezionata) {
        sezioneSelezionata.style.display = 'block';
    }
}

//mostra la sezione profilo di default
document.addEventListener('DOMContentLoaded', function () {
    Cambio_area('profilo');
})

// Ottieni il pop-up
var popup = document.getElementById("popup");
// Ottieni il pulsante che apre il pop-up
var btn = document.getElementById("editButton");
// Ottieni l'elemento <span> che chiude il pop-up
var span = document.getElementsByClassName("close")[0];
// Quando l'utente clicca sul pulsante, apri il pop-up 
btn.onclick = function () {
    popup.style.display = "block";
}
// Quando l'utente clicca su <span> (x), chiudi il pop-up
span.onclick = function () {
    popup.style.display = "none";
} // Quando l'utente clicca fuori dal pop-up, chiudi il pop-up
window.onclick = function (event) {
    if (event.target == popup) {
        popup.style.display = "none";
    }
}

document.getElementById("logout").addEventListener("click",function(){
    fetch('../login/utility/out.php')
        .then(response => {
            if (response.ok) {
                window.location.href = '../login/login.php';
            }
            else{
                alert('Errore durante il logout');
            }
        })
        .catch(error => console.error('errore: ', error));
});