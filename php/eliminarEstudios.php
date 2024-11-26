<?php
// Conexión a la base de datos
include('conexion.php');

// Obtener los datos enviados desde JavaScript (vía POST)
$data = json_decode(file_get_contents('php://input'), true);

// Comprobar si se recibió el ID
if (isset($data['id'])) {
    $id = $data['id'];

    // Consulta para eliminar el registro con el ID recibido en la tabla 'estudios'
    $sql = "DELETE FROM estudios WHERE idE = '$id'";

    // Ejecutar la consulta
    if (mysqli_query($conexion, $sql)) {
        // Respuesta exitosa
        echo json_encode([
            'success' => true,
            'message' => 'El estudio fue eliminado correctamente.'
        ]);
    } else {
        // Respuesta en caso de error
        echo json_encode([
            'success' => false,
            'message' => 'Hubo un problema al eliminar el registro.'
        ]);
    }
} else {
    // En caso de no recibir el ID
    echo json_encode([
        'success' => false,
        'message' => 'ID no válido.'
    ]);
}

// Cerrar la conexión
mysqli_close($conexion);
?>
