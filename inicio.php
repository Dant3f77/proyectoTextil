<?php
include_once('templates/header.php');

session_start();
include_once('templates/navbar.php');
$userName = $_SESSION['username'];

// Verificar si el usuario está autenticado
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
    //echo "Bienvenido, " . $_SESSION['username'] . "!";
} else {
    echo "No estás autorizado para ver esta página.";
}
?>

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
                <a href="">
                <img src="img/administrarCliente.png" class="card-img-top" alt="...">
                </a>
            </div>
        </div>

        <div class="col-4 ">
            <div class="card text-center shadow " style="width: 15rem;">
                <h4 class="card-title text-primary">Administrar Pedido</h4>
                <a href="">
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
                <h4 class="card-title text-primary">Administrar Usuario</h4>
                <a href="">
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
