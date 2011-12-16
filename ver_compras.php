<?php
include 'php/conexion.class.php';
include 'php/sesion.php';

$ventas = $conexion->ejecutarSQL("select *, to_char(fecha_venta, 'DD/MM/YYYY') as fecha from ventas_cab where cod_usuario = {$user->get_id()} order by fecha_venta desc");
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

        </div>
        <div id="page">

            <div id="fecha">Fecha actual</div>

            <div id="content">
                <table>
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Codigo Compra</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($conexion->numRows($ventas) > 0) {
                            while ($venta = $conexion->fetchRow($ventas)) { ?>
                                <tr>
                                    <td><?php echo $venta['fecha']?></td>
                                    <td style="text-align: center;"><?php echo $venta['idventa']?></td>
                                    <td><a href="ver_detalle.php?ventaid=<?php echo $venta['idventa']?>" target="_blank">Ver Detalle</a></td>
                                </tr>
                            <?php }
                        } ?>
                    </tbody>

                </table>
                <div style="clear: both;">&nbsp;</div>
            </div>

            <!-- end #content -->
            <div id="sidebar"><?php include "php/sidebar.php"; ?></div>
            <!-- end #sidebar -->
            <div style="clear: both;">&nbsp;</div>
        </div>

        <!-- end #page -->
        <div id="footer-menu">

        </div>
        <div id="footer">
            <p>España 904 esq TTe Benitez Telefax:585-489/ 591 -585 ventas@canales.com.py</p>
        </div>
        <!-- end #footer -->
    </body>
</html>
