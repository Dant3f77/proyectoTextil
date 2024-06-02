<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Confecciones Robert</title>
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .container {
            max-width: 100%;
        }

        .table-responsive {
            overflow-x: auto;
        }

        #pedidosTable_wrapper {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="banner">
        PRE -REGISTRO DE TALLAS
    </div>
    <div class="container mt-2 mb-3 d-flex flex-column justify-content-center align-items-center">
        <div class="row w-100">
            <div class="col-md-3 d-flex justify-content-center">
                <div class="card shadow" style="width: 20rem;">
                    <img src="img/user.png" class="card-img-top" alt="error" style="width: 115px; height: 115px; margin: auto;">
                    <div class="card-body">
                        <h5 class="card-title text-center">*REGISTRO DE PEDIDO*</h5>
                        <form id="form-pedido" class="form-horizontal" method="POST">
                            <input type="hidden" name="form-pedido" value="1">
                            <div class="form-row">
                                <div class="form-group col-md-12 mb-2">
                                    <label for="Institucion">Institución</label>
                                    <input type="text" class="form-control" id="Institucion" name="Institucion" placeholder="Institución" required>
                                </div>
                                <div class="form-group col-md-12 mb-2">
                                    <label for="cliente">Cliente</label>
                                    <input type="text" class="form-control" id="cliente" name="cliente" placeholder="Cliente" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 mb-2">
                                    <label for="tipo">Tipo</label>
                                    <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Tipo" required>
                                </div>
                                <div class="form-group col-md-12 mb-2">
                                    <label for="entrega">Fecha de Entrega</label>
                                    <input type="date" class="form-control" id="entrega" name="entrega" required>
                                </div>
                                <div class="form-group col-md-12 mb-2">
                                    <label for="telefono">Teléfono</label>
                                    <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 mb-2">
                                    <label for="nota">Nota</label>
                                    <textarea class="form-control" id="nota" name="nota" placeholder="Nota"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 text-end col-md-12">
                                    <button type="submit" class="btn btn-primary shadow-sm">
                                        <i class="bi bi-person-fill-add"></i> Agregar Pedido
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> <!-- fin de card -->
            </div><!-- fin de col -->
            <div class="col-md-9">
                <div class="table-responsive m-2">
                    <table id="pedidosTable" class="table display table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Institución</th>
                                <th>Cliente</th>
                                <th>Tipo</th>
                                <th>Fecha de Entrega</th>
                                <th>Teléfono</th>
                                <th>Nota</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Filas de datos irán aquí -->
                        </tbody>
                    </table>
                </div> <!-- div table -->
            </div>
        </div><!-- fin de row -->
    </div><!-- fin de container -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            // Inicializa DataTable
            var table = $('#pedidosTable').DataTable();

            // Maneja el envío del formulario usando AJAX
            $('#form-pedido').on('submit', function(e) {
                e.preventDefault(); // Evita el envío normal del formulario

                $.ajax({
                    type: 'POST',
                    url: 'core.php', // Reemplaza con la URL a tu script PHP
                    data: $(this).serialize(), // Serializa los datos del formulario
                    dataType: 'json',
                    success: function(response) {
                        if(response.success) {
                            // Muestra un alert
                            Swal.fire({
                                icon: 'success',
                                title: 'Formulario enviado exitosamente!',
                                showConfirmButton: false,
                                timer: 1500
                            });

                            // Agrega la nueva fila a la DataTable
                            table.row.add([
                                response.data.Institucion,
                                response.data.cliente,
                                response.data.tipo,
                                response.data.entrega,
                                response.data.telefono,
                                response.data.nota,
                                '<button class="btn btn-warning m-2 btn-sm"><i class="bi bi-pencil-square"></i></button>' +
                                '<button class="btn m-2 btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>'
                            ]).draw(false);

                            // Limpia el formulario
                            $('#form-pedido')[0].reset();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error al enviar el formulario',
                                text: response.message
                            });
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error en la solicitud AJAX',
                            text: textStatus
                        });
                    }
                });
            });
        });
    </script>
    <?php include_once('templates/footer.php') ?>
