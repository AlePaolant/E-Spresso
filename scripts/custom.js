window.onload = function() {
    caricaOpzioni();
};

function caricaOpzioni() {
    // Array di promesse per ogni fetch
    const fetchPromises = [];

    // Fetch per corposita_disponibili.php
    fetchPromises.push(fetch('../php/selezione_caffe/corposita_disponibili.php')
        .then(response => response.json())
        .then(data => creaPulsantiCorposita(data))
    );

    // Fetch per acidita_disponibili.php
    fetchPromises.push(fetch('../php/selezione_caffe/acidita_disponibili.php')
        .then(response => response.json())
        .then(data => creaPulsantiAcidita(data))
    );


    // Fetch per gusti_disponibili.php
    fetchPromises.push(fetch('../php/selezione_caffe/gusti_disponibili.php')
        .then(response => response.json())
        .then(data => creaPulsantiGusti(data))
    );

        

    // Fetch per retrogusti_disponibili.php
    fetchPromises.push(fetch('../php/selezione_caffe/retrogusti_disponibili.php')
        .then(response => response.json())
        .then(data => creaPulsantiRetrogusti(data))
    );

    // Esegui tutte le richieste in parallelo e attendi che siano tutte risolte
    Promise.all(fetchPromises)
        .catch(error => console.error('Errore durante la richiesta:', error));
}


//CORPOSITA
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

// ACIDITA
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

//GUSTI
function creaPulsantiGusti(gustiList) {
    const container = document.getElementById('gusti-buttons');
    container.innerHTML = ''; // Pulisce il contenitore
    gustiList.forEach(gusto => {
        const button = document.createElement('button');
        button.textContent = gusto;
        button.classList.add('gusti-button');
        
        // Aggiungi l'immagine come elemento <img>
        const img = document.createElement('img');
        img.src = `../img/caffe/gusti/${gusto}.png`;
        img.alt = gusto;
        button.appendChild(img);
        
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


//RETROGUSTI
function creaPulsantiRetrogusti(retrogustiList) {
    const container = document.getElementById('retrogusti-buttons');
    container.innerHTML = ''; // Pulisce il contenitore
    retrogustiList.forEach(retrogusto => {
        const button = document.createElement('button');
        button.textContent = retrogusto;
        button.classList.add('retrogusti-button');
        
        // Aggiungi l'immagine come elemento <img>
        const img = document.createElement('img');
        img.src = `../img/caffe/retrogusti/${retrogusto}.png`;
        img.alt = retrogusto;
        button.appendChild(img);
        
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



// Funzione per filtrare i caffè
function filtroCaffe() {
    //corposita
    var corposita = corpositaSelezionata;
    //acidita
    var acidita = aciditaSelezionata;

    //gestione dei gusti selezionati
    var gusto1 = gustiSelezionati.length >= 1 ? gustiSelezionati[0] : ''; // Assegna i primi due gusti selezionati, se presenti
    var gusto2 = gustiSelezionati.length >= 2 ? gustiSelezionati[1] : '';

    //gestione dei retrogusti selezionati
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
        console.log(data); // Stampa la risposta JSON nella console
        document.getElementById("risultati").innerHTML = "";
    
        if (Array.isArray(data)) {
            data.forEach(caffe => {
                var risultato = document.createElement("div");
                risultato.textContent = `Il caffè perfetto per te è: ${caffe.nome}`;
                risultato.classList.add("risultato"); // Aggiungi la classe CSS al risultato div
    
                // Crea il pulsante "Acquista ora" con il link allo shop
                var acquistaButton = document.createElement("button");
                acquistaButton.textContent = "Acquista ora";
                acquistaButton.classList.add("acquista-button"); // Aggiungi la classe CSS al pulsante
                acquistaButton.addEventListener('click', function() {
                    window.location.href = `../shop.html#${caffe.nome}`;
                });
    
                // Aggiungi il pulsante al risultato
                risultato.appendChild(acquistaButton);
    
                document.getElementById("risultati").appendChild(risultato);
            });
        } else {
            var messaggio = document.createElement("div");
            messaggio.textContent = 'Nessun caffè trovato con le combinazioni selezionate, vuoi crearne uno?';
            document.getElementById("risultati").appendChild(messaggio);
        }
    })
    
    
}


