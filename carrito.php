<?php
include 'php/conexion.class.php';
include 'php/sesion.php';
if (!isset($user)) {
    header('Location: index.php?msg=1');
}


if (isset($_POST['productoid'])) {
    $productoid = $_POST['productoid'];
    $cantidad = $_POST['cantidad'];

    if ($cantidad == 0 || $cantidad < 0) {
        $cantidad = 1;
    }
    if (!isset($venta)) {
        $venta = new Venta($user->get_id(), date('Y-m-d'));
        $venta->agregar_producto($productoid, $cantidad);

        $_SESSION['venta'] = $venta;
    } else {
        if (array_search($productoid, $venta->get_productos()) != FALSE) {
            $cantidad = $venta->get_cantidad($productoid);
            $cantidad++;
            $venta->set_cantidad($productoid, $cantidad);
        } else {
            $venta->agregar_producto($productoid, $cantidad);
        }
        //$venta->agregar_producto($productoid);
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

        <style>
            #carrito{
                width: 100%;
                text-align: center;
            }

            #carrito thead{
                background-color: #f8f8f8;
            }

            #carrito tfoot{
                font-weight: bold;
            }
            #boton{
                margin: 20px;
                float: right;
            }
        </style>

        <script type="text/javascript">
            function realizar_compra(){
                $.ajax({
                    type: 'POST',
                    url: 'comprar.php',
                    data: 'id=1',
                    success: function(){
                        window.open("comprobante.php","comprobante", "width = 500 height = 500")
                        //window,location = "index.php?logout=1";
                    }
                })
            }
        </script>
    </head>
    <body onload="fecha(), lista_productos(), menu_horizontal()">
        <div id="header">
        </div>

        <!-- end #header -->
        <div id="wrapper"> 
            <div id="menu"><?php include "php/menu.php"?></div>
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
                <table id="carrito">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Precio Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $idproductos = implode(',', $venta->get_productos());
                        $sql = "select * from productos where idproducto in ($idproductos)";
                        $productos = $conexion->ejecutarSQL($sql);
                        while ($producto = $conexion->fetchRow($productos)) {
                            ?>
                            <tr>
                                <td><img src="images/productos/<?php echo $producto['imagen'] ?>" alt="imagen" style="width: 50px; height: 50px; "/></td>
                                <td><?php echo $producto['nombre'] ?></td>
                                <td><?php echo $venta->get_cantidad($producto['idproducto']) ?></td>
                                <td><?php echo number_format($producto['precio'], 0, '.', ',') ?></td>
                                <td><?php echo number_format($producto['precio'] * $venta->get_cantidad($producto['idproducto']), 0, '.', ',') ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="4">Total a Pagar:</td>
                            <td><?php echo number_format($venta->calcular_monto(), 0, '.', ',') ?></td>
                        </tr>
                    </tfoot>
                    <tr>
                    </tr>
                </table>
                <div id="boton">
                    <input type="button" value="Comprar" onclick="realizar_compra()"/>
                </div>
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

