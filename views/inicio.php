
<?php if (isset($_SESSION['Admin']) || isset($_SESSION['Cliente'])) : ?>
<h1>¡Hola, <?= ($_SESSION['Usuario']); ?>!</h1>

<?php else : ?>
   <?php header('Location:' . BASE_URL . 'index'); ?>
<?php endif; ?>



