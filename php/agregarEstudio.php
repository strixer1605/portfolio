<?php
include 'conexion.php';

// Leer los datos JSON enviados
$data = json_decode(file_get_contents('php://input'), true);

// Depurar los datos recibidos

if (isset($data['institucion']) && isset($data['periodoEstudio']) && isset($data['titulo'])) {
    // Obtener los datos del formulario
    $institucion = mysqli_real_escape_string($conexion, $data['institucion']);
    $periodoEstudio = mysqli_real_escape_string($conexion, $data['periodoEstudio']);
    $titulo = mysqli_real_escape_string($conexion, $data['titulo']);

    // Insertar en la base de datos
    $sql = "INSERT INTO estudios (institucion, periodo, titulo) VALUES (?, ?, ?)";

    // Preparar y ejecutar la consulta
    if ($stmt = mysqli_prepare($conexion, $sql)) {
        mysqli_stmt_bind_param($stmt, "sss", $institucion, $periodoEstudio, $titulo);
        
        if (mysqli_stmt_execute($stmt)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al insertar en la base de datos.']);
        }
        
        mysqli_stmt_close($stmt);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al preparar la consulta.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Faltan datos.']);
}
?>