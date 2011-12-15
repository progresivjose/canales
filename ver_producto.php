<?php
include 'php/conexion.class.php';
include 'php/sesion.php';

if (isset($_GET['id']) and !empty($_GET['id']) and $_GET['id'] != 0) {
    $productoid = $_GET['id'];
    //seleccionar el producto
    $sql = "select * from productos where idproducto = '$productoid'";
    $producto = $conexion->fetchRow($conexion->ejecutarSQL($sql));
} else {
    header('Location: index.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>CANALES S.A.</title>
        <!--        <link rel="stylesheet" href="css/jquery.lightbox-0.5.css" type="text/css" media="screen" />-->
        <link rel="stylesheet" href="css/shadowbox.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="css/style.css" type="text/css"   />
        <script type="text/javascript" src="js/jquery-1.6.1.js"></script>
        <script type="text/javascript" src="js/corner.js"></script>
<!--        <script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>-->
        <script type="text/javascript"  src="js/funciones.js"></script>
        <script type="text/javascript" src="js/contador.js"></script>
        <script type="text/javascript" src="js/shadowbox.js"></script>
        <script type="text/javascript">
            Shadowbox.init({
                language:   "es",
                players:    ["img", "iframe"]
            });
            function mostrar_producto(id) {
                // open a welcome message as soon as the window loads
                Shadowbox.open({
                    content:    URL='ver_producto.php?id='+id,
                    player:     "iframe",
                    title:      "Ver Producto",
                    height:     400,
                    width:      400
                });

            };
        </script>
    </head>
    <body onload="fecha(), lista_productos(), menu_horizontal()">
        <div id="header">
        </div>

        <!-- end #header -->
        <div id="wrapper"> 
            <div id="menu">
                <!--		<ul>
                                        <li class="current_page_item"><a href="#">Principal</a></li>
                                        <li><a href="#">Empresa</a></li>
                                        <li><a href="#">Forma de Pago</a></li>
                                        <li><a href="#">Contactos</a></li>
                                </ul>-->
            </div>

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
                <div class="post">
                    <h2 class="title"><a href="#"><?php echo $producto['nombre'] ?></a></h2>
                    <div style="clear: both;"></div>
                    <div class="img" style="width: 289px; float: left">
                        <img src="images/productos/<?php echo $producto['imagen'] ?>" style="width: 289px;"/>
                    </div>
                    <div class="descripcion">
                        <p><?php echo $producto['descripcion']?></p>
                        <form action="carrito.php" method="post">
                            <label for="cantidad">Cantidad</label>
                        <input type="text" id="cantidad" name="cantidad" value="1"/>
                        <input type="button" value="Volver" onclick="javascript: window.history.back();"/>
                        <input type="submit" value="Comprar"/>
                        <input type="hidden" name="productoid" value="<?php echo $producto['idproducto']?>"/>
                        </form>
                    </div>
                    <p>&nbsp;</p>
                </div>

                <div style="clear: both;">&nbsp;</div>
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
            <p>Copyright (c) 2011  All rights reserved. Design by Edith Alfonso and Carina Servín</p>
        </div>
        <!-- end #footer -->
    </body>
</html>

