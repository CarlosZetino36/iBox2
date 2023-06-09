<?php if (isset($edit2) && is_object($edit2)): ?>
        <h1 style="text-align:center; margin-top:2rem;">Editar estado</h1>  
        <?php $url_action = BASE_URL . "carrito/save&id=" . $edit2->getIdcarrito(); ?>
    <?php endif; ?>

<main>
    <form action="<?=$url_action?>" method="POST" style="margin-bottom:23rem;">
<div style="width:15%; text-align:center;" class="container"><br><br>
<h3>ID de la factura: <?=$edit2->getIdcarrito();?></h3><br>
<h3>Estado:</h3>
<select class="form-select" aria-label="Disabled select example" name="estado">
                        <option value="<?=$edit2->getEstado();?>"><?=$edit2->getEstado();?></option>     
                        <option value="Pendiente">Pendiente</option>   
                                <option value="Cancelado">Cancelado</option>
                                <option value="Terminado">Terminado</option>
                            </select><br><br>
<button class="btn btn-primary" type="submit">Guardar</button>
</form>
</div>




  