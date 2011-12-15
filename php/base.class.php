<?php

/*
 * Esta clase sera heredada por las demas clases
 */

class base {
    /*
     * esta funcion recibe dos parametros
     * un array asociativo, donde se usa el indice para los nombres de los campos
     * el nombre de la tabla
     */

    function __construct() {
       
    }
    
    function guardar($array, $tabla) {
        $campos = "";
        $valores = "";        
        global $conexion;
        
        foreach ($array as $indice => $valor) {
           $campos .= $indice.",";
           $valores .= "'".$valor."',";
        }
        $campos = substr ($campos, 0, strlen($campos) - 1);
        $valores = substr ($valores, 0, strlen($valores) - 1);
        
        $sql = "insert into {$tabla} ({$campos}) values ({$valores})";

        $conexion->ejecutarSQL($sql);
    }

}

?>
