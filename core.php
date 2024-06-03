<?php

session_start();
header('Content-Type: application/json');
$response = array();

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
        $_SESSION['id_empleado'] = 1; //  ID para comprobar los datos de insercion de pedidos eliminar luego
        $_SESSION['pass'] = $pass;
        header("Location: inicio.php"); // Redirigir a una página de bienvenida
        exit; // Terminar el script para evitar ejecución adicional
    } else {
        header("Location: aviso.php");

        exit;

        /*$response = [
            'success' => false,
            'message' => 'Error al enviar el formulario'
        ];

        // Convertir el array de respuesta a formato JSON
        $json_response = json_encode($response);

        // Enviar el JSON de vuelta al cliente
        echo $json_response;*/
        
    }

    exit;
}


// MODULO DE EMPLEADO
if (isset($_POST['form-empleado'])) {
    if (isset($_POST['nombre_empleado'])) {
        $nombre_empleado = $_POST['nombre_empleado'];
        $dui = $_POST['dui'];
        $tipo_rol = $_POST['tipo_rol'];
        $fecha = $_POST['fecha'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $nick = $_POST['nick'];
        $pass = $_POST['pass'];

        $datosEmpleado = array(
            "nombreEmpleado" => $nombre_empleado,
            "dui" => $dui,
            "tipoRol" => $tipo_rol,
            "fecha" => $fecha,
            "telefono" => $telefono,
            "direccion" => $direccion,
            "nick" => $nick,
            "pass" => $pass
        );

        $response = [
            'success' => true,
            'data' => $datosEmpleado
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Error al enviar el formulario'
        ];
    }
    echo json_encode($response);
    exit;
}

// MODULO INSTITUCION
if (isset($_POST['form-institucion'])) {
    if (isset($_POST['nombre_institucion'])) {
        $nombre_institucion = $_POST['nombre_institucion'];
        $identificacion = $_POST['identificacion'];
        $telefono = $_POST['telefono'];
        $edad = $_POST['edad'];
        $pago = $_POST['pago'];

        $datosInstitucion = array(
            "nombre_institucion" => $nombre_institucion,
            "identificacion" => $identificacion,
            "telefono" => $telefono,
            "edad" => $edad,
            "pago" => $pago,
        );

        $response = [
            'success' => true,
            'data' => $datosInstitucion
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Error al enviar el formulario'
        ];
    }
    echo json_encode($response);
    exit;
}

// MODULO PEDIDO
if (isset($_POST['form-pedido'])) {
    if (isset($_POST['Institucion']) && isset($_POST['cliente']) && isset($_POST['tipo']) && isset($_POST['entrega']) && isset($_POST['telefono']) && isset($_POST['nota'])) {
        $Institucion = $_POST['Institucion'];
        $cliente = $_POST['cliente'];
        $tipo = $_POST['tipo'];
        $entrega = $_POST['entrega'];
        $telefono = $_POST['telefono'];
        $nota = $_POST['nota'];

        $datosPedido = array(
            "Institucion" => $Institucion,
            "cliente" => $cliente,
            "tipo" => $tipo,
            "entrega" => $entrega,
            "telefono" => $telefono,
            "nota" => $nota,
        );

        $response = [
            'success' => true,
            'data' => $datosPedido
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Faltan datos en el formulario'
        ];
    }
    echo json_encode($response);
    exit;
}

// INICIO TOMA TALLAS
if (isset($_POST['tipoSexo'])) {
    $nombreCliente = $_POST['nombreCliente'];
    $sexo = $_POST['tipoSexo'];
    $piezaHombre = $_POST['tipoHombre'];
    $piezaMujer = $_POST['tipoMujer'];
    $camisaLargo = $_POST['camisaLargo'];
    $camisaHombro = $_POST['camisaHombro'];
    $camisaBusto = $_POST['camisaBusto'];
    $pantalonLargo = $_POST['pantalonLargo'];
    $pantalonCintura = $_POST['pantalonCintura'];
    $pantalonCadera = $_POST['pantalonCadera'];

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

    $response = [
        'success' => true,
        'data' => $formData
    ];
    echo json_encode($response);
    exit;
}

$response = [
    'success' => false,
    'message' => 'Solicitud no válida'
];
echo json_encode($response);
exit;
?>
