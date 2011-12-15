<?php
if(isset($_POST['user']) && isset($_POST['password'])){
    $usuario = $_POST['user'];
    $pass = $_POST['password'];
    
    $sql = "select * from usuarios where usuario = '$usuario' and password = '$pass'";
    $usuarios = $conexion->ejecutarSQL($sql);
    if($conexion->numRows($usuarios)>0){
        $usuario = $conexion->fetchRow($usuarios);
        $user = new usuarios($usuario['idusuario'], $usuario['nombre'], $usuario['id_tipo']);
    }
}
?>
