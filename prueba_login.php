<?php
include 'php/conexion.class.php';
include 'php/usuario.class.php';

$conexion = new Conexion();

$sql = "select idusuario, nombre, apellido from usuarios where idusuario = '1'";
$user = $conexion->fetchRow($conexion->ejecutarSQL($sql));

?>
