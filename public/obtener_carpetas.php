<?php
// Permitir acceso desde cualquier origen (CORS)
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Obtener la lista de carpetas en la carpeta "uploads"
$carpetas = glob('uploads/*', GLOB_ONLYDIR);

// Extraer solo los nombres de las carpetas
$nombresCarpetas = array_map('basename', $carpetas);

// Devolver la lista de carpetas en formato JSON
echo json_encode($nombresCarpetas);
?>