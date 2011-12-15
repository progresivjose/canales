<?php

/**
* Se encarga de la conexión a la base de datos
*
*/
class Conexion {
    private $conexion;

   function __construct() {

        $this->conexion = pg_connect("host=localhost user=postgres password=postgres dbname=canales port=5432");    
        
        if (!$this->conexion)
                throw new Exception('Error al conectar a la base de datos.');
    }

    function __destruct() {
        if (isset($this->conexion))
            pg_close($this->conexion);
    }

    function ejecutarSQL($sql) {
 
        $result = pg_query($this->conexion, $sql);
        
        if (!$result)
            throw new Exception ('Error al ejecutar el query sql (' . $sql . ')');

        return $result;
    }

    function fetchRow($result) {
        return pg_fetch_array($result);
    }

    function fetchAssoc($result) {
        return pg_fetch_assoc($result);
    }

    function numRows($result) {
        return pg_num_rows($result);
    }

    function result($result, $row, $field) {
        return pg_result($result, $row, $field);
    }

    function resultError($result){
        return pg_result_error($result);
    }

    function escape($string){
        return pg_escape_string($this->conexion, $string);
    }

}

$conexion = new Conexion();
?>