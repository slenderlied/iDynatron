$(buscar_correo());



function buscar_correo(consulta) {
    $.ajax({
        url: 'php/validarcorreo.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta: consulta},
    })
    .done(function(respuesta) {
        $("#datos").html(respuesta);
    })
    .fail(function() {
        console.log("error");
    })

}

$(document).on('keyup', '#txtCorreo', function() {
    var valor = $(this).val();
    if (valor != "") {
        buscar_correo(valor);
    }else{
        buscar_correo();

    }
});