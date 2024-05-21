//Funzione per il metoto di pagamento
function selezionaMetodoPagamento(){
    var metodoPagamento = document.getElementById("paymentMethod").value;
    var infoCartaCredito = document.getElementById("creditCardInfo");
    var infoPayPal = document.getElementById("paypalInfo");

    if(metodoPagamento ==="creditCard"){
        infoCartaCredito.classList.remove("hidden");
        infoPayPal.classList.add("hidden");
    } else if(metodoPagamento==="paypal"){
        infoCartaCredito.classList.add("hidden");
        infoPayPal.classList.remove("hidden");
    }
}

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
            location.reload(); // Ricarica la pagina per aggiornare il carrello
        } else {
            console.error("Errore nella modifica della quantità: ", data.message);
        }
    })
    .catch(error => {
        console.error("C'è stato un errore nella modifica della quantità: ", error);
    });
}

// Funzione per rimuovere elementi dal carrello
function rimuoviElementi(itemId) {
    fetch('../php/funzioni_carrello.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            id: itemId
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            location.reload(); // Ricarica la pagina per aggiornare il carrello
        } else {
            console.error("Errore nella rimozione degli elementi: ", data.message);
        }
    })
    .catch(error => {
        console.error("C'è stato un errore nella rimozione degli elementi: ", error);
    });
}
