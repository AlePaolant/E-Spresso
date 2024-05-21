document.addEventListener("DOMContentLoaded", function() {
    var clickableArea = document.getElementById("clickableArea");

    clickableArea.addEventListener("click", function() {
        this.classList.toggle("clicked");
    });
});