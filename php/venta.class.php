<?php

class Venta extends base {

    private $id;
    private $userid;
    private $monto_total;
    private $fecha;
    private $productos = array();
    private $cantidades = array();

    function __construct($userid, $fecha) {
        $this->userid = $userid;
        $this->fecha = $fecha;
        parent::__construct();
    }

    function set_id($id) {
        $this->id = $id;
    }

    function set_userid($userid) {
        $this->userid = $userid;
    }

    function set_monto_total($monto_total) {
        $this->monto_total = $monto_total;
    }

    function set_fecha($fecha) {
        $this->fecha = $fecha;
    }

    function agregar_producto($producto, $cantidad) {
        array_push($this->productos, $producto);
        //setear la cantidad
        $this->cantidades[$producto] = $cantidad;
    }

    function set_cantidad($producto, $cantidad) {
        $this->cantidades[$producto] = $cantidad;
    }

    function get_id() {
        return $this->id;
    }

    function get_userid() {
        return $this->userid;
    }

    function get_monto_total() {
        return $this->monto_total;
    }

    function get_fecha() {
        return $this->fecha;
    }

    function get_productos() {
        return $this->productos;
    }

    function calcular_monto() {
        global $conexion;
        $monto = 0;
        $id_productos = implode(',', $this->productos);
        $sql = "select precio, idproducto    from productos where idproducto in ({$id_productos})";
        //echo $sql;
        $precios = $conexion->ejecutarSQL($sql);
        while ($precio = $conexion->fetchRow($precios)) {
            foreach ($this->productos as $producto) {
                if ($precio['idproducto'] == $producto) {
                    $monto += $precio['precio'] * $this->cantidades[$producto];
                }
            }
        }
        return $monto;
    }

    function get_cantidad($producto) {
        return $this->cantidades[$producto];
    }

    function guardar_detalles($usuarioid) {
        global $conexion;
        foreach ($this->productos as $producto) {
            $precio = $this->get_precio($producto);
            $sql = "insert into ventas_det (cod_usuario, cod_venta, cod_producto, precio, fecha_venta, cantidad)";
            $sql .= "values('$usuarioid', '{$this->id}', '$producto', '$precio', '".date('Y-m-d')."', '{$this->cantidades[$producto]}')";
            $conexion->ejecutarSQL($sql);
        }
    }

    function get_precio($producto){
        global $conexion;
        $precio = $conexion->fetchRow($conexion->ejecutarSQL("select precio from productos where idproducto = '$producto'"));
        return $precio['precio'];
    }
    
}

?>
