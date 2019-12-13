// Alejandro Millet Gerion

// Si ya se ha cargado toda la página
$(document).ready(function() {

    // Comprobamos si existe un código de mensaje por la URL y mostramos la notificación
    if(!isNaN(mensajeCod)){

        // Cargamos el tipo de mensaje y el texto en la #notificacion
        $('#notificacion').empty();
        $('#notificacion').append('<div class="alert" role="alert"></div>');
        $('.alert').addClass('alert-' + estado);
        $('.alert').append(mensajeTxt);

        $('#notificacion').fadeIn('slow', function(){
            setTimeout(function(){
                $('#notificacion').fadeOut('slow');
            }, 3000);
        });

    }
});

// Si hacemos click en la notificación
$('#notificacion').on('click', function(){
    $('#notificacion').fadeOut('slow');
});