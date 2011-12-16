<?php
include 'php/base.class.php';
include 'php/usuario.class.php';
include 'php/venta.class.php';


session_start();

if (isset($_POST['user']) && isset($_POST['pass'])) {
    $user_post = $_POST['user'];
    $pass = $_POST['pass'];

    $sql = "select * from usuarios where usuario = '$user_post' and password = '$pass'";
    $usuarios = $conexion->ejecutarSQL($sql);
    if ($conexion->numRows($usuarios) > 0) {
        $usuario = $conexion->fetchRow($usuarios);
        $_SESSION['user']['usuario'] = $usuario['usuario'];
        $_SESSION['user']['id'] = $usuario['idusuario'];
        $_SESSION['user']['tipo'] = $usuario['id_tipo'];
        $_SESSION['user']['nombre'] = $usuario['nombre'];
        $_SESSION['user']['apellido'] = $usuario['apellido'];
        $_SESSION['user']['cedula'] = $usuario['cedula'];
        $_SESSION['user']['celular'] = $usuario['celular'];
    }else{
        $msg = "Usuario o Contrasenha invalido";
    }
}

if (isset($_GET['logout']) and $_GET['logout'] == 1) {
    unset($_SESSION['user']);
    unset($_SESSION['venta']);
    header("Location: index.php");
}

if (isset($_SESSION['user'])) {
    $usuario = $_SESSION['user']['usuario'];
    $usuarioid = $_SESSION['user']['id'];
    $tipo = $_SESSION['user']['tipo'];
    $nombre = $_SESSION['user']['nombre'];
    $apellido = $_SESSION['user']['apellido'];
    $cedula = $_SESSION['user']['cedula'];
    $celular = $_SESSION['user']['celular'];
    
    $user = new usuario($usuarioid, $nombre, $apellido, $cedula, $celular, $usuario, $tipo);
}

if(isset($_SESSION['venta'])){
    $venta = $_SESSION['venta'];
}
?>