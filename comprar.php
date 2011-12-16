<?php
    include 'php/conexion.class.php';
    include 'php/sesion.php';
    
    if(isset($_POST['id'])){
        if(isset($venta)){
            $campos = array("cod_usuario"=>$user->get_id(), "total_venta"=>$venta->calcular_monto(), "fecha_venta"=>date('Y-m-d'));
            $venta->guardar($campos, "ventas_cab");
            $ventaid = $conexion->fetchRow($conexion->ejecutarSQL("select max(idventa) as idventa from ventas_cab"));
            $venta->set_id($ventaid['idventa']);
            $venta->guardar_detalles($user->get_id());
        }
    }
?>
