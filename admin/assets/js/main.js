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

    $('.modificar-categoria').on('click', function(){
        //Cambiamos el comportamiento del botón
        $(this).removeClass('btn-secondary');
        $(this).removeClass('modificar-categoria');
        $(this).addClass('guardar-categoria');
        $(this).addClass('btn-success');
        $(this).html('Guardar Categoría');
        //Quitamos el disabled del input relacionado y ponemos el foco en él
        $('#input-' + $(this).attr('data-id')).prop('disabled', false);
        $('#input-' + $(this).attr('data-id')).focus();
        var temporal = $('#input-' + $(this).attr('data-id')).val();
        $('#input-' + $(this).attr('data-id')).val('');
        $('#input-' + $(this).attr('data-id')).val(temporal);

        $(this).on('click', function(){
            window.location.href = "backend/controladores/categorias/modificar.php?id=" + $(this).attr('data-id') + "&nombre=" + $('#input-' + $(this).attr('data-id')).val();
        });

    });

});

// Si hacemos click en la notificación
$('#notificacion').on('click', function(){
    $('#notificacion').fadeOut('slow');
});
