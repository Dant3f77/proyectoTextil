<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formulario Empleado</title>
    <!-- Incluye jQuery y DataTables CSS/JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> <!-- Versión completa de jQuery -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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
    
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<style>
.hidden {
    display: none;
}
</style>
<?php

//session_start();

if (isset($_SESSION['solicitante'])) {
    $solicitante = htmlspecialchars($_SESSION['solicitante']); // Obtener y sanitizar el valor de la sesión
} else {
    $solicitante = "No se recibió ningún solicitante.";
}


//include_once('templates/navbar.php');
//$userName = $_SESSION['username'];

// Verificar si el usuario está autenticado
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
    //echo "Bienvenido, " . $_SESSION['username'] . "!";
} else {
    echo "No estás autorizado para ver esta página.";
}
?>


<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    
<div class="banner">
    TOMA DE TALLAS
</div>

<div class="container mt-5 mb-3 ">
    <h3 class="text-success">SELECCIONE TIPO DE PIEZA Y TALLAS DE <b><?php echo $solicitante; ?></b></h3>
    <br>
    <div class="row">
        <div class="col-12 col-md-4" >
            <img src="img/inversionesR.png" id="imgRobert" alt="" style="height: 600px; width: 400px;" class="">
            <img src="img/camisa.png" id="imgCamisa" alt="" style="height: 600px; width: 400px;" class="hidden">
            <img src="img/blusa.png" id="imgBlusa" alt="" style="height: 600px; width: 400px;" class="hidden">
            <img src="img/pantalon.png" id="imgPantalon" alt="" style="height: 600px; width: 400px;" class="hidden">
            <img src="img/falda.png" id="imgFalda" alt="" style="height: 600px; width: 400px;" class="hidden">
        </div>

        <div class="col-12 col-md-8">

            <br>
            
            <form id="form-tallas" action="core.php" method="POST">
            <div class="mb-3">
                    <select class="form-select nombreCliente" aria-label="Default select example" id="nombreCliente">
                        <option selected>Cliente</option>
                        <option value="cl1">Daysi Santamaria</option>
                        <option value="cl2">Rogelio Torres</option>
                        <option value="cl3">Rogelio Torres</option>

                    </select>
                    <h4 class="text-danger"> <b><?php echo $solicitante; ?> </b></h4>


                </div>

                <div class="mb-3">
                    <select class="form-select tipoSexo" aria-label="Default select example" name="tipoSexo" id="tipoSexo">
                        <option selected>Seleccione el Sexo</option>
                        <option value="mujer">Mujer</option>
                        <option value="hombre">Hombre</option>
                    </select>
                </div>
                <div class="mb-3">
                    <select class="form-select tipoHombre" aria-label="Default select example" id="tipoHombre">
                        <option selected>Tipo de Prenda</option>
                        <option value="camisaVestir">Camisa de Vestir</option>
                        <option value="camisaPolo">Camisa tipo Polo</option>
                        <option value="pantalonVestir">Pantalon de Vestir</option>
                        <option value="pantalonJeans">Pantalon tipo Jeans</option>
                    </select>
                    <select class="form-select tipoMujer mt-3" aria-label="Default select example" id="tipoMujer">
                        <option selected>Tipo de Prenda</option>
                        <option value="falda">falda</option>
                        <option value="blusaVestir">Blusa de Vestir</option>
                        <option value="blusaPolo">Blusa tipo Polo</option>
                        <option value="pantalonVestir">Pantalon de Vestir</option>
                        <option value="pantalonJeans">Pantalon tipo Jeans</option>
                    </select>
                </div>
                
                <!-- CAMISA O BLUSA -->
                <div class="row mb- col-12 col-md-12" id="camisa">
                <h5>Medida camisa</h5>
                    <div class="mb-3 col-12 col-md-4">
                        <label for="camisaLargo" class="form-label">Largo</label>
                        <input type="text" class="form-control camisaLargo" id="camisaLargo" aria-describedby="">
                    </div>
                    <div class="mb-3 col-12 col-md-4">
                        <label for="camisaHombro" class="form-label">Hombro</label>
                        <input type="text" class="form-control camisaHombro" id="camisaHombro" aria-describedby="">
                    </div>
                    <div class="mb-3 col-12 col-md-4">
                        <label for="camisaBusto" id="labelCamisaBusto" class="form-label">Busto</label>
                        <input type="text" class="form-control camisaBusto" id="camisaBusto" aria-describedby="">
                    </div>
                </div>

                <!-- PANTALON o FALDA -->
                <div class="row mb- col-12 col-md-12" id="pantalon">
                    <h5 id="textPantalon">Medida Pantalon</h5>
                    <div class="mb-3 col-12 col-md-4">
                        <label for="PantalonLargo" class="form-label">Largo</label>
                        <input type="text" class="form-control pantalonLargo" id="pantalonLargo" aria-describedby="">
                    </div>
                    <div class="mb-3 col-12 col-md-4">
                        <label for="pantalonCintura" class="form-label">Cintura</label>
                        <input type="text" class="form-control pantalonCintura" id="pantalonCintura" aria-describedby="">
                    </div>
                    <div class="mb-3 col-12 col-md-4">
                        <label for="pantalonCadera" id="labelCamisaBusto" class="form-label">Cadera</label>
                        <input type="text" class="form-control pantalonCadera" id="pantalonCadera" aria-describedby="">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" >Registar Tallas</button>
            </form>

            

        </div>
    </div>
    <div class="row">
    <div class="table-responsive m-2">
                    <table id="tallasTable" class="display table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Sexo</th>
                                <th>Tipo Prenda Hombre</th>
                                <th>Tipo Prenda Mujer</th>
                                <th>Largo </th>
                                <th>Hombro</th>
                                <th>Busto</th>
                                <th>Largo</th>
                                <th>Cintura</th>
                                <th>Cadera</th>
                                <th>Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            
                            <!-- Aquí se agregarán las filas -->
                        </tbody>
                    </table>
                </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    /** FUNCION DE SELECT PARA GENERO DE SEXO */
    document.getElementById('tipoSexo').addEventListener('change', function() {
        var tipoHombre = document.getElementById('tipoHombre');
        var tipoMujer = document.getElementById('tipoMujer');
        var camisaBusto = document.getElementById('camisaBusto');
        var labelCamisaBusto = document.getElementById('labelCamisaBusto');

        if (this.value === 'mujer') {
            tipoHombre.style.display = 'none';
            tipoMujer.style.display = 'block';
            camisaBusto.style.display = 'block';
            labelCamisaBusto.style.display = 'block';
            
        } else if (this.value === 'hombre') {
            tipoMujer.style.display = 'none';
            camisaBusto.style.display = 'none';
            labelCamisaBusto.style.display = 'none';
            tipoHombre.style.display = 'block';
            
        } else {
            tipoHombre.style.display = 'none';
            tipoMujer.style.display = 'none';
        }
    });

     /** FUNCION DE SELECT PARA TIPO DE PRENDA HOMBRE*/
     document.getElementById('tipoHombre').addEventListener('change', function() {
        var pantalon = document.getElementById('pantalon');
        var camisa = document.getElementById('camisa');
        var pantalonVestir = document.getElementById('pantalonVestir');
        var pantalonJeans = document.getElementById('pantalonJeans');
        

        if (this.value === 'camisaVestir' || this.value === 'camisaPolo' ) {
            textPantalon.textContent = 'Medida Camisa';           
            pantalon.style.display = 'none';
            camisa.style.display = 'block';
            document.getElementById('imgCamisa').classList.remove('hidden');
            document.getElementById('imgRobert').classList.add('hidden');
            document.getElementById('imgBlusa').classList.add('hidden');
            document.getElementById('imgPantalon').classList.add('hidden');
            document.getElementById('imgFalda').classList.add('hidden');



           
            
        } else if (this.value === 'pantalonVestir' || this.value === 'pantalonJeans') {
            textPantalon.textContent = 'Medida Pantalon';           
            pantalon.style.display = 'block';
            camisa.style.display = 'none';
            document.getElementById('imgCamisa').classList.add('hidden');
            document.getElementById('imgRobert').classList.remove('hidden');
            document.getElementById('imgBlusa').classList.remove('hidden');
            document.getElementById('imgPantalon').classList.remove('hidden');
            document.getElementById('imgFalda').classList.remove('hidden');
            
        } else {
            tipoHombre.style.display = 'none';
            tipoMujer.style.display = 'none';
            document.getElementById('imgBlusa').classList.add('hidden');
            document.getElementById('imgCamisa').classList.add('hidden');            
            document.getElementById('imgRobert').classList.remove('hidden');
            document.getElementById('imgPantalon').classList.add('hidden');
            document.getElementById('imgFalda').classList.add('hidden');
            
        }
    });

      /** FUNCION DE SELECT PARA TIPO DE PRENDA MUJER*/
      document.getElementById('tipoMujer').addEventListener('change', function() {
        var pantalon = document.getElementById('pantalon');
        var camisa = document.getElementById('camisa');
        var pantalonVestir = document.getElementById('pantalonVestir');
        var pantalonJeans = document.getElementById('pantalonJeans');
        var falda = document.getElementById('falda');
        var textPantalon = document.getElementById('textPantalon')
        


        if (this.value === 'blusaVestir' || this.value === 'blusaPolo' ) {
            textPantalon.textContent = 'Medida Blusa';           
            pantalon.style.display = 'none';
            camisa.style.display = 'block';
            document.getElementById('imgBlusa').classList.remove('hidden');
            document.getElementById('imgCamisa').classList.add('hidden');            
            document.getElementById('imgRobert').classList.add('hidden');
            document.getElementById('imgPantalon').classList.add('hidden');
            document.getElementById('imgFalda').classList.add('hidden');
           
            
        } else if (this.value === 'pantalonVestir' || this.value === 'pantalonJeans') {
            textPantalon.textContent = 'Medida Pantalon';           
            pantalon.style.display = 'block';
            camisa.style.display = 'none';
            document.getElementById('imgBlusa').classList.add('hidden');
            document.getElementById('imgCamisa').classList.add('hidden');            
            document.getElementById('imgRobert').classList.add('hidden');
            document.getElementById('imgPantalon').classList.remove('hidden');
            document.getElementById('imgFalda').classList.add('hidden');
            
        } else if(this.value === 'falda'){
                textPantalon.textContent = 'Medida Falda';
                document.getElementById('imgBlusa').classList.add('hidden');
                document.getElementById('imgCamisa').classList.add('hidden');            
                document.getElementById('imgRobert').classList.add('hidden');
                document.getElementById('imgPantalon').classList.add('hidden');
                document.getElementById('imgFalda').classList.remove('hidden');

        }else {
            tipoHombre.style.display = 'none';
            tipoMujer.style.display = 'none';
            document.getElementById('imgBlusa').classList.add('hidden');
            document.getElementById('imgCamisa').classList.add('hidden');            
            document.getElementById('imgRobert').classList.remote('hidden');
            document.getElementById('imgPantalon').classList.add('hidden');
            document.getElementById('imgFalda').classList.add('hidden');        

        }

    });

    $(document).ready(function() {
            // Inicializa DataTable
            var table = $('#tallasTable').DataTable();

            // Maneja el envío del formulario usando AJAX
            $('#form-tallas').on('submit', function(e) {
                e.preventDefault(); // Evita el envío normal del formulario
                $.ajax({
                    type: 'POST',
                    url: 'core.php', // Reemplaza con la URL a tu script PHP
                    data: $(this).serialize(), // Serializa los datos del formulario
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            console.log(response);
                            console.log(response.data.nombreCliente);

                            // Muestra un alert
                            alert('Formulario enviado exitosamente!');

                            // Agrega la nueva fila a la DataTable
                            table.row.add([
                                response.data.nombreCliente,
                                response.data.tipoSexo,
                                response.data.tipoHombre,
                                response.data.tipoMujer,
                                response.data.camisaLargo,
                                response.data.camisaHombro,
                                response.data.camisaBusto,
                                response.data.pantalonLargo,
                                response.data.pantalonCintura,
                                response.data.pantalonCadera,
                                // Botón de editar
                                '<button type="button" class="btn btn-warning btn-sm editar" data-toggle="modal" data-target="#editarModal"><i class="bi bi-pencil-square"></i></button>'
                            ]).draw(false);
                        } else {
                            alert('Error al enviar el formulario');
                        }
                    },
                    error: function() {
                        alert('Ocurrió un error al enviar los datos.');
                    }
                });

                /*$('#tallasTable').on('click', '.editar', function() {
                    var data = table.row($(this).parents('tr')).data();
                    // Llenar el modal con los datos de la fila
                    $('#nombre_empleado_editar').val(data[0]);
                    $('#dui_editar').val(data[1]);
                    $('#tipo_rol_editar').val(data[2]);
                    $('#fecha_editar').val(data[3]);
                    $('#telefono_editar').val(data[4]);
                    $('#direccion_editar').val(data[5]);
                    $('#nick_editar').val(data[6]);
                });*/

            });

            // Cargar datos desde la API_TIENDA y agregarlos a la tabla
           /* $.ajax({
                url: 'API_TIENDA', // Reemplaza con la URL de tu API
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Agregar cada fila de la API a la tabla
                    $.each(data, function(index, item) {
                        table.row.add([
                            item.nombre_empleado,
                            item.dui,
                            item.tipo_rol,
                            item.fecha,
                            item.telefono,
                            item.direccion,
                            item.nick
                        ]).draw(false);
                    });
                },
                error: function() {
                    alert('Error al obtener datos de la API.');
                }
            });*/


        });
</script>



<?php include_once('templates/footer.php') ?>