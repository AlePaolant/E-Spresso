// Funzione per gestire l'evento window.onload senza conflitti
window.addEventListener('load', function() {
    caricaOpzioni();
    initCustomGusto();
});

// Funzione esistente per caricare opzioni
function caricaOpzioni() {
    const fetchPromises = [];

    fetchPromises.push(fetch('../php/selezione_caffe/corposita_disponibili.php')
        .then(response => response.json())
        .then(data => creaPulsantiCorposita(data))
    );

    fetchPromises.push(fetch('../php/selezione_caffe/acidita_disponibili.php')
        .then(response => response.json())
        .then(data => creaPulsantiAcidita(data))
    );

    fetchPromises.push(fetch('../php/selezione_caffe/gusti_disponibili.php')
        .then(response => response.json())
        .then(data => creaPulsantiGusti(data))
    );

    fetchPromises.push(fetch('../php/selezione_caffe/retrogusti_disponibili.php')
        .then(response => response.json())
        .then(data => creaPulsantiRetrogusti(data))
    );

    Promise.all(fetchPromises)
        .catch(error => console.error('Errore durante la richiesta:', error));
}

// Funzioni per creare pulsanti e selezionare opzioni
function creaPulsantiCorposita(corpositaList) {
    const container = document.getElementById('corposita-buttons');
    container.innerHTML = ''; // Pulisce il contenitore
    corpositaList.forEach(corposita => {
        const button = document.createElement('button');
        button.textContent = corposita;
        button.classList.add('corposita-button');
        button.addEventListener('click', () => selezionaCorposita(corposita));
        container.appendChild(button);
    });
}

let corpositaSelezionata = ""; // Variabile per memorizzare l'acidità selezionata

function selezionaCorposita(corposita) {
    corpositaSelezionata = corposita;
    console.log('Corposità selezionata:', corpositaSelezionata);
    document.querySelectorAll('.corposita-button').forEach(button => {
        button.classList.toggle('active', button.textContent == corposita);
    });
}

function creaPulsantiAcidita(aciditaList) {
    const container = document.getElementById('acidita-buttons');
    container.innerHTML = ''; // Pulisce il contenitore
    aciditaList.forEach(acidita => {
        const button = document.createElement('button');
        button.textContent = acidita;
        button.classList.add('acidita-button');
        button.addEventListener('click', () => selezionaAcidita(acidita));
        container.appendChild(button);
    });
}

let aciditaSelezionata = ""; // Variabile per memorizzare l'acidità selezionata

function selezionaAcidita(acidita) {
    aciditaSelezionata = acidita;
    console.log('Acidità selezionata:', aciditaSelezionata);
    document.querySelectorAll('.acidita-button').forEach(button => {
        button.classList.toggle('active', button.textContent == acidita);
    });
}

function creaPulsantiGusti(gustiList) {
    const container = document.getElementById('gusti-buttons');
    container.innerHTML = ''; // Pulisce il contenitore
    gustiList.forEach(gusto => {
        const button = document.createElement('button');
        button.classList.add('gusti-button');
        
        // Aggiungi l'immagine come elemento <img>
        const img = document.createElement('img');
        img.src = `../img/caffe/gusti/${gusto}.png`;
        img.alt = gusto;
        button.appendChild(img);
        
        // Aggiungi il testo
        const text = document.createElement('div');
        text.textContent = gusto;
        text.classList.add('gusti-text');
        button.appendChild(text);
        
        button.addEventListener('click', () => selezionaGusti(gusto));
        container.appendChild(button);
    });
}

let gustiSelezionati = []; // Array per memorizzare i gusti selezionati

function selezionaGusti(gusto) {
    // Controlla se il gusto è già stato selezionato
    const indiceGusto = gustiSelezionati.indexOf(gusto);

    // Se il gusto è già selezionato, lo rimuove dall'array
    if (indiceGusto !== -1) {
        gustiSelezionati.splice(indiceGusto, 1);
    } else {
        // Se il gusto non è selezionato e l'array ha già due gusti, esce dalla funzione
        if (gustiSelezionati.length === 2) {
            return;
        }
        // Se il gusto non è selezionato e l'array ha meno di due gusti, lo aggiunge all'array
        gustiSelezionati.push(gusto);
    }

    // Aggiorna lo stato visuale dei pulsanti dei gusti
    document.querySelectorAll('.gusti-button').forEach(button => {
        button.classList.toggle('active', gustiSelezionati.includes(button.textContent));
    });

    console.log('Gusti selezionati:', gustiSelezionati);
}

function creaPulsantiRetrogusti(retrogustiList) {
    const container = document.getElementById('retrogusti-buttons');
    container.innerHTML = ''; // Pulisce il contenitore
    retrogustiList.forEach(retrogusto => {
        const button = document.createElement('button');
        button.classList.add('retrogusti-button');
        
        // Aggiungi l'immagine come elemento <img>
        const img = document.createElement('img');
        img.src = `../img/caffe/retrogusti/${retrogusto}.png`;
        img.alt = retrogusto;
        button.appendChild(img);
        
        // Aggiungi il testo
        const text = document.createElement('div');
        text.textContent = retrogusto;
        text.classList.add('retrogusti-text');
        button.appendChild(text);
        
        button.addEventListener('click', () => selezionaRetrogusti(retrogusto));
        container.appendChild(button);
    });
}

let retrogustiSelezionati = []; // Array per memorizzare i gusti selezionati

function selezionaRetrogusti(retrogusto) {
    // Controlla se il gusto è già stato selezionato
    const indiceRetrogusto = retrogustiSelezionati.indexOf(retrogusto);

    // Se il gusto è già selezionato, lo rimuove dall'array
    if (indiceRetrogusto !== -1) {
        retrogustiSelezionati.splice(indiceRetrogusto, 1);
    } else {
        // Se il gusto non è selezionato e l'array ha già due gusti, esce dalla funzione
        if (retrogustiSelezionati.length === 2) {
            return;
        }
        // Se il gusto non è selezionato e l'array ha meno di due gusti, lo aggiunge all'array
        retrogustiSelezionati.push(retrogusto);
    }

    // Aggiorna lo stato visuale dei pulsanti dei gusti
    document.querySelectorAll('.retrogusti-button').forEach(button => {
        button.classList.toggle('active', retrogustiSelezionati.includes(button.textContent));
    });

    console.log('Retrogusti selezionati:', retrogustiSelezionati);
}

function filtroCaffe() {
    var corposita = corpositaSelezionata;
    var acidita = aciditaSelezionata;
    var gusto1 = gustiSelezionati.length >= 1 ? gustiSelezionati[0] : '';
    var gusto2 = gustiSelezionati.length >= 2 ? gustiSelezionati[1] : '';
    var retrogusto1 = retrogustiSelezionati.length >= 1 ? retrogustiSelezionati[0] : '';
    var retrogusto2 = retrogustiSelezionati.length >= 2 ? retrogustiSelezionati[1] : '';

    console.log(`URL di richiesta: ../php/selezione_caffe/search.php?corposita=${corposita}&acidita=${acidita}&gusto1=${gusto1}&gusto2=${gusto2}&retrogusto1=${retrogusto1}&retrogusto2=${retrogusto2}`);

    fetch(`../php/selezione_caffe/search.php?corposita=${corposita}&acidita=${acidita}&gusto1=${gusto1}&gusto2=${gusto2}&retrogusto1=${retrogusto1}&retrogusto2=${retrogusto2}`)
    .then(response => {
        if (!response.ok) {
            throw new Error('Errore nella richiesta al server.');
        }
        return response.json();
    })
    .then(data => {
        console.log(data);
        document.getElementById("risultati").innerHTML = "";

        if (Array.isArray(data)) {
            data.forEach(caffe => {
                var risultato = document.createElement("div");
                risultato.textContent = `Il caffè perfetto per te è: ${caffe.nome}`;
                risultato.classList.add("risultato");

                var acquistaButton = document.createElement("button");
                acquistaButton.textContent = "Acquista ora";
                acquistaButton.classList.add("acquista-button");
                acquistaButton.addEventListener('click', function() {
                    window.location.href = `../pages/caffe.html#${caffe.nome}`;
                });

                risultato.appendChild(acquistaButton);
                document.getElementById("risultati").appendChild(risultato);
            });
        } else {
            var messaggio = document.createElement("div");
            messaggio.textContent = 'Nessun caffè trovato con le combinazioni selezionate, vuoi crearne uno?';
            messaggio.classList.add('risultato-negativo');

            var pulsante = document.createElement("button");
            pulsante.textContent = 'Crea';
            pulsante.classList.add('pulsante-ris-neg');
            pulsante.addEventListener('click', function() {
                window.location.href = 'custom.php#crea';
            });
            messaggio.appendChild(pulsante);
            document.getElementById("risultati").appendChild(messaggio);
        }
    });
}

// Funzioni drag and drop e slider
function allowDrop(event) {
    event.preventDefault();
}

function drag(event, id) {
    event.dataTransfer.setData("text", id);
}

function drop(event) {
    event.preventDefault();
    var data = event.dataTransfer.getData("text");
    var draggedElement = document.getElementById("caffe-" + data);

    if (draggedElement) {
        var clonedElement = draggedElement.cloneNode(true);
        clonedElement.removeAttribute("id");
        event.target.innerHTML = "";
        event.target.appendChild(clonedElement);
    } else {
        console.error("Elemento trascinato non trovato:", data);
    }
}

// Funzione per inizializzare i valori dei slider e altre impostazioni
function initCustomGusto() {
    document.getElementById("slider-1").value = 50;
    document.getElementById("slider-2").value = 50;
    document.getElementById("percentage-1").innerText = "50%";
    document.getElementById("percentage-2").innerText = "50%";
}

// Funzione per aggiornare i valori dei slider
function updateSliders(slider) {
    var slider1 = document.getElementById("slider-1");
    var slider2 = document.getElementById("slider-2");
    var value1 = parseInt(slider1.value);
    var value2 = parseInt(slider2.value);

    if (slider.id === "slider-1") {
        var newValue2 = 100 - value1;
        slider2.value = newValue2;
        document.getElementById("percentage-1").innerText = value1 + "%";
        document.getElementById("percentage-2").innerText = newValue2 + "%";
    } else {
        var newValue1 = 100 - value2;
        slider1.value = newValue1;
        document.getElementById("percentage-2").innerText = value2 + "%";
        document.getElementById("percentage-1").innerText = newValue1 + "%";
    }
}

function submitCustom() {
    var zone1 = document.getElementById("zone-1").querySelector("img").alt;
    var zone2 = document.getElementById("zone-2").querySelector("img").alt;
    var slider1 = document.getElementById("slider-1").value;
    var slider2 = document.getElementById("slider-2").value;

    var description = `${slider1}% di ${zone1}, ${slider2}% di ${zone2}`;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/submit_custom.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert("Gusto Custom creato con successo!");
        }
    };
    xhr.send(`description=${description}`);
    
}




