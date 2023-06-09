<?php if (isset($prod) && is_object($prod)): ?>
        <h1 style="text-align:center; margin-top:2rem;">Editar producto</h1>  
        <?php $url_action = BASE_URL . "producto/save&id=" . $prod->getIdproducto(); ?>
    <?php else: ?>
        <h1 style="text-align:center; margin-top:2rem;">Ingresar nuevo producto</h1><br>
        <?php $url_action = BASE_URL . "producto/save"; ?>
    <?php endif; ?>


<main>
    <form method="POST" action="<?=$url_action?>">
        <div style="margin-bottom: 3rem; text-align:center" class="container">
            <table class="table" style="width:90%; margin-top: 2rem;">
                <thead>
                    <tr>
                        <th scope="col">Nombre del producto</th>
                        <th scope="col">Tela</th>
                        <th scope="col">Talla</th>
                        <th scope="col">Color 1:</th>
                    </tr>
                </thead>
                <tbody>
              
                    <tr>
                        <td> <select class="form-select" aria-label="Disabled select example" name="nombre" required>
                                <option value="<?= isset($prod) && is_object($prod) ? $prod->getNombre() : ' '; ?>"><?= isset($prod) && is_object($prod) ? $prod->getNombre() : '-'; ?></option>        
                                <option value="Camisa">Camisa</option>
                                <option value="Mascarilla">Mascarilla</option>
                                <option value="Taza">Taza</option>
                                <option value="Pin">Pin</option>
                                <option value="Llavero">Llavero</option>
                                <option value="Vaso">Vaso</option>
                                <option value="Jarra">Jarra</option>
                                <option value="Delantal">Delantal</option>
                                <option value="Poster">Poster</option>
                                <option value="Pachon">Pachon</option>
                            </select></td>
                        <td> <select class="form-select" aria-label="Disabled select example" name="tela">
                        <option value="<?= isset($prod) && is_object($prod) ? $prod->getTela() : ' '; ?>"><?= isset($prod) && is_object($prod) ? $prod->getTela() : '-'; ?></option>        
                                <option value="Dry-Fit">Dry-Fit</option>
                                <option value="Polycotton">Polycotton</option>
                            </select></td>
                        <td> <select class="form-select" aria-label="Disabled select example" name="talla">
                        <option value="<?= isset($prod) && is_object($prod) ? $prod->getTalla() : ' '; ?>"><?= isset($prod) && is_object($prod) ? $prod->getTalla() : '-'; ?></option>        
                                <option value="XS">XS</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>                      
                            </select></td>
                        <td> <select class="form-select" aria-label="Disabled select example" name="color1">
                        <option value="<?= isset($prod) && is_object($prod) ? $prod->getColor() : ' '; ?>"><?= isset($prod) && is_object($prod) ? $prod->getColor() : '-'; ?></option>        
                                <option value="Blanco">Blanco</option>
                                <option value="Negro">Negro</option>
                                <option value="Rojo">Rojo</option>
                                <option value="Amarillo">Amarillo</option>
                                <option value="Azul">Azul</option>
                                <option value="Verde">Verde</option>
                                <option value="Morado">Morado</option>
                            </select></td>
                    </tr>
                </tbody>

                <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>

                <tr>
                    <th >Color 2:</th>
                    <th>Tipo de taza:</th>
                    <th>Tipo de pin:</td>
                    <th>Tipo de llavero:</th>
                </tr>
                <tr>
                    <td> <select class="form-select" aria-label="Disabled select example" name="color2">
                    <option value="<?= isset($prod) && is_object($prod) ? $prod->getColor2() : ' '; ?>"><?= isset($prod) && is_object($prod) ? $prod->getColor2() : '-'; ?></option>        
                            <option value="Blanco">Blanco</option>
                            <option value="Negro">Negro</option>
                            <option value="Rojo">Rojo</option>
                            <option value="Amarillo">Amarillo</option>
                            <option value="Azul">Azul</option>
                            <option value="Verde">Verde</option>
                            <option value="Morado">Morado</option>
                        </select></td>
                    <td> <select class="form-select" aria-label="Disabled select example" name="tipotaza">
                    <option value="<?= isset($prod) && is_object($prod) ? $prod->getTipotaza() : ''; ?>"><?= isset($prod) && is_object($prod) ? $prod->getTipotaza() : '-'; ?></option>         
                            <option value="Normal">Normal</option>
                            <option value="Mágica">Mágica</option>
                        </select></td>                
                    <td> <select class="form-select" aria-label="Disabled select example" name="tipopin">
                    <option value="<?= isset($prod) && is_object($prod) ? $prod->getTipopin() : ''; ?>"><?= isset($prod) && is_object($prod) ? $prod->getTipopin() : '-'; ?></option>        
                            <option value="Metálico">Metálico</option>
                            <option value="Acrílico">Acrílico</option>
                        </select></td>


                    <td> <select class="form-select" aria-label="Disabled select example" name="tipollavero">
                    <option value="<?= isset($prod) && is_object($prod) ? $prod->getTipollavero() : ''; ?>"><?= isset($prod) && is_object($prod) ? $prod->getTipollavero() : '-'; ?></option>        
                            <option value="Normal">Normal</option>
                            <option value="Destapador">Destapador</option>                  
                        </select></td>
                </tr>
            </table>
            <br>
            <h4>Stock:</h4>
            <input id="numero" type="number" min="1" pattern="^[0-9]+" value="<?= isset($prod) && is_object($prod) ? $prod->getStock() : '1'; ?>" name="stock" required> <br><br>
            <br>
            <h4>Precio</h4>
            <input type="decimal" min="0"  value="<?= isset($prod) && is_object($prod) ? $prod->getPrecio() : '0.00'; ?>" name="precio" required> <br><br>
            <br>
            <br>
            <button class="btn btn-primary" type="submit">Añadir producto</button>
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