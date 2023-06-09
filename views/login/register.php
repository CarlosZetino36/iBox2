<link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/style.css">
<main>
    <body>
        <div class="container" style="margin-top: 6rem; margin-bottom: 4.6rem;">
            <form action="<?= BASE_URL ?>usuarios/save" method="POST" class="login-email">
                <p class="login-text" style="font-size: 2rem; font-weight: 800;">¡Registrate!</p>
                <?php if (isset($_SESSION['Register']) && $_SESSION['Register'] = 'error'): ?>	
                    <strong class="alert_red" style="color: red;"><i class="fas fa-times-circle"></i>Las contraseñas no coinciden</strong><br>
                <?php endif; ?>
                <?php Utils::deleteSession('Register'); ?>
                <div class="input-group">
                    <input type="text" placeholder="Nombre de usuario" name="username"  required>
                </div>
                <div class="input-group">
                    <input type="email" placeholder="Correo electrónico" name="email"  required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Contraseña" name="password" required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Confirmar contraseña" name="cpassword"  required>
                </div>
                <div class="input-group">
                    <button name="submit" class="btn">Registrarse</button>
                </div>
                <p class="login-register-text">¿Ya tienes una cuenta? <a href="<?= BASE_URL ?>login/index">Ingresa aquí</a>.</p>
            </form>
        </div>
    </body>
</html>