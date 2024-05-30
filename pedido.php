<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <!-- <div class="container mt-2">
        <div class="row mb-4">
            <div class="col-4 col-md-6 col-lg-3">
                <label for="nombreInstitucion" class="form-label">Nombre de Institucion</label>
                <input type="text" class="form-control" id="nombreInstitucion" placeholder="Nombre de la Institucion">
            </div>
            <div class="col-4 col-md-6 col-lg-3">
                <label for="nombrePersona" class="form-label">Nombre de persona a tallar</label>
                <input type="text" class="form-control" id="nombrePersona" placeholder="Nombre de persona a tallar">
            </div>
        </div>
        <div class="row">
            <div class="col-3 col-md-6 col-lg-3">
                <label for="nombreInstitucion" class="form-label">Nombre de Institucion</label>
                <input type="text" class="form-control" id="nombreInstitucion" placeholder="Nombre de la Institucion">
            </div>
            <div class="col-3 col-md-6 col-lg-3">
                <label for="nombreInstitucion" class="form-label">Nombre de Institucion</label>
                <input type="text" class="form-control" id="nombreInstitucion" placeholder="Nombre de la Institucion">
            </div>
        </div>
    </div>  -->




    <div class="container mt-1">
        <div class="row">
            <div class="col ">
                <div class="card border border-dark-subtle border-3 rounded-4" style="width: 20rem;">
                    <img src="../b.png" class="card-img-top mt-2" alt="..." style="height: 80px; width: 70px;">
                    <div class="card-body">
                        <h4 class="card-title text-success"> <b>Registro de pedido </b></h4>
                        <form form action="../core.php" id="crearPedido" name="crearPedido" method="$POST">
                            <div class="mb-3">
                                <label for="nombreInstitucion" class="form-label"><b>Nombre de Institucion</b></label>
                                <input type="text" class="form-control border-2 border-dark rouned rounded-pill" id="nombreInstitucion" placeholder="Nombre de la Institucion" required>
                            </div>
                            <div class="mb-3">
                                <label for="nombrePersona" class="form-label"><b>Nombre de persona a tallar</b></label>
                                <input type="text" class="form-control border-2 border-dark rouned rounded-pill" id="nombrePersona" placeholder="Nombre de persona a tallar" required>
                            </div>
                            <div class="mb-3">
                                <label for="fechaEntrega" class="form-label border-2 border-dark rouned rounded-pill"><b>Fecha para entrega</b></label>
                                <input type="date" class="form-control border-2 border-dark rouned rounded-pill" id="fechaEntrega" required>
                            </div>
                            <div class="mb-3">
                                <label for="descipcion" class="form-label"><b>Agrega alguna Descripcion</b></label>
                                <input type="text" class="form-control border-2 border-dark rouned rounded-pill" id="descripcion" placeholder="Nombre de persona a tallar" required>
                            </div>
                            <!-- <div class="mb-3">
                                <label for="descp" class="form-label"><b>Agrega alguna Descripcion</b></label>
                                <select class="form-select" aria-label="Default select example" id="descp">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div> -->
                            <a type="submit" class="btn btn-primary"><i class="bi bi-cart-plus"></i></i> Ingresar Pedido </i></a>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <i class="bi bi-pencil-square"></i> Editar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <label for="nombreInstitucion" class="form-label"><b>Nombre de Institucion</b></label>
                            <input type="text" class="form-control border-2 border-dark rouned rounded-4" id="nombreInstitucion" placeholder="Nombre de la Institucion" required>
                        </div>
                        <div class="col">
                            <label for="nombrePersona" class="form-label"><b>Nombre de persona a tallar</b></label>
                            <input type="text" class="form-control border-2 border-dark rouned rounded-4" id="nombrePersona" placeholder="Nombre de persona a tallar" required>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <label for="fechaEntrega" class="form-label border-2 border-dark rouned rounded-pill"><b>Fecha para entrega</b></label>
                            <input type="date" class="form-control border-2 border-dark rouned rounded-4" id="fechaEntrega" required>
                        </div>
                        <div class="col">
                            <label for="descipcion" class="form-label"><b>Agrega alguna Descripcion</b></label>
                            <input type="text" class="form-control border-2 border-dark rouned rounded-4" id="descripcion" placeholder="Nombre de persona a tallar" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['crearPedido'])) {

        $nombreInstitucion = $_POST['nombreInstitucion'];
        $nombrePersona = $_POST['nombrePersona'];
        $fechaEntrega = $_POST['fechaEntrega'];
        $fechaEntrega = $_POST['fechaEntrega'];
        $descripcion = $_POST['descripcion'];

        $datosPedido = array();

        $datosPedido = array(
            "nombreInstitucion" => $nombreInstitucion,
            "nombrePersona" => $nombrePersona,
            "fechaEntrega" => $fechaEntrega,
            "descripcion" => $descripcion

        );
    }


    ?>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>