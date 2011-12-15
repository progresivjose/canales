<?php
include 'php/conexion.class.php';
include 'php/sesion.php';
if(!isset($user)){
    header('Location: index.php?msg=1');
}


if(isset($_POST['productoid'])){
    $productoid = $_POST['productoid'];
    $cantidad = $_POST['cantidad'];
    
    if($cantidad == 0 || $cantidad <0 ){
        $cantidad = 1;
    }
    if(!isset($venta)){
        $venta = new Venta($user->get_id(), date('Y-m-d'));
        $venta->agregar_producto($productoid);
        
        $_SESSION['venta'] = $venta;
    }else{
        if(array_search($productoid, $venta->get_productos())!=FALSE){
            $cantidad = $venta->get_cantidad($productoid);
            $cantidad++;
            $venta->set_cantidad($productoid, $cantidad);
        }else{
            $venta->agregar_producto($productoid, $cantidad);
        }
        //$venta->agregar_producto($productoid);
    }
    print_r($venta->get_productos());
    
    echo $venta->get_cantidad($productoid);
}
?>
