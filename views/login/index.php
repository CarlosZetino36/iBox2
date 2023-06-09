

<link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/style.css">
<main >
    <body style="background-image: url(<?= BASE_URL ?>assets/img/bg.png);">
        <div class="container" style="margin-top:10rem; margin-bottom:10rem;">
            <form action="<?= BASE_URL ?>login/login" method="POST" class="login-email">
                <p class="login-text" style="font-size: 2rem; font-weight: 800;">¡Inicia sesión!</p>
                <?php if (isset($_SESSION['Login']) && $_SESSION['Login'] = 'error'): ?>	
    <strong class="alert_red" style="color: red;"><i class="fas fa-times-circle"></i>Ingrese el usuario y contraseña correctamente</strong><br>
    <?php endif; ?>
    <?php Utils::deleteSession('Login'); ?>
                <div class="input-group">
                    <input type="email" placeholder="Correo" name="email" required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Contraseña" name="password" required>
                </div>
                <div class="input-group">
                    <button name="submit" class="btn">Entrar</button>
                </div>
                <p class="login-register-text">¿No tienes una cuenta? <a href="<?=BASE_URL?>usuarios/create">Registrate aquí</a>.</p>
            </form>
        </div>
    </body>
