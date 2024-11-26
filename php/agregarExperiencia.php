<?php
include 'conexion.php';

// Verificar si los datos han sido enviados
if (isset($_POST['empresa']) && isset($_POST['periodo']) && isset($_POST['rol'])) {
    // Obtener los datos del formulario
    $empresa = mysqli_real_escape_string($conexion, $_POST['empresa']);
    $periodo = mysqli_real_escape_string($conexion, $_POST['periodo']);
    $rol = mysqli_real_escape_string($conexion, $_POST['rol']);

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO experiencia_laboral (lugar, periodo, puesto) VALUES ('$empresa', '$periodo', '$rol')";

    if (mysqli_query($conexion, $sql)) {
        // Si la inserción fue exitosa, devolver un mensaje de éxito
        echo json_encode(['success' => true]);
    } else {
        // Si hubo un error, devolver un mensaje de error
        echo json_encode(['success' => false]);
    }
} else {
    // Si faltan datos, devolver un mensaje de error
    echo json_encode(['success' => false]);
}
?>
