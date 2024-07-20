<?php
// Obtener el número de capítulo desde el parámetro GET
if (isset($_GET['episode'])) {
    $episodeNumber = intval($_GET['episode']); // Asegurar que sea un número entero
    
    // Ruta al archivo CodeEpisode.txt
    $file = 'Season\Nine\Code\CodeEpisode.txt'; // Ajustar la ruta según la ubicación real de CodeEpisode.txt

    // Leer el contenido del archivo línea por línea
    $lines = file($file, FILE_IGNORE_NEW_LINES);

    // Verificar que el número de capítulo esté dentro del rango
    if ($episodeNumber > 0 && $episodeNumber <= count($lines)) {
        $next_code = $lines[$episodeNumber - 1]; // Restar 1 porque el array empieza en 0

        // Construir el enlace completo
        $link = 'https://enpantallas.com/' . $next_code;

        // Devolver el enlace
        echo $link;
    } else {
        // Si el número de capítulo está fuera de rango, devolver un mensaje de error o redirigir a una página de error
        echo 'Error: Capítulo no encontrado.';
    }
} else {
    // Si no se proporciona el parámetro 'episode', devolver un mensaje de error
    echo 'Error: No se proporcionó el número de capítulo.';
}
?>