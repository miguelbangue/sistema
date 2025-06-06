
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="icon" type="image/png" href="imagenes/Flux_Dev_A_stylish_urban_sneaker_store_front_named_UrbanStep_w_2.jpg">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="login-bg">
        <div class="login-container">
            <div class="login-header">
                <img src="imagenes/Flux_Dev_A_stylish_urban_sneaker_store_front_named_UrbanStep_w_2.jpg" alt="Logo" class="login-logo">
                <h2>Iniciar Sesión</h2>
            </div>
            <?php
            session_start(); 
            if (isset($_SESSION['error'])) {
                echo "<label class='login-msg error'>".$_SESSION['error']."</label>";
                unset($_SESSION['error']);
            }
            if (isset($_SESSION['mensaje'])) {
                echo "<label class='login-msg success'>".$_SESSION['mensaje']."</label>";
                unset($_SESSION['mensaje']);
            }
            ?>
            <form class="login-form" method="post" action="./login.php/verificar.php">
                <input type="text" placeholder="Correo electrónico" required name="gmail" autocomplete="username">
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
                <p class="register-link">¿No tienes cuenta? <a href="./login.php/registro.php">Regístrate</a></p>
                <p class="register-link">¿olvido su <a href="./login.php/olvidoContraseña/olvidoContraseña.php">contraseña? </a></p>
              </form>
        </div>
    </div>
<script src="./js/mostrarContraseña.js"></script>

</body>
</html>

