
<main>
<h1 style="text-align:center; margin-top:2rem;">Todos los pedidos</h1>
<?php if (isset($_SESSION['editestado']) && $_SESSION['editestado'] == 'ok'): ?>
    <h4 style="text-align:center; color:green;" class="alert_green"><i class="far fa-check-circle"></i> Cambios guardados</h4>
<?php elseif (isset($_SESSION['editestado']) && $_SESSION['editestado'] != 'ok'): ?>	
    <strong class="alert_red"><i class="fas fa-times-circle"></i> El estado no pudo ser modificado</strong>
<?php endif; ?>
<?php Utils::deleteSession('editestado');?>
<table class="table table-success table-striped container" style="margin-top:3rem; width:90%; margin-bottom:31rem;">
  <thead>
    <tr>
      <th scope="col">ID Factura</th>
      <th scope="col">Fecha</th>
      <th scope="col">Total</th>
      <th scope="col">Nombre Cliente</th>
      <th scope="col">Detalles</th>
      <th scope="col">Estado</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
  <?php while ($factura = $fact->fetch_object()): ?>
    <tr>
      <th scope="row"><?= $factura->idfactura?></th>
      <td><?= $factura->fecha?></td>
      <td>$<?= $factura->total?></td>
      <td><?= $factura->usuario ?></td>
      <td><a href="<?=BASE_URL?>admin/detallepedido&id=<?=$factura->idcarrito?>">Detalles</a></td>
      <td><label><?=$factura->estado?></label></td>
      <td><a href="<?=BASE_URL?>carrito/edit&id=<?= $factura->idcarrito ?>"><button class='btn btn-success' type='submit'>Editar estado</button></a></td>
      </tr>
   <?php endwhile;?>
  </tbody>
</table>

