<?php
include_once('templates/header.php');
require_once('core.php')
?>


<script>
    function validateLoginForm() {
        var username = document.getElementById('username').value;
        var password = document.getElementById('pass').value;

        if (username.trim() === '') {
            Swal.fire({
                icon: "error",
                title: "USUARIO INCORRECTO",
                //text: "Usuario incorrecto",
                //footer: '<a href="#">Why do I have this issue?</a>'
            });
            return false;
        }

        if (password.trim() === '') {
            Swal.fire({
                icon: "error",
                title: "CONTRASEÑA INCORRECTA",
                //text: "Usuario incorrecto",
                //footer: '<a href="#">Why do I have this issue?</a>'
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

                                <form action="core.php" method="post" onsubmit="return validateLoginForm();">

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
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col">

        </div>
    </div>
</div>


<?php include_once('templates/footer.php')  ?>