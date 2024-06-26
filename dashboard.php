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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard con Gráficos</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .chart-container {
            
            margin: auto;
        }

        .chart {
            padding: 20px;
        }
    </style>
    <style>
        .container {
            max-width: 100%;
        }

        .table-responsive {
            overflow-x: auto;
        }

        /* #empleadosTable_wrapper {
            width: 100%;
        }*/
    </style>





</head>

<body>
<script>
        $(document).ready(function() {
            var table = $('#pedidosTable').DataTable({
                searching: false
            });

            function cargarPedido() {
                $.ajax({
                    type: 'GET',
                    url: 'http://localhost:8080/api/pedidos',
                    dataType: 'json',
                    contentType: 'application/json',
                    success: function(response) {
                        // Limpiar la tabla antes de agregar los nuevos datos
                        table.clear();

                        // Arreglos para almacenar los nombres de los solicitantes y la cantidad de detalles de pedidos
                        var nombresSolicitantes = [];
                        var detallesPorPedido = [];

                        // Iterar sobre cada pedido
                        response.forEach(pedido => {
                            const countDetalles = pedido.detallesPedidoList.length;
                            detallesPorPedido.push(countDetalles); // Almacenar la cantidad de detalles de pedidos
                            nombresSolicitantes.push(pedido.nombreSolicitante); // Almacenar el nombre del solicitante
                            // Agregar una nueva fila a la tabla con la información del pedido
                            table.row.add([
                                pedido.nombreSolicitante,
                                pedido.tipo,
                                "$" + pedido.montoTotal,
                                countDetalles
                            ]).draw();
                        });

                        // Llamar a la función para dibujar el gráfico de barras con los datos obtenidos
                        dibujarGraficoBarras(nombresSolicitantes, detallesPorPedido);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            function cargarTodosLosClientes() {
                $.ajax({
                    type: 'GET',
                    url: 'http://localhost:8080/api/clientes',
                    dataType: 'json',
                    contentType: 'application/json',
                    success: function(clientes) {
                        var totalHombres = 0;
                        var totalMujeres = 0;

                        var peticiones = clientes.map(cliente => {
                            return new Promise((resolve, reject) => {
                                $.ajax({
                                    type: 'GET',
                                    url: `http://localhost:8080/api/clientes/${cliente.idCliente}/tallas`,
                                    dataType: 'json',
                                    contentType: 'application/json',
                                    success: function(tallas) {
                                        tallas.forEach(talla => {
                                            if (talla.genero === 'hombre') {
                                                totalHombres++;
                                            } else if (talla.genero === 'mujer') {
                                                totalMujeres++;
                                            }
                                        });
                                        resolve();
                                    },
                                    error: function(xhr, status, error) {
                                        console.error(xhr.responseText);
                                        reject();
                                    }
                                });
                            });
                        });

                        Promise.all(peticiones).then(() => {
                            dibujarGraficoPastel(totalHombres, totalMujeres);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            // Llamar a los métodos para cargar los datos cuando se cargue la página
            cargarPedido();
            cargarTodosLosClientes();

            // Función para dibujar el gráfico de barras
            function dibujarGraficoBarras(nombresSolicitantes, data) {
                var ctx = document.getElementById('graficoDetallesPedidos').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: nombresSolicitantes, // Nombres de los solicitantes
                        datasets: [{
                            label: 'Cantidad de Detalles de Pedidos',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1,
                            data: data // Cantidad de detalles de pedidos
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }

            // Función para dibujar el gráfico de pastel
            function dibujarGraficoPastel(hombres, mujeres) {
                var ctx = document.getElementById('graficoGenero').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ['Hombres', 'Mujeres'],
                        datasets: [{
                            label: 'Género',
                            backgroundColor: ['rgba(54, 162, 235, 0.2)', 'rgba(255, 99, 132, 0.2)'],
                            borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)'],
                            borderWidth: 1,
                            data: [hombres, mujeres]
                        }]
                    }
                });
            }
        });
    </script>



    <?php include('templates/navbar.php') ?>
    <div class="banner">
        Reporte de Graficos
    </div>
    <div class="row chart-container  m-2 justify-content-center text-center">
        <div class="col-lg-7">
            <div class="card mx-auto border-3 shadow" style="width: 55rem;">
                <div class="card-body">
                    <h5 class="card-title">DETALLE DE PEDIDOS</h5>
                    <table id="pedidosTable" class="table display table-hover table-striped table-bordered">
                        <thead>
                            <tr>

                                <th>Cliente</th>
                                <th>Tipo Cliente</th>
                                <th>Precio de Conjunto</th>
                                <th>Catidad de Pedidos</th>

                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="chart">
                <canvas id="graficoDetallesPedidos" width="2000" height="1000"></canvas>
            </div>
        </div>
    </div>

    <div class="row chart-container mt-5 justify-content-center">
        <div class="col-lg-4">
            <div class="chart mx-auto">
            <canvas id="graficoGenero"></canvas>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            var table = $('#osTable').DataTable({
                searching: false
            });

            function cargarPedido() {
                $.ajax({
                    type: 'GET',
                    url: 'http://localhost:8080/api/pedidos',
                    dataType: 'json',
                    contentType: 'application/json',
                    success: function(response) {
                        // Limpiar la tabla antes de agregar los nuevos datos
                        table.clear();

                        // Arreglos para almacenar los nombres de los solicitantes y la cantidad de detalles de pedidos
                        var nombresSolicitantes = [];
                        var detallesPorPedido = [];

                        // Iterar sobre cada pedido
                        response.forEach(pedido => {
                            const countDetalles = pedido.detallesPedidoList.length;
                            detallesPorPedido.push(countDetalles); // Almacenar la cantidad de detalles de pedidos
                            nombresSolicitantes.push(pedido.nombreSolicitante); // Almacenar el nombre del solicitante
                            // Agregar una nueva fila a la tabla con la información del pedido
                            
                        });

                        // Llamar a la función para dibujar el gráfico de barras con los datos obtenidos
                        dibujarGrafico(nombresSolicitantes, detallesPorPedido);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            // Llamar al método cargarPedido para cargar los pedidos cuando se cargue la página
            cargarPedido();

            // Función para dibujar el gráfico de barras
            function dibujarGrafico(nombresSolicitantes, data) {
                var ctx = document.getElementById('graficoDetallesPedidos').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: nombresSolicitantes, // Nombres de los solicitantes
                        datasets: [{
                            label: 'Cantidad de Detalles de Pedidos',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1,
                            data: data // Cantidad de detalles de pedidos
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            }
        });
    </script>
</body>

</html>