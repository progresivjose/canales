<?php
include 'php/conexion.class.php';
include 'php/sesion.php';

if (isset($_POST['usuario']) && isset($_POST['password'])) {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    if ($conexion->numRows($conexion->ejecutarSQL("select * from usuarios where usuario = '$usuario'")) == 0) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $cedula = $_POST['cedula'];
        $celular = $_POST['celular'];
        //obtener el id e incrementar, para la creacion del objeto
        $id = $conexion->fetchRow($conexion->ejecutarSQL("select max(idusuario) as idusuario from usuarios"));
        $id = $id['idusuario'];
        $id++;
        $user = new usuario($id, $nombre, $apellido, $cedula, $celular, $usuario, 1);
        $array = array("nombre"=>$nombre, 
                                "apellido"=>$apellido, 
                                "cedula"=>$cedula, 
                                "celular"=>$celular, 
                                "id_tipo"=>1, 
                                "usuario"=>$usuario,
                                "password"=>$password);
        $user->guardar($array, "usuarios");
        $_SESSION['user']['usuario'] = $usuario;
        $_SESSION['user']['id'] = $id;
        $_SESSION['user']['tipo'] = 1;
        $_SESSION['user']['nombre'] = $nombre;
        $_SESSION['user']['apellido'] = $apellido;
        $_SESSION['user']['cedula'] = $cedula;
        $_SESSION['user']['celular'] = $celular;
        header('Location: index.php');
    } else {
        $msg = "Usuario Existente";
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>CANALES S.A.</title>
        <link rel="stylesheet" href="css/jquery.lightbox-0.5.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="css/style.css" type="text/css"   />
        <script type="text/javascript" src="js/jquery-1.6.1.js"></script>
        <script type="text/javascript" src="js/corner.js"></script>
        <script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
        <script type="text/javascript"  src="js/funciones.js"></script>
        <script type="text/javascript" src="js/contador.js"></script>
        <script type="text/javascript">
<?php if (isset($_GET['msg']) and $_GET['msg'] == 1) { ?>
        alert('Para realizar una compra debe iniciar sesion');
<?php } ?>    
        </script>
    </head>
    <body onload="fecha(), lista_productos(), menu_horizontal()">
        <div id="header">
        </div>

        <!-- end #header -->
        <div id="wrapper"> 
            <div id="menu"><?php include "php/menu.php" ?></div>
            <!-- end #menu -->
            <div id="login">
                <?php include "php/login.php"; ?>
            </div>

            <!--  NO SE USA 
             <div id="search" >
                           <form method="get" action="#">
                                   <div>
                                           <input type="text" name="s" id="search-text" value="" />
                                   </div>
                           </form>
             </div>-->
        </div>
        <div id="page">

            <div id="fecha">Fecha actual</div>

            <div id="content">
                <h3>Registrarse</h3>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                    <table>
                        <tr>
                            <td><label for="nombre">Nombre</label></td>
                            <td><input type="text" name="nombre" value="" id="nombre"/></td>
                        </tr>
                        <tr>
                            <td><label for="apellido">Apellido</label></td>
                            <td><input type="text" name="apellido" value="" id="apellido"/></td>
                        </tr>
                        <tr>
                            <td><label for="cedula">Cedula</label></td>
                            <td><input type="text" name="cedula" value="" id="cedula"/></td>
                        </tr>
                        <tr>
                            <td><label for="celular">Celular</label></td>
                            <td><input type="text" name="celular" value="" id="celular"/></td>
                        </tr>
                        <tr><td colspan="2">&nbsp;</td></tr>
                        <tr>
                            <td><label for="usuario">Usuario</label></td>
                            <td><input type="text" name="usuario" value="" id="usuario"/></td>
                        </tr>
                        <tr>
                            <td><label for="password">Password</label></td>
                            <td><input type="password" name="password" value="" id="password"/></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input type="Submit"  value="Aceptar" /></td>
                        </tr>
                    </table>
                </form>
                <div class="error"><?php if(isset($msg)){echo $msg;}?></div>
            </div>

            <!-- end #content -->
            <div id="sidebar"><?php include "php/sidebar.php"; ?></div>
            <!-- end #sidebar -->
            <div style="clear: both;">&nbsp;</div>
        </div>

        <!-- end #page -->
        <div id="footer-menu">
            <!--	<ul>
                            <li class="current_page_item"><a href="#">Principal</a></li>
                                    <li><a href="#">Empresa</a></li>
                                    <li><a href="#">Forma de Pago</a></li>
                                    <li><a href="#">Contactos</a></li>
                    </ul>--> 
        </div>
        <div id="footer">
            <p>España 904 esq TTe Benitez Telefax:585-489/ 591 -585 ventas@canales.com.py</p>
        </div>
        <!-- end #footer -->
    </body>
</html>
