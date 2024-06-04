<?php
header('Content-Type: application/json');


// Habilitar informe de errores para detectar problemas
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$api_url = 'http://localhost:8080/api/pedidos'; // Reemplaza con la URL real de tu API

// Función para hacer una solicitud a la API
function fetchAPI($url) {
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);

    if (curl_errno($curl)) {
        echo json_encode(['error' => 'Error en la solicitud cURL: ' . curl_error($curl)]);
        curl_close($curl);
        exit();
    }

    curl_close($curl);
    return json_decode($response, true);
}

header('Content-Type: application/json'); // Asegurar que el contenido es JSON

$detallePedido = fetchAPI($api_url);

// Verificar si el detalle del pedido se ha recibido correctamente y si contiene detallesPedidoList
if ($detallePedido && isset($detallePedido[0]['detallesPedidoList'])) {
    // Contar la cantidad de detalles de pedido
    $cantidadDetallesPedido = count($detallePedido[0]['detallesPedidoList']);
    // Devolver la cantidad en formato JSON
    echo json_encode([
        //'nombreSolicitante' => $detallePedido['nombreSolicitante'],
        'cantidadDetallesPedido' => $cantidadDetallesPedido
    ]);
} else {
    echo json_encode([
        'error' => 'No se pudo obtener el detalle del pedido o datos incompletos.'
    ]);
}

// Datos quemados (hardcoded) para el ejemplo
/*$datos = [
    ['nombre' => 'Juan Perez', 'edad' => 28, 'pantalon' => '-', 'camisa' => 'M', 'sexo' => 'Masculino', 'precio' => 20.5],
    ['nombre' => 'Ana Gomez', 'edad' => 35, 'pantalon' => '34', 'camisa' => '-', 'sexo' => 'Femenino', 'precio' => 25.0],
    ['nombre' => 'Carlos Ruiz', 'edad' => 22, 'pantalon' => '32', 'camisa' => 'S', 'sexo' => 'Masculino', 'precio' => 18.75],
    ['nombre' => 'Maria Lopez', 'edad' => 30, 'pantalon' => '-', 'camisa' => 'M', 'sexo' => 'Femenino', 'precio' => 22.0],
    ['nombre' => 'Luis Martinez', 'edad' => 40, 'pantalon' => '36', 'camisa' => '-', 'sexo' => 'Masculino', 'precio' => 30.0]
];*/
/*
// Función para agrupar datos por género
function agruparDatosPorGenero($datos) {
    $consolidado = ['Masculino' => 0, 'Femenino' => 0];
    foreach ($datos as $dato) {
        $consolidado[$dato['sexo']]++;
    }
    return $consolidado;
}

// Función para agrupar datos por prenda
function agruparDatosPorPrenda($datos) {
    $consolidado = ['Pantalon' => 0, 'Camisa' => 0];
    foreach ($datos as $dato) {
        if ($dato['pantalon'] !== '-') {
            $consolidado['Pantalon']++;
        }
        if ($dato['camisa'] !== '-') {
            $consolidado['Camisa']++;
        }
    }
    return $consolidado;
}

if (isset($_GET['chart'])) {
    $chart = $_GET['chart'];

    if ($chart === 'gender') {
        $data = agruparDatosPorGenero($datos);
        echo json_encode([
            'labels' => array_keys($data),
            'values' => array_values($data)
        ]);
    } elseif ($chart === 'prenda') {
        $data = agruparDatosPorPrenda($datos);
        echo json_encode([
            'labels' => array_keys($data),
            'values' => array_values($data)
        ]);
    }
}*/
?>
