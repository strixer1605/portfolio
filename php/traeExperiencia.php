<?php
include 'conexion.php';

// Consulta para obtener todas las experiencias laborales
$sql = "SELECT * FROM experiencia_laboral ORDER BY idEL ASC";
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay resultados
if (mysqli_num_rows($resultado) > 0) {
    // Iterar sobre cada resultado
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo '<div class="experiencia-item">';
        echo '<input type="text" value="' . htmlspecialchars($fila['lugar']) . '" disabled>';
        echo '<input type="text" value="' . htmlspecialchars($fila['periodo']) . '" disabled>';
        echo '<input type="text" value="' . htmlspecialchars($fila['puesto']) . '" disabled>';
        echo '<button class="editar-btn" data-direccion = "actualizarExperiencia" data-id="' . $fila['idEL'] . '">Editar</button>';
        echo '<button class="eliminar-btn" data-texto = "Esta acción eliminará permanentemente la experiencia laboral." data-direccion = "eliminarExperiencia" data-id="' . $fila['idEL'] . '">Eliminar</button>';
        echo '</div>';
    }
} else {
    // Mostrar mensaje si no hay resultados
    echo '<p>Todavía no hay estudios.</p>';
}
?>
