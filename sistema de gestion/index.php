
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
  <link rel="icon" type="image/png" href="imagenes/Flux_Dev_A_stylish_urban_sneaker_store_front_named_UrbanStep_w_2.jpg">
    <link rel="stylesheet" href="css/login.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

</head>
<body>
    
<div class="login-container">
      <?php
      session_start(); 
        if (isset($_SESSION['error'])) {
        echo "<label style='border-radius: 15px; background: rgba(255, 0, 0, 0.5); color: white; padding:5px; display: block; margin-bottom: 10px;'>".$_SESSION['error']."</label>";
        unset($_SESSION['error']); // Eliminar error para que no se quede siempre ahí
      }
        if (isset($_SESSION['mensaje'])) {
        echo "<label style='border-radius: 15px; background: rgba(0, 255, 55, 0.5); color: white; padding:5px; display: block; margin-bottom: 10px;'>".$_SESSION['mensaje']."</label>";
        unset($_SESSION['mensaje']); // Eliminar error para que no se quede siempre ahí
      }
      ?>
    <form class="login-form" method="post" action="./login.php/verificar.php">
      <h2>Iniciar Sesión</h2>
      <input type="text" placeholder="gmail" required name="gmail">
      <input type="password" placeholder="Contraseña" required name="contraseña">
      <button type="submit">Entrar</button> 
      <p class="register-link">¿No tienes cuenta? <a href="./login.php/registro.php">Regístrate</a></p>
    </form>
  </div>


</body>
</html>