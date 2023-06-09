<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
        <script src="https://kit.fontawesome.com/8a15cac6a1.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="./css/main.css">

        <title>iBox</title>
    </head>

    <body>



        <?php if (isset($_SESSION["Usuario"]) && $_SESSION["Usuario"]): ?>
        <header class="p-3 bg-dark text-white">
            <div>
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a class="navbar-brand" href="<?= BASE_URL?>">
                        <span class="fs-5 text-primary fw-bold"><img src="<?= BASE_URL ?>assets/img/logoibocs.png" alt="..." height="70" width="80"></span>
                    </a>
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="<?= BASE_URL ?>" class="nav-link px-2 text-white">Home</a></li>
                        <li><a href="<?= BASE_URL ?>tienda/index" class="nav-link px-2 text-white">Tienda</a></li>
                        <li><a href="#seccion-contacto" class="nav-link px-2 text-white">Contáctanos</a></li>
                        <li><a href="#seccion-aboutus" class="nav-link px-2 text-white">About Us</a></li>
                    </ul>


                    <a href="<?= BASE_URL?>carrito/index"><img src="<?=BASE_URL?>assets/img/cart.png" type="submit" style="margin-right: 2rem; color:yellow;"></a>
                    <h4>¡Bienvenido,  <?= ($_SESSION["Usuario"]); ?>!</h4>
                    <?php if(isset($_SESSION['cart'])):?>              
                    <a href="<?= BASE_URL ?>carrito/confirm" style="margin-left: 3rem;">
                        <button type="submit" class="btn btn-danger">Salir</button>
                    </a>
                    <?php else:?>
                        <a href="<?= BASE_URL ?>login/logout" style="margin-left: 3rem;">
                        <button type="submit" class="btn btn-danger">Salir</button>
                    </a>
                    <?php endif;?>
                </div>
            </div>
        </header>



        <?php elseif (isset($_SESSION["Admin"]) && $_SESSION["Admin"]): ?>
        <header class="p-3 bg-dark text-white">
            <div>
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a class="navbar-brand" href="<?= BASE_URL?>">
                        <span class="fs-5 text-primary fw-bold"><img src="<?= BASE_URL ?>assets/img/logoibocs.png" alt="..." height="70" width="80"></span>
                    </a>
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">                   
                        <li><a href="<?=BASE_URL?>admin/productos" class="nav-link px-2 text-white">Productos</a></li>
                        <li><a href="<?=BASE_URL?>admin/pedidos" class="nav-link px-2 text-white">Pedidos</a></li>
                    </ul>
                    <h4>¡Bienvenido,  <?= ($_SESSION["Admin"]); ?>!</h4>
                        <a href="<?= BASE_URL ?>logadmin/logout" style="margin-left: 3rem;">
                        <button type="submit" class="btn btn-danger">Salir</button>
                    </a>
                </div>
            </div>
        </header>




        <?php else: ?>
        <header class="p-3 bg-dark text-white">
            <div class="">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a class="navbar-brand" href="<?=BASE_URL?>">
                        <span class="fs-5 text-primary fw-bold"><img src="<?= BASE_URL ?>assets/img/logoibocs.png" alt="..." height="70" width="80"></span>
                    </a>
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="<?= BASE_URL ?>" class="nav-link px-2 text-secondary">Home</a></li>
                        <li><a href="<?= BASE_URL ?>tienda/index" class="nav-link px-2 text-white">Tienda</a></li>
                        <li><a href="#seccion-contacto" class="nav-link px-2 text-white">Contáctanos</a></li>
                        <li><a href="#seccion-aboutus" class="nav-link px-2 text-white">About Us</a></li>
                    </ul>


                   
                    <a href="<?= BASE_URL ?>login/index">
                        <button type="submit" class="btn btn-outline-light me-2" href="">Iniciar sesión</button>
                    </a>
                    <a href="<?= BASE_URL ?>usuarios/create">
                        <button type="button" class="btn btn-warning">Crea una cuenta</button>
                    </a>
                </div>
            </div>
        </header>
        <?php endif; ?>
