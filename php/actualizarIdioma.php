<?php
// Conexión a la base de datos
include 'conexion.php'; // Asegúrate de tener un archivo 'conexion.php' para conectarte a la base de datos

// Establecer cabeceras para devolver datos en JSON
header('Content-Type: application/json');

try {
    // Leer los datos enviados desde el cliente
    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true); // Decodificar el JSON recibido

    // Validar que los datos requeridos estén presentes
    if (!isset($data['id']) || !isset($data['primerInput'])) {
        echo json_encode([
            'success' => false,
            'message' => 'Datos incompletos enviados al servidor.'
        ]);
        exit;
    }

    // Asignar variables desde los datos decodificados
    $idIdioma = intval($data['id']); // Convertir ID a entero por seguridad
    $primerInput = trim($data['primerInput']); // Limpiar datos

    // Preparar la consulta para actualizar el estudio
    $sql = "UPDATE idiomas 
            SET idioma = ? 
            WHERE idIdioma = ?";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("si", $primerInput, $idIdioma); // Vincular parámetros

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo json_encode([
            'success' => true,
            'message' => 'Idioma actualizado correctamente.'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Error al actualizar el idioma.'
        ]);
    }

    // Cerrar la conexión
    $stmt->close();
    $conexion->close();
} catch (Exception $e) {
    // Manejar cualquier error inesperado
    echo json_encode([
        'success' => false,
        'message' => 'Error en el servidor: ' . $e->getMessage()
    ]);
}
?>
