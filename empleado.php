<?php
include_once('templates/header.php');
include('templates/navbar.php')
?>

<style>
.banner {
    background-color: #5F3128; /* Color de fondo del banner */
    color: white;             /* Color del texto */
    text-align: center;       /* Centrar el texto */
    padding: 15px 0;          /* Espaciado interno del banner */
    font-size: 24px;          /* Tamaño del texto */
    font-weight: bold;        /* Negrita */
}
</style>

    <div class="banner">
        REGISTRO DE USUARIO
    </div>

<div class="container m-2">
    <div class="row">
        <div class="col-3">
            <div class="card shadow justify-content-center align-items-center" style="width: 20rem;">
                <img src="/img/user.png" class="card-img-top " alt="error" style="width: 115px; height: 115px; ">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <h5 class="card-title">*REGISTRO DE EMPLEADOS*</h5>
                        <form class="form-horizontal">
                            <!-- Primera fila de 3 inputs -->
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="form-row">

                                        <div class="form-group col-md-12 mb-2">
                                            <label for="nombre_empleado">Nombre Empleado</label>
                                            <input type="text" class="form-control" id="nombre_empleado" placeholder="Nombre Empleado">
                                        </div>
                                        <div class="form-group col-md-12 mb-2">
                                            <label for="DUI">DUI</label>
                                            <input type="text" class="form-control" id="DUI" placeholder="DUI">
                                        </div>
                                    </div>

                                    <!-- Segunda fila de 3 inputs -->
                                    <div class="form-row">
                                        <div class="form-group col-md-12 mb-2">
                                            <label for="tipo_rol">Tipo Rol</label>
                                            <input type="text" class="form-control" id="tipo_rol" placeholder="Tipo Rol">
                                        </div>
                                        <div class="form-group col-md-12 mb-2">
                                            <label for="fecha">Fecha</label>
                                            <input type="date" class="form-control" id="fecha">
                                        </div>
                                        <div class="form-group col-md-12 mb-2">
                                            <label for="telefono">Teléfono</label>
                                            <input type="tel" class="form-control" id="telefono" placeholder="Teléfono">
                                        </div>
                                    </div>

                                    <!-- Fila para dirección -->
                                    <div class="form-row">
                                        <div class="form-group col-md-12 mb-2">
                                            <label for="direccion">Dirección</label>
                                            <input type="text" class="form-control" id="direccion" placeholder="Dirección">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12 mb-2">
                                            <label for="direccion">nick</label>
                                            <input type="text" class="form-control" id="nick" placeholder="nick">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12 mb-2">
                                            <label for="direccion">Contraseña</label>
                                            <input type="text" class="form-control" id="pass" placeholder="Contraseña">
                                        </div>
                                    </div>

                                    <!-- Botón de enviar -->
                                    <div class="form-row ">
                                        <div class="form-group col-md-12">
                                            <button type="submit" class="btn btn-primary">Enviar</button>
                                        </div>
                                    </div>
                        </form>
                        </li>
                    </ul>
                </div>
            </div> <!-- fin de card -->
        </div><!-- fin de col -->
        <div class="col-9">
        <div class="m-2">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        
                        <th>Nombre Empleado</th>
                        <th>DUI</th>
                        <th>Tipo Rol</th>
                        <th>Fecha</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Datos de ejemplo -->
                    <tr>
                        
                        <td>Juan Pésssssssrez</td>
                        <td>12345sss678-9</td>
                        <td>Adsssssssn</td>
                        <td>2024-ssss-28</td>
                        <td>1234-5678</td>
                        <td>San Salvsssdor</td>
                        <td>editar - eliminar</td>

                    </tr>
                    <!-- Más filas de datos pueden ir aquí -->
                </tbody>
            </table>
        </div>      <!-- div table -->
        </div>
    </div><!-- fin de row -->
</div><!-- fin de container -->


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>


<?php
include_once('templates/footer.php')
?>