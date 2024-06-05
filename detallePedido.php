<?php


session_start();
// Verificar si el usuario está autenticado
if (isset($_SESSION['user'])) {
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

    <div class="container  ">
        <div class="row ">

            <div class="table-responsive ">
                <div class="banner ">
                    PEDIDO
                </div>
                <table id="pedido-detalle" class="table mb-2 display table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID Pedido</th>
                            <th>Nombre Solicitante</th>
                            <th>Tipo</th>
                            <th>Teléfono</th>
                            <th>Monto Total</th>
                            <th>Fecha de Entrega</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div class="banner ">
                    DETALLE PEDIDO
                </div>
                <table id="detalles-pedido" class="table display table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID Detalle Pedido</th>
                            <th>Monto</th>
                            <th>Fecha de Toma de Talla</th>
                            <th>Cliente</th>
                            <th>Identificación</th>
                            <th>Teléfono</th>
                            <th>Edad</th>
                            <th>Método de Pago</th>
                            <th>Asignar Talla</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div> <!-- div table -->

        </div><!-- fin de row -->
    </div><!-- fin de container -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Título del Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe id="modal-iframe" src="" style="width: 100%; height: 800px; border: none;"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Incluye Bootstrap JS y Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>





    <script>
        // Función para cargar la página PHP en el iframe
        document.getElementById('myModal').addEventListener('show.bs.modal', function() {
            document.getElementById('modal-iframe').src = 'tomaTalla.php';
        });

        function redirigirPedido() {
            window.location.href = 'pedido.php';
        }

        $(document).ready(function() {
            // Inicializa DataTable
            var table = $('#pedido-detalle').DataTable();
            var detallesTable = $('#detalles-pedido').DataTable();

            var params = new URLSearchParams(window.location.search);
            var idPedido = params.get('id');

            $.ajax({
                type: 'GET',
                url: `http://localhost:8080/api/pedidos/${idPedido}`,
                dataType: 'json',
                contentType: 'application/json',
                success: function(response) {
                    var fecha = new Date(response.fechaDeEntrega);
                    var dia = String(fecha.getDate()).padStart(2, '0');
                    var mes = String(fecha.getMonth() + 1).padStart(2, '0');
                    var anio = fecha.getFullYear();
                    var fechaFormateada = `${dia}-${mes}-${anio}`;

                    table.row.add([
                        response.idPedido,
                        response.nombreSolicitante,
                        response.tipo,
                        response.telefono,
                        "$" + response.montoTotal,
                        fechaFormateada,
                        response.descripcion,
                        '<button  onclick="redirigirPedido()" type="button" class="btn btn-primary" ><i class="bi bi-box-arrow-left"></i> Regresar a Pedido </button>'
                    ]).draw(false);

                    response.detallesPedidoList.forEach(detalle => {
                        var fechaTalla = new Date(detalle.fechaDeTomaDeTalla);
                        var diaTalla = String(fechaTalla.getDate()).padStart(2, '0');
                        var mesTalla = String(fechaTalla.getMonth() + 1).padStart(2, '0');
                        var anioTalla = fechaTalla.getFullYear();
                        var fechaTallaFormateada = `${diaTalla}-${mesTalla}-${anioTalla}`;

                        var metodoPago = detalle.cliente.metodoPago.efectivo ? 'Efectivo' : 'Tarjeta';

                        detallesTable.row.add([
                            detalle.idDetallePedido,
                            "$" + detalle.monto,
                            fechaTallaFormateada,
                            detalle.cliente.nombres,
                            detalle.cliente.identificacion,
                            detalle.cliente.telefono,
                            detalle.cliente.edad,
                            metodoPago,
                            '<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal"> <i class="bi bi-clipboard-check"></i> Asignar Talla </button>'
                        ]).draw(false);
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error en la solicitud AJAX: ' + textStatus);
                }
            });

            // Carga inicial de empleados
            /*  cargarDetallePedido();

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
                          console.log(response);

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
              });*/
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?php
    include_once('templates/footer.php');
    ?>