<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Graficos</title>
    <!-- Agrega la referencia a la biblioteca Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Agrega las referencias a las bibliotecas DataTables y jQuery -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
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
</head>
<body>
    <?php include('templates/navbar.php') ?>
    <div class="banner">
        Reporte de Graficos
    </div>
    <div class="row chart-container m-2 justify-content-center text-center">
        <div class="col-lg-8">
            <div class="card mx-auto border-3 shadow" style="width: 55rem;">
                <div class="card-body">
                    <h5 class="card-title">DETALLE DE PEDIDOS</h5>
                    <table id="pedidosTable" class="table display table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Tipo Cliente</th>
                                <th>Precio de Conjunto</th>
                                <th>Cantidad de Pedidos</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <!-- Agrega un elemento canvas donde se dibujará el gráfico de barras -->
                    <canvas id="graficoDetallesPedidos"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-8 mt-4">
            <div class="card mx-auto border-3 shadow" style="width: 55rem;">
                <div class="card-body">
                    <h5 class="card-title">GÉNERO DE TALLAS</h5>
                    <!-- Agrega un elemento canvas donde se dibujará el gráfico de pastel -->
                    <canvas id="graficoGenero"></canvas>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
