<?php 
class Tareas extends Model{

 static array $tareas;

 static string $filePath = '../persistencia/usuarios.json';

 public static function comprobarJson(){
     if(!file_exists(self::$filePath)){
         mkdir(ROOT_PATH . "../persistencia");

         file_put_contents(self::$filePath, []);
     }
     
 }

 public static function obtenerTareas() {
     self::comprobarJson();

     $jsonContent = file_get_contents(self::$filePath);
     $data = json_decode($jsonContent, true);
     
     return $data ?: [];
 }

 public static function escribirJson($tareas):void {
     $jsonData = json_encode($tareas, JSON_PRETTY_PRINT);

     file_put_contents(self::$filePath, $jsonData);
 }

 public static function obtenerTareaPorId($tareaId): ?array{

    $tareas = self::obtenerTareas();
    if (isset($tareas[$tareaId])) {
        return $tareas[$tareaId];
    } else {
        return null;
    }  
 }

 public static function guardarTarea($tarea): void {
     Tareas::comprobarJson();

     $tareas = Tareas::obtenerTareas();

     $tareas[] = $tarea;

     Tareas::escribirJson($tareas);
 }

 public static function actualizarTarea($tareaId, array $modificacion): void {
    $tareas = Tareas::obtenerTareas();
    
    if (isset($tareas[$tareaId])) {
        $tareaModificada = array_merge($tareas[$tareaId], $modificacion);
        unset($tareas[$tareaId]);
        $tareas[$tareaId] = $tareaModificada;
        Tareas::escribirJson($tareas);
    }
 }
public static function borrarTarea($tareaId): void {
    $tareas = Tareas::obtenerTareas();
    unset($tareas[$tareaId]);
    Tareas::escribirJson($tareas);
}
 
}