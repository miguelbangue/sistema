

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    
<div class="login-container">
<?php
      session_start(); 
        if (isset($_SESSION['error'])) {
        echo "<label style='border-radius: 15px; background: rgba(255, 0, 0, 0.5); color: white; padding:5px; display: block; margin-bottom: 10px;'>".$_SESSION['error']."</label>";
        unset($_SESSION['error']); // Eliminar error para que no se quede siempre ahí
      }
      ?>
    <form class="login-form" method="post" action="verificarregistro.php">
      <h2> Regístrate Aqui</h2>
      <input type="text" placeholder="nombre" name="nombre" required>
      <input type="email" placeholder="gmail" name="gmail" required>
      <input type="password" placeholder="Contraseña" name="contraseña" required>
      <button type="submit">Entrar</button>
      <p class="register-link">¿tienes cuenta? <a href="../index.php">iniciar sesión</a></p>
    </form>
  </div>


</body>
</html>