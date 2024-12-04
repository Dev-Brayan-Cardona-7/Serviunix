<?php
$mostrargeneros = ControladorPlantilla::ctrMostrarElementos("generos");
$mostrarDepartamentos = ControladorPlantilla::ctrMostrarElementos("departamento");
$mostrarEmpleados = ControladorPlantilla::ctrMostrarElementos("empleados")

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>
    <br>

    <div class="row">
        <div class="col-12">
            <center><div class="alert alert-info" role="alert">
            Bienvenido a la gestión de empleados
</div></center>
        </div>
        <div class="col-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Crear empleado
            </button>


        </div>
        <div class="col-9">
            <table class="table" id="tablaempleados">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Fecha Ingreso</th>
                        <th scope="col">Comentarios</th>
                        <th scope="col">Salario</th>
                        <th scope="col">Genero</th>
                        <th scope="col">Departamento</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (
                        $mostrarEmpleados as $key =>
                        $value
                    ) : ?>
                        <tr>
                            <td>
                                <?php echo $value['nombres'] ?>
                            </td>
                            <td>
                                <?php echo $value['apellidos'] ?>
                            </td>
                            <td>
                                <?php echo $value['edad'] ?>
                            </td>
                            <td>
                                <?php echo $value['fecha_ingreso'] ?>
                            </td>
                            <td>
                                <?php echo $value['comentarios'] ?>
                            </td>
                            <td>
                                <?php echo $value['salario'] ?>
                            </td>
                            <td>
                                <?php echo $value['genero_id'] ?>
                            </td>
                            <td>
                                <?php echo $value['departamento_id'] ?>
                            </td>
                            <td class="text-center">

                                <a class="btn btn-outline-warning btn-sm  rounded-circle editarEmpleado" data-bs-toggle="modal" data-bs-target="#editarEmpleado" data-toggle="modal" href="javascript:void(0);" idempleado="<?php echo $value['id'] ?>">editar
                                    <i class="far fa-edit">
                                    </i>
                                </a>
                                <a class="btn btn-outline-warning btn-sm  rounded-circle EliminarEmpleado" href="javascript:void(0);" idempleado="<?php echo $value['id'] ?>">eliminar
                                    <i class="far fa-edit">
                                    </i>
                                </a>


                            </td>
                        </tr>
                    <?php endforeach ?>
                    <?php
                        $borrarEmpleado = new ControladorPlantilla();
                        $borrarEmpleado->ctrBorrarEmpleado();
                        ?>
                </tbody>
            </table>
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="Vistas/js/Plantilla.js"></script>

    <!----------------------------formulario de crear empleado-------------------------->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Empleado</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form enctype="multipart/form-data" method="post" role="form">
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="NombreEmpleado" class="form-label">Nombre del empleado</label>
                            <input type="text" name="nombreEmpleado" class="form-control" id="NombreEmpleado" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="ApellidoEmpleado" class="form-label">Apellido del empleado</label>
                            <input type="text" name="ApellidoEmpleado" class="form-control" id="ApellidoEmpleado" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="EdadEmpleado" class="form-label">Edad del empleado</label>
                            <input type="number" name="EdadEmpleado" class="form-control" id="EdadEmpleado" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="FechaIngresoEmpleado" class="form-label">Fecha de ingreso del empleado</label>
                            <input type="date" name="FechaIngresoEmpleado" class="form-control" id="FechaIngresoEmpleado" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="ComentariosDelEmpleado" class="form-label">Comentarios sobre el empleado</label>
                            <textarea type="text" name="ComentariosDelEmpleado" class="form-control" id="ComentariosDelEmpleado"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="SalarioEmpleado" class="form-label">Salario del empleado</label>
                            <input type="number" name="SalarioEmpleado" class="form-control" id="SalarioEmpleado" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Seleeccione el genero</label>

                            <select name="genero" class="form-select" aria-label="Default select example">
                                <option value="null">Genero</option>
                                <?php foreach ($mostrargeneros as $key => $value): ?>
                                    <option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?></option>

                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Seleeccione el departamento</label>
                            <select name="departamento" class="form-select" aria-label="Default select example">
                                <option value="null">departamento</option>
                                <?php foreach ($mostrarDepartamentos as $key => $value): ?>
                                    <option value="<?php echo $value['id'] ?>"><?php echo $value['nombre_departamento'] ?></option>

                                <?php endforeach ?>
                            </select>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" name="CrearEmpleado" class="btn btn-primary">Guardar</button>
                    </div>

                    <?php
                    $crearUsuario = new ControladorPlantilla();
                    $crearUsuario->ctrCrearEmpleado();
                    ?>
                </form>
            </div>
        </div>
    </div>

    <!-------------------------------editar empleado-------------->
    <div class="modal fade" id="editarEmpleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Empleado</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form enctype="multipart/form-data" method="post" role="form">
                    <input type="text" name="idEmpleado" id="idEmpleadoEditar">
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="NombreEmpleadoEditar" class="form-label">Nombre del empleado</label>
                            <input type="text" name="nombreEmpleadoEditar" class="form-control" id="NombreEmpleadoEditar" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="ApellidoEmpleadoEditar" class="form-label">Apellido del empleado</label>
                            <input type="text" name="ApellidoEmpleadoEditar" class="form-control" id="ApellidoEmpleadoEditar" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="EdadEmpleadoEditar" class="form-label">Edad del empleado</label>
                            <input type="number" name="EdadEmpleadoEditar" class="form-control" id="EdadEmpleadoEditar" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="FechaIngresoEmpleadoEditar" class="form-label">Fecha de ingreso del empleado</label>
                            <input type="date" name="FechaIngresoEmpleadoEditar" class="form-control" id="FechaIngresoEmpleadoEditar" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="ComentariosDelEmpleadoEditar" class="form-label">Comentarios sobre el empleado</label>
                            <textarea type="text" name="ComentariosDelEmpleadoEditar" class="form-control" id="ComentariosDelEmpleadoEditar"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="SalarioEditar" class="form-label">Salario del empleado</label>
                            <input type="number" name="SalarioEditar" class="form-control" id="SalarioEditar" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Seleeccione el genero</label>
                            <div class="generoselect"></div>
                            <select name="generoEditar" id="selectid" class="form-select" aria-label="Default select example">
                                <option value="null">Genero</option>
                                <?php foreach ($mostrargeneros as $key => $value): ?>
                                    <option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?></option>

                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Seleeccione el departamento</label>
                            <select name="departamentoEditar" id="iddepartamentoselect" class="form-select" aria-label="Default select example">
                                <option value="null">departamento</option>
                                <?php foreach ($mostrarDepartamentos as $key => $value): ?>
                                    <option value="<?php echo $value['id'] ?>"><?php echo $value['nombre_departamento'] ?></option>

                                <?php endforeach ?>
                            </select>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" name="EditarEmpleado" class="btn btn-primary">Guardar edición</button>
                    </div>

                    <?php
                    $crearUsuario = new ControladorPlantilla();
                    $crearUsuario->ctrEditarEmpleado();
                    ?>
                </form>
            </div>
        </div>
    </div>
</body>

</html>