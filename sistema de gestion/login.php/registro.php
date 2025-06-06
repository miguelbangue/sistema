

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
  <link rel="icon" type="image/png" style="width: 50px; height: 50px; border-radius: 30px; border: 1px solid white;" href="../imagenes/Flux_Dev_A_stylish_urban_sneaker_store_front_named_UrbanStep_w_2.jpg">
    <link rel="stylesheet" href="../css/login.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    
<div class="login-bg">
        <div class="login-container">
            <div class="login-header">
    <img src="../imagenes/Flux_Dev_A_stylish_urban_sneaker_store_front_named_UrbanStep_w_2.jpg" alt="Logo" class="login-logo">
    <h2>Registrate Aqui</h2>
    </div>
<?php
      session_start(); 
        if (isset($_SESSION['error'])) {
        echo "<label style='border-radius: 15px; background: rgba(255, 0, 0, 0.5); color: white; padding:5px; display: block; margin-bottom: 10px;'>".$_SESSION['error']."</label>";
        unset($_SESSION['error']); // Eliminar error para que no se quede siempre ahí
      }
      ?>
    <form class="login-form" method="post" action="verificarregistro.php">
     
      <input type="text" placeholder="nombre" name="nombre" required>
      <input type="email" placeholder="gmail" name="gmail" required>
      <div class="password-wrapper">
                  <input type="password" placeholder="Contraseña" required name="contraseña" autocomplete="current-password" id="password-input">
                  <div type="button" class="toggle-password" tabindex="-1">
            <!-- Icono mostrar contraseña (ojo abierto) -->
                  <svg id="icon-show" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24"><path stroke="#888" stroke-width="2" d="M1.5 12S5.5 5.5 12 5.5 22.5 12 22.5 12 18.5 18.5 12 18.5 1.5 12 1.5 12Z"/><circle cx="12" cy="12" r="3.5" stroke="#888" stroke-width="2"/></svg>
            <!-- Icono ocultar contraseña (ojo tachado) -->
                  <svg id="icon-hide" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" style="display:none"><path stroke="#888" stroke-width="2" d="M3 3l18 18"/><path stroke="#888" stroke-width="2" d="M1.5 12S5.5 5.5 12 5.5c2.1 0 4.1.6 5.8 1.5M22.5 12s-1.2 2.1-3.2 4.1"/><circle cx="12" cy="12" r="3.5" stroke="#888" stroke-width="2"/></svg>
                  </div>
      </div>
      <button type="submit">Entrar</button>
      <p class="register-link">¿tienes cuenta? <a href="../index.php">iniciar sesión</a></p>
    </form>
  
  </div>
  </div>

<script src="../js/mostrarContraseña.js"></script>

</body>
</html>