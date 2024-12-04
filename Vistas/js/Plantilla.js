$(
    "#tablaempleados"
  ).on("click", ".editarEmpleado", function () {
    
    var idEmpleado = $(this).attr("idempleado");
    var datos = new FormData();
    datos.append("idEmpleado", idEmpleado);
    $.ajax({
        url: "Controladores/ajax.controlador.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            
            $("#idEmpleadoEditar").val(respuesta[0]["id"]);
            $("#NombreEmpleadoEditar").val(respuesta[0]["nombres"]);
            $("#ApellidoEmpleadoEditar").val(respuesta[0]["apellidos"]);
            $("#EdadEmpleadoEditar").val(respuesta[0]["edad"]);
            $("#FechaIngresoEmpleadoEditar").val(respuesta[0]["fecha_ingreso"]);
            $("#ComentariosDelEmpleadoEditar").val(respuesta[0]["comentarios"]);
            //para los select
            $('#selectid').val(respuesta[0]['genero_id']);
            $('#iddepartamentoselect').val(respuesta[0]['departamento_id']);
        }})
  })
  //eliminar
  $("#tablaempleados").on(
    "click",
    ".EliminarEmpleado",
    function () {
      var idempleado = $(this).attr("idempleado");
      swal
        .fire({
          title: "Seguro?",
          text: "¡Puede cancelar!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#ff7a17",
          cancelButtonColor: "#d33",
          cancelButtonText: "Cancelar",
          confirmButtonText: "Si, seguro!",
        })
        .then((result) => {
          if (result.value) {
            window.location =
              "index.php?idempleado=" +
              idempleado;
          }
        });
    }
  );