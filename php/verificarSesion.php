<?php
session_start();
error_reporting(0);

if (!isset($_SESSION['email']) || !isset($_SESSION['nombre'])) {
    header('Location: ../index.php');
    exit;
} else {
    $email = $_SESSION['email'];
    $nombre = $_SESSION['nombre'];
    include('../php/conexion.php');

    // Consulta para verificar el cargo del usuario
    $sql = "SELECT cargo FROM usuarios WHERE email = '$email' AND nombre = '$nombre'";
    $resultado = mysqli_query($conexion, $sql);

    // Inicializar variable identificadora
    $hayResultado = false;

    // Verificar si hay resultados y validar el cargo
    if (mysqli_num_rows($resultado) > 0) {
        // Obtener el valor del cargo
        $fila = mysqli_fetch_assoc($resultado);
        $cargo = $fila['cargo'];

        // Si el cargo es 1 o 2, cambiar $hayResultado a true
        if ($cargo == 1) {
            $hayResultado = true;
        }
    }
}
?>
