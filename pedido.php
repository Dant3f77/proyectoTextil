<?php
session_start();

$userName = $_SESSION['username'];
$pass = $_SESSION['pass'];

// Verificar si el usuario está autenticado
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
    //echo "Bienvenido, " . $_SESSION['username'] . "!";
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
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .container {
            max-width: 100%;
        }

        .table-responsive {
            overflow-x: auto;
        }

        #pedidosTable_wrapper {
            width: 100%;
        }
    </style>
</head>
<?php include('templates/navbar.php') ?>

<body>
    <div class="banner">
        PRE -REGISTRO DE TALLAS
    </div>
    <div class="container mt-2 mb-3 d-flex flex-column justify-content-center align-items-center">
        <div class="row w-100">
            <div class="col-md-3 d-flex justify-content-center">
                <div class="card shadow" style="width: 20rem;">
                    <img src="img/prePedido.png" class="card-img-top mt-1" alt="error" style="width: 115px; height: 130px; margin: auto;">
                    <div class="card-body">
                        <h5 class="card-title text-center">*REGISTRO DE PEDIDO*</h5>
                        <form id="form-pedido" class="form-horizontal" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-12 mb-2">
                                    <label for="empleado">Empleado</label>
                                    <input type="text" class="form-control" id="empleado" name="empleado" placeholder="empleado" required>
                                </div>
                                <div class="form-group col-md-12 mb-2">
                                    <label for="nombreSolicitante">Cliente</label>
                                    <input type="text" class="form-control" id="nombreSolicitante" name="nombreSolicitante" placeholder="Cliente" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 mb-2">
                                    <label for="tipo">Tipo Cliente</label>
                                    <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Tipo" required>
                                </div>
                                <div class="form-group col-md-12 mb-2">
                                    <label for="fechaDeEntrega">Fecha de Entrega</label>
                                    <input type="date" class="form-control" id="fechaDeEntrega" name="fechaDeEntrega" required>
                                </div>
                                <div class="form-group col-md-12 mb-2">
                                    <label for="telefono">Teléfono</label>
                                    <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 mb-2">
                                    <label for="descripcion">Nota</label>
                                    <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Nota"></textarea>
                                </div>
                            </div>
                            <div class="form-group col-md-12 mb-2">
                                    <label for="">Precio de Conjunto</label>
                                    <input type="number" class="form-control" id="montoTotal" name="montoTotal" placeholder="Monto de Conjunto $$$$" required>
                                </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 text-end col-md-12">
                                    <button type="submit" class="btn btn-primary shadow-sm">
                                        <i class="bi bi-person-fill-add"></i> Agregar Pedido
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> <!-- fin de card -->
            </div><!-- fin de col -->
            <div class="col-md-9">
                <div class="table-responsive m-2">
                    <table id="pedidosTable" class="table display table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Empleado</th>
                                <th>Cliente</th>
                                <th>Tipo Cliente</th>
                                <th>Teléfono</th>
                                <th>Precio de Conjunto</th>
                                <th>Fecha de Entrega</th>
                                <th>Nota</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Filas de datos irán aquí -->
                        </tbody>
                    </table>
                </div> <!-- div table -->
            </div>
        </div><!-- fin de row -->
    </div><!-- fin de container -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            // Inicializa DataTable
            var table = $('#pedidosTable').DataTable();

    // Método para mostrar empleados
    function cargarPedido() {
        $.ajax({
            type: 'GET',
            url: 'http://localhost:8080/api/pedidos', 
            dataType: 'json',
            contentType: 'application/json', 
            success: function(response) {
                console.log(response);
                table.clear(); // Limpia la tabla antes de agregar los nuevos datos

                // Recorre el arreglo
                response.forEach(data => {
                    // Formatea la fecha
                    var fecha = new Date(data.fechaDeEntrega);
                    var dia = String(fecha.getDate()).padStart(2, '0');
                    var mes = String(fecha.getMonth() + 1).padStart(2, '0');
                    var anio = fecha.getFullYear();
                    var fechaFormateada = `${dia}-${mes}-${anio}`;

                    // Agrega la nueva fila a la DataTable
                    table.row.add([
                        data.empleado.idEmpleado,
                        data.nombreSolicitante,
                        data.tipo,
                        data.telefono,
                        data.montoTotal,
                        fechaFormateada,
                        data.descripcion,
                        '<button class="btn btn-warning m-2 btn-sm"><i class="bi bi-pencil-square"></i></button>' + 
                        '<button class="btn m-2 btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>'
                    ]).draw(false);
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error en la solicitud AJAX NO MUESTRA PEDIDO: ' + textStatus);
            }
        });
    }

    // Carga inicial de empleados
    cargarPedido();

    // Método para agregar un nuevo empleado
    $('#form-pedido').on('submit', function(e) {
        e.preventDefault(); // Evita el envío normal del formulario

        const formData = $(this).serializeArray();
        const datos = {};
        formData.forEach(item => {
            datos[item.name] = item.value;
        });

        $.ajax({
            type: 'POST',
            url: 'http://localhost:8080/api/pedidos', 
            data: JSON.stringify(datos), // Serializa los datos del formulario
            dataType: 'json',
            contentType: 'application/json', 
            success: function(response) {
                console.log('holamundo');
                console.log( response);

                // Formatea la fecha
                var fecha = new Date(response.fechaDeEntrega);
                var dia = String(fecha.getDate()).padStart(2, '0');
                var mes = String(fecha.getMonth() + 1).padStart(2, '0');
                var anio = fecha.getFullYear();
                var fechaFormateada = `${dia}-${mes}-${anio}`;

                // Muestra la alerta de éxito
                Swal.fire({
                    title: "Pedido Registrado",
                    text: "Del cliente: " + response.nombreSolicitante + "       Creado por Nick: " + response.empleado.idEmpleado,
                    icon: "success"
                });

                // Agrega el nuevo empleado a la tabla
                table.row.add([
                    response.empleado,
                    response.descripcion,
                    fechaFormateada,
                    response.montoTotal,
                    response.nombreSolicitante,
                    response.tipo,
                    response.telefono,
                    '<button class="btn btn-warning m-2 btn-sm"><i class="bi bi-pencil-square"></i></button>' + 
                    '<button class="btn m-2 btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>'
                ]).draw(false);

                // Limpia el formulario
                $('#form-pedido')[0].reset();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error en la solicitud AJAX: ' + textStatus);
            }
        });
    });
});
    </script>
    <?php include_once('templates/footer.php') ?>