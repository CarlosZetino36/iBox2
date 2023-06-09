<main style="text-align:center;">
    <div style="margin-bottom:27.9rem;">
        <h3 style="margin-top:3rem;">Aún tienes productos en tu carrito</h3>
        <h2>Si cierras sesión, ¡tus productos se perderán!</h2>
        <br> <br> <br>
        <h3 style="color:red;">¿Deseas salir?</h3>
        <div>
            <div style="margin-bottom: 1rem; margin-left :2rem;">
            <a href="<?= BASE_URL ?>carrito/index" >
                <button type="submit" class="btn btn-success" style="margin-right:2rem;">Regresar</button>
            </a>
            </div>
            <a href="<?= BASE_URL ?>login/logout">
                <button type="button" class="btn btn-warning">Salir de todos modos</button>
            </a>
        </div>
    </div>