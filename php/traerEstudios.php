<?php
include 'conexion.php';

// Consulta para obtener todas las experiencias laborales
$sql = "SELECT * FROM estudios ORDER BY idE ASC";
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay resultados
if (mysqli_num_rows($resultado) > 0) {
    // Iterar sobre cada resultado
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo '<div class="experiencia-item">';
        echo '<input type="text" value="' . htmlspecialchars($fila['institucion']) . '" disabled>';
        echo '<input type="text" value="' . htmlspecialchars($fila['periodo']) . '" disabled>';
        echo '<input type="text" value="' . htmlspecialchars($fila['titulo']) . '" disabled>';
        echo '<button class="editar-btn" data-direccion = "actualizarEstudios" data-id="' . $fila['idE'] . '">Editar</button>';
        echo '<button class="eliminar-btn" data-texto = "Esta acción eliminará permanentemente este estudio." data-direccion = "eliminarEstudios" data-id="' . $fila['idE'] . '">Eliminar</button>';
        echo '</div>';
    }
} else {
    // Mostrar mensaje si no hay resultados
    echo '<p>Todavía no hay experiencias laborales.</p>';
}
?>
