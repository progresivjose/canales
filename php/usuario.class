<?php

class usuarios{
    private $id;
    private $nombre;
    private $tipo;
    private $productos = array();
    
    function __contruct($id, $nombre, $tipo){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->tipo = $tipo;
    }
    
    function set_id($id){
        $this->nombre = $nombre;
    }
    
    function set_nombre($nombre){
        $this->nombre = $nombre;
    }
    
    function set_tipo($tipo){
        $this->tipo = $tipo;
    }
    
    function set_producto($producto){
        //seteo todos los productos que el usuario esta agregando a su carrito
        array_push($this->productos, $producto);
    }
    
    function get_id(){
        return $this->id;
    }
    
    function get_nombre(){
        return $this->nombre;
    }
    
    function get_tipo(){
        return $this->tipo;
    }
    
    
    /*
     * Obtiene todos los productos en un array
     */
    function get_productos(){
        return $this->productos;
    }
}
?>
