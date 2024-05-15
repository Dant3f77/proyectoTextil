<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area de Pedidos</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/357aae614a.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include_once('../templates/header.php');

    session_start();
    include_once('../templates/navbar.php');
    $userName = $_SESSION['username'];

    // Verificar si el usuario está autenticado
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
        //echo "Bienvenido, " . $_SESSION['username'] . "!";
    } else {
        echo "No estás autorizado para ver esta página.";
    }
    ?>
    <div class="formulario">

        <div class="dimensiones">

            <form action="../Pedidos/Core_pedidos.php" method="post">
                <h1>Formulario de pedidos</h1>
                <i class="fa-solid fa-cart-plus" style="font-size: 100px; margin-top:20px"></i>

                <h3>Nombre del solicitante</h3>
                <input type="text" name="txtSolicitante" id="" required>
                <br>
                <h3>Tipo</h3>
                <input type="text" name="txtTipo" id="" required>
                <h3>
                    Fecha de entrega
                </h3>
                <input type="date" name="txtfecha" id="" required>
                <h3>
                    Telefono
                </h3>
                <input type="tel" name="txtTel" id="" required>
                <h3>
                    Descripcion
                </h3>
                <input type="text" name="txtDescripcion" id="" required>
                <h3>
                    Monto Total
                </h3>
                <input type="number" name="txtMonto" step="0.1" id="" required>
                <br>
                <input type="submit" value="Agregar Pedido" class="btn-generales" name="btn-encargo">
                
            </form>
            

        </div>
        
    </div>
    
    <b>
        <a href="./Core_pedidos.php" style="text-decoration: none;">
        <div class="icono-tabla">
        ver tabla de pedidos
        </div>
        </a>
    
    </b>
   
    
    

    <?php include_once('../templates/footer.php'); ?>
</body>

</html>