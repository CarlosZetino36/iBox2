<main>

<?php if (isset($_SESSION['add']) && $_SESSION['add'] == 'ok'): ?>
    <h4 style="text-align:center; color:green; margin-top:2rem;" class="alert_green"><i class="far fa-check-circle"></i> ¡Tu producto se añadió al carrito!</h4>
<?php elseif (isset($_SESSION['add']) && $_SESSION['add'] != 'ok'): ?>	
    <strong class="alert_red"><i class="fas fa-times-circle"></i> El producto no se añadió al carrito. Inténtalo de nuevo más tarde.</strong>
<?php endif; ?>
<?php Utils::deleteSession('add');?>
<div class="row" style="padding: 20px;">
        <div class="col">
            <div class="card shadow-sm">
                <img src="<?= BASE_URL ?>assets/img/taza.png " width="100%" height="225">
                <div class="card-body">
                    <p class="card-text">Hermosa taza con tu estilo único con una foto preferida. </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="<?= BASE_URL ?>tienda/taza">
                                <button type="submit" class="btn btn-primary">Personalizar</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow-sm">
                <img src="<?= BASE_URL ?>assets/img/pines.png " width="100%" height="225">
                <div class="card-body">
                    <p class="card-text">Personalizacion de pines, de tipo acrílico o metálico.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="<?= BASE_URL ?>tienda/pines">
                                <button type="button" class="btn btn-primary">Personalizar</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow-sm">
                <img src="<?= BASE_URL ?>assets/img/llaveros.png " width="100%" height="225">
                <div class="card-body">
                    <p class="card-text">Personalizacion de llaveros, de tipo destapador o normal.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="<?= BASE_URL ?>tienda/llaveros">
                                <button type="submit" class="btn btn-primary">Personalizar</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!--========================================================== -->
<!-- SECCION CONTACTO -->
<!--========================================================== -->
<section id="seccion-contacto" class="border-bottom border-secondary border-2" style="background-color: #384a74; color:white;">
    <div id="bg-contactos">
        <div class="container  border-top border-primary " style="max-width: 500px; " id="contenedor-formulario">
            <div class="text-center mb-4" id="titulo-formulario">
                <div><img src="<?= BASE_URL ?>assets/img/support.png" alt="" class="img-fluid ps-5"></div>
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