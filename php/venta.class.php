<?php

class Venta extends base{

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
        $this->cantidades[$producto]=$cantidad;
    }

    function set_cantidad($producto, $cantidad){
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

        $id_productos = implode(',', $this->productos);
        $sql = "select sum(precio) as precio from productos where idproducto in ({$id_productos})";
        //echo $sql;
        $precio = $conexion->fetchRow($conexion->ejecutarSQL($sql));
        
        return $precio['precio'];
    }
    
    function get_cantidad($producto){
        return $this->cantidades[$producto];
    }
}

?>
