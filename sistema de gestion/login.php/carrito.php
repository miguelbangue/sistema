<?php
session_start();
// Verifica si el usuario está logueado
if (!isset($_SESSION['gmail'])) {
    $alerta = urlencode('<div class="alert alert-warning alert-dismissible fade show" role="alert">Debes iniciar sesión.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button></div>');
    header("Location: bienvenido.php#productos?men=$alerta");
    exit;
}

// Asegura que el carrito sea un array válido
if (!isset($_SESSION['carrito']) || !is_array($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Agregar producto al carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['nombre'], $_POST['precio'], $_POST['imagen'])) {
    $id = $_POST['id'];
    $productoExiste = false;

    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }
    /* si el producto ya existe */

foreach($_SESSION['carrito'] as &$producto ){
    if($producto['id'] == $id){
        $producto['cantidad'] += 1;
            $productoExiste = true;
            break;
    };
}

    // Si no existe, agregar nuevo producto
    if (!$productoExiste) {
        $_SESSION['carrito'][] = [
            'id' => $_POST['id'],
            'nombre' => $_POST['nombre'],
            'precio' => $_POST['precio'],
            'imagen' => $_POST['imagen'],
            'cantidad' => 1,
        ];
    }

    // Redirige a bienvenido con mensaje de éxito
    
    $mensaje = urlencode('<div style="border-radius:10px; padding:20px; background: linear-gradient(135deg, #4e54c8, #8f94fb); position:fixed; bottom:20px; z-index:9999; display:block;" class="alert alert-info alert-dismissible fade show" role="alert">
     <strong>¡Éxito!</strong> Producto añadido al carrito.
     <button style="z-index:9999; margin-right:30px;" class="btn btn-outline-success btn-sm ms-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuCarrito" aria-controls="menuCarrito">
            <i class="bi bi-cart-fill"></i>
          </button>
          <button style="margin-left:5px;" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
          </div>');
    header("Location: bienvenido.php?men=$mensaje&productoExiste=$productoExiste ");
    exit;
}



// Vaciar un producto del carrito
if (isset($_POST['idEliminar'])) {
    $idEliminar = $_POST['idEliminar'];
    foreach ($_SESSION['carrito'] as $index => $producto) {
    if ($producto['id'] == $idEliminar) {
        unset($_SESSION['carrito'][$index]);
        break;
    }
}

/* llena los espacios del array de carrito de compras al eliminar un producto  */
$_SESSION['carrito'] = array_values($_SESSION['carrito']);

/* redirecciona al carrito de compras despues de eliminar */
    header("Location: bienvenido.php");
    exit;

}




// Vaciar carrito
if (isset($_POST['vaciar'])) {
    unset($_SESSION['carrito']);
    $mensaje = urlencode('<div style ="margin:auto" class="alert alert-info alert-dismissible fade show" role="alert">Carrito vaciado.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button></div>');
    header("Location: bienvenido.php#productos?men=$mensaje");
    exit;
}



// Si no se cumplió ninguna condición válida, mostrar error
echo "error";
?>
