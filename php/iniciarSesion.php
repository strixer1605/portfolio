<?php
session_start(); // Iniciar la sesión

// Archivo de conexión
include('conexion.php');

// Verificar si se enviaron los datos necesarios
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $nombre = $_POST['nombre'] ?? '';

    // Validar que los campos no estén vacíos
    if (empty($email) || empty($nombre)) {
        echo json_encode(['success' => false, 'message' => 'Todos los campos son obligatorios.']);
        exit;
    }

    // Validar si el email existe en la base de datos
    $stmt = $conexion->prepare("SELECT nombre FROM usuarios WHERE email = ? AND nombre = ?");
    $stmt->bind_param("ss", $email, $nombre);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Usuario encontrado, guardar en variables de sesión
        $_SESSION['email'] = $email;
        $_SESSION['nombre'] = $nombre;

        echo json_encode(['success' => true]);
    } else {
        // Usuario no encontrado
        echo json_encode(['success' => false, 'message' => 'Credenciales incorrectas.']);
    }

    $stmt->close();
    $conexion->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
}
