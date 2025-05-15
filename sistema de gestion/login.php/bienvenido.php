 <!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido</title>
  <link rel="stylesheet" href="../css/footer.css?v=2">
  <link rel="stylesheet" href="../css/header.css?v=2">
  <link rel="stylesheet" href="../css/bienvenido.css?v=2">
</head>
<?php require "../plantillas/header.html"; ?>
 <body>
 <?php
      session_start();
      if (!isset($_SESSION['gmail'])) {
        header("Location: ../index.php");
        exit();
      }
      ?>
<div class="body_cartas">
<div class="body_oscuro">
<div class="carousel-container">
  <button class="carousel-btn prev">&#10094;</button>
  <div class="carousel-track">
    
  <div class="card buscador-carta" data-nombre="jordan">
  <div class="imagen-card"><img src="../imagenes/jordan_retro4.webp" alt="Jordan"></div>
  <div class="descripcion-carta">
    <p><strong style="color:white;">Jordan</strong></p>  
  </div>
</div>

<div class="card buscador-carta" data-nombre="adidas">
  <div class="imagen-card"><img src="../imagenes/adidassuperstar-removebg-preview.png" alt="Adidas"></div>
  <div class="descripcion-carta">
    <p><strong style="color:white;">Adidas</strong></p>  
  </div>
</div>

<div class="card buscador-carta" data-nombre="nike">
  <div class="imagen-card"><img src="../imagenes/air_for_one-removebg-preview.png" alt="Nike"></div>
  <div class="descripcion-carta">
    <p><strong style="color:white;">Nike</strong></p>  
  </div>
</div>

<div class="card buscador-carta" data-nombre="puma">
  <div class="imagen-card"><img src="../imagenes/puma_roma-removebg-preview.png" alt="Puma"></div>
  <div class="descripcion-carta">
    <p><strong style="color:white;">Puma</strong></p>  
  </div>
</div>

<div class="card buscador-carta" data-nombre="reebok">
  <div class="imagen-card"><img src="../imagenes/reebok_botascoloridas-removebg-preview.png" alt="Reebok"></div>
  <div class="descripcion-carta">
    <p><strong style="color:white;">Reebok</strong></p>  
  </div>
</div>

<div class="card buscador-carta" data-nombre="new balance">
  <div class="imagen-card"><img src="../imagenes/new_balance-removebg-preview.png" alt="New Balance"></div>
  <div class="descripcion-carta">
    <p><strong style="color:white;">New Balance</strong></p>  
  </div>
</div>

<div class="card buscador-carta" data-nombre="converse">
  <div class="imagen-card"><img src="../imagenes/converse-removebg-preview.png" alt="Converse"></div>
  <div class="descripcion-carta">
    <p><strong style="color:white;">Converse</strong></p>  
  </div>
</div>

<div class="card buscador-carta" data-nombre="vans">
  <div class="imagen-card"><img src="../imagenes/vans-removebg-preview.png" alt="Vans"></div>
  <div class="descripcion-carta">
    <p><strong style="color:white;">Vans</strong></p>  
  </div>
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

<!-- buscador de productos -->
<form method="get" action="bienvenido.php#productos" class="buscador-form">
  <input type="text" name="busqueda" placeholder="Buscar zapatillas por nombre" value="<?php echo htmlspecialchars($busqueda); ?>">
  <button type="submit">Buscar</button>
</form>
<!-- fin buscador de productos -->


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

<!-- div productos -->
<div class="productos <?php echo !empty($busqueda) ? 'buscando ' . $busqueda_lower : ''; ?>" id="productos">
  <?php
  if (!empty($busqueda)) {
    $sqlproduc = "SELECT * FROM zapatillas WHERE nombre LIKE ?";
    $stmt = $conexion->prepare($sqlproduc);
    $param = "%" . $busqueda . "%";
    $stmt->bind_param("s", $param);
    $stmt->execute();
    $zapatillas = $stmt->get_result();
  } else {
    $sqlproduc = "SELECT * FROM zapatillas";
    $zapatillas = $conexion->query($sqlproduc);
  }
  
  if ($zapatillas->num_rows > 0) {
    while ($zapatilla = $zapatillas->fetch_assoc()) {
      ?>
      <div class="proctos_card">
        <div class="card">
          <div class="imagen-card">
            <img src="<?php echo htmlspecialchars($zapatilla['imagen']); ?>" alt="Zapatilla">
          </div>
          <div class="descripcion-carta">
            <p><strong><?php echo htmlspecialchars($zapatilla['nombre']); ?></strong></p>
            <p>Precio: $<?php echo number_format($zapatilla['precio'], 2); ?></p>
            <button class="btn_comprar">comprar</button>

            <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] == 1): ?>
              <a href="editar_producto.php?id=<?php echo $zapatilla['id']; ?>" class="btn_editar">Editar</a>
              <a href="eliminar_producto.php?id=<?php echo $zapatilla['id']; ?>" class="btn_eliminar"  >Eliminar</a>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <?php
    }
  } else {
    echo "<p>No se encontraron resultados para <strong>" . htmlspecialchars($busqueda) . "</strong>.</p>";
  }

  $conexion->close();
  ?>
</div>

<!-- fin de div productos -->



<br><br><br>

<?php include "correo.php"; ?>
<?php require "../plantillas/footer.php";?>



<script src="../js/header.js"></script>
<script src="../js/cartasbuscar.js"></script>
<script src="../js/carruselcartas.js"></script>
 </body>
 </html>

     