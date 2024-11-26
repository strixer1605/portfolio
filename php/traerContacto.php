<?php
include 'conexion.php';

// Consulta para obtener los datos de contacto
$sql = "SELECT * FROM contacto WHERE 1";
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay resultados
if (mysqli_num_rows($resultado) > 0) {
    // Iterar sobre el primer resultado
    $fila = mysqli_fetch_assoc($resultado);
    echo '
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" value="' . htmlspecialchars($fila["telefono"]) . '">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="' . htmlspecialchars($fila["email"]) . '">

        <label for="ubicacion">Ubicación:</label>
        <input type="text" id="ubicacion" name="ubicacion" value="' . htmlspecialchars($fila["ubicacion"]) . '">

        <label for="linkedin">LinkedIn:</label>
        <input type="url" id="linkedin" name="linkedin" value="' . htmlspecialchars($fila["linkedin"]) . '">
    ';
} else {
    // Mostrar mensaje si no hay resultados
    echo '<p>No hay datos de contacto registrados.</p>';
}
?>
