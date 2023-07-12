<?php

// Cargar el contenido del archivo JSON
$jsonData = file_get_contents('../../persistencia/usuarios.json');

// Decodificar el JSON en un array asociativo
$data = json_decode($jsonData, true);

?>
