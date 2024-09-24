<!DOCTYPE html>
<html lang="en">

<head>

    <title>Instituto Arzobispo Loayza</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Asegúrate de incluir Bootstrap después de jQuery -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
    .notification {
        display: none;
        position: fixed;
        top: 10px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 1000;
        width: 80%;
        max-width: 400px;
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
        padding: 15px;
        border-radius: 5px;
    }

    .close-notification {
        cursor: pointer;
        float: right;
        font-size: 18px;
    }
    </style>
</head>
</head>

<body>
    <!-- PRE LOADER -->
    <section class="preloader">
        <div class="spinner">
            <span class="spinner-rotate"></span>
        </div>
    </section>

    <!-- MENU -->
    <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header d-flex justify-content-between align-items-center">
                <a href="index.html" class="navbar-brand d-flex align-items-center">
                    <img src="images/LOGOFPC.png" style="width: 7%;" alt="">
                    <span class="logo-text" style="color: #002b6a; font-size: 18px;">ELEVA TU PERFIL
                        PROFESIONAL</span>
                </a>
            </div>
        </div>
    </section>


    <!-- Para el Modal -->
    <style>
    .modal-footer {
        display: flex;
        justify-content: center;
        padding: 20px;
        /* Ajusta el valor según necesites */
    }

    .btn-primary {
        padding: 10px 20px;
        /* Ajusta el padding del botón */
    }
    </style>
    <script>
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
            // Realiza una solicitud AJAX a tu API usando POST
            $.ajax({
                url: 'https://istalcursos.edu.pe/apirest/alumnos',
                method: 'POST',
                data: {
                    documento: dni
                },
                success: function(response) {
                    if (response.success && response.data) {
                        console.log("Alumno encontrado:", response.data);
                        $('#dniModal').modal(
                            'hide'); // Cerrar el modal si se encuentra el alumno

                        // Almacenar la fecha actual al iniciar sesión correctamente
                        localStorage.setItem('dniModalLastShown', new Date().getTime());
                    } else {
                        displayMessage(response.message ||
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
    </script>

    <div class="modal fade" id="dniModal" tabindex="-1" role="dialog" aria-labelledby="dniModalLabel" aria-hidden="true"
        style="background-color: rgb(0 43 106 / 91%) !important">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background:white !important;">
                <div class="modal-header">
                    <h3 class="modal-title" id="dniModalLabel"
                        style="font-weight: 900; color: #2c3e50; text-align: center; text-transform: uppercase;">Acceso
                        Exclusivo para Estudiantes</h3>
                </div>

                <div class="modal-body">
                    <input type="text" id="dniInput" class="form-control" placeholder="Ingrese su DNI" maxlength="8">
                    <div id="messageContainer" class="d-none" style="margin-top: 10px;"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="submitDNI" style="background:#0b326b!important"><i
                            class="fas fa-lock"></i> Ingresar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- HOME -->
    <section id="home" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 d-flex flex-column justify-content-center text-center">
                    <div class="home-info">
                        <h1 style="font-size: 50px; font-weight: 900;">
                            Programas especializados en <strong style="color:#00c9fa;">ciencias de la salud</strong>
                        </h1>
                        <a href="https://www.ial.edu.pe/" target="_blank" class="btn section-btn smoothScroll"
                            style="font-size: 13px; padding: 10px 20px;">
                            Con el respaldo del Instituto Arzobispo Loayza
                        </a>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12" style="padding: 70px; position: relative;">
                    <div class="home-video"
                        style="border: 1px solid #ccc; border-radius: 10px; overflow: hidden; background: #000;">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe id="player" src="https://www.youtube.com/embed/w8F2hBv5VBY?autoplay=1&mute=1"
                                title="Curso Manejo Integral de Heridas"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen
                                style="border: none;"></iframe>
                        </div>
                        <div
                            style="padding: 10px; background: rgb(0 43 106); color: white; font-size: 20px; font-weight: bold;">
                            <i class="fas fa-play"></i> Manejo Integral de Heridas
                        </div>
                        <div
                            style="display: flex; justify-content: space-between; padding: 5px 10px; background: rgb(0 43 106 / 41%); color: white;">
                            <span><i class="fas fa-users"></i> 45 viendo ahora</span>
                            <span>Hace 2 días</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- WhatsApp Contact -->
    <a href="https://wa.me/51946425355" target="_blank"
        style="position: fixed; bottom: 20px; right: 20px; z-index: 1000;">
        <div style="background-color: rgba(255, 255, 255, 0.8); border-radius: 50%; padding: 8px;">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp"
                style="width: 45px; height: 45px;">
        </div>
    </a>
    </section>

    <!-- ABOUT -->
    <section id="about" data-stellar-background-ratio="0.5"
        style="background-image: url('https://www.ial.edu.pe/web_loayza/assets/img/imgactualizado/fondomisionyvision-35.png'); background-size: cover; background-position: center; background-attachment: fixed;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="about-info skill-thumb">
                        <a target="_blank" class="btn section-btn smoothScroll"
                            style="background-color: rgb(249, 251, 253); color: #002b6a; font-weight: 900!important; font-size: 20px;">
                            <i class="fas fa-arrow-alt-circle-down"></i> NUESTROS BENEFICIOS</a>

                        <br><br>
                        <div class="benefit"
                            style="background-color: #002b6a; border-radius: 10px; padding: 15px; margin-bottom: 20px; display: flex; align-items: center; transition: transform 0.3s;">
                            <i class="fas fa-award" style="color: white; font-size: 40px; margin-right: 10px;"></i>
                            <strong style="color: white; font-size: 18px;">CERTIFICADO A NOMBRE DEL INSTITUTO
                                ARZOBISPO LOAYZA</strong>
                        </div>

                        <div class="benefit"
                            style="background-color: #002b6a; border-radius: 10px; padding: 15px; margin-bottom: 20px; display: flex; align-items: center; transition: transform 0.3s;">
                            <i class="fas fa-user-graduate"
                                style="color: white; font-size: 40px; margin-right: 10px;"></i>
                            <strong style="color: white; font-size: 18px;">DOCENTES ALTAMENTE
                                CALIFICADOS</strong>
                        </div>

                        <div class="benefit"
                            style="background-color: #002b6a; border-radius: 10px; padding: 15px; margin-bottom: 20px; display: flex; align-items: center; transition: transform 0.3s;">
                            <i class="fas fa-flask" style="color: white; font-size: 40px; margin-right: 10px;"></i>
                            <strong style="color: white; font-size: 18px;">MÓDULOS Y LABORATORIOS
                                IMPLEMENTADOS</strong>
                        </div>

                        <div class="benefit"
                            style="background-color: #002b6a; border-radius: 10px; padding: 15px; margin-bottom: 20px; display: flex; align-items: center; transition: transform 0.3s;">
                            <i class="fas fa-book" style="color: white; font-size: 40px; margin-right: 10px;"></i>
                            <strong style="color: white; font-size: 18px;">PLAN DE ESTUDIOS ACTUALIZADOS</strong>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="about-image">
                        <img src="https://www.ial.edu.pe/idiomas/assets/img/chica.png" class="img-responsive" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer data-stellar-background-ratio="0.5" style="background: #002b6a; padding: 20px;">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <a href="https://www.facebook.com/ial.oficial" target="_blank" class="social-icon"
                        style="background: white; border-radius: 50%; width: 50px; height: 50px; margin: 5px; color: #002b6a; display: inline-flex; align-items: center; justify-content: center;">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.instagram.com/ial.oficial/?hl=es" target="_blank" class="social-icon"
                        style="background: white; border-radius: 50%; width: 50px; height: 50px; margin: 5px; color: #002b6a; display: inline-flex; align-items: center; justify-content: center;">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.youtube.com/institutoarzobispoloayzaialoficial" target="_blank"
                        class="social-icon"
                        style="background: white; border-radius: 50%; width: 50px; height: 50px; margin: 5px; color: #002b6a; display: inline-flex; align-items: center; justify-content: center;">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>


    <!-- Asegúrate de incluir Font Awesome en tu proyecto -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
    .social-icon {
        margin: 0 15px;
        /* Espaciado entre iconos */
        font-size: 24px;
        /* Tamaño del icono */
        color: #fff;
        /* Color del icono, cámbialo según tu diseño */
        text-decoration: none;
        /* Sin subrayado */
    }

    .social-icon:hover {
        color: #f1c40f;
        /* Color al pasar el mouse */
    }
    </style>


    <style>
    .benefit:hover {
        transform: scale(1.05);
        cursor: pointer;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }
    </style>


    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <!-- SCRIPTS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>