<main>

     <div style="margin-bottom: 3rem;">
        <div style="background-color: aquamarine; height: 100px;">
            <h1 style="color: black; text-align: center; padding-top: 20px;">¡Personaliza tu propio diseño de camisas!</h1>
        </div>
        <div style="width:100%; text-align: left;">
          <form action="<?= BASE_URL ?>producto/addCamisa" method="POST" style="width: 20%; margin-left: 42%;">
          <?php if (isset($_SESSION['camisa']) && $_SESSION['camisa'] = 'error'): ?>	
    <strong class="alert_red" style="color: red;"><i class="fas fa-times-circle"></i>Actualmente no contamos con este producto :(</strong><br>
    <?php endif; ?>
    <?php Utils::deleteSession('camisa'); ?>
                <br>
                <h4>Tipo de tela:</h4>
                <select class="form-select" aria-label="Disabled select example" name="tela" required>
                    <option value="Polycotton">Polycotton</option>
                    <option value="Dry-Fit">Dry-Fit</option>
                </select>
                <br>
                <h4>Talla:</h4>
                <select class="form-select" aria-label="Disabled select example" name="talla" required>
                    <option value="XS">XS</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                </select>
                <br>
                <h4>Color:</h4>
                <select class="form-select" aria-label="Disabled select example" name="color" required>
                    <option value="Negro">Negro</option>
                    <option value="Blanco">Blanco</option>
                </select>
                <br>
                <h4>Técnica de sublimación:</h4>
                <select class="form-select" aria-label="Disabled select example" name="tecnica" required>
                    <option value="Parcial">Parcial</option>
                    <option value="Full sublimacion">Full sublimación</option>
                </select>
                <br>
                <h4>Subir imagen de referencia:</h4>
                <div class="mb-3">
                    <input name="imagen" class="form-control" type="file" id="formFileMultiple" multiple >
                </div>
                <br>
                <h4>Cantidad</h4>
                <input id="numero" type="number" min="1" pattern="^[0-9]+" value="1" name="cantidad" required> <br><br>
                <br>
                <h4>Agregar descripción:</h4>
                <p><textarea name="descripcion" rows="5" cols="50" placeholder="Describe cómo deseas tu producto..." name="descripcion"></textarea></p>
                <hr>
                <br>
                <button class="btn btn-primary" type="submit">Añadir al carrito</button>
            </form>
        </div>
    </div>


    <!--========================================================== -->
      <!-- SECCION CONTACTO -->
      <!--========================================================== -->
      <section id="seccion-contacto" class="border-bottom border-secondary border-2" style="background-color: #384a74; color:white;">
        <div id="bg-contactos">
          <div class="container  border-top border-primary " style="max-width: 500px; " id="contenedor-formulario">
            <div class="text-center mb-4" id="titulo-formulario">
              <div><img src="./img/support.png" alt="" class="img-fluid ps-5"></div>
              <h2>Contáctanos</h2>
              <p class="fs-5">Estamos aquí para hacer realidad de tus proyectos</p>
            </div>
            <form method="POST" data-netlify="true" action="#">
              <div class="mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="nombre@ejemplo.com">
              </div>
              <div class="mb-3">
                <input type="input" class="form-control" id="name" name="name" placeholder="John Doe">
              </div>
              <div class="mb-3">
                <input type="tel" class="form-control" name="phone" id="phone" placeholder="Teléfono">
              </div>
              <div class="mb-3">
                <textarea class="form-control" name="message" id="message" rows="4"></textarea>
              </div>
              <div class="mb-3">
                <button type="submit" class=" btn btn-primary w-100 fs-5">Enviar Mensaje</button>
              </div>
            </form>
          </div>
        </div>