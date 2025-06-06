<footer class="footer">
  <div class="grande">
    <div class="grande_izq">
      <p><strong>UrbanStep</strong></p>
      <p>Fundado por Miguel Ángel Banguero Sánchez</p>
      <p>
        Te acompañamos con estilo urbano a cada paso. Nuestra misión es brindar productos auténticos y funcionales con un toque moderno.
      </p>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7045.931672613106!2d-15.417791425452826!3d27.99494161275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xc4097e4fbf9d381%3A0x93a922654abd5011!2sC.%20Pablo%20Hern%C3%A1ndez%20Morales%2C%208%2C%2035200%20Telde%2C%20Las%20Palmas!5e0!3m2!1ses!2ses!4v1746394481417!5m2!1ses!2ses" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div class="grande_derecha">
      <form action="./correo.php" method="post">
        <input type="email" class="yourgmail" name="ggmail" value="<?php echo $_SESSION['gmail']; ?>" required placeholder="Tu correo electrónico">
        <textarea class="textoemail" name="receña" placeholder="Escribe tu reseña" required></textarea>
        <div class="form-buttons">
          <input type="submit" value="Enviar">
          <input type="reset" value="Borrar">
        </div>
      </form>
    </div>
  </div>
</footer>

