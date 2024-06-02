<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

<nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid">
    <!-- <a class="navbar-brand" href="#">Bienvenido  <?php echo $_SESSION['username']; ?></a>-->
    <h3 class="navbar-brand""> Bienvenido  <b class="text-warning"> <?php echo $_SESSION['username']; ?> </b></h3>
    <div>
    <a href="inicio.php" class="btn btn-success m-2"><i class="bi bi-house-door-fill"></i> Ir al Inicio</a> <!-- Opción para cerrar sesión -->
    <a href="logout.php" class="btn btn-danger m-2"><i class="bi bi-box-arrow-right Heading"></i> Cerrar sesión</a> <!-- Opción para cerrar sesión --></div>
    
  </div>
</nav>