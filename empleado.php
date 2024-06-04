<?php


session_start();

// Verificar si el usuario está autenticado
if (isset($_SESSION['user']) ) {
    //echo "Bienvenido, " . $_SESSION['username'] . "!";
    $user = $_SESSION['user']['tipoRol'];
} else {
    header("Location: error.php");
}
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Confecciones Robert</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> <!-- Versión completa de jQuery -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <?php include('templates/navbar.php') ?>

    <style>
        .container {
            max-width: 100%;
        }

        .table-responsive {
            overflow-x: auto;
        }

        #empleadosTable_wrapper {
            width: 100%;
        }
    </style>



    <div class="banner">
        REGISTRO DE EMPLEADO
    </div>
    <div class="container mt-2 mb-3 d-flex flex-column justify-content-center align-items-center">
        <div class="row w-100">
            <div class="col-md-3 d-flex justify-content-center">
                <div class="card shadow" style="width: 20rem;">
                    <img src="img/user.png" class="card-img-top" alt="error" style="width: 115px; height: 115px; margin: auto;">
                    <div class="card-body">
                        <h5 class="card-title text-center">*REGISTRO DE EMPLEADO*</h5>
                        <form id="form-empleado" class="form-horizontal" method="POST">

                            <div class="form-row">
                                <div class="form-group col-md-12 mb-2">
                                    <label for="nombre_empleado">Nombre Empleado</label>
                                    <input type="text" class="form-control" id="nombreEmpleado" name="nombreEmpleado" placeholder="Nombre Empleado" required>
                                </div>
                                <div class="form-group col-md-12 mb-2">
                                    <label for="dui">DUI</label>
                                    <input type="text" class="form-control" id="dui" name="dui" placeholder="DUI" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 mb-2">
                                    <label for="tipo_rol">Tipo Rol</label>
                                    <input type="text" class="form-control" id="tipo_rol" name="tipoRol" placeholder="Tipo Rol" required>
                                </div>
                                <div class="form-group col-md-12 mb-2">
                                    <label for="fecha">Fecha</label>
                                    <input type="date" class="form-control" id="fecha" name="fecha" required>
                                </div>
                                <div class="form-group col-md-12 mb-2">
                                    <label for="telefono">Teléfono</label>
                                    <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 mb-2">
                                    <label for="direccion">Dirección</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 mb-2">
                                    <label for="nick">Nick</label>
                                    <input type="text" class="form-control" id="nick" name="nick" placeholder="Nick" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 mb-2">
                                    <label for="pass">Contraseña</label>
                                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 text-end col-md-12">
                                    <button type="submit" class="btn btn-primary shadow-sm">
                                        <i class="bi bi-person-fill-add"></i> Agregar Usuario
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> <!-- fin de card -->
            </div><!-- fin de col -->
            <div class="col-md-9">
                <div class="table-responsive m-2">
                    <table id="empleadosTable" class="table display table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nombre Empleado</th>
                                <th>DUI</th>
                                <th>Tipo Rol</th>
                                <th>Fecha</th>
                                <th>Teléfono</th>
                                <th>Dirección</th>
                                <th>Nick</th>
                                <th>Contraseña</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí se agregarán dinámicamente las filas -->
                        </tbody>
                    </table>
                </div> <!-- div table -->
            </div>
        </div><!-- fin de row -->
    </div><!-- fin de container -->


    <script>
        $(document).ready(function() {
    // Inicializa DataTable
    var table = $('#empleadosTable').DataTable();

    // Método para mostrar empleados
    function cargarEmpleados() {
        $.ajax({
            type: 'GET',
            url: 'http://localhost:8080/api/empleados', 
            dataType: 'json',
            contentType: 'application/json', 
            success: function(response) {
                console.log(response);
                table.clear(); // Limpia la tabla antes de agregar los nuevos datos

                // Recorre el arreglo
                response.forEach(data => {
                    // Formatea la fecha
                    var fecha = new Date(data.fecha);
                    var dia = String(fecha.getDate()).padStart(2, '0');
                    var mes = String(fecha.getMonth() + 1).padStart(2, '0');
                    var anio = fecha.getFullYear();
                    var fechaFormateada = `${dia}-${mes}-${anio}`;

                    // Agrega la nueva fila a la DataTable
                    table.row.add([
                        data.nombreEmpleado,
                        data.dui,
                        data.tipoRol,
                        fechaFormateada,
                        data.telefono,
                        data.direccion,
                        data.nick,
                        data.pass, 
                        '<button class="btn btn-warning m-2 btn-sm"><i class="bi bi-pencil-square"></i></button>' + 
                        '<button class="btn m-2 btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>'
                    ]).draw(false);
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error en la solicitud AJAX: ' + textStatus);
            }
        });
    }

    // Carga inicial de empleados
    cargarEmpleados();

    // Método para agregar un nuevo empleado
    $('#form-empleado').on('submit', function(e) {
        e.preventDefault(); // Evita el envío normal del formulario

        const formData = $(this).serializeArray();
        const datos = {};
        formData.forEach(item => {
            datos[item.name] = item.value;
        });

        $.ajax({
            type: 'POST',
            url: 'http://localhost:8080/api/empleados', 
            data: JSON.stringify(datos), // Serializa los datos del formulario
            dataType: 'json',
            contentType: 'application/json', 
            success: function(response) {
                console.log( response);

                // Formatea la fecha
                var fecha = new Date(response.fecha);
                var dia = String(fecha.getDate()).padStart(2, '0');
                var mes = String(fecha.getMonth() + 1).padStart(2, '0');
                var anio = fecha.getFullYear();
                var fechaFormateada = `${dia}-${mes}-${anio}`;

                // Muestra la alerta de éxito
                Swal.fire({
                    title: "Empleado Registrado",
                    text: "Nombre: " + response.nombreEmpleado + "        Nick: " + response.nick,
                    icon: "success"
                });

                // Agrega el nuevo empleado a la tabla
                table.row.add([
                    response.nombreEmpleado,
                    response.dui,
                    response.tipoRol,
                    fechaFormateada,
                    response.telefono,
                    response.direccion,
                    response.nick,
                    response.pass,
                    '<button class="btn btn-warning m-2 btn-sm"><i class="bi bi-pencil-square"></i></button>' + 
                    '<button class="btn m-2 btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>'
                ]).draw(false);

                // Limpia el formulario
                $('#form-empleado')[0].reset();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error en la solicitud AJAX: ' + textStatus);
            }
        });
    });
});

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?php
    include_once('templates/footer.php');
    ?>