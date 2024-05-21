<?php
include_once('../templates/header.php');
?>
<style>
.hidden {
    display: none;
}
</style>
<?php
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

<div class="container mt-5 mb-3 ">
    <h3 class="text-danger">SELECCIONE TIPO DE PIEZA Y TALLAS DE <b>CLIENTE</b></h3>
    <br>
    <div class="row">
        <div class="col-12 col-md-4" >
            <img src="../php/img/inversionesR.png" id="imgRobert" alt="" style="height: 600px; width: 400px;" class="">
            <img src="../php/img/camisa.png" id="imgCamisa" alt="" style="height: 600px; width: 400px;" class="hidden">
            <img src="../php/img/blusa.png" id="imgBlusa" alt="" style="height: 600px; width: 400px;" class="hidden">
            <img src="../php/img/pantalon.png" id="imgPantalon" alt="" style="height: 600px; width: 400px;" class="hidden">
            <img src="../php/img/falda.png" id="imgFalda" alt="" style="height: 600px; width: 400px;" class="hidden">
        </div>

        <div class="col-12 col-md-8">

            <br>
            <form id="formTallas" action="../php/core.php" method="POST">
            <div class="mb-3">
                    <select class="form-select nombreCliente" aria-label="Default select example" id="nombreCliente">
                        <option selected>Cliente</option>
                        <option value="cl1">Daysi Santamaria</option>
                        <option value="cl2">Rogelio Torres</option>
                        <option value="cl3">Rogelio Torres</option>

                    </select>
                </div>

                <div class="mb-3">
                    <select class="form-select tipoSexo" aria-label="Default select example" id="tipoSexo">
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

                <button type="submit" class="btn btn-primary">Registar Tallas</button>
            </form>

        </div>
    </div>
</div>

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
</script>



<?php include_once('../templates/footer.php') ?>