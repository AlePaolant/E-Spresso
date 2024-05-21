document.addEventListener("DOMContentLoaded", function() {
    var table = document.getElementById("clickableTable");
    var cells = table.getElementsByTagName("td");

    for (var i = 0; i < cells.length; i++) {
        cells[i].addEventListener("click", function() {
            for (var j = 0; j < cells.length; j++) {
                cells[j].classList.remove("clicked");  // Rimuove la classe 'clicked' da tutte le celle
            }
            this.classList.toggle("clicked");// Aggiunge la classe 'clicked' solo alla cella cliccata
        });
    }
});
