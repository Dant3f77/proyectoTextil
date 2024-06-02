<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
 Swal.fire({
    title: 'PARA DONDE VAS???',
    text: 'Acceso no permitido inicie sesion',
    icon: 'error', // Icono de la alerta (success, error, warning, info)
    confirmButtonText: 'Aceptar' // Texto del botón de confirmación
}).then((result) => {
    // Redirigir a la página aviso.php después de que el usuario haga clic en Aceptar
    if (result.isConfirmed) {
        window.location.href = "index.php";
    }
});        
                
</script>
</body>
</html>