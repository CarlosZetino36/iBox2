<main>
<div style="margin-bottom: 150px;">
        <div style="background-color: aquamarine; height: 100px;">
            <h1 style="color: black; text-align: center; padding-top: 20px;">¡Personaliza tu propio diseño de
                mascarillas!</h1>
        </div>
        <div style="width:100%; text-align: left;">
            <form style="width: 20%; margin-left: 42%;" action="<?= BASE_URL?>producto/addMascarilla" method="POST">
            <?php if (isset($_SESSION['mask']) && $_SESSION['mask'] = 'error'): ?>	
    <strong class="alert_red" style="color: red;"><i class="fas fa-times-circle"></i>Actualmente no contamos con este producto :(</strong><br>
    <?php endif; ?>
    <?php Utils::deleteSession('mask'); ?>    
            <br>
                <h4>Color de elástico:</h4>
                <select class="form-select" aria-label="Disabled select example" name="color">
                    <option value="Blanco">Blanco</option>
                    <option value="Negro">Negro</option>
                </select>
                <br>
                <h4>Color base(opcional):</h4>
                <select class="form-select" aria-label="Disabled select example" name="color2">
                    <option value="Ninguno">Ninguno</option>
                    <option value="Negro">Negro</option>
                    <option value="Blanco">Blanco</option>
                    <option value="Rojo">Rojo</option>
                    <option value="Verde">Verde</option>
                    <option value="Azul">Azul</option>
                </select>
                <br>
                <h4>Subir imagen de referencia:</h4>
                <div class="mb-3">
                    <input name="imagen" class="form-control" type="file" id="formFileMultiple" multiple>
                </div>
                <br>
                <h4>Cantidad</h4>
                <input id="numero" type="number" min="1" pattern="^[0-9]+" value="1" name="cantidad"> <br><br>

                <h4>Agregar descripción:</h4>
                <p><textarea name="descripcion" rows="5" cols="50"
                        placeholder="Describe cómo deseas tu producto..."></textarea></p>
                <hr>
                <br>
                <div class="d-grid gap-2 col-6 mx-auto" style="float:left;">
                    <button class="btn btn-primary" type="submit">Añadir al carrito</button>
                </div>
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