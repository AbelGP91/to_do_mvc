<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loggin_Index</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    
<?php include "./layouts/header.php";?>

<main class="flex justify-center items-center h-screen">
    <form class="bg-blue-500 p-4 rounded-lg shadow-md" method="post" action="controlador/loggin/loggin.php">
      <p class="text-white">Introdueix el teu email</p>
        <input type="email" name="email" id="email" class="w-full px-3 py-2 rounded-sm mb-3" placeholder="Email">
      <p class="text-white">Introdueix el teu password</p>
        <input type="password" name="password" id="password" class="w-full px-3 py-2 rounded-sm mb-3" placeholder="Password">
      <input type="submit" value="Enviar" class="w-full bg-white text-blue-500 font-bold py-2 px-4 rounded">
    </form>
    
  </main>

 <?php include "./layouts/footer.php";?>

</body>
</html>