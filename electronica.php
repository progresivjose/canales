<?php
include 'php/conexion.class.php';
include 'php/sesion.php';
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
            <div id="menu"><?php include "php/menu.php" ?></div>
            <!-- end #menu -->
            <div id="login">
                <?php include "php/login.php"; ?>
            </div>
        </div>
        <div id="page">

            <div id="fecha">Fecha actual</div>

            <div id="content">
                <div class="post">
                    <h2 class="title"><a href="#"> Electronica</a></h2>
                    <div style="clear: both;">
                        <p>En esta categoría encontrará productos para la electrónica,  celulares, cámaras, notebook y otros.
                        </p>
                        <p>&nbsp;</p>
                    </div>
                    <div class="entry">

                        <div id="gallery">
                            <ul>
                                <li>
                                    <a href="images/electronica_1.jpg" id="electronica_1" onclick="calcular_cuotas(5000,this.id);" title="Descripcion:Camara de 2px radio FM, 3.5 GB,kia reproductor de MP3
                                       &lt;br \/&gt; &lt;br \/&gt;
                                       &lt;strong&gt;Nombre del Producto:&lt;/strong&gt;Televisor &lt;br \/&gt;
                                       &lt;strong&gt;Codigo: &lt;/strong&gt; Hogar_1">
                                        <img src="images/electronica_1_tb.jpg" width="72" height="72" alt="" />
                                    </a>
                                </li>
                                <li>
                                    <a href="images/electronica_2.jpg" id="electronica_2" onclick="calcular_cuotas(10000,this.id);"  title="Descripcion:Camara 1.3 px, filmadora radio FM
                                       &lt;br \/&gt; &lt;br \/&gt;
                                       &lt;strong&gt;Nombre del Producto:&lt;/strong&gt;Televisor &lt;br \/&gt;
                                       &lt;strong&gt;Codigo: &lt;/strong&gt; Hogar_1">
                                        <img src="images/electronica_2_tb.jpg" width="72" height="72" alt="" />
                                    </a>
                                </li>
                                <li>
                                    <a href="images/electronica_3.jpg" id="electronica_3" onclick="calcular_cuotas(15000,this.id);"  title="Descripcion:14.1 px zoom optico 4x. angular 24 mm LCD 3.0 captador de sonrizas
                                       &lt;br \/&gt; &lt;br \/&gt;
                                       &lt;strong&gt;Nombre del Producto:&lt;/strong&gt;Televisor &lt;br \/&gt;
                                       &lt;strong&gt;Codigo: &lt;/strong&gt; Hogar_1">
                                        <img src="images/electronica_3_tb.jpg" width="72" height="72" alt="" />
                                    </a>
                                </li>
                                <li>
                                    <a href="images/electronica_4.jpg" id="electronica_4" onclick="calcular_cuotas(20000,this.id);"  title="Descricion: Cap.: camara 3 px touch screen radio FM
                                       &lt;br \/&gt; &lt;br \/&gt;
                                       &lt;strong&gt;Nombre del Producto:&lt;/strong&gt;Televisor &lt;br \/&gt;
                                       &lt;strong&gt;Codigo: &lt;/strong&gt; Hogar_1">
                                        <img src="images/electronica_4_tb.jpg" width="72" height="72" alt="" />
                                    </a>
                                </li>

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
