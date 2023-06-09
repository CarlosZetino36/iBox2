<main>
    <body>
        <div class="container-fluid" style="margin-bottom:41rem;">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <h2 style="margin-top:3rem;margin-bottom:2rem;" class="text-center">Productos De Tienda</h2>
                        <?php if (isset($_SESSION['modelo']) && $_SESSION['modelo'] == 'ok'): ?>
    <strong class="alert_green" style="text-align:center;"><i class="far fa-check-circle"></i> Cambios guardados</strong>
<?php elseif (isset($_SESSION['modelo']) && $_SESSION['modelo'] != 'ok'): ?>	
    <strong class="alert_red"><i class="fas fa-times-circle"></i> El producto no pudo ser modificado</strong>
<?php endif; ?>
<?php Utils::deleteSession('modelo');?>
<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'ok'): ?>
	<strong class="alert_green" style="text-align:center;"><i class="far fa-check-circle"></i> El producto se eliminó correctamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] == 'error'): ?>	
	<strong class="alert_red" style="text-align:center;"><i class="fas fa-times-circle"></i> El producto no pudo ser eliminado</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete');?>

                       
<table class="table table-success table-striped">
  <thead>
    <tr>
      <th scope="col">ID Producto</th>
      <th scope="col">Nombre</th>
      <th scope="col">Tela</th>
      <th scope="col">Talla</th>
      <th scope="col">Color 1</th>
      <th scope="col">Color 2</th>
      <th scope="col">Tipo de taza</th>
      <th scope="col">Tipo de pin</th>
      <th scope="col">Tipo de llavero</th>
      <th scope="col">Stock</th>
      <th scope="col">Precio</th>
      <th scope="col">Acción</th>

    </tr>
  </thead>
  <tbody>
  <?php while ($pro = $prod->fetch_object()): ?>
    <tr>
      <th scope="row"><?= $pro->idproducto ?></th>
      <td><?= $pro->nombre ?></td>
      <td><?= $pro->tela ?></td>
      <td><?= $pro->talla ?></td>
      <td><?= $pro->color ?></td>
      <td><?= $pro->color2 ?></td>
      <td><?= $pro->tipotaza ?></td>
      <td><?= $pro->tipopin ?></td>
      <td><?= $pro->tipollavero ?></td>
      <td><?= $pro->stock ?></td>
      <td><?= $pro->precio ?></td>
      <td><a href="<?= BASE_URL ?>producto/edit&id=<?= $pro->idproducto ?>"><button class='btn btn-success' type='submit'>Editar</button></a>
      <a href="<?= BASE_URL ?>producto/delete&id=<?= $pro->idproducto ?>"><button class='btn btn-danger' type='submit'>Eliminar</button></a></td>
    </tr>
   <?php endwhile;?>
  </tbody>
</table>
<a href="<?=BASE_URL?>admin/create" style="margin-top:2rem;"><button class='btn btn-warning' type='submit'>Agregar nuevo producto</button></a>
                    </div>
                </div>
            </div>
        </div>
    </body>
    