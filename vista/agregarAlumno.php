<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Agregar Alumno</title>
    <link rel="stylesheet" href="css/registrar.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: url(https://www.ial.edu.pe/assets/img_min/fondo.min.png) no-repeat center center;
        background-size: cover;
        color: #333;
        text-align: center;
    }
    </style>
</head>

<body>
    <img src="https://www.ial.edu.pe/landing_pfc/images/LOGOFPC.png" alt="Logo">
    <h1>Agregar Alumno</h1>
    <form id="agregar-alumno">
        <input type="text" id="documento" name="documento" required pattern="^\d{8}$"
            title="El DNI debe contener 8 dígitos." placeholder="Ingrese DNI">
        <button type="submit">Agregar Alumno</button>
    </form>

    <div id="resultado"></div>

    <table id="tabla-alumnos">
        <thead>
            <tr>
                <th>ID</th>
                <th>DNI REGISTRADO</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aquí se llenarán los datos de los alumnos -->
        </tbody>
    </table>
    <script src="js/agregarAlumno.js"></script>
</body>

</html>