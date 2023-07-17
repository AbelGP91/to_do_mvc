<nav class="bg-blue-500 p-4">
    <div class="flex justify-between items-center">
      <div>
        <a href="https://cibernarium.barcelonactiva.cat/it-academy/inscripcio;jsessionid=44A52BE7E44A35C9674C0DA90890BF48"
         class="text-white text-lg font-bold hover:text-blue-200 px-4">IT Academy</a>
      </div>
      <div>
        <a href="../vista/menu.php" class="text-white hover:text-blue-200 px-4">Tornar al menu</a>
        <a href="#" class="text-white hover:text-blue-200 px-4">Nosaltres</a>
        <a href="#" class="text-white hover:text-blue-200 px-4">Serveis</a>
        <a href="#" class="text-white hover:text-blue-200 px-4">Contacte</a>
      </div>
    </div>
    
    <?php
  if (isset($_SESSION['usuarios']) && isset($_SESSION['usuarios'][0]['idUsuario'])) {
    $idUsuario = $_SESSION['usuarios'][0]['idUsuario'];
} else {
    $idUsuario = null;
}

echo '<div class="flex justify-center items-center">';
echo '<span class="text-white">User ID: ' . $idUsuario . '</span>';
echo '</div>';

?>

  </nav>