$(document).ready(function() {
    $('#contactForm').submit(function(e) {
        e.preventDefault();
        
        var formData = $(this).serialize();
        
        $.ajax({
            type: 'POST',
            url: '../php/modulo_contatti.php',
            data: formData,
            success: function(response) {
                if (response == 'success') {
                    $('#successMessage').fadeIn().delay(3000).fadeOut();
                    $('#contactForm')[0].reset();
                } else {
                    $('#errorMessage').fadeIn().delay(3000).fadeOut();
                }
            }
        });
    });
});
