
<main>
    <body>
        <div class="container-fluid" style="margin-bottom:41rem;">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-center" >Mi carrito</h2>
                        
                        <?php
                        
                        $msg="El carrito actualmente se encuentra vacío.";
                        $total = 0;
                        $output = "";
                        $output .= "

                        
                    <table class='table table-bordered table-striped' method='post' style=''>
                    <tr>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Descripcion</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Accion</th>
                    </tr>
                    ";
                    if (!empty($_SESSION['cart'])) {
                       
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $output .= "
                            <tr>
                            <td>" . $value['nombre'] . "</td>
                            <td>" . $value['imagen'] . "</td>
                            <td>" . $value['descripcion'] . "</td>
                            <td>" . $value['cantidad'] . " </td>
                            <td>$" . number_format($value['precio'] * $value['cantidad'], 2) . "</td>
                            <td>
                            <a href=''>
                            <button class='btn btn-danger btn-block' type='submit'>Eliminar</button>
                            </a>
                            </tr>
                            ";
                          
                                $total = $total + $value['cantidad'] * $value['precio'];
                                $_SESSION['total'] = $total;
                            }
                            $output .= "
                         <tr>
                          <td colspan='4'></td>
                          <td></b>Total a pagar:</b></td>
                          <td>" . number_format($total, 2) . "</td>
                          <td>
                          <a href='clearall'>
                          <button class='btn btn-warning btn-block'>Limpiar todo</button>
                          </a>
                          </td>
                         </tr>
                         </table>
                         <a href='pedido'>

                         <button type='button' class='btn btn-success'>Realizar pedido</button>
                        </a>
                         "
                        
                        ;
                        }

                       
                       if(!empty($_SESSION['cart'])){
                            echo $output;

                       }else{
                        echo("<h1 style='text-align:center; padding-top:10rem;'>El  carrito se encuentra vacío.</h1>");
                       }
                       ?>                
                    </div>
                </div>
            </div>
        </div>
    </body>
    <?php
    
    ?>