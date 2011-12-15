<?php

class usuario extends base{
    private $id;
    private $nombre;
    private $apellido;
    private $cedula;
    private $celular;
    private $tipo;
    private $usuario;
    private $productos = array();
    
    function __construct($id, $nombre, $apellido,$cedula, $celular, $usuario,$tipo){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->cedula = $cedula;
        $this->celular = $celular;
        $this->usuario = $usuario;
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
    
    function get_apellido(){
        return $this->apellido;
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
