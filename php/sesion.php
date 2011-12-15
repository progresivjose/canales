<?php



session_start();

if (isset($_POST['user']) && isset($_POST['pass'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $sql = "select * from usuarios where usuario = '$user' and password = '$pass'";
    $usuarios = $conexion->ejecutarSQL($sql);
    if ($conexion->numRows($usuarios) > 0) {
        $usuario = $conexion->fetchRow($usuarios);
        $_SESSION['user']['usuario'] = $usuario['usuario'];
        $_SESSION['user']['id'] = $usuario['idusuario'];
        $_SESSION['user']['tipo'] = $usuario['id_tipo'];
        $_SESSION['user']['nombre'] = $usuario['nombre'];
        $_SESSION['user']['apellido'] = $usuario['apellido'];
        
        
    }
}

if (isset($_GET['logout']) and $_GET['logout'] == 1) {
    unset($_SESSION['user']);
}

if (isset($_SESSION['user'])) {
    $session_user = $_SESSION['user']['usuario'];
    $session_id = $_SESSION['user']['id'];
    $session_tipo = $_SESSION['user']['tipo'];
    $session_nombre = $_SESSION['user']['nombre'];
    $session_apellido = $_SESSION['user']['apellido'];
}
?>