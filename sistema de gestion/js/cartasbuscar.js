
  document.addEventListener('DOMContentLoaded', () => {
    const cartas = document.querySelectorAll('.buscador-carta');
    const productosDiv = document.getElementById('productos');
    const todasLasTarjetas = productosDiv.querySelectorAll('.proctos_card');

    cartas.forEach(carta => {
      carta.addEventListener('click', () => {
        const nombre = carta.dataset.nombre.toLowerCase();

        // Mostrar solo las cartas que coincidan con el nombre
        todasLasTarjetas.forEach(card => {
          const texto = card.querySelector('strong')?.textContent.toLowerCase() || '';
          if (texto.includes(nombre)) {
            card.style.display = 'block';
          } else {
            card.style.display = 'none';
          }
        });

        // Cambiar fondo del div productos
        if (nombre.includes('nike')) {
          productosDiv.style.backgroundImage = "url('../imagenes/logo_nike.png')";
        } else if (nombre.includes('adidas')) {
          productosDiv.style.backgroundImage = "url('../imagenes/logo_adidas.png')";
        } else if (nombre.includes('jordan')) {
          productosDiv.style.backgroundImage = "url('../imagenes/logo_jordan.png')";
        } else {
          productosDiv.style.backgroundImage = "none";
        }

        productosDiv.style.backgroundSize = "contain";
        productosDiv.style.backgroundRepeat = "no-repeat";
        productosDiv.style.backgroundPosition = "center";
        productosDiv.style.transition = "background-image 0.5s ease-in-out";

        // Scroll suave al div productos
        productosDiv.scrollIntoView({ behavior: 'smooth' });
      });
    });
  });

