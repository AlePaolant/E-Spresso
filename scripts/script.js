$(document).ready(function() {
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        // Gestione dello stato della navbar
        var navbar = $('.navbar');
        var logoNero = $('#logo-nero');
        var logoBianco = $('#logo-bianco');

        if (scroll > 150) {
            if (!navbar.hasClass('scrolled')) {
                navbar.addClass('scrolled');
                logoNero.hide();
                logoBianco.show();
            }
        } else {
            if (navbar.hasClass('scrolled')) {
                navbar.removeClass('scrolled sleep');
                logoNero.show();
                logoBianco.hide();
            }
        }

        if (scroll > 350) {
            if (!navbar.hasClass('awake')) {
                navbar.addClass('awake');
            }
        } else {
            if (navbar.hasClass('awake')) {
                navbar.removeClass('awake');
                navbar.addClass('sleep');
            }
        }

        // Effetto di zoom sull'immagine di sfondo
        var scale = 1 + scroll / 3000;  // Modifica la sensibilità dello zoom qui
        $('.background-image').css('transform', 'scale(' + scale + ')');
    });
});

  
//opacità al caricamento
document.addEventListener("DOMContentLoaded", function() {
  const animatedElements = document.querySelectorAll('.start-animation');
  animatedElements.forEach(element => {
      setTimeout(() => {
          element.classList.remove('start-animation');
      }, 500); // Rimuove la classe dopo 1 secondo
  });
});