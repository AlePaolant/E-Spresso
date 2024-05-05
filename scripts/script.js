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


$(document).ready(function() {
    $(window).scroll(function() {
      var scroll = $(this).scrollTop();
      var windowHeight = $(this).height();
      var videoContainer = $('.background-video-container');
      var contentTop = $('.content').offset().top;
  
      if (scroll > contentTop - windowHeight / 2) {
        // Se il contenuto principale è al centro della finestra, ingrandisci il video
        videoContainer.css({
          'width': '70%', // Larghezza ingrandita del video
          'left': '15%' // Posiziona il video al centro orizzontalmente
        });
      } else {
        // Altrimenti, mantieni le dimensioni predefinite del video
        videoContainer.css({
          'width': '50%', // Larghezza predefinita del video
          'left': '25%' // Posiziona il video al centro orizzontalmente
        });
      }
    });
  });
  