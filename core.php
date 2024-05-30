<?php

session_start();

// INICIO MODULO LOGIN
// Verificar si se recibieron datos de usuario y contraseña
if (isset($_POST['username']) && isset($_POST['pass'])) {

    // Lista de usuarios y contraseñas
    $users = [
        'admin' => '123456',
        'empleado' => 'abc123',
        'jefe' => 'jef123'
    ];

    // Obtener datos de usuario y contraseña
    $username = $_POST['username'] ?? '';
    $pass = $_POST['pass'] ?? '';

    // Verificar si el usuario existe y si la contraseña es correcta
    if (array_key_exists($username, $users) && $users[$username] === $pass) {
        // Credenciales correctas, iniciar sesión y redirigir
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username; // Guardar el nombre de usuario en la sesión
        $_SESSION['id_empleado']=1; //  ID para comprobar los datos de insercion de pedidos eliminar luego
        header("Location: inicio.php"); // Redirigir a una página de bienvenida
        exit; // Terminar el script para evitar ejecución adicional
    } else {
        // Credenciales incorrectas
       //echo("<script> alert('Usuario o Contraseña Incorrectos') </script>" );
      // header("Location: login.php");
       /* echo("<script> 
        Swal.fire({
            icon: 'error',
            title: 'USUARIO INCORRECTO',            
        })/script>");*/

      //  echo "Usuario o contraseña incorrectos.";
    }
}













//INICIO TOMA TALLAS

// Verifica si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura los datos del formulario
    $nombreCliente = $_POST['nombreCliente'];
    $sexo = $_POST['tipoSexo'];
    $piezaHombre = $_POST['tipoHombre'];
    $piezaMujer = $_POST['tipoMujer'];
    $camisaLargo =$_POST['camisaLargo'];
    $camisaHombro =$_POST['camisaHombro'];
    $camisaBusto =$_POST['camisaBusto'];
    $pantalonLargo =$_POST['pantalonLargo'];
    $pantalonCintura =$_POST['pantalonCintura'];
    $pantalonCadera =$_POST['pantalonCadera'];


    // Crea un array con los datos del formulario actual
    $formData = [
        'nombreCliente' => $nombreCliente,
        'tipoSexo' => $sexo,
        'tipoHombre' => $piezaHombre,
        'tipoMujer' => $piezaMujer,
        'camisaLargo' => $camisaLargo,
        'camisaHombro' => $camisaHombro,
        'camisaBusto' => $camisaBusto,
        'pantalonLargo' => $pantalonLargo,
        'pantalonCintura' => $pantalonCintura,
        'pantalonCadera' => $pantalonCadera,
    ];

    // Verifica si ya existe un array de datos en la sesión
    if (!isset($_SESSION['formArray'])) {
        // Si no existe, crea un nuevo array con los datos del formulario actual
        $_SESSION['formArray'] = array($formData);
    } else {
        // Si ya existe, agrega los datos del formulario actual al array existente
        array_push($_SESSION['formArray'], $formData);
    }

    // Muestra un mensaje de éxito
    echo "Datos agregados correctamente:";
    echo "<pre>";
    print_r($_SESSION['formArray']);
    echo "</pre>";
}


//FIN TOMA TALLAS






?>


