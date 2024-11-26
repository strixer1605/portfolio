<?php
// Incluir conexión a la base de datos
include 'conexion.php';

// Obtener datos enviados desde el frontend
$data = json_decode(file_get_contents('php://input'), true);

// Verificar que se recibió el campo 'descripcion'
if (isset($data['descripcion']) && !empty($data['descripcion'])) {
    $descripcion = $data['descripcion'];

    // Preparar y ejecutar la consulta de actualización
    $sql = "UPDATE sobre_mi SET descripcion = ? WHERE id = 1";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $descripcion);

    if ($stmt->execute()) {
        // Respuesta de éxito
        echo json_encode([
            "success" => true,
            "message" => "Descripción actualizada correctamente."
        ]);
    } else {
        // Respuesta de error en caso de fallo
        echo json_encode([
            "success" => false,
            "message" => "Error al actualizar la descripción. Inténtalo nuevamente."
        ]);
    }

    $stmt->close();
} else {
    // Respuesta de error si no se recibe 'descripcion'
    echo json_encode([
        "success" => false,
        "message" => "La descripción no puede estar vacía."
    ]);
}

// Cerrar la conexión
$conexion->close();
?>
