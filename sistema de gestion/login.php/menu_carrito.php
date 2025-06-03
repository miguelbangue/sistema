<!-- Menú lateral del carrito -->
 <div class="offcanvas offcanvas-end" tabindex="-1" id="menuCarrito" aria-labelledby="menuCarritoLabel">
  <div class="offcanvas-header">
    <h5 id="menuCarritoLabel">Carrito de compras</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
  </div>
  <div class="offcanvas-body">

    

    <?php if (!empty($_SESSION['carrito'])): ?>
    <?php $totalfin = 0; ?>
      <?php foreach ($_SESSION['carrito'] as $item): ?>
        <div class="card mb-3 shadow-sm border-0">
  <div class="card-header d-flex justify-content-between align-items-center bg-light" id="produc">
    <h6 class="mb-0 text-muted">Producto en carrito</h6>
    <form action="./carrito.php" method="post">
     <input type="hidden" name="idEliminar" value="<?php echo $item['id']; ?>" onsubmit="return confirm('¿Eliminar este producto del carrito?');"> 
    <button type="submit" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
    </form>
  </div>
  <div class="row g-0 align-items-center">
    <div class="col-md-4 text-center p-2">
      <img src="<?php echo htmlspecialchars($item['imagen']); ?>" class="img-fluid rounded" alt="Producto" style="max-height: 120px; object-fit: contain;">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title mb-1"><?php echo htmlspecialchars($item['nombre']); ?></h5>
         
        <p class="card-text text-muted mb-2">Precio: <strong>$<?php echo number_format($item['cantidad']*$item['precio'], 2); ?></strong></p>
        <div class="d-flex align-items-center">
          <label for="cantidad" class="me-2 mb-0">Cantidad:</label>
          <input type="number" name="cantidad" min="1" max="999" maxlength="3"
            value="<?php echo $item['cantidad'] ?>"
            style="width: 70px;" disabled
            class="form-control form-control-sm"
            onkeydown="if(this.value.length>=3 && event.keyCode!=8 && event.keyCode!=46) return false;">
        </div>
      </div>
    </div>
  </div>
</div>

      <?php $totalfin = $totalfin+($item['cantidad']*$item['precio']); ?>
      <?php endforeach; ?>

      <!-- boton comprar -->
      <div class="d-flex justify-content-between align-items-center mb-3">
  <h3 class="mb-0">Total: <strong class="text" style="color: black;">$<?php echo number_format($totalfin, 2); ?></strong></h3>
  <form action="./pagar/pagar.php" method="post">
    <input type="hidden" name="total" value="<?php echo $totalfin; ?>">
    <button type="submit" class="btn btn-success">
      <i class="bi bi-bag-check"></i> Comprar
    </button>
    
  </form>
</div>
<hr>
<!-- boton vaciar -->
      <form method="post" action="carrito.php">
        <input type="hidden" name="vaciar" value="1">
        <button class="btn btn-danger w-100" type="submit">Vaciar carrito</button>
      </form>

    <?php else: ?>
      <p class="text-muted">Tu carrito está vacío.</p>
    <?php endif; ?>
  </div>
</div>
