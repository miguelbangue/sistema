 <!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="../imagenes/Flux_Dev_A_stylish_urban_sneaker_store_front_named_UrbanStep_w_2.jpg" >
  <title>Bienvenido</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/footer.css?v=2">
  <link rel="stylesheet" href="../css/header.css?v=2">
  <link rel="stylesheet" href="../css/bienvenido.css?v=2">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <!-- En el head -->
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

</head>
<?php
      session_start();
      if (!isset($_SESSION['gmail'])) {
        header("Location: ../index.php");
        exit();
      }
      ?>
<?php include "./modalcontacto.php" ?>
<?php require "../plantillas/header.html"; ?>
<body>
  

   
<?php include "./menu_carrito.php"; ?>
<!-- aqui hacia arriba va el menu carrito -->

<?php
// Asegura que el carrito sea un array válido
   
if($_SESSION['carrito']){
  if (isset($_GET['men'])) {
  echo urldecode($_GET['men']);
}
}
?>


<div class="body_cartas">
<div class="body_oscuro">
  
<div class="carousel-container">
  <button class="carousel-btn prev">&#10094;</button>
  <div class="carousel-track">
    
  <!-- Cartas con formulario para búsqueda -->
<form method="get" action="bienvenido.php#productos" class="buscador-carta">
  <input type="hidden" name="busqueda" value="jordan">
  <button type="submit" class="card">
    <div class="imagen-card"><img src="../imagenes/jordan_retro4.webp" alt="Jordan"></div>
    <div class="descripcion-carta">
      <p><strong style="color:white;">Jordan</strong></p>  
    </div>
  </button>
</form>

<form method="get" action="bienvenido.php#productos" class="buscador-carta">
  <input type="hidden" name="busqueda" value="adidas">
  <button type="submit" class="card">
    <div class="imagen-card"><img src="../imagenes/adidassuperstar-removebg-preview.png" alt="Adidas"></div>
    <div class="descripcion-carta">
      <p><strong style="color:white;">Adidas</strong></p>  
    </div>
  </button>
</form>

<form method="get" action="bienvenido.php#productos" class="buscador-carta">
  <input type="hidden" name="busqueda" value="nike">
  <button type="submit" class="card">
    <div class="imagen-card"><img src="../imagenes/air_for_one-removebg-preview.png" alt="Nike"></div>
    <div class="descripcion-carta">
      <p><strong style="color:white;">Nike</strong></p>  
    </div>
  </button>
</form>

<form method="get" action="bienvenido.php#productos" class="buscador-carta">
  <input type="hidden" name="busqueda" value="puma">
  <button type="submit" class="card">
    <div class="imagen-card"><img src="../imagenes/puma_roma-removebg-preview.png" alt="Puma"></div>
    <div class="descripcion-carta">
      <p><strong style="color:white;">Puma</strong></p>  
    </div>
  </button>
</form>

<form method="get" action="bienvenido.php#productos" class="buscador-carta">
  <input type="hidden" name="busqueda" value="reebok">
  <button type="submit" class="card">
    <div class="imagen-card"><img src="../imagenes/reebok_botascoloridas-removebg-preview.png" alt="Reebok"></div>
    <div class="descripcion-carta">
      <p><strong style="color:white;">Reebok</strong></p>  
    </div>
  </button>
</form>

<form method="get" action="bienvenido.php#productos" class="buscador-carta">
  <input type="hidden" name="busqueda" value="new balance">
  <button type="submit" class="card">
    <div class="imagen-card"><img src="../imagenes/new_balance-removebg-preview.png" alt="New Balance"></div>
    <div class="descripcion-carta">
      <p><strong style="color:white;">New Balance</strong></p>  
    </div>
  </button>
</form>

<form method="get" action="bienvenido.php#productos" class="buscador-carta">
  <input type="hidden" name="busqueda" value="converse">
  <button type="submit" class="card">
    <div class="imagen-card"><img src="../imagenes/converse-removebg-preview.png" alt="Converse"></div>
    <div class="descripcion-carta">
      <p><strong style="color:white;">Converse</strong></p>  
    </div>
  </button>
</form>

<form method="get" action="bienvenido.php#productos" class="buscador-carta">
  <input type="hidden" name="busqueda" value="vans">
  <button type="submit" class="card">
    <div class="imagen-card"><img src="../imagenes/vans-removebg-preview.png" alt="Vans"></div>
    <div class="descripcion-carta">
      <p><strong style="color:white;">Vans</strong></p>  
    </div>
  </button>
</form>


</div>
</div>
  <button class="carousel-btn next">&#10095;</button>
</div>
</div>
</div>

<!-- div separar 1 -->
 <div class="separar1">
 </div>
<!-- div separar 2 -->


<?php
include "conexion.php";
$busqueda = $_GET['busqueda'] ?? ''; 
$busqueda_lower =strtolower($busqueda);
?>


<!-- div crear productos -->
<?php if (isset($_SESSION['rol']) && $_SESSION['rol'] == 1): ?>
  <div class="crear_producto">
    <form action="crear_producto.php" method="post" enctype="multipart/form-data">
      <input type="text" name="nombre" placeholder="Nombre del producto" maxlength="14" required>
      <input type="text" step="0.01" name="precio" placeholder="Precio" maxlength="6" required>
      <input type="file" name="imagen" required>
      <input type="submit" value="Crear Producto">
    </form>
  </div>
  <?php endif; ?>
  <!-- fin div productos -->

  <!-- buscador de productos -->
  <form method="get" action="bienvenido.php#productos" class="buscador-form">
    <div class="buscador-wrapper">
      <input type="text" name="busqueda" placeholder="Buscar zapatillas por nombre" value="<?php echo htmlspecialchars($busqueda); ?>">
      <button type="submit">
        🔍 Buscar
      </button>
    </div>
  </form>
  
  <!-- fin buscador de productos -->

<!-- div productos -->
<div class="productos <?php echo !empty($busqueda) ? 'buscando ' . $busqueda_lower : ''; ?>" id="productos">
  <?php
  if (!empty($busqueda)) {
    $sqlproduc = ($_SESSION['rol'] == 1)
      ? "SELECT * FROM zapatillas WHERE nombre LIKE ?"
      : "SELECT * FROM zapatillas WHERE eliminado = 0 AND nombre LIKE ?";
    
    $stmt = $conexion->prepare($sqlproduc);
    $param = "%" . $busqueda . "%";
    $stmt->bind_param("s", $param);
    $stmt->execute();
    $zapatillas = $stmt->get_result();
  } else {
    $sqlproduc = ($_SESSION['rol'] == 1)
      ? "SELECT * FROM zapatillas"
      : "SELECT * FROM zapatillas WHERE eliminado = 0";
    $zapatillas = $conexion->query($sqlproduc);
  }

  if ($zapatillas->num_rows > 0) {
    while ($zapatilla = $zapatillas->fetch_assoc()) {
      // Si está eliminado y el usuario no es admin, no se muestra nada
      if ($zapatilla['eliminado'] == 1 && $_SESSION['rol'] != 1) {
        continue;
      }

      // Mostrar tarjeta para producto eliminado (solo admins)
      if ($zapatilla['eliminado'] == 1 && $_SESSION['rol'] == 1): ?>
        <div class="card eliminado">
          <div class="imagen-card">
            <img src="<?php echo htmlspecialchars($zapatilla['imagen']); ?>" alt="Zapatilla">
          </div>
          <div class="descripcion-carta">
            <div class="alert alert-warning">Producto Deshabilitado</div>
              <p><strong><?php echo htmlspecialchars($zapatilla['nombre']); ?></strong></p>
            <a href="restaurarProducto.php?id=<?php echo $zapatilla['id']; ?>" class="btn_restaurar" onclick="return confirm('¿Estás seguro de que deseas habilitar este producto?');" style="color: white;border: none; background: linear-gradient(135deg, #d7f81c, #dbf568);   padding: 10px 20px;    margin-top: 10px;    border-radius: 8px;    font-size: 14px;    font-weight: bold;    cursor: pointer;    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);    transition: background 0.3s ease, transform 0.2s ease;" ><i class="bi bi-recycle"></i></a>
            <a href="eliminar_productobd.php?id=<?php echo 'fnrjnfjb' . $zapatilla['id'] . 'ttbrsewe'; ?>" class="btn_eliminar" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?');">Eliminar</a>  
          </div>
        </div>
      <?php 
      // Mostrar producto activo (todos pueden ver)
      else: ?>
        <form action="carrito.php" method="post">
          <div class="card">
            <div class="imagen-card">
              <img src="<?php echo htmlspecialchars($zapatilla['imagen']); ?>" alt="Zapatilla">
            </div>
            <div class="descripcion-carta">
              <p><strong><?php echo htmlspecialchars($zapatilla['nombre']); ?></strong></p>
              <p>Precio: $<?php echo number_format($zapatilla['precio'], 2); ?></p>

              <div class="proctos_card">
                <button class="btn_comprar" type="submit"><i class="bi bi-cart-fill"></i></button>

                <?php if ($_SESSION['rol'] == 1): ?>
                  <a href="editar_producto.php?id=<?php echo 'fnrjnfjb' . $zapatilla['id'] . 'ttbrsewe'; ?>" class="btn_editar">Editar</a>
                  <a href="eliminar_producto.php?id=<?php echo 'fnrjnfjb' . $zapatilla['id'] . 'ttbrsewe'; ?>" class="btn_eliminar" onclick="return confirm('¿Estás seguro de que deseas dejar de mostrar este producto?');">Deshabilitar </a>
                <?php endif; ?>
              </div>

              <!-- Inputs ocultos -->
              <input type="hidden" name="id" value="<?php echo $zapatilla['id']; ?>">
              <input type="hidden" name="nombre" value="<?php echo htmlspecialchars($zapatilla['nombre']); ?>">
              <input type="hidden" name="precio" value="<?php echo $zapatilla['precio']; ?>">
              <input type="hidden" name="imagen" value="<?php echo htmlspecialchars($zapatilla['imagen']); ?>">
            </div>
          </div>
        </form>
      <?php 
      endif;
    }
  } else {
    echo "<p>No se encontraron resultados para <strong>" . htmlspecialchars($busqueda) . "</strong>.</p>";
  }

  $conexion->close();
  ?>
</div>
<!-- fin de div productos -->



<!-- para que la ia responda usa este cuando este terminado -->
<!-- <a href="https://wa.me/14155238886?text=join%20tiger-rainbow"  -->
  
<!-- Botón flotante de WhatsApp -->
<a href="https://api.whatsapp.com/send?phone=573160730007&text=Hola%2C%20quiero%20hablar%20con%20miguel%20para%20comprar"  
   text=Hola%2C%20quiero%20hablar%20con%20miguel%20para%20comprar
   class="btn btn-success rounded-circle shadow-lg" 
   style="position: fixed; bottom: 20px; right: 20px; width: 60px; height: 60px; z-index: 1000;" 
   target="_blank" 
   title="Habla con nuestro asistente">
  <i class="bi bi-whatsapp" style="font-size: 28px;"></i>
</a>

<br><br><br>

<?php include "correo.php"; ?>
<?php require "../plantillas/footer.php";?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
<script src="../js/header.js"></script>
<script src="../js/cartasbuscar.js"></script>
<script src="../js/carruselcartas.js"></script>





 </body>
 </html>

     