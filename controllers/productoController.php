<?php

require_once 'models/producto.php';
require_once 'models/carrito.php';

if (isset($_SESSION['Usuario'])) {
    
} else {
    if (!$_SESSION['Usuario']) {
        header('Location:' . BASE_URL);
    } 
}
class productoController {

public function insert(){
    if(isset($_POST)){
        $producto = new producto();
        $datos = array(
            $producto->setNombre($_POST['nombre']),
            $producto->setTela($_POST['tela']),
            $producto->setTalla($_POST['talla']),
            $producto->setColor($_POST['color1']),
            $producto->setColor2($_POST['color2']),
            $producto->setTipotaza($_POST['tipotaza']),
            $producto->setTipopin($_POST['tipopin']),
            $producto->setTipollavero($_POST['tipollavero']),
            $producto->setStock($_POST['stock']),
            $producto->setPrecio($_POST['precio'])
        );
        
        $prod = $producto->insert($datos);
        if(isset($prod) && $prod){
            header('Location:' . BASE_URL . 'admin/productos');
        }

    }else{
        $_SESSION['insertar'] = "error";
        header('Location:' . BASE_URL . 'admin/create');
    }
}

public function save() {
    if (isset($_POST)) {
        $producto = new producto();
        $producto->setNombre($_POST['nombre']);
        $producto->setTela($_POST['tela']);
        $producto->setTalla($_POST['talla']);
        $producto->setColor($_POST['color1']);
        $producto->setColor2($_POST['color2']);
        $producto->setTipotaza($_POST['tipotaza']);
        $producto->setTipopin($_POST['tipopin']);
        $producto->setTipollavero($_POST['tipollavero']);
        $producto->setStock($_POST['stock']);
        $producto->setPrecio($_POST['precio']);

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto->setIdproducto($id);
            $save = $producto->update();
        } else {
            $save = $producto->insert();
        }

        if ($save) {
            $_SESSION['modelo'] = "ok";
        } else {
            $_SESSION['modelo'] = "error";
        }
    } else {
        $_SESSION['modelo'] = "error";
    }
    header("Location:" . BASE_URL . "admin/productos");
}


public function edit() {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $producto = new producto();
        $producto->setIdproducto($id);
        $prod = $producto->getOne();
        require_once 'views/prodadmin/create.php';
    }
}

public function delete() {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $producto = new producto();
        $producto->setIdproducto($id);
        $delete = $producto->delete();

        if ($delete) {
            $_SESSION['delete'] = 'ok';
        } else {
            $_SESSION['delete'] = 'error';
        }
    } else {
        $_SESSION['delete'] = 'Error al eliminar el modelo';
    }
    header('Location:' . BASE_URL . 'admin/productos');
}



public function addTaza() {
    $nombre = "Taza";  
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : false;
    $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;
    $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : false;
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
    if (!$tipo && !$nombre) {
    } else {
        $prod = new producto();
        $prod->setNombre($nombre);
        $prod->setTipotaza($tipo);
        $produ = $prod->buscarTaza();
        if ($produ && is_object($produ)) {          
            if (isset($_SESSION['cart'])) {                 
                $session_array_id = array_column($_SESSION['cart'], "id");
                if (!in_array($session_array_id, $session_array_id)) {   
                    $session_array = array(
                        "nombre" => $nombre,
                        "tela" =>"",
                        "talla" => "",
                        "color" => "",
                        "color2" =>"",
                        "tipotaza" =>$tipo,
                        "tipopin"=>"",
                        "tipollavero"=>"",
                        "imagen"=>$imagen,    
                        "descripcion" =>$tipo.". ".$descripcion,
                        "cantidad" => $cantidad,
                        "precio" => $precio
                    );
                    $_SESSION['cart'][] = $session_array;
                    $_SESSION['add'] = 'ok';
                    header('Location:' . BASE_URL . 'tienda/index');
                }
            }else {             
                $session_array = array(
                        "nombre" => $nombre,
                        "tela" =>"",
                        "talla" => "",
                        "color" => "",
                        "color2" =>"",
                        "tipotaza" =>$tipo,
                        "tipopin"=>"",
                        "tipollavero"=>"",
                        "imagen"=>$imagen,    
                        "descripcion" =>$tipo.". ".$descripcion,
                        "cantidad" => $cantidad,
                        "precio" => $precio
                );
                $_SESSION['cart'][] = $session_array;
                $_SESSION['add'] = 'ok';
                header('Location:' . BASE_URL . 'tienda/index');
            }
        } else{
            $_SESSION['taza'] = "error";
            header('Location:' . BASE_URL . 'tienda/taza');
        }
    }
}

public function addPin() {
    $nombre = "Pin";  
    $tipo = isset($_POST['tipopin']) ? $_POST['tipopin'] : false;
    $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;
    $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : false;
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
    if (!$tipo && !$nombre) {
    } else {
        $prod = new producto();
        $prod->setNombre($nombre);
        $prod->setTipopin($tipo);
        $produ = $prod->buscarPin();
        if ($produ && is_object($produ)) {          
            if (isset($_SESSION['cart'])) {                 
                $session_array_id = array_column($_SESSION['cart'], "id");
                if (!in_array($session_array_id, $session_array_id)) {   
                    $session_array = array(
                        "nombre" => $nombre,
                        "tela" =>"",
                        "talla" => "",
                        "color" => "",
                        "color2" =>"",
                        "tipotaza" =>"",
                        "tipopin"=>$tipo,
                        "tipollavero"=>"",
                        "imagen"=>$imagen,    
                        "descripcion" =>$tipo.". ".$descripcion,
                        "cantidad" => $cantidad,
                        "precio" => $precio
                    );
                    $_SESSION['cart'][] = $session_array;
                    $_SESSION['add'] = 'ok';
                    header('Location:' . BASE_URL . 'tienda/index');
                }
            }else {             
                $session_array = array(
                        "nombre" => $nombre,
                        "tela" =>"",
                        "talla" => "",
                        "color" => "",
                        "color2" =>"",
                        "tipotaza" =>"",
                        "tipopin"=>$tipo,
                        "tipollavero"=>"",
                        "imagen"=>$imagen,    
                        "descripcion" =>$tipo.". ".$descripcion,
                        "cantidad" => $cantidad,
                        "precio" => $precio
                );
                $_SESSION['cart'][] = $session_array;
                $_SESSION['add'] = 'ok';
                header('Location:' . BASE_URL . 'tienda/index');
            }
        } else{
            $_SESSION['pin'] = "error";
            header('Location:' . BASE_URL . 'tienda/pines');
        }
    }
}

public function addLlavero() {
    $nombre = "Llavero";  
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : false;
    $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;
    $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : false;
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
    if (!$tipo && !$nombre) {
    } else {
        $prod = new producto();
        $prod->setNombre($nombre);
        $prod->setTipollavero($tipo);
        $produ = $prod->buscarLlavero();
        if ($produ && is_object($produ)) {          
            if (isset($_SESSION['cart'])) {                 
                $session_array_id = array_column($_SESSION['cart'], "id");
                if (!in_array($session_array_id, $session_array_id)) {   
                    $session_array = array(
                        "nombre" => $nombre,
                        "tela" =>"",
                        "talla" => "",
                        "color" => "",
                        "color2" =>"",
                        "tipotaza" =>"",
                        "tipopin"=>"",
                        "tipollavero"=>$tipo,
                        "imagen"=>$imagen,    
                        "descripcion" =>$tipo.". ".$descripcion,
                        "cantidad" => $cantidad,
                        "precio" => $precio
                    );
                    $_SESSION['cart'][] = $session_array;
                    $_SESSION['add'] = 'ok';
                    header('Location:' . BASE_URL . 'tienda/index');
                }
            }else {             
                $session_array = array(
                    'id' => $produ->getIdproducto(),
                    "nombre" => $produ->getNombre(),
                    "tela" =>"",
                    "talla" => "",
                    "color" => "",
                    "color2" =>"",
                    "tipotaza" =>"",
                    "tipopin"=>"",
                    "tipollavero"=>$tipo,
                    "imagen"=>$imagen,    
                    "descripcion" =>$tipo.". ".$descripcion,
                    "cantidad" => $cantidad,
                    "precio" => $produ->getPrecio()
                );
                $_SESSION['add'] = 'ok';
                $_SESSION['cart'][] = $session_array;
                header('Location:' . BASE_URL . 'tienda/index');
            }
        } else{
            $_SESSION['llavero'] = "error";
            header('Location:' . BASE_URL . 'tienda/llaveros');
        }
    }
}











    /*public function addCamisa() {
        $nombre = "Camisa";
        $talla = $_POST['talla'] ? $_POST['talla'] : false;
        $tela = $_POST['tela'] ? $_POST['tela'] : false;
        $color = $_POST['color'] ? $_POST['color'] : false;
        $tecnica = isset($_POST['tecnica']) ? $_POST['tecnica'] : false;
        $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;
        $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : false;
        $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
        if (!$talla && !$tela && !$color && !$nombre) {
        } else {
            $prod = new producto();
            $datoss = array(

            );
            "tela" => $tela;
            $prod->setTalla($talla);
            $prod->setColor($color);
            $produ = $prod->buscarCamisa();
            if ($produ && is_object($produ)) {
                if (isset($_SESSION['cart'])) {         
                    $session_array_id = array_column($_SESSION['cart'], "id");
                    if (!in_array($produ->getIdproducto(), $session_array_id)) {            
                        $session_array = array(
                            'id' => $produ->getIdproducto(),
                            "nombre" => $produ->getNombre(),
                            "tela" =>$produ->getTela(),
                            "talla" => $produ->getTalla(),
                            "color" => $prod->getColor(),
                            "color2" =>"",
                            "tipotaza" =>"",
                            "tipopin"=>"",
                            "tipollavero"=>"",
                            "imagen"=>$imagen,    
                            "descripcion" => $tecnica.". ".$descripcion,
                            "cantidad" => $cantidad,
                            "precio" => $produ->getPrecio()
                        );
                        $_SESSION['cart'][] = $session_array;
                        $_SESSION['add'] = 'ok';
                        header('Location:' . BASE_URL . 'tienda/index');
                    }
                }else {        
                    $session_array = array(
                        'id' => $produ->getIdproducto(),
                        "nombre" => $produ->getNombre(),
                        "tela" =>$produ->getTela(),
                        "talla" => $produ->getTalla(),
                        "color" => $prod->getColor(),
                        "color2" =>"",
                        "tipotaza" =>"",
                        "tipopin"=>"",
                        "tipollavero"=>"",
                        "imagen"=>$imagen,    
                        "descripcion" => $tecnica.". ".$descripcion,
                        "cantidad" => $cantidad,
                        "precio" => $produ->getPrecio()
                    );
                    $_SESSION['cart'][] = $session_array;
                    $_SESSION['add'] = 'ok';
                    header('Location:' . BASE_URL . 'tienda/index');
                }
            } else{
                $_SESSION['camisa'] = "error";
                header('Location:' . BASE_URL . 'tienda/camisa');
            }
        }
    }*/

    /*public function addMascarilla() {
        $nombre = "Mascarilla";  
        $color = $_POST['color'] ? $_POST['color'] : false;
        $color2 = isset($_POST['color2']) ? $_POST['color2'] : false;
        $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;
        $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : false;
        $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
        if (!$color && !$color2 && !$nombre) {
        } else {
            $prod = new producto();
            $prod->setNombre($nombre);
            $prod->setColor($color);
            $prod->setColor2($color2);
            $produ = $prod->buscarMascarilla();
            if ($produ && is_object($produ)) {          
                if (isset($_SESSION['cart'])) {                 
                    $session_array_id = array_column($_SESSION['cart'], "id");
                    if (!in_array($produ->getIdproducto(), $session_array_id)) {   
                            $session_array = array(
                                'id' => $produ->getIdproducto(),
                                "nombre" => $produ->getNombre(),
                                "tela" =>"",
                                "talla" => "",
                                "color" => $prod->getColor(),
                                "color2" =>$prod->getColor2(),
                                "tipotaza" =>"",
                                "tipopin"=>"",
                                "tipollavero"=>"",
                                "imagen"=>$imagen,    
                                "descripcion" =>$descripcion,
                                "cantidad" => $cantidad,
                                "precio" => $produ->getPrecio()
                        );
                        $_SESSION['cart'][] = $session_array;
                        $_SESSION['add'] = 'ok';
                        header('Location:' . BASE_URL . 'tienda/index');
                    }
                }else {             
                    $session_array = array(
                        'id' => $produ->getIdproducto(),
                        "nombre" => $produ->getNombre(),
                        "tela" =>"",
                        "talla" => "",
                        "color" => $prod->getColor(),
                        "color2" =>$prod->getColor2(),
                        "tipotaza" =>"",
                        "tipopin"=>"",
                        "tipollavero"=>"",
                        "imagen"=>$imagen,    
                        "descripcion" =>$descripcion,
                        "cantidad" => $cantidad,
                        "precio" => $produ->getPrecio()
                    );
                    $_SESSION['cart'][] = $session_array;
                    $_SESSION['add'] = 'ok';
                    header('Location:' . BASE_URL . 'tienda/index');
                }
            } else{
                $_SESSION['mask'] = "error";
                header('Location:' . BASE_URL . 'tienda/mask');
            }
        }
    }*/

    
    /*public function addJarra() {
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;  
        $color = isset($_POST['color']) ? $_POST['color'] : false;
        $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;
        $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : false;
        $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
        if (!$nombre && !$color) {
        } else {
            $prod = new producto();
            $prod->setNombre($nombre);
            $prod->setColor($color);
            $produ = $prod->buscarJarra();
            if ($produ && is_object($produ)) {          
                if (isset($_SESSION['cart'])) {                 
                    $session_array_id = array_column($_SESSION['cart'], "id");
                    if (!in_array($produ->getIdproducto(), $session_array_id)) {   
                        $session_array = array(
                            'id' => $produ->getIdproducto(),
                            "nombre" => $produ->getNombre(),
                            "tela" =>"",
                            "talla" => "",
                            "color" => $produ->getColor(),
                            "color2" =>"",
                            "tipotaza" =>"",
                            "tipopin"=>"",
                            "tipollavero"=>"",
                            "imagen"=>$imagen,    
                            "descripcion" =>$color.". ".$descripcion,
                            "cantidad" => $cantidad,
                            "precio" => $produ->getPrecio()
                        );
                        $_SESSION['cart'][] = $session_array;
                        $_SESSION['add'] = 'ok';
                        header('Location:' . BASE_URL . 'tienda/index');
                    }
                }else {             
                    $session_array = array(
                        'id' => $produ->getIdproducto(),
                            "nombre" => $produ->getNombre(),
                            "tela" =>"",
                            "talla" => "",
                            "color" => $produ->getColor(),
                            "color2" =>"",
                            "tipotaza" =>"",
                            "tipopin"=>"",
                            "tipollavero"=>"",
                            "imagen"=>$imagen,    
                            "descripcion" =>$color.". ".$descripcion,
                            "cantidad" => $cantidad,
                            "precio" => $produ->getPrecio()
                    );
                    $_SESSION['cart'][] = $session_array;
                    $_SESSION['add'] = 'ok';
                    header('Location:' . BASE_URL . 'tienda/index');
                }
            } else{
                $_SESSION['jarra'] = "error";
                header('Location:' . BASE_URL . 'tienda/jarras');
            }
        }
    }
    
    public function addDelantal() {
        $nombre = "Delantal";  
        $color = isset($_POST['color']) ? $_POST['color'] : false;
        $talla = $_POST['talla'] ? $_POST['talla'] : false;
        $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;
        $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : false;
        $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
        if (!$nombre && !$color && !$talla) {
        } else {
            $prod = new producto();
            $prod->setNombre($nombre);
            $prod->setColor($color);
            $prod->setTalla($talla);
            $produ = $prod->buscarDelantal();
            if ($produ && is_object($produ)) {          
                if (isset($_SESSION['cart'])) {                 
                    $session_array_id = array_column($_SESSION['cart'], "id");
                    if (!in_array($produ->getIdproducto(), $session_array_id)) {   
                        $session_array = array(
                            'id' => $produ->getIdproducto(),
                            "nombre" => $produ->getNombre(),
                            "tela" =>"",
                            "talla" => $produ->getTalla(),
                            "color" => $prod->getColor(),
                            "color2" =>"",
                            "tipotaza" =>"",
                            "tipopin"=>"",
                            "tipollavero"=>"",
                            "imagen"=>$imagen,    
                            "descripcion" =>$descripcion,
                            "cantidad" => $cantidad,
                            "precio" => $produ->getPrecio()
                        );
                        $_SESSION['cart'][] = $session_array;
                        $_SESSION['add'] = 'ok';
                        header('Location:' . BASE_URL . 'tienda/index');
                    }
                }else {             
                    $session_array = array(
                        'id' => $produ->getIdproducto(),
                            "nombre" => $produ->getNombre(),
                            "tela" =>"",
                            "talla" => $produ->getTalla(),
                            "color" => $prod->getColor(),
                            "color2" =>"",
                            "tipotaza" =>"",
                            "tipopin"=>"",
                            "tipollavero"=>"",
                            "imagen"=>$imagen,    
                            "descripcion" =>$descripcion,
                            "cantidad" => $cantidad,
                            "precio" => $produ->getPrecio()
                    );
                    $_SESSION['cart'][] = $session_array;
                    $_SESSION['add'] = 'ok';
                    header('Location:' . BASE_URL . 'tienda/index');
                }
            } else{
                $_SESSION['delantal'] = "error";
                header('Location:' . BASE_URL . 'tienda/delantal');
            }
        }
    }

    public function addPoster() {
        $nombre = "Poster";  
        $partes = $_POST['piezas'] ? $_POST['piezas'] : false;
        $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;
        $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : false;
        $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
        if (!$nombre) {
        } else {
            $prod = new producto();
            $prod->setNombre($nombre);
            $produ = $prod->buscarPoster();
            if ($produ && is_object($produ)) {          
                if (isset($_SESSION['cart'])) {                 
                    $session_array_id = array_column($_SESSION['cart'], "id");
                    if (!in_array($produ->getIdproducto(), $session_array_id)) {   
                        $session_array = array(
                            'id' => $produ->getIdproducto(),
                            "nombre" => $produ->getNombre(),
                            "tela" =>"",
                            "talla" => "",
                            "color" => "",
                            "color2" =>"",
                            "tipotaza" =>"",
                            "tipopin"=>"",
                            "tipollavero"=>"",
                            "imagen"=>$imagen,    
                            "descripcion" =>"Cantidad de piezas: ".$partes.". ".$descripcion,
                            "cantidad" => $cantidad,
                            "precio" => $produ->getPrecio()
                        );
                        $_SESSION['cart'][] = $session_array;
                        $_SESSION['add'] = 'ok';
                        header('Location:' . BASE_URL . 'tienda/index');
                    }
                }else {             
                    $session_array = array(
                        'id' => $produ->getIdproducto(),
                        "nombre" => $produ->getNombre(),
                        "tela" =>"",
                        "talla" => "",
                        "color" => "",
                        "color2" =>"",
                        "tipotaza" =>"",
                        "tipopin"=>"",
                        "tipollavero"=>"",
                        "imagen"=>$imagen,    
                        "descripcion" =>"Cantidad de piezas: ".$partes.". ".$descripcion,
                        "cantidad" => $cantidad,
                        "precio" => $produ->getPrecio()
                    );
                    $_SESSION['cart'][] = $session_array;
                    $_SESSION['add'] = 'ok';
                    header('Location:' . BASE_URL . 'tienda/index');
                }
            } else{
                $_SESSION['poster'] = "error";
                header('Location:' . BASE_URL . 'tienda/poster');
            }
        }
    }

    public function addPachon() {
        $nombre = "Pachon";  
        $color = isset($_POST['color']) ? $_POST['color'] : false;
        $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;
        $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : false;
        $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
        if (!$nombre && !$color) {
        } else {
            $prod = new producto();
            $prod->setNombre($nombre);
            $prod->setColor($color);
            $produ = $prod->buscarPachon();
            if ($produ && is_object($produ)) {          
                if (isset($_SESSION['cart'])) {                 
                    $session_array_id = array_column($_SESSION['cart'], "id");
                    if (!in_array($produ->getIdproducto(), $session_array_id)) {   
                        $session_array = array(
                            'id' => $produ->getIdproducto(),
                            "nombre" => $produ->getNombre(),
                            "tela" =>"",
                            "talla" => "",
                            "color" => $produ->getColor(),
                            "color2" =>"",
                            "tipotaza" =>"",
                            "tipopin"=>"",
                            "tipollavero"=>"",
                            "imagen"=>$imagen,    
                            "descripcion" =>$descripcion,
                            "cantidad" => $cantidad,
                            "precio" => $produ->getPrecio()
                        );
                        $_SESSION['cart'][] = $session_array;
                        $_SESSION['add'] = 'ok';
                        header('Location:' . BASE_URL . 'tienda/index');
                    }
                }else {             
                    $session_array = array(
                        'id' => $produ->getIdproducto(),
                            "nombre" => $produ->getNombre(),
                            "tela" =>"",
                            "talla" => "",
                            "color" => $produ->getColor(),
                            "color2" =>"",
                            "tipotaza" =>"",
                            "tipopin"=>"",
                            "tipollavero"=>"",
                            "imagen"=>$imagen,    
                            "descripcion" =>$descripcion,
                            "cantidad" => $cantidad,
                            "precio" => $produ->getPrecio()
                    );
                    $_SESSION['cart'][] = $session_array;
                    $_SESSION['add'] = 'ok';
                    header('Location:' . BASE_URL . 'tienda/index');
                }
            } else{
                $_SESSION['pachon'] = "error";
                header('Location:' . BASE_URL . 'tienda/pachon');
            }
        }
    }*/
}

?>