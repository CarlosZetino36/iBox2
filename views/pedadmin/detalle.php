<?php while ($detalle2 = $fact->fetch_object()):?>


<main>
    <h1 style="text-align:center; margin-top:3rem;"> Detalle del Pedido <?= $detalle2->idfactura?></h1>
    <div class="mx-auto" style=" width:30%;">
        <table class="table table-success table-striped container">
            <thead>
                <tr>
                    <th scope="col">Usuario</th>
                    <th scope="col">ID</th>
                    <th scope="col">Correo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th><?=$detalle2->usuario ?></th>
                    <td><?=$detalle2->idcliente?></td>
                    <td><?=$detalle2->correo?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="container" style=" width:80%;">
        <table class="table table-success table-info">
            <thead>
                <tr>
                    <th scope="col">ID Producto</th>
                    <th scope="col">Nombre Producto</th>
                    <th scope="col">Detalle</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Precio/unidad</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($detalle = $det->fetch_object()) : ?>
                    <tr>
                        <th scope="row"><?= $detalle->idproducto ?></th>
                        <td><?= $detalle->nombre ?></td>
                        <td><?= $detalle->descripcion ?></td>
                        <td><?= $detalle->cantidad ?></td>
                        <td><?= $detalle->imagen ?></td>
                        <td><?= $detalle->precio ?></td>
                       
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <h4 style=" margin-bottom:24rem; text-align:right;"> Total a pagar: $<?=$detalle2->total;?></h4>
    </div>
    </div>
    </div>
    </div>
    </body>
    </div>
    <?php endwhile; ?>