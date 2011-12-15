<?php 
include 'php/conexion.class.php';
include 'php/usuario.class.php';
include 'php/autenticar.php';
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
                <?php include "php/login.php";?>
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
                <img src="images/promo_1.jpg" alt="Klematis" width="550" height="550" />
                <div style="clear: both;">&nbsp;</div>
            </div>

            <!-- end #content -->
            <div id="sidebar">

                Este espacio es reemplazado por el script </div>
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
