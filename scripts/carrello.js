// Funzione per aggiornare la quantità di prodotto
function updateQuantita(itemId, quantity) {
    fetch('../php/funzioni_carrello.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            id: itemId,
            quantity: quantity
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            // Ricarica la pagina per aggiornare il carrello
            location.reload();
        } else {
            console.error("Errore nella modifica della quantità: ", data.message);
        }
    })
    .catch(error => {
        console.error("C'è stato un errore nella modifica della quantità: ", error);
    });
}

// Funzione per calcolare il subtotale e aggiornare l'interfaccia utente
function calcolaSubtotaleEAggiornaUI(itemId) {
    let input = document.querySelector(`input[data-id='${itemId}']`);
    let quantita = parseInt(input.value);
    let prezzo = parseFloat(document.querySelector(`#prezzo${itemId}`).innerText.replace('€', '').trim());
    let subtotale = quantita * prezzo;
    
    // Aggiorna l'elemento del subtotale nell'interfaccia utente
    document.querySelector(`#subtotale${itemId}`).innerText = `€ ${subtotale.toFixed(2)}`;
}

// pulsanti quantita
function aumenta(id) {
    let input = document.querySelector(`input[data-id='${id}']`);
    input.value = parseInt(input.value) + 1;
    updateQuantita(id, input.value);
    calcolaSubtotaleEAggiornaUI(id); // Calcola il nuovo subtotale e aggiorna l'interfaccia utente
}

function diminuisce(id) {
    let input = document.querySelector(`input[data-id='${id}']`);
    if (input.value > 1) {
        input.value = parseInt(input.value) - 1;
        updateQuantita(id, input.value);
        calcolaSubtotaleEAggiornaUI(id); // Calcola il nuovo subtotale e aggiorna l'interfaccia utente
    }
}

//funzione per il cambio del metodo di pagamento
function cambioMetodoPagamento(method) {
    document.getElementById('infoCartaCredito').classList.add('hidden');
    document.getElementById('infoPayPal').classList.add('hidden');
    if (method === 'cartacredito') {
        document.getElementById('infoCartaCredito').classList.remove('hidden');
    } else {
        document.getElementById('infoPayPal').classList.remove('hidden');
    }
}

// Imposta di default il metodo di pagamento con carta 
window.onload = function() {
    cambioMetodoPagamento('cartacredito');
}