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
var popup = document.getElementById("popupModifica");
var popup2=document.getElementById("popupElimina");
var overlay = document.getElementById("overlay");

// Ottieni il pulsante che apre il pop-up
var btn = document.getElementById("editButton");
var btn2 = document.getElementById("deleteButton");

// Ottieni l'elemento <span> che chiude il pop-up
var span = document.getElementsByClassName("close")[0];
var span2 = document.getElementsByClassName("closed")[0];

// Quando l'utente clicca sul pulsante, apri il pop-up 
btn.onclick = function () {
    popup.style.display = "block";
    overlay.style.display = "block";
}
btn2.onclick = function () {
    popup2.style.display = "block";
    overlay.style.display = "block";
}

// Quando l'utente clicca su <span> (x), chiudi il pop-up
span.onclick = function () {
    popup.style.display = "none";
    overlay.style.display = "none";
}

span2.onclick=function(){
    popup2.style.display = "none";
    overlay.style.display = "none";
}

 // Quando l'utente clicca fuori dal pop-up, chiudi il pop-up
 window.onclick = function (event) {
    if (event.target == overlay) {
        popup.style.display = "none";
        popup2.style.display = "none";
        overlay.style.display = "none";
    }
}





document.getElementById("logout").addEventListener("click", function () {
    fetch('../login/utility/out.php')
        .then(response => {
            if (response.ok) {
                window.location.href = '../login/login.php';
            }
            else {
                alert('Errore durante il logout');
            }
        })
        .catch(error => console.error('errore: ', error));
});


//per nascondere la password in register.php e per abilitare
//la funzione mostra o nascondi
function togglePassword() {
    var passwordField = document.getElementById("password");
    var showPasswordCheckbox = document.getElementById("show-password");
    if (showPasswordCheckbox.checked) {
        passwordField.type = "text";
    } else {
        passwordField.type = "password";
    }
}

document.getElementById('deleteButton').addEventListener('click', function() {
    var confirmation = confirm('Sei sicuro di voler eliminare i tuoi dati?');
    if (confirmation) {
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'delete_user.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
          alert('Dati eliminati con successo');
          window.location.href = 'logout.php'; // Redirect to logout page after deletion
        }
      };
      xhr.send('id=<?php echo $sessionid; ?>');
    }
  });