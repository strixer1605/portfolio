<?php
include 'conexion.php'; // Incluir la conexión a la base de datos

// Obtener los datos enviados desde el formulario
$email = isset($_POST['email']) ? trim($_POST['email']) : null;
$nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : null;

// Verificar que ambos campos tengan valores
if (!$email || !$nombre) {
    echo json_encode(['success' => false, 'message' => 'Por favor, complete todos los campos.']);
    exit;
}

// Validar que el email no exista ya en la base de datos
$sqlVerificar = "SELECT * FROM usuarios WHERE email = ?";
$stmt = $conexion->prepare($sqlVerificar);
$stmt->bind_param("s", $email);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    echo json_encode(['success' => false, 'message' => 'El email ya está registrado.']);
    exit;
}

// Insertar el nuevo registro
$cargo = 2;
$sqlInsertar = "INSERT INTO usuarios (email, nombre, cargo) VALUES (?, ?, ?)";
$stmt = $conexion->prepare($sqlInsertar);
$stmt->bind_param("ssi", $email, $nombre, $cargo);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Usuario registrado exitosamente.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error al registrar el usuario.']);
}

// Cerrar la conexión
$stmt->close();
$conexion->close();
?>
