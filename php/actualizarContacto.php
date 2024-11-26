<?php
include 'conexion.php'; // Archivo de conexión a la base de datos

// Establecer cabeceras para devolver datos en formato JSON
header('Content-Type: application/json');

try {
    // Leer los datos enviados desde el cliente
    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true); // Decodificar el JSON recibido

    // Validar que todos los datos requeridos estén presentes
    if (!isset($data['telefono'], $data['email'], $data['ubicacion'], $data['linkedin'])) {
        echo json_encode([
            'success' => false,
            'message' => 'Datos incompletos enviados al servidor.'
        ]);
        exit;
    }

    // Escapar y asignar valores
    $telefono = mysqli_real_escape_string($conexion, $data['telefono']);
    $email = mysqli_real_escape_string($conexion, $data['email']);
    $ubicacion = mysqli_real_escape_string($conexion, $data['ubicacion']);
    $linkedin = mysqli_real_escape_string($conexion, $data['linkedin']);

    // Consulta para actualizar los datos en la tabla
    $sql = "UPDATE contacto SET telefono = '$telefono', email = '$email', ubicacion = '$ubicacion', linkedin = '$linkedin' WHERE id = 1";

    if (mysqli_query($conexion, $sql)) {
        echo json_encode([
            'success' => true,
            'message' => 'Datos de contacto actualizados correctamente.'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Error al actualizar los datos de contacto: ' . mysqli_error($conexion)
        ]);
    }

    // Cerrar la conexión
    mysqli_close($conexion);
} catch (Exception $e) {
    // Manejar errores inesperados
    echo json_encode([
        'success' => false,
        'message' => 'Error en el servidor: ' . $e->getMessage()
    ]);
}
?>
