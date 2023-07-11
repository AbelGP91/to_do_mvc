<?php

// Cargar el contenido del archivo JSON
$jsonData = file_get_contents('../usuarios.json');

// Decodificar el JSON en un array asociativo
$data = json_decode($jsonData, true);



/**
 * This file is used for creating a connection to the database

 
// parses the settings file
$settings = parse_ini_file('settings.ini', true);

// starts the connection to the database
$dbh = new PDO(
  sprintf(
    "%s:host=%s;dbname=%s",
    $settings['database']['driver'],
    $settings['database']['host'],
    $settings['database']['dbname']
  ),
  $settings['database']['user'],
  $settings['database']['password']
);
**/
?>
