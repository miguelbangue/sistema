<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña</title>
    <link rel="icon" type="image/png" href="../../imagenes/Flux_Dev_A_stylish_urban_sneaker_store_front_named_UrbanStep_w_2.jpg">
    <link rel="stylesheet" href="../../css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="login-bg">
        <div class="login-container">
            <div class="login-header">
                <img src="../../imagenes/Flux_Dev_A_stylish_urban_sneaker_store_front_named_UrbanStep_w_2.jpg" alt="Logo" class="login-logo">
                <h2>Recuperar Contraseña</h2>
            </div>
            <form class="login-form" id="form-correo" method="post" action="./enviarCorreo.php">
                <input type="email" placeholder="Correo electrónico" required name="gmail" autocomplete="username" id="correo">
                <button type="submit">Enviar código</button>
            </form>
            <form class="login-form" id="form-restablecer" style="display:none;" method="post" action="./restablecerAjax.php">
                <input type="text" placeholder="Código recibido" required name="codigo" id="codigo">
                <input type="hidden" name="gmail" id="gmail" >
                <input type="password" placeholder="Nueva contraseña" required name="nueva_contraseña" id="nueva_contraseña">
                <button type="submit">Restablecer contraseña</button>
                <p class="register-link">¿volver al <a href="../../index.php">login? </a></p>
            </form>
            <div id="msg" class="login-msg"></div>
        </div>
    </div>

   

<script>
document.getElementById('form-correo').addEventListener('submit', function(e) {
    e.preventDefault();
    const correo = document.getElementById('correo').value;

    // Aquí haces el fetch a enviarCorreo.php (no a restablecerAjax.php)
    fetch('enviarCorreo.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'gmail=' + encodeURIComponent(correo)
    })
    .then(res => res.text())
    .then(data => {
        if (data.trim() === 'ok') {
            if (confirm('Si el correo existe, se ha enviado un código.')) {
                document.getElementById('form-correo').style.display = 'none';
                document.getElementById('form-restablecer').style.display = 'block';
                document.getElementById('gmail').value = correo; // <-- Aquí asignas el correo al input oculto
                document.getElementById('msg').textContent = '';
            }
        } else {
            document.getElementById('msg').textContent = data;
        }
    });
});

// Ahora el segundo formulario puede enviarse normalmente, el input oculto tendrá el correo correcto
document.getElementById('form-restablecer').addEventListener('submit', function(e) {
    e.preventDefault();
    const gmail = document.getElementById('gmail').value;
    const codigo = document.getElementById('codigo').value;
    const nueva = document.getElementById('nueva_contraseña').value;
    fetch('restablecerAjax.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'gmail=' + encodeURIComponent(gmail) +
            '&codigo=' + encodeURIComponent(codigo) +
            '&nueva_contraseña=' + encodeURIComponent(nueva)
    })
    .then(res => res.text())
    .then(data => {
        document.getElementById('msg').textContent = data;
    });
});
</script>
</body>
</html>

