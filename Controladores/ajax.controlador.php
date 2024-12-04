<?php
require_once "../Modelos/plantilla.modelo.php";
class AjaxPlantilla
{


    public $idEmpleado;
    public function ajaxMostrarElementobyID()
    {

        $idEmpleado = $this->idEmpleado;
        $tabla = "empleados";




        $respuesta = ModeloPlantilla::mdlMostrarElementosConID($tabla, $idEmpleado);
        echo json_encode($respuesta);
    }
}

if (isset($_POST["idEmpleado"])) {
    $mostrarElementos                       = new AjaxPlantilla();
    $mostrarElementos->idEmpleado    = $_POST["idEmpleado"];
    $mostrarElementos->ajaxMostrarElementobyID();
}
