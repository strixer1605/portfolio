<?php
    session_start();
    if (!isset($_SESSION['email']) || !isset($_SESSION['nombre'])) {
        header('Location: ../index.php');
        exit;
    } else {
        $email = $_SESSION['email'];
        $nombre = $_SESSION['nombre'];
        include('../php/conexion.php');
    }
?>