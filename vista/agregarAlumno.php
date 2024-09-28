<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Alumno</title>
    <link rel="stylesheet" href="css/registrar.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <img src="https://www.ial.edu.pe/landing_pfc/images/LOGOFPC.png" alt="Logo">
    <h1>Agregar Alumno</h1>
    <form id="agregar-alumno">
        <input type="text" id="documento" name="documento" required pattern="\d{8}" title="El DNI debe contener 8 dígitos." placeholder="Ingrese DNI">
        <button type="submit">Agregar Alumno</button>
    </form>
    <div id="resultado"></div>

    <script>
        $(document).ready(function() {
            $('#agregar-alumno').on('submit', function(event) {
                event.preventDefault(); // Evita que se recargue la página

                $.ajax({
                    type: 'POST',
                    url: 'index.php?vista=agregarAlumno', // Ajusta la ruta según sea necesario
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            $('#resultado').html('<p>' + response.message + '</p>');
                        } else {
                            $('#resultado').html('<p>' + response.message + '</p>');
                        }
                    },
                    error: function() {
                        $('#resultado').html('<p>Error en la solicitud.</p>');
                    }
                });
            });
        });
    </script>
</body>
</html>
