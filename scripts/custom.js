window.onload = function() {
    caricaOpzioni();
};

function caricaOpzioni() {
    // Array di promesse per ogni fetch
    const fetchPromises = [];

    // Fetch per corposita_disponibili.php
    fetchPromises.push(fetch('../php/selezione_caffe/corposita_disponibili.php')
        .then(response => response.json())
        .then(data => popolaMenu("corposita", data))
    );

    // Fetch per acidita_disponibili.php
    fetchPromises.push(fetch('../php/selezione_caffe/acidita_disponibili.php')
        .then(response => response.json())
        .then(data => popolaMenu("acidita", data))
    );

    // Fetch per gusti_disponibili.php
    fetchPromises.push(fetch('../php/selezione_caffe/gusti_disponibili.php')
        .then(response => response.json())
        .then(data => {
            popolaMenu("gusto1", data);
            popolaMenu("gusto2", data);
        })
    );

    // Fetch per retrogusti_disponibili.php
    fetchPromises.push(fetch('../php/selezione_caffe/retrogusti_disponibili.php')
        .then(response => response.json())
        .then(data => {
            popolaMenu("retrogusto1", data);
            popolaMenu("retrogusto2", data);
        })
    );

    // Esegui tutte le richieste in parallelo e attendi che siano tutte risolte
    Promise.all(fetchPromises)
        .catch(error => console.error('Errore durante la richiesta:', error));
}



























function popolaMenu(menuId, opzioni) {
    var select = document.getElementById(menuId);
    select.innerHTML = "";

    var emptyOption = document.createElement("option");
    emptyOption.text = "";
    select.appendChild(emptyOption);

    opzioni.forEach(opzione => {
        var option = document.createElement("option");
        option.text = opzione;
        option.value = opzione;
        select.appendChild(option);
    });
}

document.getElementById("gusto1").addEventListener("change", function() {
    rimuoviOpzioneDuplicata(this.value, "gusto2");
});

document.getElementById("gusto2").addEventListener("change", function() {
    rimuoviOpzioneDuplicata(this.value, "gusto1");
});

document.getElementById("retrogusto1").addEventListener("change", function() {
    rimuoviOpzioneDuplicata(this.value, "retrogusto2");
});

document.getElementById("retrogusto2").addEventListener("change", function() {
    rimuoviOpzioneDuplicata(this.value, "retrogusto1");
});

function rimuoviOpzioneDuplicata(selectedValue, menuId) {
    var select = document.getElementById(menuId);

    for (var i = 0; i < select.options.length; i++) {
        if (select.options[i].value === selectedValue) {
            select.options[i].disabled = true;
        } else {
            select.options[i].disabled = false;
        }
    }
}

function filtroCaffe() {
    var corposita = document.getElementById("corposita").value;
    var acidita = document.getElementById("acidita").value;
    var gusto1 = document.getElementById("gusto1").value;
    var gusto2 = document.getElementById("gusto2").value;
    var retrogusto1 = document.getElementById("retrogusto1").value;
    var retrogusto2 = document.getElementById("retrogusto2").value;

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
                document.getElementById("risultati").appendChild(risultato);
            });
        } else {
            var messaggio = document.createElement("div");
            messaggio.textContent = 'Nessun caffè trovato con le combinazioni selezionate, vuoi crearne uno?';
            document.getElementById("risultati").appendChild(messaggio);
        }
    })
    .catch(error => console.error('Errore durante la richiesta:', error));
}