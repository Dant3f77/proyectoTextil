<?php

//require_once('core.php')
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
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <?php
    //require_once('templates/navbar.php')
    ?>
    <script>
        function validateLoginForm() {
            var username = document.getElementById('username').value;
            var password = document.getElementById('pass').value;

            if (username.trim() === '') {
                Swal.fire({
                    icon: "error",
                    title: "USUARIO INCORRECTO"
                });
                return false;
            }

            if (password.trim() === '') {
                Swal.fire({
                    icon: "error",
                    title: "CONTRASEÑA INCORRECTA"
                });
                return false;
            }

            return true;
        }
    </script>

    <section class="vh-100" style="background-color: #743F34;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="img/inversionesR.png" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form id="loginForm" action="core.php" method="post" onsubmit="return validateLoginForm();">

                                        <div class="d-flex align-items-center mb-2 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">CREACIONES ROBERT</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Ingresa tus Credenciales</h5>

                                        <div data-mdb-input-init class="form-outline mb-2">
                                            <input type="text" id="username" name="username" class="form-control form-control-lg " />
                                            <label class="form-label" for="username">Nombre de Usuario</label>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-2">
                                            <input type="password" id="pass" name="pass" class="form-control form-control-lg" />
                                            <label class="form-label" for="pass">Contraseña</label>
                                        </div>

                                        <div class="pt-1 mb-1">
                                            <input data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg btn-block" type="submit" type="button" value="Iniciar Sesión">
                                        </div>
                                        <?php if (isset($_GET['error'])) {
                                        echo "<p style='color:red;'>Invalid credentials</p>";
                                        } ?>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <?php include_once('templates/footer.php')  ?>