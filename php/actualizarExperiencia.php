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
    if (!isset($data['id']) || !isset($data['primerInput']) || !isset($data['periodo']) || !isset($data['tercerInput'])) {
        echo json_encode([
            'success' => false,
            'message' => 'Datos incompletos enviados al servidor.'
        ]);
        exit;
    }

    // Asignar variables desde los datos decodificados
    $idEL = intval($data['id']); // Convertir ID a entero por seguridad
    $lugar = trim($data['primerInput']); // Limpiar datos
    $periodo = trim($data['periodo']);
    $tercerInput = trim($data['tercerInput']);

    // Preparar la consulta para actualizar la experiencia laboral
    $sql = "UPDATE experiencia_laboral 
            SET lugar = ?, periodo = ?, puesto = ?
            WHERE idEL = ?";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssi", $lugar, $periodo, $tercerInput, $idEL); // Vincular parámetros

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo json_encode([
            'success' => true,
            'message' => 'Experiencia laboral actualizada correctamente.'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Error al actualizar la experiencia laboral.'
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
