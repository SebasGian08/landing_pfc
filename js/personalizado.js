$(document).ready(function() {
    // Función para mostrar el modal
    function showDniModal() {
        $('#dniModal').modal({
            backdrop: 'static', // No permitir cerrar al hacer clic fuera
            keyboard: false // No permitir cerrar con la tecla Esc
        });
    }

    // Verificar si se debe mostrar el modal
    function checkDniModal() {
        const lastShown = localStorage.getItem('dniModalLastShown');
        const now = new Date().getTime();

        // Si no hay fecha almacenada, mostrar el modal
        if (!lastShown) {
            showDniModal();
            return;
        }

        // Verificar si ha pasado más de un día (86400000 ms en un día)
        /* const oneDay = 86400000; */
        /* const oneMinute = 60000; */
        const sixHours = 21600000;
        if (now - lastShown >= sixHours) {
            showDniModal();
        }
    }

    // Llama a la función de verificación al cargar la página
    checkDniModal();

    $('#submitDNI').click(function(event) {
        event.preventDefault(); // Evita el envío del formulario
        var dni = $('#dniInput').val().trim();

        // Realiza una solicitud AJAX a tu controlador
        $.ajax({
            url: 'index.php?vista=buscarAlumno', // Llama a tu index.php
            method: 'POST',
            data: {
                documento: dni
            },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.success && data.data) {
                    console.log("Alumno encontrado:", data.data);
                    $('#dniModal').modal(
                    'hide'); // Cerrar el modal si se encuentra el alumno

                    // Almacenar la fecha actual al iniciar sesión correctamente
                    localStorage.setItem('dniModalLastShown', new Date().getTime());
                } else {
                    displayMessage(data.message ||
                        "No se encontró un alumno con ese DNI.");
                }
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud:", error);
                displayMessage(
                    "Hubo un problema al consultar el DNI. Intenta de nuevo.");
            }
        });
    });

    function displayMessage(message) {
        $('#messageContainer').text(message).removeClass('d-none').addClass('alert alert-warning');
    }
});