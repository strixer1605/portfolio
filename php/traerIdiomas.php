<?php
include 'conexion.php';

// Consulta para obtener todas las experiencias laborales
$sql = "SELECT * FROM idiomas ORDER BY idIdioma ASC";
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay resultados
if (mysqli_num_rows($resultado) > 0) {
    // Iterar sobre cada resultado
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo '<div class="experiencia-item">';
        echo '<div class="idioma-item">';
        echo '<input type="text" value="' . htmlspecialchars($fila['idioma']) . '" disabled>';
        echo '<button class="editar-btnn" data-direccion = "actualizarIdioma" data-id="' . $fila['idIdioma'] . '">Editar</button>';
        echo '<button class="eliminar-btn" data-texto = "Esta acción eliminará permanentemente este idioma." data-direccion = "eliminarIdioma" data-id="' . $fila['idIdioma'] . '">Eliminar</button>';
        echo '</div>';
        echo '</div>';
    }
} else {
    // Mostrar mensaje si no hay resultados
    echo '<p>Todavía no hay idiomas.</p>';
}
?>
