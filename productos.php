<?php
include 'php/conexion.class.php';
include 'php/sesion.php';

if (isset($_GET['id']) and !empty($_GET['id']) and $_GET['id'] != 0) {
    $categoriaid = $_GET['id'];
    //seleccionar la categoria
    $categoria = $conexion->fetchRow($conexion->ejecutarSQL("select * from categorias where idcategoria = '$categoriaid'"));
    //seleccionar todos los productos
    $sql = "select * from productos where id_categoria = '$categoriaid'";
    $productos = $conexion->ejecutarSQL($sql);
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
        <link rel="stylesheet" href="css/jquery.lightbox-0.5.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="css/style.css" type="text/css"   />
        <script type="text/javascript" src="js/jquery-1.6.1.js"></script>
        <script type="text/javascript" src="js/corner.js"></script>
        <script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
        <script type="text/javascript"  src="js/funciones.js"></script>
        <script type="text/javascript" src="js/contador.js"></script>
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
                    <h2 class="title"><a href="#"><?php echo $categoria['nombre']?></a></h2>
                    <div style="clear: both;">
                        <p>En esta categoría encontrará productos para el hogar para su uso en la vida cotidiana en ella encontrara una gran variedad de articulos  de nueva tecnología.
                        </p>
                        <p>&nbsp;</p>
                    </div>
                    <div class="entry">
                        <div id="gallery">
                            <ul>
<?php
if ($conexion->numRows($productos) > 0) {
    while ($producto = $conexion->fetchRow($productos)) {
        ?>
                                        <li>
                                            <a href="images/productos/<?php echo $producto['imagen']?>" id="hogar_1" onclick="calcular_cuotas(5000,this.id);" title="Descripcion:Capacidad 2kg de aceite, 1 Kg de comida. Bowl antiaderente timer y termostato ajustable.
                                               &lt;br \/&gt; &lt;br \/&gt;
                                               &lt;strong&gt;Nombre del Producto:&lt;/strong&gt;Televisor &lt;br \/&gt;
                                               &lt;strong&gt;Codigo: &lt;/strong&gt; Hogar_1">
                                                <img src="images/productos/<?php echo $producto['imagen']?>" width="72" height="72" alt="" />
                                            </a>
                                        </li>
                                    <?php }
                                } ?>
                            </ul>
                        </div>

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

