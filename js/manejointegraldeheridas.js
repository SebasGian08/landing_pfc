$(document).ready(function() {
    // Función para mostrar el modal
    function showDniModal() {
        $('#dniModalManejo').modal({
            backdrop: 'static', // No permitir cerrar al hacer clic fuera
            keyboard: false // No permitir cerrar con la tecla Esc
        });
    }

    // Verificar si se debe mostrar el modal
    function checkDniModal() {
        const lastShown = localStorage.getItem('dniModalManejoLastShown');
        const now = new Date().getTime();

        // Mostrar el modal si no hay fecha almacenada o si han pasado más de 6 horas
        if (!lastShown || (now - lastShown >= 21600000)) {
            showDniModal();
        }
    }

    // Llama a la función de verificación al cargar la página
    checkDniModal();

    $('#submitDNI').click(function(event) {
        event.preventDefault();
        var dni = $('#dniInput').val().trim();
        
        $(this).prop('disabled', true); // Deshabilitar botón

        $.ajax({
            url: 'index.php?vista=BuscarAlumnoPorManejoIntegral',
            method: 'POST',
            data: { documento: dni },
            success: function(response) {
                // No necesitas hacer JSON.parse, ya es un objeto
                if (response.success) {
                    console.log("Alumno encontrado:", response.data);
                    $('#dniModalManejo').modal('hide');
                    localStorage.setItem('dniModalLastShown', new Date().getTime());
                } else {
                    displayMessage(response.message || "No se encontró un alumno con ese DNI.");
                }
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud:", error);
                displayMessage("Hubo un problema al consultar el DNI. Intenta de nuevo.");
            },
            complete: function() {
                $('#submitDNI').prop('disabled', false); // Habilitar botón
            }
        });
    });

    function displayMessage(message) {
        $('#messageContainer').text(message).removeClass('d-none').addClass('alert alert-warning');
    }
});
