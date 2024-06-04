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
    <link rel="stylesheet" href="css/style.css">
    <style>
        .chart-container {
            width: 80%;
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
    <?php include('templates/navbar.php') ?>
    <div class="banner">
        Reporte de Graficos
    </div>
    <div class="row chart-container  m-2 justify-content-center text-center">
    <div class="col-lg-8">
        <div class="card mx-auto border-3 shadow" style="width: 55rem;">
            <div class="card-body">
                <h5 class="card-title">DETALLE DE PEDIDOS</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Cliente</th>
                            <th scope="col">Cantidad de Personas</th>
                            <th scope="col">Hombres</th>
                            <th scope="col">Mujeres</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>C.E. Republica de Corea</td>
                            <td>20</td>
                            <td>15</td>
                            <td>5</td>
                        </tr>
                        <tr>
                            <td>Empresa BioTech</td>
                            <td>20</td>
                            <td>15</td>
                            <td>5</td>
                        </tr>
                        <tr>
                            <!-- Additional rows if needed -->
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="chart">
             <canvas id="myChart" width="400" height="200"></canvas>
        </div>
    </div>
</div>
<div class="row chart-container mt-5 justify-content-center">
    <div class="col-lg-6">
        <div class="chart mx-auto">
            <canvas id="genderChart"></canvas>
        </div>
    </div>
</div>


    <script>
        // Función para obtener datos dinámicamente desde data.php
  /*      async function fetchData(url) {
            const response = await fetch(url);
            return response.json();
        }

        // Configurar el gráfico de géneros
        async function renderGenderChart() {
            const data = await fetchData('data.php?chart=gender');
            const ctx = document.getElementById('genderChart').getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'Pedidos por Género',
                        data: data.values,
                        backgroundColor: ['#36A2EB', '#FF6384']
                    }]
                }
            });
        }
*/


        // Configurar el gráfico barras
      async function fetchData() {
            try {
                const response = await fetch('data.php'); // Reemplaza con la ruta a tu script PHP
                const data = await response.json();
                console.log(data);
                return data;
                
            } catch (error) {
                console.error('Error al obtener los datos:', error);
            }
        }

        async function renderChart() {
            const data = await fetchData();

            if (data.error) {
                console.error(data.error);
                return;
            }

            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [data.nombreSolicitante],
                    datasets: [{
                        label: '# de Detalles de Pedido',
                        data: [data.cantidadDetallesPedido],
                        backgroundColor: ['#FFCE56', '#4BC0C0'],
                        borderColor: [
                            'rgba(75, 192, 192, 1)'
                        ],
                        borderWidth: 1
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

        renderChart();
      /*  async function renderPrendaChart() {
            const data = await fetchData('data.php?chart=prenda');
            const ctx = document.getElementById('prendaChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'Cantidad de Prendas por Perdido',
                        data: data.values,
                        backgroundColor: ['#FFCE56', '#4BC0C0']
                    }]
                }
            });
        }*/

        // Renderizar los gráficos
        /*renderGenderChart();
        renderPrendaChart();*/
    </script>

</body>

</html>