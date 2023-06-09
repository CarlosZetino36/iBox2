
<link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/style.css">
<main >
    <body style="background-image: url(<?= BASE_URL ?>assets/img/bgadmin.png);">
        <div class="container" style="margin-top:10rem; margin-bottom:10rem;">
            <form action="<?= BASE_URL ?>logadmin/login" method="POST" class="login-email">
                <p class="login-text" style="font-size: 2rem; font-weight: 800;">¡Inicia sesión!</p>
                <?php if (isset($_SESSION['Login']) && $_SESSION['Login'] = 'error'): ?>	
    <strong class="alert_red" style="color: red;"><i class="fas fa-times-circle"></i>Ingrese el usuario y contraseña correctamente</strong><br>
    <?php endif; ?>
    <?php Utils::deleteSession('Login'); ?>
                <div class="input-group">
                    <input type="text" placeholder="Usuario" name="usuario" required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Contraseña" name="password" required>
                </div>
                <div class="input-group">
                    <button name="submit" class="btn">Entrar</button>
                </div>
             
            </form>
        </div>
    </body>
