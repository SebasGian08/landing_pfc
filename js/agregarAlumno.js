$(document).ready(function () {
  $("#agregar-alumno").on("submit", function (event) {
    event.preventDefault();

    $.ajax({
      type: "POST",
      url: "index.php?vista=agregarAlumno",
      data: $(this).serialize(),
      dataType: "json",
      success: function (response) {
        $("#resultado").html("<p>" + response.message + "</p>");
        if (response.success) {
          $("#tabla-alumnos tbody").append(
            "<tr><td>" +
              response.data.id +
              "</td><td>" +
              response.data.dni +
              "</td></tr>"
          );
        }
      },
      error: function () {
        $("#resultado").html("<p>Error en la solicitud.</p>");
      },
    });
  });

  // Cargar alumnos registrados al cargar la página
  $.ajax({
    type: "GET",
    url: "index.php?vista=obtenerAlumnos", // Ruta para obtener todos los alumnos
    dataType: "json",
    success: function (response) {
      if (response.success) {
        response.data.forEach(function (alumno) {
          $("#tabla-alumnos tbody").append(
            "<tr><td>" + alumno.id + "</td><td>" + alumno.dni + "</td></tr>"
          );
        });
      }
    },
    error: function () {
      $("#resultado").html("<p>Error al cargar los alumnos.</p>");
    },
  });
});
