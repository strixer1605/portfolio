<?php
include 'conexion.php';

// Consulta para obtener todas las experiencias laborales
$sql = "SELECT * FROM herramientas_software ORDER BY idHerramienta ASC";
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay resultados
if (mysqli_num_rows($resultado) > 0) {
    // Iterar sobre cada resultado
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo '<div class="experiencia-item">';
        echo '<div class="idioma-item">';
        echo '<input type="text" value="' . htmlspecialchars($fila['herramienta']) . '" disabled>';
        echo '<button class="editar-btnn" data-direccion = "actualizarHerramienta" data-id="' . $fila['idHerramienta'] . '">Editar</button>';
        echo '<button class="eliminar-btn" data-texto = "Esta acción eliminará permanentemente esta herramienta." data-direccion = "eliminarHerramienta" data-id="' . $fila['idHerramienta'] . '">Eliminar</button>';
        echo '</div>';
        echo '</div>';
    }
} else {
    // Mostrar mensaje si no hay resultados
    echo '<p>Todavía no hay herramientas.</p>';
}
?>
