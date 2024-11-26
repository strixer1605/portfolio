<?php
include 'conexion.php';

// Leer los datos JSON enviados
$data = json_decode(file_get_contents('php://input'), true);

// Verificar si se recibió el idioma
if (isset($data['herramienta'])) {
    $herramienta = mysqli_real_escape_string($conexion, $data['herramienta']);

    // Insertar en la base de datos
    $sql = "INSERT INTO herramientas_software (herramienta) VALUES ('$herramienta')";

    if (mysqli_query($conexion, $sql)) {
        // Si la inserción fue exitosa, devolver un mensaje de éxito
        echo json_encode(['success' => true]);
    } else {
        // Si hubo un error, devolver un mensaje de error
        echo json_encode(['success' => false, 'message' => 'Error al insertar en la base de datos.']);
    }
} else {
    // Si faltan datos, devolver un mensaje de error
    echo json_encode(['success' => false, 'message' => 'Faltan datos para insertar la herramienta.']);
}

// Cerrar la conexión
mysqli_close($conexion);
?>
