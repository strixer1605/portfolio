<?php
include 'conexion.php';

// Consulta para obtener los datos de contacto
$sql = "SELECT * FROM sobre_mi WHERE 1";
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay resultados
if (mysqli_num_rows($resultado) > 0) {
    // Iterar sobre el primer resultado
    $fila = mysqli_fetch_assoc($resultado);
    echo '
        <textarea id="descripcion" name="descripcion" rows="4">'.$fila['descripcion'].'</textarea>
    ';
} else {
    // Mostrar mensaje si no hay resultados
    echo '<p>No hay datos de contacto registrados.</p>';
}
?>
