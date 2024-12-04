<?php
class ControladorPlantilla
{
    public static function ctrTraerPlatilla()
    {
        include "Vistas/plantilla.php";
    }
    public static function ctrMostrarElementos($tabla)
    {
        $respuesta = ModeloPlantilla::mdlMostrarElementos($tabla);
        return $respuesta;
    }


    public static function ctrCrearEmpleado()
    {
        if (isset($_POST["CrearEmpleado"])) {
            $tabla = "empleados";
            $datos = array(
                "nombres" => $_POST["nombreEmpleado"],
                "apellidos"                  => $_POST["ApellidoEmpleado"],
                "edad"                => $_POST['EdadEmpleado'],
                "fecha_ingreso"    => $_POST["FechaIngresoEmpleado"],
                "comentarios"             => $_POST["ComentariosDelEmpleado"],
                "salario"             => $_POST["SalarioEmpleado"],
                "genero_id"              => $_POST["genero"],
                "departamento_id"               => $_POST['departamento']
            );
            $respuesta = ModeloPlantilla::mdlIngresarDatas($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
    document.addEventListener("DOMContentLoaded", function() {
        Swal.fire({
            position: "top-end",
            toast: true,  
            icon: "success",
            title: "Empleado creado correctamente",
            showConfirmButton: false,
            timer: 1500,
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {
                window.location.href = window.location.pathname;
            }
        });
    });
</script>';
                # code...
            }
        }
    }

    public static function ctrEditarEmpleado()
    {
        if (isset($_POST["EditarEmpleado"])) {
            $tabla = "empleados";
            $where = 'id= ' . $_POST["idEmpleado"];
            $datos = array(
                "nombres" => $_POST["nombreEmpleadoEditar"],
                "apellidos"                  => $_POST["ApellidoEmpleadoEditar"],
                "edad"                => $_POST['EdadEmpleadoEditar'],
                "fecha_ingreso"    => $_POST["FechaIngresoEmpleadoEditar"],
                "comentarios"             => $_POST["ComentariosDelEmpleadoEditar"],
                "salario"             => $_POST["SalarioEditar"],
                "genero_id"              => $_POST["generoEditar"],
                "departamento_id"               => $_POST['departamentoEditar']
            );
            $respuesta = ModeloPlantilla::mdlActualizarDatas($tabla, $datos, $where);
            if ($respuesta == "ok") {
                echo '<script>
    document.addEventListener("DOMContentLoaded", function() {
        Swal.fire({
            position: "top-end",
            toast: true,  
            icon: "success",
            title: "empleado editado correctamente",
            showConfirmButton: false,
            timer: 1500,
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {
                window.location.href = window.location.pathname;
            }
        });
    });
</script>';
                # code...
            }
        }
    }

    public static function ctrBorrarEmpleado()
    {
        if (isset($_GET["idempleado"])) {
            $tabla = "empleados";
            $datos = $_GET["idempleado"];
            $respuesta = ModeloPlantilla::mdlBorrarEmpleado($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
    document.addEventListener("DOMContentLoaded", function() {
        Swal.fire({
            position: "top-end",
            toast: true,  
            icon: "success",
            title: "Empleado eliminado correctamente",
            showConfirmButton: false,
            timer: 1500,
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {
                window.location.href = window.location.pathname;
            }
        });
    });
</script>';
            }
        }
    }
}
