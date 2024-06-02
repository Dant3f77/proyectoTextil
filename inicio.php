<?php


session_start();

$userName = $_SESSION['username'];
$pass = $_SESSION['pass'] ;

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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <?php include('templates/navbar.php') ?>


<div class="container">
    <div class="row m-5">

        <div class="col-4 ">
            <div class="card text-center shadow " style="width: 15rem;">
                <h4 class="card-title text-primary">Crear Pedido</h4>
                <a href="pedido.php">
                <img src="img/pedido.png" class="card-img-top" alt="...">
                </a>
            </div>
        </div>

       
        <div class="col-4 ">
            <div class="card text-center shadow " style="width: 15rem;">
                <h4 class="card-title text-primary">Administrar Cliente</h4>
                <a href="tomatalla.php">
                <img src="img/administrarCliente.png" class="card-img-top" alt="...">
                </a>
            </div>
        </div>

        <div class="col-4 ">
            <div class="card text-center shadow " style="width: 15rem;">
                <h4 class="card-title text-primary">Administrar Pedido</h4>
                <a href="pedido.php">
                <img src="img/editarPedido.png" class="card-img-top" alt="...">
                </a>
            </div>
        </div>


    </div>
<?php 
if ($userName == "jefe" || $userName == "admin" )
{
?>
    <div class="row m-5">

        <div class="col-4 ">
            <div class="card text-center shadow " style="width: 15rem;">
                <h4 class="card-title text-primary">Graficos</h4>
                <a href="">
                <img src="img/graficos.png" class="card-img-top" alt="...">
                </a>
            </div>
        </div>
        <div class="col-4 ">
            <div class="card text-center shadow " style="width: 15rem;">
                <h4 class="card-title text-primary">Generar Reportes</h4>
                <a href="">
                <img src="img/reporte.png" class="card-img-top" alt="...">
                </a>
            </div>
        </div>
        <div class="col-4 ">
            <div class="card text-center shadow " style="width: 15rem;">
                <h4 class="card-title text-primary">Administrar Empleado</h4>
                <a href="empleado.php">
                <img src="img/administrarUsuario.png" class="card-img-top" alt="...">
                </a>
            </div>
        </div>


    </div>

    <?php 
        }
    ?>
</div>


<?php include_once('templates/footer.php');
